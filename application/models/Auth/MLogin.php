<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MLogin extends CI_Model
{

	public function authentication($post)
	{
		$post = $this->input->post();

		$email = $this->input->post('email');
		$password = $this->input->post('pass');
		// echo "<pre>";
		// print_r($password);
		// exit;
		$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
		// $all = $this->db->query($sql, array($username, $password))->result_array();
		$all = $this->db->query($sql)->row_array();

		// echo "<pre>";
		// print_r($all);
		// exit;

		return $all;
		// $username = $post['nis'];
		// $password = $post['pass'];

		// echo $username;
		// echo $password;
	}
}
