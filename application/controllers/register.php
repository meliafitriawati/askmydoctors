<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('muser');	
    }

    public function index()
	{
		$this->load->view('user/register');
	}

	public function doregister(){
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');

		if ($password != $cpassword) {
			# code...
		} else {
			$data['username'] = $this->input->post('username');
			$data['password'] = md5($password);
			$data['fullname'] = $this->input->post('nama');
			$data['email'] = $this->input->post('email');
			$data['gender'] = $this->input->post('inputJK');
			$data['verified'] = 0;
			$data['hak_akses'] = 3;
			$data['img_user'] = "pic.png";
			
			$result = $this->muser->dataRegister($data);
			if ($result) {
				redirect("".base_url()."home");
			}
		}
		
	}
}