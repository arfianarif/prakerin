<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function getData()
    {
        if ($this->input->get('draw')) {
            $page = (int)$this->input->get('draw');
        } else {
            $page = 1;
        }

        if ($this->input->get('start')) {
            $start = (int)$this->input->get('start');
        } else {
            $start = 0;
        }

        if ($this->input->get('length')) {
            $limit = (int)$this->input->get('length');
        } else {
            $limit = 100;
        }

        if ($this->input->get('search[value]')) {
            $searchValue = $this->input->get('search[value]');
            // $searchValue = $this->db->escape($searchValue);
        } else {
            $searchValue = '';
        }

        $mapArray = [
            'id_siswa',
            'nis',
            'nama',
            'alamat',
            'ttl',
            'email',
            'password'
        ];

        $coloumnIndex = $this->input->get('order[0][column]');
        $coloumnOrder = isset($mapArray[$coloumnIndex]) ? $mapArray[$coloumnIndex] : 'id_siswa';


        $getOrderBy = $this->input->get('order[0][dir]');

        if (strtolower($getOrderBy) == 'asc') {
            $orderBy = 'ASC';
        } else {
            $orderBy = 'DESC';
        }
        $sql = "SELECT * FROM m_siswa WHERE publish = 1";
        $sqlCountFiltered = "SELECT count(id_siswa) as jumlah FROM m_siswa WHERE  publish = 1 ";
        $sqlCountTotal = "SELECT count(id_siswa) as jumlah FROM m_siswa WHERE publish = 1";

        if (!empty($searchValue)) {
            $sql .= " AND ( nis LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR password LIKE '%$searchValue%' )";

            $sqlCountFiltered .= " AND ( nis LIKE '%$searchValue%' OR email LIKE '%$searchValue%' OR password LIKE '%$searchValue%' )";
        }

        $sql .= " ORDER BY $coloumnOrder $orderBy LIMIT $start,$limit";

        $queryCount = $this->db->query($sqlCountFiltered)->row();
        $totalDataFiltered = $queryCount->jumlah;

        $queryTotalData = $this->db->query($sqlCountTotal)->row();
        $totalData = $queryTotalData->jumlah;

        $query = $this->db->query($sql);

        $results = [];
        $i = 1;
        foreach ($query->result_array() as $row) {

            $id = $row['id_siswa'];
            $linkDelete = base_url('Admin/Master_Data/Siswa/Delete/') . $id;
            $htmlAction = '
                <div class="d-flex flex-row">
                    <div class="btn-group">
                        <button class="js-edit-btn btn btn-warning btn-sm" data-id="' . $id . '">
                        Edit
                        </button>

                        <button data-id="' . $id . '" class="js-delete-btn btn btn-danger btn-sm">
                            Delete
                        </button>
                    </div>
                </div>
            ';
            $results[] = [
                $no = $i++,
                $nis = $row['nis'],
                $nis = $row['nama'],
                $nis = $row['alamat'],
                $nis = $row['ttl'],
                $email = $row['email'],
                $password = $row['password'],
                $htmlAction
            ];
        }

        $json = [];
        $json['draw'] = $page;
        $json['recordsTotal'] = $totalDataFiltered;
        $json['recordsFiltered'] = $totalData;
        $json['data'] = $results;

        header("Content-type:application/json");

        echo json_encode($json);
    }

    public function getDataById()
    {
        $array = ['id_siswa' => $this->input->get('id')];
        $result = [];
        $getData = $this->db->get_where('m_siswa', $array);
        if ($getData->num_rows() > 0) {
            $result['status'] = true;
            $result['data'] = $getData->row();
        } else {
            $result['false'] = true;
        }

        echo json_encode($result);
    }

    public function addData()
    {
        $array = [];

        if ($this->input->post('nis') != "") {
            $array['nis'] = $this->input->post('nis');
        }

        if ($this->input->post('email') != "") {
            $array['email'] = $this->input->post('email');
        }

        if ($this->input->post('password') != "") {
            $array['password'] = $this->input->post('password');
        }

        if ($this->input->post('nama') != "") {
            $array['nama'] = $this->input->post('nama');
        }

        if ($this->input->post('alamat') != "") {
            $array['alamat'] = $this->input->post('alamat');
        }

        if ($this->input->post('ttl') != "") {
            $array['ttl'] = $this->input->post('ttl');
        }

        $array['publish'] = 1;

        $a = $this->db->insert('m_siswa', $array);

        $getData = $this->db->get_where('m_siswa', $array)->row_array();

        $user = array(
            'id_user' => $getData['id_siswa'],
            'no_identitas' => $getData['nis'],
            'email' => $getData['email'],
            'password' => $getData['password'],
            'role' => 'siswa'
        );

        $b = $this->db->insert('m_users', $user);

        $result = [];
        if ($a > 0 && $b > 0) {
            $result['status'] = true;
            $result['message'] = "Success";
        } else {
            $result['status'] = false;
            $result['message'] = true;
        }

        echo json_encode($result);
    }

    public function editData()
    {
        $array = [];
        $userTableArray = [];

        if ($this->input->post('nis') != "") {
            $array['nis'] = $this->input->post('nis');
            $userTableArray['no_identitas'] = $this->input->post('nis');
        }

        if ($this->input->post('email') != "") {
            $array['email'] = $this->input->post('email');
            $userTableArray['email'] = $this->input->post('email');
        }

        if ($this->input->post('password') != "") {
            $array['password'] = $this->input->post('password');
            $userTableArray['password'] = $this->input->post('password');
        }

        ($this->input->post('nama') != "") ? $array['nama'] = $this->input->post('nama') : false;
        ($this->input->post('alamat') != "") ? $array['alamat'] = $this->input->post('alamat') : false;
        ($this->input->post('ttl') != "") ? $array['ttl'] = $this->input->post('ttl') : false;
        ($this->input->post('publish') != "") ? $array['publish'] = $this->input->post('publish') : false;

        $a = $this->db->update('m_siswa', $array, array('id_siswa' => $this->input->post('id_siswa')));
        $b = $this->db->update('m_users', $userTableArray, array('id_user' => $this->input->post('id_siswa')));
        $result = [];
        if ($a > 0 && $b > 0) {
            $result['status'] = true;
            $result['message'] = "Success";
        } else {
            $result['status'] = false;
            $result['message'] = "Failed";
        }

        echo json_encode($result);
    }

    public function deleteData()
    {
        $array = [];
        $array['publish'] = 0;

        $a = $this->db->update('m_siswa', $array, array('id_siswa' => $this->input->post('id_siswa')));
        $result = [];

        if ($a > 0) {
            $result['status'] = true;
            $result['message'] = "Success";
        } else {
            $result['status'] = false;
            $result['message'] = 'Failed';
        }

        echo json_encode($result);
    }
}
