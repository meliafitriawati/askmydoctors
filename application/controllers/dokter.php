<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mdokter');	
    }

    public function index()
	{
		$data['dokter'] = $this->mdokter->getAllDokter();
		$this->load->view('user/dokter', $data);
	}

	public function profil($username){
		$data['username'] = $username;
		$data['detail'] = $this->mdokter->getDetailDokter($username);
		$this->load->view('user/detail_dokter', $data);
	}

}