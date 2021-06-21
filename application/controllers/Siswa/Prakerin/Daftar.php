<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('M_Siswa');
    }
    public function index()
    {
        $id = $this->session->userdata('id_user');

        $this->data['a'] = 'a';
        $this->data['prakerin'] = $this->M_Siswa->getPendaftaran($id);
        $this->template->load('Siswa/Prakerin/info',  $this->data);
    }
    public function form_daftar()
    {
        $this->data['a'] = 'a';
        $this->template->load('Siswa/Prakerin/daftar',  $this->data);
    }

    public function addPendaftaran()
    {
        $result = [];
        $postData = $this->input->post();
        $result['post-data'] = $postData;
        $result['status'] = false;

        // if ($postData['name']) {
        //     foreach ($postData['name'] as $key => $value) {
        //         if ($value = '') {

        //         } else {
        //         }
        //     }
        // }

        // $siswa = [];
        // if ($postData['nis']) {
        //     foreach ($postData['nis'] as $key => $value) {
        //         $getidsiswa = $this->db->get_where('m_siswa', ['nis' => $value]);
        //         if ($getidsiswa->num_rows() > 0) {
        //         }
        //     }
        // }

        echo json_encode($result);
    }

    public function cekSiswa($data)
    {
        if (empty($data)) {
            $get = $this->db->get_where('m_siswa', ['nis' => $data]);
            if ($get->num_rows() > 0) {
                $result = $get->result();
                return $result->id_siswa;
            } else {
                return false;
            }
        }
    }

    public function cekFormSiswa()
    {
        $result = [];
        $data = $this->input->post('nis');
        $get = $this->db->get_where('m_siswa', ['nis' => $data]);
        if ($get->num_rows() > 0) {
            $data = $get->result();
            $get = $this->db->get_where('kelompok', ['id_siswa' => $data->id_siswa]);
            if ($get->num_rows() > 0) {
                $result['status'] = false;
                $result['message'] = 'nis telah terdaftar di dalam database';
            } else {
                $result['status'] = true;
            }
        } else {
            $result['status'] = false;
            $result['message'] = 'nis tidak ditemukan di dalam database';
        }
        echo json_encode($result);
    }

    public function save($array)
    {
        $pendaftaran = $array['pendaftaran'];
        $praktik = $array['praktik'];
        $a = $this->db->insert('pendaftaran', $pendaftaran);
        $b = $this->db->insert('praktik', $praktik);
    }
}
