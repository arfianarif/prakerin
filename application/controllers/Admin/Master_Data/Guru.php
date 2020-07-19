<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        // $this->load->model('Auth/MLogin');
    }
    public function index()
    {
        $this->data['content'] = $this->db->get('m_guru')->result();
        // $this->data['custom_js'] = $this->load->view('Admin/js/admin');
        $this->template->load('Admin/Master_Data/Guru/index', $this->data);
    }
    public function add()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'id_role' => 2
        );
        $this->db->insert('m_guru', $data);
        redirect('Admin/Master_Data/Guru');
    }
    public function delete($id)
    {
        $this->db->delete('m_guru', array('id' => $id));
        redirect('Admin/Master_Data/Guru');
    }
    public function getData($id)
    {
        $output = $this->db->get_where('m_guru', ['id' => $id])->row();
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
            'nama_guru'  => $this->input->post('nama_guru'),
            'ttl'  => $this->input->post('ttl'),
            'alamat'  => $this->input->post('alamat'),
        );
        $status = $this->db->replace('m_guru', $data);
        // 	echo json_encode($status);
        redirect('Admin/Master_Data/Guru');
    }
}
