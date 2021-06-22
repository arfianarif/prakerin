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
        $result = [];
        $postData = $this->input->post();
        $result['post-data'] = $postData;
        $result['status'] = false;

        // if ($postData['name']) {
        //     foreach ($postData['name'] as $key => $value) {
        //         if ($value = '') {

        //         } else {
        //         }
        //     }
        // }

        // $siswa = [];
        // if ($postData['nis']) {
        //     foreach ($postData['nis'] as $key => $value) {
        //         $getidsiswa = $this->db->get_where('m_siswa', ['nis' => $value]);
        //         if ($getidsiswa->num_rows() > 0) {
        //         }
        //     }
        // }

        echo json_encode($result);
    }

	public function getSiswa($nis){

		$siswa = $this->db->get_where('m_siswa', ['nis' => $nis]);
		if($siswa->num_rows()){
			$res['success']= true;
			$siswa = $siswa->row();
			$siswa = ["id"=> $siswa->id_siswa, "nama"=> $siswa->nama];
			$res['data']= $siswa;
		}else{
			$res['success']= false;
		}
		echo json_encode($res);
	}

    public function cekSiswa($data)
    {
        if (empty($data)) {
            $get = $this->db->get_where('m_siswa', ['nis' => $data]);
            if ($get->num_rows() > 0) {
                $result = $get->result();
                return $result->id_siswa;
            } else {
                return false;
            }
        }
    }

    public function cekFormSiswa()
    {
        $result = [];
        $data = $this->input->post('nis');
        $get = $this->db->get_where('m_siswa', ['nis' => $data]);
        if ($get->num_rows() > 0) {
            $data = $get->result();
            $get = $this->db->get_where('kelompok', ['id_siswa' => $data->id_siswa]);
            if ($get->num_rows() > 0) {
                $result['status'] = false;
                $result['message'] = 'nis telah terdaftar di dalam database';
            } else {
                $result['status'] = true;
            }
        } else {
            $result['status'] = false;
            $result['message'] = 'nis tidak ditemukan di dalam database';
        }
        echo json_encode($result);
    }

    public function save()
    {
		$errors = [];

		$nis = $this->input->post("nis");
		$name = $this->input->post("nama");
		$namaInstansi = $this->input->post("nama_instansi");
		$alamatInstansi = $this->input->post("alamat_instansi");
		$idSiswa = [];
		if($namaInstansi==""){
			$errors[] = "Nama instansi belum diisi";
		}
		if($alamatInstansi==""){
			$errors[] = "Alamat instansi belum diisi";
		}
		foreach ($nis as $index => $value) {
			if($value!=""){
				$siswa = $this->db->get_where('m_siswa', ["nis"=>$value]);

				if($name[$index] == ""){
					$errors[] = "Nama pada nis: $value belum terisi";
				}
				if($siswa->num_rows() > 0){
					$id = $siswa->row('id_siswa');
					$idSiswa[] = $id;
					$inGroup = ($this->db->get_where("kelompok",["id_siswa"=>$id])->num_rows() > 0 );
					if($inGroup){
						$errors[]= "NIS $value sudah terdaftar pada kelompok lain";
					}
				}else{
					$errors[] = "NIS $value Invalid";
				}
			}
		}

		if(count($errors)>0){
			$res["success"]=false;
			$res["message"]=$errors[0];
			$res["messages"]=$errors;
			
		}else{
			$data = [
				"nama_instansi"=>$namaInstansi,
				"alamat_instansi" => $alamatInstansi,
				"status"=> "pending",
				"publish"=> 1
			];
			$this->db->insert('praktik',$data);
			$praktik_id = $this->db->insert_id();

			foreach ($idSiswa as $id){
				$this->db->insert('kelompok',['id_praktik'=>$praktik_id,"id_siswa"=>$id]);
			}
			$res["success"]=true;
		}
		echo json_encode($res);
    }
}
