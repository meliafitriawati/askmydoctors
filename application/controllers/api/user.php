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
        $result = $this->muser->get_user($email, $password);
        
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
        $result = $this->muser->get_dokter($username, $password);
        
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
    	$data['username'] = $this->post('username');
        $data['email'] = $this->post('email');
        $data['cd_access'] = $this->post('cd_access');
        $data['fname'] = $this->post('fname');
        $data['lname'] = $this->post('lname');

        if($this->usermodel->cek_user($data['username'])){
            $this->response(array("error" => "The username has been resgitered", "status" => 2));
        }else{
            $password = $this->post('password');
            if(empty($data['username']) || empty('password') || empty($data['email']) || empty($data['cd_access'])  ){
                $this->response(array("error" => "Invalid username or password", "status" => 0));
            }else{
                $data['password'] = md5($password);
                $data['status'] = 0;
                $result = $this->usermodel->add_user($data);
                if($result){
                    $dataUser = $this->usermodel->get_user($data['username'], md5($password));
                    unset($dataUser['password']);
                    $this->response(array('user'=>$dataUser, 'status'=>1));
                }else{
                    $this->response(array('error'=>'server error', 'status'=>0));
                }
            }
        }
    }

    protected function display_error_user_unauthorized(){
        $this->response(array("error" => "User is not found", "status" => 0));
    }
}
