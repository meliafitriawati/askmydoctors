<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mkategori');	
    }

    public function index()
	{
		$data['kategori'] = $this->mkategori->getAllKategori();
		$this->load->view('user/diskusi', $data);
	}

}