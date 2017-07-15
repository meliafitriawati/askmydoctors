<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('martikel');	
        $this->load->model('mdokter');	
        $this->load->model('mpertanyaan');	
    }

    public function index()
	{
		$data['artikel'] = $this->martikel->getArtikel();
		$data['dokter'] = $this->mdokter->getAllDokter();
		$data['pertanyaan_new'] = $this->mpertanyaan->getPertanyaanNew();
		$data['pertanyaan_most'] = $this->mpertanyaan->getPertanyaanMost();
		$this->load->view('user/index', $data);
	}
}