<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        // $this->load->model('Auth/MLogin');
    }
    public function index()
    {
        $this->data['content'] = $this->db->get('m_siswa')->result();
        // $this->data['custom_js'] = $this->load->view('Admin/js/admin');
        $this->template->load('Admin/Master_Data/Siswa/index', $this->data);
    }
    public function add()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'id_role' => 4
        );
        $this->db->insert('m_siswa', $data);
        redirect('Admin/Master_Data/Siswa');
    }
    public function delete($id)
    {
        $this->db->delete('m_siswa', array('id' => $id));
        redirect('Admin/Master_Data/Siswa');
    }
    public function getData($id)
    {
        $output = $this->db->get_where('m_siswa', ['id' => $id])->result();
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
