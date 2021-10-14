<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Data extends REST_Controller{

    function __construnct(){
        parent::__construct();
    }

    public function index_get(){
        $baca = $this->Crud->read('tb_data',['id_petugas'=>$this->get('id_petugas')],'id DESC')->result_array();
        $this->response($baca, REST_Controller::HTTP_OK);
    }

    public function index_post(){
        $data = [
            'no_ba' => $this->post('no_ba'),
            'hari_tgl' => date('l/d-m-Y/H:i',time()),
            'id_pel' => $this->post('id_pel'),
            'nama_pel' => $this->post('nama'),
            'alamat' => $this->post('alamat'),
            'tarif' => $this->post('tarif'),
            'type_kwh_lama' => $this->post('type_lama'),
            'no_kwh_lama' => $this->post('no_lama'),
            'teg_kwh_lama' => $this->post('teg_lama'),
            'arus_kwh_lama' => $this->post('arus_lama'),
            'class_kwh_lama' => $this->post('class_lama'),
            'thn_kwh_lama' => $this->post('thn_lama'),
            'stand_kwh_lama' => $this->post('stand_lama'),
            'kap_mcb_lama' => $this->post('kap_lama'),
            'merk_mcb_lama' => $this->post('merk_lama'),
            'type_kwh_baru' => $this->post('type_baru'),
            'no_kwh_baru' => $this->post('no_baru'),
            'teg_kwh_baru' => $this->post('teg_baru'),
            'arus_kwh_baru' => $this->post('arus_baru'),
            'class_kwh_baru' => $this->post('class_baru'),
            'total_kwh_baru' => $this->post('total_baru'),
            'kvarh_kwh_baru' => $this->post('kvarh_baru'),
            'kap_mcb_baru' => $this->post('kap_baru'),
            'merk_mcb_baru' => $this->post('merk_baru'),
            'keterangan' => $this->post('ket'),
            'id_petugas' => $this->post('id_petugas')
        ];
        if($id=$this->Crud->create('tb_data',$data)){
            $this->set_response([
                'id' => $id,
                'status' => TRUE,
                'message' => 'Data berhasil ditambah'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => 'Data gagal ditambah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put(){
        $data = [
            'no_ba' => $this->put('no_ba'),
            // 'hari_tgl' => date('l/d-m-Y/H:i',time()),
            'id_pel' => $this->put('id_pel'),
            'nama_pel' => $this->put('nama'),
            'alamat' => $this->put('alamat'),
            'tarif' => $this->put('tarif'),
            'type_kwh_lama' => $this->put('type_lama'),
            'no_kwh_lama' => $this->put('no_lama'),
            'teg_kwh_lama' => $this->put('teg_lama'),
            'arus_kwh_lama' => $this->put('arus_lama'),
            'class_kwh_lama' => $this->put('class_lama'),
            'thn_kwh_lama' => $this->put('thn_lama'),
            'stand_kwh_lama' => $this->put('stand_lama'),
            'kap_mcb_lama' => $this->put('kap_lama'),
            'merk_mcb_lama' => $this->put('merk_lama'),
            'type_kwh_baru' => $this->put('type_baru'),
            'no_kwh_baru' => $this->put('no_baru'),
            'teg_kwh_baru' => $this->put('teg_baru'),
            'arus_kwh_baru' => $this->put('arus_baru'),
            'class_kwh_baru' => $this->put('class_baru'),
            'total_kwh_baru' => $this->put('total_baru'),
            'kvarh_kwh_baru' => $this->put('kvarh_baru'),
            'kap_mcb_baru' => $this->put('kap_baru'),
            'merk_mcb_baru' => $this->put('merk_baru'),
            'keterangan' => $this->put('ket'),
            'id_petugas' => $this->put('id_petugas')
        ];
        $this->Crud->update('tb_data',$data, ['id' => $this->put('id')]);
        $this->set_response([
            'status' => TRUE,
            'message' => 'Data berhasil diupdate'
        ], REST_Controller::HTTP_CREATED);
    }

    // public function index_delete(){
    //     $this->Crud->delete('tb_kendaraan',['id' => $this->delete('id')]);
    //     $this->set_response([
    //         'status' => TRUE,
    //         'message' => 'Kendaraan berhasil dihapus'
    //     ], REST_Controller::HTTP_NO_CONTENT);
    // }

    public function hapus_get(){
        $cek = $this->Crud->read('tb_data',['id'=> $this->get('id')])->row_array();
        unlink('./assets/photo/'.$cek['foto']);
        unlink('./assets/photo/'.$cek['foto_setelah']);
        $this->Crud->delete('tb_data',['id' => $this->get('id')]);
        $this->set_response([
            'status' => TRUE,
            'message' => 'Data berhasil dihapus'
        ], REST_Controller::HTTP_OK);
    }

    public function image_post(){
        $id = $this->post('id');
        $tit = $this->post('title');
        $foto = $_FILES['foto'];
        $cek = $this->Crud->read('tb_data',['id' => $id])->row_array();
        if($cek['foto'] != null && $tit == "sblm")
            unlink('./assets/photo/'.$cek['foto']);
        elseif($cek['foto_setelah'] != null && $tit == "stlh")
            unlink('./assets/photo/'.$cek['foto_setelah']);
        $config = array(
            'upload_path' => "./assets/photo/",
            'allowed_types' => "jpg|png|jpeg",
            'file_name' => $id.$tit
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto')){
            $uploadedImage = $this->upload->data();
            // $ekstensiGambar = explode('.',$uploadedImage['file_name']);
            // $ekstensiGambar = strtolower(end($ekstensiGambar));
            // $namabaru = $id.$tit.'.'.$ekstensiGambar;
            $this->resizeImage($uploadedImage['file_name']);
            if($tit == "sblm"){
                $this->Crud->update('tb_data',['foto' => $uploadedImage['file_name']], ['id' => $id]);
            }elseif($tit == "stlh"){
                $this->Crud->update('tb_data',['foto_setelah' => $uploadedImage['file_name']], ['id' => $id]);
            }
        }
    }

    private function resizeImage($photo){
        $config['image_library']='gd2';
        $config['source_image']='./assets/photo/'.$photo;
        $config['create_thumb']= FALSE;
        $config['maintain_ratio']= FALSE;
        $config['width']= 120; // shrusnya 120*
        $config['height']= 160; // shrusnya 160*
        // $config['rotation_angle'] = '270';// shrusnya tidak ada* 
        $config['new_image']= './assets/photo/'.$photo;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        // $this->image_lib->rotate(); // shrusnya tidak ada* 
        $this->image_lib->clear();
        // *note: krn tidak tau kenapa jika diresize mengalami rotasi,
        // maka dilakukan rotasi untuk mengembalikan posisi awal
    }
}
?>