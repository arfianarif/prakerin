<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    public function getPendaftaran($id)
    {
        $result = [];
        $pendaftaran = $this->db->get_where('kelompok', ['id_siswa' => $id]);

        if ($pendaftaran->num_rows() > 0) {
            $result['status'] = 1;
            $result['pendaftaran'] = $pendaftaran->result_array();
            // $result['praktik'] = $this->db->get_where('praktik', ['id_siswa' => $id])->result_array();
        } else {
            $result['status'] = 0;
        }

        return $result;
    }
}
