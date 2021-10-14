<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
        parent:: __construct();

		// $this->load->helper("url");
       	// $this->load->helper("form");
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('level')=='admin'){
			redirect('app/data');
		}
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$cek = $this->Crud->read('tb_akun',['username'=>$user])->row_array();
		if($cek['level'] == 'admin'){
			if(password_verify($pass, $cek['password'])){
				$data = [
					'user' => $user,
					'nama' => $cek['nama'],
					'level' => $cek['level']
				];
				$this->session->set_userdata($data);
				redirect('app/data');
			}else{
				$this->load->view('login');
			}
		}else{
			$this->load->view('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('app/login');
	}
}
