<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller{

    function __construnct(){
        parent::__construct();
    }

    public function index_post(){
        $login = $this->Crud->read('tb_akun',['username'=>$this->post('username')])->row_array();
        if($login){
            if(password_verify($this->post('password'),$login['password'])){
                $data = [
                    'id' => $login['id'],
                    'nama' => $login['nama'],
                    'username' => $login['username'],
                    'level' => $login['level']
                ];
                $this->set_response([
                    'status' => TRUE,
                    'message' => 'Berhasil Login',
                    'user' => $data
                ], REST_Controller::HTTP_OK);
            }else{
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Password salah'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'Username tidak terdaftar'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
?>