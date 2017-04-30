<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class Diskusi extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mpertanyaan');
        $this->load->model('mkategori');
        $this->load->helper('security');
    }
    
    public function getKategori_get(){
        $kategori = $this->mkategori->getAllKategori();
        if ($kategori) {    
            $this->response(array('kategori'=>$kategori, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    public function getPertanyaan_get($id){
        $id = $id;
        $pertanyaan = $this->mpertanyaan->getPertanyaan($id);
        if ($pertanyaan) {    
            $this->response(array('pertanyaan'=>$pertanyaan, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    public function getKomentar_get($id){
        $id = $id;
        $komentar = $this->mpertanyaan->getKomentarP($id);
        if ($komentar) {    
            $this->response(array('komentar'=>$komentar, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    public  function getDetailPertanyaan_get($id){
        $id = $id;
        $detail = $this->mpertanyaan->getDetailPertanyaan($id);
        if ($detail) {    
            $this->response(array('detail'=>$detail, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    public function tambahPertanyaan_post(){
        $judul = $this->input->post('judul');
        $detail = $this->input->post('detail');
        $privasi = $this->input->post('privasi');
        $waktu = date('Y-m-d H:i:s');
        $id_spesialis = $id;
        $pengirim = "meliafitriawati";

        $data = array('judul' => $judul, 'pertanyaan' => $detail, 'waktu_kirim'=>$waktu, 'pengirim'=>$pengirim, 
                    'id_spesialis'=>$id_spesialis, 'pengirim'=> $pengirim, 'privasi'=>$privasi);
        
        $result = $this->mpertanyaan->tambahPertanyaan($data);
        if($result){
            $this->response(array('id_pertanyaan'=>$result, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

}
