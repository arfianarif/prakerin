<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tata_Usaha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        // $this->load->model('Auth/MLogin');
    }
    public function index()
    {
        $this->data['content'] = $this->db->get('m_tata_usaha')->result();
        // $this->data['custom_js'] = $this->load->view('Admin/js/admin');
        $this->template->load('Admin/Master_Data/Tata_Usaha/index', $this->data);
    }
    public function add()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'id_role' => 3
        );
        $this->db->insert('m_tata_usaha', $data);
        redirect('Admin/Master_Data/Tata_Usaha');
    }
    public function delete($id)
    {
        $this->db->delete('m_tata_usaha', array('id' => $id));
        redirect('Admin/Master_Data/Tata_Usaha');
    }
    public function getData($id)
    {
        $output = $this->db->get_where('m_tata_usaha', ['id' => $id])->row();
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function update()
    {
        // echo '<pre>';
        // print_r($this->input->post());
        // exit;
        $data = array(
            'id' => $this->input->post('id'),
            'email'  => $this->input->post('email'),
            'password'  => $this->input->post('password'),
            'nama'  => $this->input->post('nama'),
            'nik'  => $this->input->post('nik'),
            'id_role' => 3,
        );
        $status = $this->db->replace('m_tata_usaha', $data);
        // 	echo json_encode($status);
        redirect('Admin/Master_Data/Tata_Usaha');
    }
}
