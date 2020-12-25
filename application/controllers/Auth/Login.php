<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->model('Auth/MLogin');
	}

	public function debug()
	{
		redirect('Dashboard');
	}

	public function index()
	{
		$this->template->load_auth('Auth/login');
	}

	public function authentication()
	{
		$post = $this->input->post();
		$user = $this->MLogin->authentication($post);


		if (isset($user)) {
			$sess_data = array(
				'id_user' => $user['id_user'],
				'email' => $user['email'],
				'role' => $user['role'],
				'previllage' => $user['role'],
				'logged_in' => TRUE
			);
			switch ($user['role']) {
				case 'admin':
					$this->session->set_userdata($sess_data);
					redirect('Admin/Dashboard');
					break;
				case 'guru':
					$this->session->set_userdata($sess_data);
					redirect('Guru/Dashboard');
					break;
				case 'tata_usaha':
					$this->session->set_userdata($sess_data);
					redirect('Tata_Usaha/Dashboard');
					break;
				case 'siswa':
					$this->session->set_userdata($sess_data);
					redirect('Siswa/Dashboard');
					break;

				default:
					# code...
					break;
			}
		} else {
			echo "Error";
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth/Login');
	}
}
