<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskusi extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('mkategori');	
        $this->load->model('mpertanyaan');	
    }

    public function index()
	{
		$data['kategori'] = $this->mkategori->getAllKategori();
		$data['pertanyaan_new'] = $this->mpertanyaan->getPertanyaanNew();
		$data['pertanyaan_most'] = $this->mpertanyaan->getPertanyaanMost();
		$this->load->view('user/diskusi', $data);
	}

	public function push_notif(){
        $untuk = $this->input->post('untuk');

        define( 'API_ACCESS_KEY', 'AIzaSyAquHm9G0UxiU4h_bty9YWEIcgz0vz7D-0' );
        $registrationIds = $untuk;

        $msg = array(
                'body'  => 'Body  Of Notification',
                'title' => 'Title Of Notification',
                
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