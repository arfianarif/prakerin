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
			if ($user['email'] == $this->input->post('email') && $user['password'] == 'password') {

				$sess_data = array(
					'nama' => $user['nama'],
					'email' => $user['email'],

				);
			} elseif ($user['email'] == 'guru@guru.com' && $user['password'] == 'guru') {
				echo "guru";
				exit;
				$sess_data = array(
					'nama' => $user['nama'],
					'email' => $user['email'],

				);
			} elseif ($user['email'] == 'siswa@siswa.com' && $user['password'] == 'siswa') {

				$sess_data = array(
					'nama' => $user['nama'],
					'email' => $user['email'],

				);
			} elseif ($user['email'] == 'tendik@tendik.com' && $user['password'] == 'tendik') {

				$sess_data = array(
					'nama' => $user['nama'],
					'email' => $user['email'],

				);
			}
			$this->session->set_userdata($sess_data);
			if ($this->session->nama == 'admin') {
				redirect('Admin/Dashboard');
			}
		} else {
			echo "Error";
		}
	}
}
