<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class Artikel extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('martikel');
        $this->load->helper('security');
    }
    
    public function getArtikel_get(){
        $result = $this->martikel->getArtikel();
        if ($result) {    
        	unset($result['artikel']);
            $arr_result = array(
                'artikel'=>$result,
                'status'=>1
            );
            $this->response($arr_result);
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    // public function getPertanyaan_get($id){
    //     $id = $id;
    //     $pertanyaan = $this->mpertanyaan->getPertanyaan($id);
    //     if ($pertanyaan) {    
    //         $this->response(array('pertanyaan'=>$pertanyaan, 'status'=>1));
    //     }else{
    //         $this->response(array('error'=>'server error', 'status'=>0));
    //     }
    // }

}
