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
    public function index()
    {
        $this->data['a'] = 'a';
        $this->template->load('Guru/Pendampingan/prakerin',  $this->data);
    }
}
