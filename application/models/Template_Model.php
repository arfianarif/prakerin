<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_menu($group_id)
    {
        $this->db->select('*');
        $this->db->from('menus');
        foreach ($group_id as $key => $data) {
            if ($key == 0) $this->db->where('group_id', $data->id);
            else $this->db->or_where('group_id', $data->id);
        }

        $query = $this->db->get()->result();
        $result = array();
        foreach ($query as $r) {
            $group_name =  $this->ion_auth->group($r->group_id)->row()->description;
            $result[$group_name] = unserialize($r->data);
        }
        return $result;
    }
}
