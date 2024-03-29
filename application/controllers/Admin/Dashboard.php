<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('previllage') != 'admin') {
            redirect('Auth/Login');
        }
        $this->load->library('session');
        // $this->load->model('Auth/MLogin');
    }
    public function index()
    {
        // $this->data['nav'] = $this->load->view();
        $this->data['nav_item'] = '1';
        $this->data['siswa'] = $this->db->get_where('m_siswa', ['publish' => 1])->num_rows();
        $this->data['guru'] = $this->db->get_where('m_guru', ['publish' => 1])->num_rows();
        $this->data['tata_usaha'] = $this->db->get_where('m_tata_usaha', ['publish' => 1])->num_rows();

        $this->template->load('Admin/Dashboard/dashboard', $this->data);
    }
}
