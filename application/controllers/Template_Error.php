<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_Error extends CI_Controller
{
    public function index()
    {
        $this->load->view('error_template');
    }
}
