<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Registrasi extends REST_Controller{

    function __construnct(){
        parent::__construct();
    }

    public function index_post(){
        $cek = $this->Crud->read('tb_akun',['username' => $this->post('username')])->num_rows();
        if($cek){
            $this->set_response([
                'status' => FALSE,
                'message' => 'Username telah terdaftar'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $data = [
                'nama' => $this->post('nama'),
                'username' => $this->post('username'),
                'password' => password_hash($this->post('password'),PASSWORD_DEFAULT),
                'level' => 'user'
            ];
            if($this->Crud->create('tb_akun',$data)){
                $this->set_response([
                    'status' => true,
                    'message' => 'Akun berhasil dibuat'
                ], REST_Controller::HTTP_CREATED);
            }else{
                $this->set_response([
                    'status' => FALSE,
                    'message' => 'Akun gagal dibuat'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}

?>