<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Switch_Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_role') != '1') {
            redirect('Auth/Login');
        }

        $this->load->library('session');
        // $this->db_umm = $this->load->database('umm', true);
    }

    public function switch($previllage)
    {
        // echo '<pre>';
        // print_r($this->session->userdata());
        // exit;
        if ($previllage == 'admin') {
            $sess_data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_role' => $this->session->userdata('id_role'),
                'previllage' => 'admin',
                'email' => $this->session->userdata('email'),
                'role' => $this->session->userdata('role'),
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sess_data);
            redirect('Admin/Dashboard');
        }
        if ($previllage == 'guru') {
            $sess_data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_role' => $this->session->userdata('id_role'),
                'previllage' => 'guru',
                'email' => $this->session->userdata('email'),
                'role' => $this->session->userdata('role'),
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sess_data);
            redirect('Guru/Dashboard');
        }
        if ($previllage == 'tata_usaha') {
            $sess_data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_role' => $this->session->userdata('id_role'),
                'previllage' => 'tata_usaha',
                'email' => $this->session->userdata('email'),
                'role' => $this->session->userdata('role'),
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sess_data);
            redirect('Tata_Usaha/Dashboard');
        }
        if ($previllage == 'siswa') {
            $sess_data = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_role' => $this->session->userdata('id_role'),
                'previllage' => 'siswa',
                'email' => $this->session->userdata('email'),
                'role' => $this->session->userdata('role'),
                'logged_in' => TRUE
            );
            $this->session->set_userdata($sess_data);
            redirect('Siswa/Dashboard');
        }
    }
}
