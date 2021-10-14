<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller{

    function __construnct(){
        parent::__construct();
    }

    public function index_get(){
        $baca = $this->Crud->read('tb_akun',['id'=>$this->get('id')])->row_array();
        $this->response($baca, REST_Controller::HTTP_OK);
    }

    public function index_put(){
        $id = $this->put("id");
        $pass = $this->put("password");
        $foto = $this->put("foto");
        $nama = $this->put("nama");
        $email = $this->put("email");
        if($pass == null){
            $data = [
                'nama' => $nama,
                'email' => $email
            ];
            $this->Crud->update("tb_akun",$data,['id' => $id]);
            $this->set_response([
                'status' => TRUE,
                'message' => 'Data berhasil diupdate'
            ], REST_Controller::HTTP_OK);
        }else{
            $data = [
                'nama' => $nama,
                'email' => $email,
                'password' => password_hash($pass,PASSWORD_DEFAULT)
            ];
            $this->Crud->update("tb_akun",$data,['id' => $id]);
            $this->set_response([
                'status' => TRUE,
                'message' => 'Data berhasil diupdate'
            ], REST_Controller::HTTP_OK);
        }
    }

    public function topup_put(){
        $id = $this->put('id');
        $saldo = $this->put('saldo');
        $cek = $this->Crud->read('tb_akun',['id' => $id])->result_array();
        if($cek[0]['saldo'] == null)
            $saldolama = 0;
        else
            $saldolama = $cek[0]['saldo'];
        $data = ['saldo' => $saldo+$saldolama];
        if($this->Crud->update("tb_akun",$data,['id' => $id]) == null){
            $this->set_response([
                'status' => TRUE,
                'message' => 'Berhasil Top Up Sebesar '.$saldo
            ], REST_Controller::HTTP_OK);
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'Gagal Top Up'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function image_post(){
        $id = $this->post('id');
        $foto = $_FILES['foto'];
        $config = array(
            'upload_path' => "./assets/photo/",
            'allowed_types' => "jpg|png|jpeg"
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto')){
            $cek = $this->Crud->read('tb_akun',['id' => $id])->row_array();
            if($cek['foto'] != null)
                unlink('./assets/photo/'.$cek['foto']);
            $uploadedImage = $this->upload->data();
            $this->resizeImage($id,$uploadedImage['file_name']);
            $this->response([
                'status' => TRUE,
                'message' => 'New Laporan has been Added'
            ], REST_Controller::HTTP_CREATED);
        }
    }

    private function resizeImage($id,$photo){
        $ekstensiGambar = explode('.',$photo);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        $namabaru = $id.'.'.$ekstensiGambar;
        $data = [
            'foto' => $namabaru
        ];
        $this->Crud->update("tb_akun",$data,['id' => $id]);
        $config['image_library']='gd2';
        $config['source_image']='./assets/photo/'.$photo;
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= FALSE;
        $config['width']= 359;
        $config['height']= 344;
        $config['new_image']= './assets/photo/'.$namabaru;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        unlink('./assets/photo/'.$photo);
    }
}
?>