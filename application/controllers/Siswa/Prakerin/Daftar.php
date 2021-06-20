<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->model('M_Siswa');
    }
    public function index()
    {
        $id = $this->session->userdata('id_user');

        $this->data['a'] = 'a';
        $this->data['prakerin'] = $this->M_Siswa->getPendaftaran($id);
        $this->template->load('Siswa/Prakerin/info',  $this->data);
    }
    public function form_daftar()
    {
        $this->data['a'] = 'a';
        $this->template->load('Siswa/Prakerin/daftar',  $this->data);
    }

    public function addPendaftaran()
    {
        $pendaftaran = [];
        $praktik = [];

        $postData = $this->input->post();
        $tempatPraktik = $postData['tempat_praktik'];

        if (isset($postData['kelompok'])) {
            $kelompok = $postData['kelompok'];
            $arrBeforeMerge = [];
            foreach ($kelompok as $k => $v) {
                $mappingKelompok = [];
                foreach ($v as $key => $value) {
                    if ($value['name'] == 'nis') {
                        $a = $this->db->get_where('m_siswa', ['nis' => $value['value']]);
                        if ($a->num_rows() > 0) {
                            echo '<pre>';
                            print_r($a);
                            echo '</pre>';
                            exit;
                            $data = $a->result_array();
                            $mappingKelompok['id_siswa'] = $data['id_siswa'];
                        }
                    }
                    $mappingKelompok[$value['name']] = $value['value'];
                }
                array_push($arrBeforeMerge, $mappingKelompok);
            }
            $kelompok = $arrBeforeMerge;
        }

        $arrTempatPraktik = [];
        if (isset($tempatPraktik)) {
            foreach ($tempatPraktik as $key => $value) {
                $arrTempatPraktik[$value['name']] = $value['value'];
            }
        }

        $pengaju = $postData['pengaju'];
        if (isset($pengaju)) {
            $arrPengaju = [];
            foreach ($pengaju as $key => $value) {
                $arrPengaju[$value['name']] = $value['value'];
            }
            $mappingPengaju = [];
            $mappingPengaju['id_siswa'] = $arrPengaju['id_siswa'];
            $mappingPengaju['publish'] = 1;
            array_push($pendaftaran, $mappingPengaju);

            $mappingPraktik = [];
            $mappingPraktik['id_siswa'] = $mappingPengaju['id_siswa'];
            if (isset($kelompok)) {
                $mappingPraktik['is_group'] = 1;
                foreach ($kelompok as $key => $value) {
                }
            }
        }

        echo json_encode($kelompok);
    }

    public function save($array)
    {
        $pendaftaran = $array['pendaftaran'];
        $praktik = $array['praktik'];
        $a = $this->db->insert('pendaftaran', $pendaftaran);
        $b = $this->db->insert('praktik', $praktik);
    }
}
