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
		// echo "<pre>";
		// print_r($user);
		// exit;
		if (isset($user)) {
			if ($user['id_role'] == 1) {
				$sess_data = array(
					'id_user' => $user['id'],
					'id_role' => $user['id_role'],
					'previllage' => 'admin',
					'email' => $user['email'],
					'role' => $user['role'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sess_data);
				redirect('Admin/Dashboard');
			} elseif ($user['id_role'] == 2) {
				$sess_data = array(
					'id_user' => $user['id'],
					'previllage' => 'guru',
					'email' => $user['email'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sess_data);
				redirect('Guru/Dashboard');
			} elseif ($user['id_role'] == 3) {
				$sess_data = array(
					'id_user' => $user['id'],
					'previllage' => 'tata_usaha',
					'email' => $user['email'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sess_data);
				redirect('Tata_Usaha/Dashboard');
			} elseif ($user['id_role'] == 4) {
				$sess_data = array(
					'id_user' => $user['id'],
					'previllage' => 'siswa',
					'email' => $user['email'],
					'logged_in' => TRUE
				);
				$this->session->set_userdata($sess_data);
				redirect('Siswa/Dashboard');
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
