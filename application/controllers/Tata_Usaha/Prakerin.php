<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prakerin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        // $this->load->model('Auth/MLogin');
    }
    public function data_prakerin()
    {
        // $this->data['nav'] = $this->load->view();
        $this->template->load('Tata_Usaha/Prakerin/dataprakerin');
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
            'p.id_praktik',
            'p.nama_instansi',
            'p.alamat_instansi',
            'p.status',
            's.nama',
            's.nis',
        ];

        $coloumnIndex = $this->input->get('order[0][column]');
        $coloumnOrder = isset($mapArray[$coloumnIndex]) ? $mapArray[$coloumnIndex] : 'id_praktik';


        $getOrderBy = $this->input->get('order[0][dir]');

        if (strtolower($getOrderBy) == 'asc') {
            $orderBy = 'ASC';
        } else {
            $orderBy = 'DESC';
        }
        $sql = "SELECT * FROM praktik as p LEFT JOIN kelompok as k on k.id_praktik = p.id_praktik LEFT JOIN m_siswa as s on s.id_siswa = k.id_siswa WHERE p.publish = 1";
        $sqlCountFiltered = "SELECT count(p.id_praktik) as jumlah FROM praktik as p LEFT JOIN kelompok as k on k.id_praktik = p.id_praktik LEFT JOIN m_siswa as s on s.id_siswa = k.id_siswa";
        $sqlCountTotal = "SELECT count(p.id_praktik) as jumlah FROM praktik as p LEFT JOIN kelompok as k on k.id_praktik = p.id_praktik LEFT JOIN m_siswa as s on s.id_siswa = k.id_siswa";

        if (!empty($searchValue)) {
            $sql .= " AND ( p.nama_instansi LIKE '%$searchValue%' OR p.alamat_instansi LIKE '%$searchValue%' OR p.status LIKE '%$searchValue%' OR s.nama LIKE '%$searchValue%' OR s.nis LIKE '%$searchValue%' )";

            $sqlCountFiltered .= " AND ( p.nama_instansi LIKE '%$searchValue%' OR p.alamat_instansi LIKE '%$searchValue%' OR p.status LIKE '%$searchValue%' OR s.nama LIKE '%$searchValue%' OR s.nis LIKE '%$searchValue%' )";
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

            $id = $row['id_praktik'];
            // $linkDelete = base_url('Admin/Master_Data/Siswa/Delete/') . $id;
            $htmlAction = '';
            $htmlAction .= '
                <div class="d-flex flex-row">
                    <div class="btn-group">
                        <button class="js-edit-btn btn btn-warning btn-sm" data-id="' . $id . '">
                        Edit
                        </button>';
            switch ($row['status']) {
                case 'disetujui':
                    $htmlAction .= '
                        <button data-id="' . $id . '" class="js-print-btn btn btn-primary btn-sm">
                            Cetak Surat
                        </button>
                    ';

                    break;

                default:
                    # code...
                    break;
            }


            $htmlAction .= '</div>
                </div>
            ';
            $results[] = [
                $i++,
                $row['nama'],
                $row['nama_instansi'],
                $row['alamat_instansi'],
                $row['status'],
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
        $id = $this->input->get('id');
        $result = [];
        $sql = "SELECT * FROM praktik as p LEFT JOIN kelompok as k on k.id_praktik = p.id_praktik LEFT JOIN m_siswa as s on s.id_siswa = k.id_siswa WHERE p.id_praktik = $id";
        $getData = $this->db->query($sql);
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

        if ($this->input->post('nama_instansi') != "") {
            $array['nama_instansi'] = $this->input->post('nama_instansi');
            $userTableArray['no_identitas'] = $this->input->post('nama_instansi');
        }

        if ($this->input->post('alamat_instansi') != "") {
            $array['alamat_instansi'] = $this->input->post('alamat_instansi');
        }

        if ($this->input->post('status') != "") {
            $array['status'] = $this->input->post('status');
        }

        $a = $this->db->update('praktik', $array, array('id_praktik' => $this->input->post('id_praktik')));
        $result = [];
        if ($a > 0) {
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
