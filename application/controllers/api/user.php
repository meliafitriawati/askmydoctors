<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "BaseController.php";

class User extends REST_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('muser');
        $this->load->helper('security');
    }
    
    function login_user_post(){
    	$email = $this->input->post('email');
    	$password = md5($this->input->post('password'));
        $token = $this->input->post('token');

        $result = $this->muser->get_user($email, $password);
        $this->muser->updateTokenUser($email, $token);
        
        if($result){
            unset($result['password']);
            $arr_result = array(
                'user'=>$result,
                'status'=>1
            );
            $this->response($arr_result);
        }else{
            $this->display_error_user_unauthorized();
        }
    }

    function login_dokter_post(){
    	$username = $this->input->post('username');
    	$password = md5($this->input->post('password'));
        $token = $this->input->post('token');

        $result = $this->muser->get_dokter($username, $password);
        
        $this->muser->updateTokenDokter($username, $token);

        if($result){
            unset($result['password']);
            $arr_result = array(
                'dokter'=>$result,
                'status'=>1
            );
            $this->response($arr_result);
        }else{
            $this->display_error_user_unauthorized();
        }
    }

    function register_post(){
    	$data['username'] = $this->input->post('username');
        $password = $this->input->post('password');
        $data['email'] = $this->input->post('email');
        $data['fullname'] = $this->input->post('fullname');
        $data['gender'] = $this->input->post('gender');

        if($this->muser->cek_user($data['username']))
        {
            //echo $this->muser->cek_user($data['username']);
            $this->response(array("error" => "The username has been resgitered", "status" => 2));
        }elseif($this->muser->cek_email($data['email']))
        {
            $this->response(array("error" => "The email has been resgitered", "status" => 3));
        }else{
            $data['password'] = md5($password);
            $data['verified'] = 0;
            $data['hak_akses'] = 3;
            $data['img_user'] = "pic.png";
            $result = $this->muser->dataRegister($data);

            if($result){
                $dataUser = $this->muser->get_user($data['email'], md5($password));
                unset($dataUser['password']);
                $this->response(array('user'=>$dataUser, 'status'=>1));
            }else{
                $this->response(array('error'=>'server error', 'status'=>0));
            }
        }
    }


    protected function display_error_user_unauthorized(){
        $this->response(array("error" => "User is not found", "status" => 0));
    }
}
