<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('madmin');	
    } 
	public function index()
	{
		$this->msqurity->getsqurity();
		$this->load->view('admin/index');
	}

	//LOAD VIEW
	public function dokter(){
		$this->msqurity->getsqurity();
		$data['dokter']=$this->madmin->getAllDokter();
		$this->load->view('admin/dokter', $data);
	}

	public function spesialisasi(){
		$this->msqurity->getsqurity();
		$data['spesialisasi']=$this->madmin->getAllSpesialisasi();
		$this->load->view('admin/spesialisasi',$data);
	}

	public function artikel(){
		$this->msqurity->getsqurity();
		$data['artikel']=$this->madmin->getAllArtikel();
		$this->load->view('admin/artikel',$data);
	}

	public function pasien(){
		$this->msqurity->getsqurity();
		$data['pasien']=$this->madmin->getAllPasien();
		$this->load->view('admin/pasien',$data);
	}

	public function pertanyaan(){
		$this->msqurity->getsqurity();
		$data['pertanyaan']=$this->madmin->getAllPertanyaan();
		$this->load->view('admin/pertanyaan',$data);
	}

	//AUTH
	public function login(){
		$this->load->view('admin/login');
	}

	public function dologin(){
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->madmin->getlogin($u,$p);
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect("".base_url()."admin/login");
	}

	//ACTION
	public function tambah($params){
		$this->msqurity->getsqurity();
		if ($params == "dokter") {

			$data['spesialisasi']=$this->madmin->getAllSpesialisasi();
			$this->load->view('admin/tambah_dokter',$data);

		}else if ($params == "spesialisasi") {

			$this->load->view('admin/tambah_spesialisasi');
		}
	}

	public function in($params){
		$this->msqurity->getsqurity();
		if ($params == "dokter") {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$pw = $this->input->post('password');
			$password = md5($pw);
			$email = $this->input->post('email');
			$jk = $this->input->post('JK');
			$sl = $this->input->post('SL');
			
			$data = array('username' => $username, 'password' => $password, 'email'=>$email, 'fullname'=>$nama, 'gender'=>$jk, 'tgl_daftar'=> date('Y-m-d H:i:s'),'hak_akses'=>1,'id_spesialisasi'=>$sl );

			$return = $this->madmin->tambahDokter($data);
			redirect("".base_url()."admin/dokter");

		}else if ($params == "spesialisasi") {

			$spesialisasi = $this->input->post('spesialisasi', 1);
			$data = array('nama_spesialisasi' => $spesialisasi );

			$return = $this->madmin->tambahSpesialisasi($data);
			redirect("".base_url()."admin/spesialisasi");
		}
	}

	//DOKTER
	public function addDokter(){
		$this->madmin->addDokter();
        redirect(base_url().'admin/dokter');
	}

	public function updateDokterById(){
     	$this->madmin->updateDokterById();
        redirect(base_url().'admin/dokter');
     }

	public function dokterById(){
		$username = $this->input->post('username', 1);

        $result = $this->madmin->dokterById($username);
        if ($result) {
            die(json_encode(array(
                'code' => 200,
                'message' => 'success',
                'data' => $result
            )));
        } else {
            die(json_encode(array(
                'code' => 209,
                'message' => 'internal error'
            )));
        }
	}

	public function deleteDokter(){
     	$username = $this->input->post('username', 1);

     	$result = $this->madmin->deleteDokter($username);
	    if ($result) {
	        die(json_encode(array(
	            'code' => 200,
	            'message' => 'success'
	        )));
	    } else {
	        die(json_encode(array(
	            'code' => 209,
	            'message' => 'internal error'
	        )));
	    }
	}

	//SPESIALISASI
	public function addSpesialisasi(){
		$this->madmin->addSpesialisasi();
        redirect(base_url().'admin/spesialisasi');
	}

	public function spesialisasiById() {
            $id = $this->input->post('id', 1);

            $result = $this->madmin->spesialisasiById($id);
            if ($result) {
                die(json_encode(array(
                    'code' => 200,
                    'message' => 'success',
                    'data' => $result
                )));
            } else {
                die(json_encode(array(
                    'code' => 209,
                    'message' => 'internal error'
                )));
            }
     }

     public function updateSpesialisasiById(){
     	$this->madmin->updateSpesialisasiById();
        redirect(base_url().'admin/spesialisasi');
     }

     public function deleteSpesialisasi(){
     	$id = $this->input->post('id', 1);
     	$result = $this->madmin->deleteSpesialisasi($id);
	    if ($result) {
	        die(json_encode(array(
	            'code' => 200,
	            'message' => 'success'
	        )));
	    } else {
	        die(json_encode(array(
	            'code' => 209,
	            'message' => 'internal error'
	        )));
	    }
     }

     //USER
     public function deleteUser(){
     	$username = $this->input->post('username', 1);

     	$result = $this->muser->deleteUser($username);
	    if ($result) {
	        die(json_encode(array(
	            'code' => 200,
	            'message' => 'success'
	        )));
	    } else {
	        die(json_encode(array(
	            'code' => 209,
	            'message' => 'internal error'
	        )));
	    }
	}

	//NOTIFIKASI
	public function kirimNotif(){
		$id_pertanyaan = $this->input->post('id_pertanyaan', 1);

		$id_spesialisasi = $this->madmin->getIdSpesialisasi($id_pertanyaan);
		//echo $id_spesialisasi;

		$token = $this->madmin->getTokenbyID($id_spesialisasi);
		
		define( 'API_ACCESS_KEY', 'AIzaSyCZtZxKJR22w7uOcYO46NofYnjurkrFG-E' );
		if ($token != "NULL") {
			foreach ($token as $key) {
		        $registrationIds = $key->token;

		        $msg = array(
		                'body'  => "Pasien ini menunggu jawaban dari anda",
		                'title' => "Pertanyaan belum terjawab",
		                'tag'   => "admin",
		                'click_action' => $id_pertanyaan
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
	}

}
