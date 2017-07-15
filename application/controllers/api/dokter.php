<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class Dokter extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mdokter');
        $this->load->helper('security');
    }
    
    public function getDokter_get(){
        $dokter = $this->mdokter->getAllDokter();
        if ($dokter) {    
            $this->response(array('dokter'=>$dokter, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    public function getDetailDokter_get($username){
        $username = $username;
        $dokter = $this->mdokter->getDetailDokter($username);
        if ($dokter) {    
            $this->response(array('dokter'=>$dokter, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

}
