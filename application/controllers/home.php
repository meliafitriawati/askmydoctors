<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('madmin');	
    }

    public function index()
	{
		$this->load->view('user/index');
	}
}