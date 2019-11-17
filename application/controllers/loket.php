<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loket extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_loket');
	}

	public function index()
	{
		$model = $this->m_loket->getAll();
		$data['content']   =  $this->load->view('loket/index', [
			'model' => $model
		], true);
		
		$this->load->view('layouts/index', $data);
	}

	public function create()
	{
		$dataForm = [
			'nama_loket' => $this->input->post('nama_loket'),
			
		];

		$data = [
			'action' => 'loket/create/',
			'nama_loket'=>[
				'name'          => 'nama_loket',
				'label' 		=> 'Nama loket',
				'id'            => 'nama_loket',
				'class'         => 'form-control',
				'placeholder'   => 'Nama loket',
				'maxlength'     => '100'
			]
		];

		$this->form_validation->set_rules('nama_loket', 'Nama loket', 'required');
		
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('loket/create', [
				'data' => $data,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_loket->insert($dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				loket Berhasil Di Tambah. .
			</div>
			');
			redirect('loket/index');

		}else{

			$data['content']   =  $this->load->view('loket/create', [
				'data' => $data,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
	}
	public function update($id)
	{
		$model = $this->m_loket->findOne($id);

		$dataForm = [
			'nama_loket' => $this->input->post('nama_loket'),
			
		];

		$data = [
			'action' => 'loket/update/'.$model->id,
			'nama_loket'=>[
				'name'          => 'nama_loket',
				'value'		    => $model->nama_loket,
				'id'            => 'nama_loket',
				'class'         => 'form-control',
				'placeholder'   => 'nama_loket',
				'maxlength'     => '100',
				
			]
		];

		$this->form_validation->set_rules('nama_loket', 'Nama Loket', 'required');

		

		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('loket/update', [
				'data' => $data,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_loket->update($id, $dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				Loket Berhasil Di Ubah. .
			</div>
			');
			redirect('loket/index');

		}else{

			$data['content']   =  $this->load->view('loket/update', [
				'data' => $data,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
	}

	public function delete($id)
	{
		$model = $this->m_loket->delete($id);

		$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				Loket Berhasil Di dihapus. 
			</div>
		');
		redirect('loket/index');
	}
}
