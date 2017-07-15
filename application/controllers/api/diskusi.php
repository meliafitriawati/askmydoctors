<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class Diskusi extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mpertanyaan');
        $this->load->model('mkategori');
        $this->load->model('muser');
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
        $id_spesialis = $this->input->post('id_spesialis');
        $pengirim = $this->input->post('pengirim');

        $data = array('judul' => $judul, 'pertanyaan' => $detail, 'pengirim'=>$pengirim, 
                    'id_spesialis'=>$id_spesialis, 'pengirim'=> $pengirim, 'privasi'=>$privasi);
        
        $result = $this->mpertanyaan->tambahPertanyaan($data);
        if($result){
            $this->response(array('id_pertanyaan'=>$result, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    public function tambahKomentar_post(){
        $id_diskusi = $this->input->post('id_pertanyaan');
        $pengirim = $this->input->post('pengirim');
        $komentar = $this->input->post('komentar');
        $kode_pengirim = $this->input->post('kode_pengirim');

        $data = array('id_diskusi' => $id_diskusi, 'pengirim' => $pengirim, 'komentar'=>$komentar, 
                    'kode_pengirim'=> $kode_pengirim);
        
        $result = $this->mpertanyaan->tambahKomentarMobile($data);
        if($result){
            $this->response(array('komentar'=>$result, 'status'=>1));
        }else{
            $this->response(array('error'=>'server error', 'status'=>0));
        }
    }

    

}
