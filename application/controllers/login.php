<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('muser');	
    }

    public function index()
	{
		$this->load->view('user/login');
	}

	public function dokter(){
		$this->load->view('user/login_dokter');
	}

	public function dologin($user){
		if ($user == 'dokter') {
			$u = $this->input->post('username');
			$p = $this->input->post('password');
			$this->muser->getlogin($u,$p,$user);
		}elseif ($user == 'pasien') {
			$u = $this->input->post('email');
			$p = $this->input->post('password');
			$return = $this->muser->getlogin($u,$p,$user);
			if ($return) {
				redirect("".base_url()."home");
			} else {
				redirect("".base_url()."home");
			}
		}
	}
}