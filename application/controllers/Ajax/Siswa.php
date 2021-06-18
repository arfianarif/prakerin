<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        // $this->template->load_auth('Auth/login');
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
            $search = $this->input->get('search[value]');
            $searchValue = $this->db->escape($search);
        } else {
            $searchValue = '';
        }

        $mapArray = [
            0 => 'idx',
            1 => 'picture',
            2 => 'name',
            3 => 'username',
            4 => 'category'

        ];

        $coloumnIndex = $this->input->get('order[0][column]');
        $coloumnOrder = isset($mapArray[$coloumnIndex]) ? $mapArray[$coloumnIndex] : 'name';


        $getOrderBy = $this->input->get('order[0][dir]');

        if (strtolower($getOrderBy) == 'asc') {
            $orderBy = 'ASC';
        } else {
            $orderBy = 'DESC';
        }

        $datas = $this->db->get('m_siswa');

        $results = [];
        $i = 1;
        foreach ($datas->result_array() as $row) {

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
        $json['recordsTotal'] = $datas->num_rows();
        $json['recordsFiltered'] = $datas->num_rows();
        $json['data'] = $results;

        header("Content-type:application/json");

        echo json_encode($json);
    }
}
