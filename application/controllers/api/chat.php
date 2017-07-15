<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class Chat extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mchat');
        $this->load->model('muser');
    }
    
    public function getAllChat_post(){
        $username = $this->input->post('username');
        $kode = $this->input->post('kode');

        if ($kode == '2') {
            $chat = $this->mchat->getChatbyPenerima($username);
            if ($chat) {    
                $this->response(array('chat'=>$chat, 'status'=>1));
            }else{
                $this->response(array('error'=>'server error', 'status'=>0));
            }
        }else if ($kode == '3') {
            $chat = $this->mchat->getChatbyPengirim($username);
            if ($chat) {    
                $this->response(array('chat'=>$chat, 'status'=>1));
            }else{
                $this->response(array('error'=>'server error', 'status'=>0));
            }
        }
    }

    public function cekUser_post(){
        $data['pengirim'] = $this->input->post('username');
        $data['penerima'] = $this->input->post('chatWith');
        $data['status'] = 1;

        $result = $this->mchat->cekUser($data);

        if ($result) {
            $this->response(array('status'=>1));
        }else{
            $this->response(array('status'=>2));
        }
    }

    public function pushNotif_post(){
        
        $untuk = $this->input->post('untuk');
        $kode = $this->input->post('kode');
        $pesan = $this->input->post('pesan');
        $pengirim = $this->input->post('pengirim');

        if ($kode == '2') {
            $token = $this->muser->getTokenUser($untuk);
            $judul = $this->muser->getNamaDokter($pengirim);
        }else if ($kode == '3') {
            $token = $this->muser->getTokenDokter($untuk);
            $judul = $this->muser->getNamaUser($pengirim);
        }
        

        define( 'API_ACCESS_KEY', 'AIzaSyCZtZxKJR22w7uOcYO46NofYnjurkrFG-E' );
        $registrationIds = $token;

        $msg = array(
                'body'  => $pesan,
                'title' => "Dokter " . $judul,
                'tag'   => $pengirim
              );
        $fields = array(
                'to'        => $registrationIds,
                'notification'  => $msg
            );
    
        $headers = array
            (
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );
        #Send Reponse To FireBase Server    
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        #Echo Result Of FireBase Server
        echo $result;
    }
}
