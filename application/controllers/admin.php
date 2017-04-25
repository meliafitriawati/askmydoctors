<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('madmin');	
    } 
	public function index()
	{
		$this->msqurity->getsqurity();
		$this->load->view('admin/index');
	}

	public function dokter(){
		$this->msqurity->getsqurity();
		$data['dokter']=$this->madmin->getAllDokter();
		$this->load->view('admin/dokter', $data);
	}

	public function spesialisasi(){
		$this->msqurity->getsqurity();
		$data['spesialisasi']=$this->madmin->getAllSpesialisasi();
		$this->load->view('admin/spesialisasi',$data);
	}

	public function tambah($params){
		$this->msqurity->getsqurity();
		if ($params == "dokter") {

			$data['spesialisasi']=$this->madmin->getAllSpesialisasi();
			$this->load->view('admin/tambah_dokter',$data);

		}else if ($params == "spesialisasi") {

			$this->load->view('admin/tambah_spesialisasi');
		}
	}

	public function in($params){
		$this->msqurity->getsqurity();
		if ($params == "dokter") {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$pw = $this->input->post('password');
			$password = md5($pw);
			$email = $this->input->post('email');
			$jk = $this->input->post('JK');
			$sl = $this->input->post('SL');
			
			$data = array('username' => $username, 'password' => $password, 'email'=>$email, 'fullname'=>$nama, 'gender'=>$jk, 'tgl_daftar'=> date('Y-m-d H:i:s'),'hak_akses'=>1,'id_spesialisasi'=>$sl );

			$return = $this->madmin->tambahDokter($data);
			redirect("".base_url()."admin/dokter");

		}else if ($params == "spesialisasi") {

			$spesialisasi = $this->input->post('spesialisasi');
			$data = array('nama_spesialisasi' => $spesialisasi );

			$return = $this->madmin->tambahSpesialisasi($data);
			redirect("".base_url()."admin/spesialisasi");
		}
	}

	public function login(){
		$this->load->view('admin/login');
	}

	public function dologin(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->madmin->getlogin($u,$p);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("".base_url()."admin/login");
	}
}
