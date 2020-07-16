<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template
{

	protected $CI;

	public function __construct()
	{
		$this->CI = &get_instance();
	}

	public function load($content, $data = NULL)
	{
		if (!$content) {
			return NULL;
		} else {

			if (file_exists(APPPATH . 'views/menu/' . $this->CI->session->nama . '.php')) {
				$this->template['nav'] = $this->menu['menu'] = $this->CI->load->view('menu/' . $this->CI->session->nama, $data, true);
			} else {
				$this->template['nav'] = "";
			}

			$this->template['content']         = $this->CI->load->view($content, $data, TRUE);

			return $this->CI->load->view('Template/base', $this->template);
		}
	}
	function load_auth($content, $data = NULL)
	{
		$this->template['content']         = $this->CI->load->view($content, $data, TRUE);

		return $this->CI->load->view('Template/base_login', $this->template);
	}
}
