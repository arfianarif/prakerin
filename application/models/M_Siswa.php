<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Siswa extends CI_Model
{
    public function getPendaftaran($id)
    {
        $result = [];
        $pendaftaran = $this->db->get_where('kelompok', ['id_siswa' => $id]);
        $data = $pendaftaran->result_array();

        if ($pendaftaran->num_rows() > 0) {
            foreach ($data as $key => $value) {
                $praktik = $this->db->get_where('praktik', ['id_praktik' => $value['id_praktik']]);
                $praktik = $praktik->row_array();
                if ($praktik['status'] == 'ditolak') {
                    $status = 0;
                } else {
                    $status = 1;
                }
                $keterangan = $praktik['status'];
            }
            $result['status'] = $status;
            $result['keterangan'] = $keterangan;
        } else {
            $result['status'] = 0;
        }

        return $result;
    }

    public function getRiwayat($id)
    {
        $result = [];
        $pendaftaran = $this->db->get_where('kelompok', ['id_siswa' => $id]);

        $cek = $pendaftaran->result_array();
        $status = 0;
        $datapraktik = [];
        foreach ($cek as $key => $value) {
            $praktik = $this->db->get_where('praktik', ['id_praktik' => $value['id_praktik']]);
            $praktik = $praktik->row_array();
            if ($praktik['status'] == 'ditolak') {
                $status = 1;
            }
            array_push($datapraktik, $praktik);
        }


        if (count($datapraktik) > 0) {
            $result['status'] = 1;
            $result['data'] = $datapraktik;

            // $result['praktik'] = $this->db->get_where('praktik', ['id_siswa' => $id])->result_array();
        } else {
            $result['status'] = 0;
        }
        return $result;
    }
}
