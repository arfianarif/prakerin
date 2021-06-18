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
			'password' => $this->input->post('password')
		);
		
		$this->db->insert('m_siswa', $data);
		
		$getData = $this->db->get_where('m_siswa', $data)->row_array();

		$user = array(
			'id_user' => $getData['id_siswa'],
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
			'role' => 'siswa'
		);
		
		$this->db->insert('m_users', $user);
		redirect('Admin/Master_Data/Siswa');
	}
	public function delete($id)
	{
		$this->db->delete('m_siswa', array('id' => $id));
		redirect('Admin/Master_Data/Siswa');
	}
	public function getData($id)
	{
		$output = $this->db->get_where('m_siswa', ['id' => $id])->row();
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
			'nama_siswa'  => $this->input->post('nama_siswa'),
			'nis'  => $this->input->post('nis'),
			'ttl'  => $this->input->post('ttl'),
			'alamat'  => $this->input->post('alamat'),
			'id_role' => 4,
		);
		$status = $this->db->replace('m_siswa', $data);
		// 	echo json_encode($status);
		redirect('Admin/Master_Data/Siswa');
	}
}
