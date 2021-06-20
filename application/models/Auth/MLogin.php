<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MLogin extends CI_Model
{

	public function authentication()
	{
		$userinput = $this->input->post('username');
		$password = $this->input->post('pass');
		if (strpos($userinput, "@")) {
			$email = $userinput;
			$array = array('email' => $email, 'password' => $password);
		}else{
			$noidentitas = $userinput;
			$array = array('no_identitas' => $noidentitas, 'password' => $password);
		}
	
		$login = $this->db->get_where('m_users', $array)->row_array();
		// print_r($login);
		// exit;
		if (isset($login['role'])) {
			switch ($login['role']) {
				case 'admin':
					return
						$this->db->select('*')
						->from('m_admin')
						->join('m_users', 'm_admin.id_admin = m_users.id_user')
						->where('m_admin.id_admin', $login['id_user'])
						->where('m_users.id', $login['id'])
						->get()
						->row_array();
					break;
				case 'guru':
					return
						$this->db->select('*')
						->from('m_guru')
						->join('m_users', 'm_guru.id_guru = m_users.id_user')
						->where('m_guru.id_guru', $login['id_user'])
						->where('m_users.id', $login['id'])
						->get()
						->row_array();
					break;

				case 'tata_usaha':
					return
						$this->db->select('*')
						->from('m_tata_usaha')
						->join('m_users', 'm_tata_usaha.id_tu = m_users.id_user')
						->where('id_tu', $login['id_user'])
						->where('m_users.id', $login['id'])
						->get()
						->row_array();
					break;

				case 'siswa':
					return
						$this->db->select('*')
						->from('m_siswa')
						->join('m_users', 'm_siswa.id_siswa = m_users.id_user')
						->where('id_siswa', $login['id_user'])
						->where('m_users.id', $login['id'])
						->get()
						->row_array();
					break;


				default:

					break;
			}
		} else {
			return null;
		}
	}
}
