<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {
	function __construct(){
        parent::__construct();	
        $this->load->model('mpertanyaan');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
	{
		$this->load->view('user/tambah_pertanyaan');
	}

	public function daftar($id){
		$data['id'] = $id;
		$data['daftar_pertanyaan'] = $this->mpertanyaan->getPertanyaan($id);
		$this->load->view('user/daftar_pertanyaan', $data);
	}

	public function tambah($id){
		$data['id'] = $id;
		$this->load->view('user/tambah_pertanyaan', $data);
	}

	public function detail($id){
		$data['id'] = $id;
		$data['detail'] = $this->mpertanyaan->getDetailPertanyaan($id);
		$this->load->view('user/detail_pertanyaan', $data);
	}

	public function in($id){
		$judul = $this->input->post('judul');
		$detail = $this->input->post('detail');
		$privasi = $this->input->post('privasi');
		$waktu = date('Y-m-d H:i:s');
		$id_spesialis = $id;
		$pengirim = $this->session->userdata('username');

		$data = array('judul' => $judul, 'pertanyaan' => $detail, 'waktu_kirim'=>$waktu, 'pengirim'=>$pengirim, 
			'id_spesialis'=>$id_spesialis, 'pengirim'=> $pengirim, 'privasi'=>$privasi);

		$return = $this->mpertanyaan->tambahPertanyaan($data);
		redirect("".base_url()."pertanyaan/detail/".$return."");
	}

	public function tambahkomentar($id){
		$id_diskusi = $id;
		$pengirim = $this->session->userdata('username');
		$komentar = $this->input->post('komentar');
		$waktu_kirim = date("Y-m-d H:i:s");
		$kode_pengirim = $this->session->userdata('hak_akses');
		$data = array('id_diskusi' => $id_diskusi, 'pengirim' => $pengirim, 'komentar' => $komentar, 'waktu_kirim' => $waktu_kirim, 'kode_pengirim' => $kode_pengirim);

		$this->mpertanyaan->tambahKomentar($data);
		
		$data['komentar'] = $this->mpertanyaan->getKomentar($id);
		$this->load->view('user/comments_pertanyaan', $data);

	}

	public function deletekomentar($id){
		$this->mpertanyaan->deleteKomentar($id);
		echo json_encode(array("status" => TRUE));
	}

	public function displaycomments($id){
		$data['komentar'] = $this->mpertanyaan->getKomentar($id);
		$this->load->view('user/comments_pertanyaan', $data);
	}
}