<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_auth');
	}

	public function login()
	{
	$dataForm = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			];

		$data = [
			'action' => 'auth/login/',
			'username'=>[
				'name'          => 'username',
				'label' 		=> 'Username',
				'id'            => 'username',
				'class'         => 'form-control',
				'placeholder'   => 'Username',
				'maxlength'     => '100'
			],
			'password'=>[
				'name'          => 'password',
				'label' 		=> 'Password',
				'id'            => 'password',
				'type'            => 'password',
				'class'         => 'form-control',
				'placeholder'   => 'Password',
				'maxlength'     => '100'
			]
			];

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('auth/login', [
				'data' => $data,
			], true);

		}else if($this->form_validation->run() ){
			$cek = $this->m_auth->masuk("user", $dataForm)->num_rows();
			if($cek > 0){

				$data_session = array(

					'nama' => $dataForm['username'],
					'status' => "login"
				);

			$this->session->set_userdata("login",$data_session);
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				loket Berhasil Di Tambah. .
			</div>
			');

			redirect("welcome");

			

			}else{
				
				redirect("auth/login");

			}
			
		}
		else{

			$data['content']   =  $this->load->view('auth/login', [
				'data' => $data,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
		
	}



	public function register()
	{
	$dataForm = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'foto' => $this->input->post('foto'),
			'notelp' => $this->input->post('notelp'),
			'alamat' => $this->input->post('alamat'),
			'status' => $this->input->post('status'),
			
		];

		$data = [
			'action' => 'auth/register/',
			'username'=>[
				'name'          => 'username',
				'label' 		=> 'Username',
				'id'            => 'username',
				'class'         => 'form-control',
				'placeholder'   => 'Username',
				'maxlength'     => '100'
			],
			'password'=>[
				'name'          => 'password',
				'label' 		=> 'Password',
				'id'            => 'password',
				'class'         => 'form-control',
				'placeholder'   => 'Password',
				'maxlength'     => '100'
			],
			'nama'=>[
				'name'          => 'nama',
				'label' 		=> 'Nama',
				'id'            => 'nama',
				'class'         => 'form-control',
				'placeholder'   => 'Nama',
				'maxlength'     => '100'
			],
			'email'=>[
				'name'          => 'email',
				'label' 		=> 'Email',
				'id'            => 'email',
				'class'         => 'form-control',
				'placeholder'   => 'Email',
				'maxlength'     => '100'
			],
			'foto'=>[
				'name'          => 'foto',
				'label' 		=> 'Foto',
				'id'            => 'foto',
				'class'         => 'form-control',
				'placeholder'   => 'Foto',
				'maxlength'     => '100'
			],
			'notelp'=>[
				'name'          => 'notelp',
				'label' 		=> 'No Telpon',
				'id'            => 'notelp',
				'class'         => 'form-control',
				'placeholder'   => 'No Telpon',
				'maxlength'     => '100'
			],
			'alamat'=>[
				'name'          => 'alamat',
				'label' 		=> 'Alamat',
				'id'            => 'alamat',
				'class'         => 'form-control',
				'placeholder'   => 'Alamat',
				'maxlength'     => '100'
			],
			'status'=>[
				'name'          => 'status',
				'label' 		=> 'Status',
				'id'            => 'status',
				'class'         => 'form-control',
				'placeholder'   => 'Status',
				'maxlength'     => '100'
			]
		];

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('foto', 'Foto', 'required');
		$this->form_validation->set_rules('notelp', 'No Telpon', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('auth/register', [
				'data' => $data,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_auth->daftar($dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				register Berhasil Di Tambah. .
			</div>
			');
			redirect('auth/login');

		}else{

			$data['content']   =  $this->load->view('auth/register', [
				'data' => $data,
			], true);
		}
		
		$this->load->view('layouts/index', $data);	

	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}
}
