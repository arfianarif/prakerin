<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        // $this->load->model('Auth/MLogin');
    }
    public function index()
    {
        // $this->data['nav'] = $this->load->view();
        $this->template->load('Guru/Dashboard/dashboard');
    }
}
