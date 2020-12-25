<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        // $this->load->model('Auth/MLogin');
    }
    public function index()
    {
        $this->data['a'] = 'a';
        $this->template->load('Siswa/Prakerin/info',  $this->data);
    }
    public function form_daftar()
    {
        $this->data['a'] = 'a';
        $this->template->load('Siswa/Prakerin/daftar',  $this->data);
    }
}
