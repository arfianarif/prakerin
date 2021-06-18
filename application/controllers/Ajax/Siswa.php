<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
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
            0 => 'id_siswa',
            1 => 'nis',
            2 => 'email',
            3 => 'password'
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
                <button class="edit-btn btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#edit" data-id="' . $id . '">
                <i class="fas fa fa-edit"></i>
                </button>

                <a href="' . $linkDelete . '" class="swal-btn btn btn-danger btn-circle btn-sm">
                    <i class="fas fa-trash"></i>
                </a>
            ';
            $results[] = [
                $no = $i++,
                $nis = $row['nis'],
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
}
