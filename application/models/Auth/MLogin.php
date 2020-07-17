<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MLogin extends CI_Model
{

	public function authentication()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('pass');
		$array = array('email' => $email, 'password' => $password);
		$admin = $this->db->get_where('m_admin', $array)->row_array();
		$guru = $this->db->get_where('m_guru', $array)->row_array();
		$tata_usaha = $this->db->get_where('m_tata_usaha', $array)->row_array();
		$siswa = $this->db->get_where('m_siswa', $array)->row_array();

		if (isset($admin)) {
			$role = $this->db->get('role')->result_array();
			$admin['role'] = $role;
			return $admin;
		} elseif (isset($guru)) {
			return $guru;
		} elseif (isset($tata_usaha)) {
			return $tata_usaha;
		} elseif (isset($siswa)) {
			return $siswa;
		} else {
			return null;
		}
	}
}
