<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class BaseController extends REST_Controller {

    protected function display_error_user_unauthorized(){
        $this->response(array("error" => "User is not found", "status" => 0));
    }
}
