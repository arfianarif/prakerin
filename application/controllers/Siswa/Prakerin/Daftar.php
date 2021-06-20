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
        echo json_encode($this->input->post());
    }
}
