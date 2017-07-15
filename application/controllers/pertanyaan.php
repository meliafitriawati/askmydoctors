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
		$data['pertanyaan_new'] = $this->mpertanyaan->getPertanyaanNew();
		$data['pertanyaan_most'] = $this->mpertanyaan->getPertanyaanMost();
		$this->load->view('user/daftar_pertanyaan', $data);
	}

	public function tambah($id){
		$data['id'] = $id;
		$data['pertanyaan_new'] = $this->mpertanyaan->getPertanyaanNew();
		$data['pertanyaan_most'] = $this->mpertanyaan->getPertanyaanMost();
		$this->load->view('user/tambah_pertanyaan', $data);
	}

	public function detail($id){
		$data['id'] = $id;
		$data['detail'] = $this->mpertanyaan->getDetailPertanyaan($id);
		$data['pertanyaan_new'] = $this->mpertanyaan->getPertanyaanNew();
		$data['pertanyaan_most'] = $this->mpertanyaan->getPertanyaanMost();
		$this->load->view('user/detail_pertanyaan', $data);
	}

	public function in($id){
		$judul = $this->input->post('judul');
		$detail = $this->input->post('detail');
		$privasi = $this->input->post('privasi');
		$waktu = date('Y-m-d H:i:s');
		$id_spesialis = $id;
		$pengirim = $this->session->userdata('username');

		$data = array('judul' => $judul, 'pertanyaan' => $detail, 'waktu_kirim'=>$waktu, 'pengirim'=>$pengirim, 'id_spesialis'=>$id_spesialis, 'pengirim'=> $pengirim, 'privasi'=>$privasi, status=>"BELUM TERJAWAB");

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

		$this->db->set('status', 'TERJAWAB');
        $this->db->where('id_diskusi', $id);
        $this->db->update('tb_diskusi');

        if ($kode_pengirim == "2") {
        	$penerima = $this->mpertanyaan->getPengirim($id_diskusi);
        	
        	$notif = array('id_pertanyaan' => $id_diskusi, 'dokter' => $pengirim, 'penerima' => $penerima, 'komentar' => $komentar, 'status' => 'NOT');

        	$this->mpertanyaan->tambahNotif($notif);
        }
		
		$data['komentar'] = $this->mpertanyaan->getKomentar($id);
		$this->load->view('user/comments_pertanyaan', $data);

	}

	public function readNotif(){
		$id_notif = $this->input->post('id_notif', 1);

		$this->mpertanyaan->readNotif($id_notif);

		$id_pertanyaan = $this->mpertanyaan->getIdPertanyaan($id_notif);
		echo json_encode(array("status" => 1, "id_pertanyaan" => $id_pertanyaan));
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