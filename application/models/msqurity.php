<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msqurity extends CI_Model{
	public function getsqurity()
	{
		$username = $this->session->userdata('username');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect("".base_url()."admin/login");
		}
	}
}