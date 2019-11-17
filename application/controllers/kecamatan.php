<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_kecamatan');
	}

	public function index()
	{
		$model = $this->m_kecamatan->getAll();
		$data['content']   =  $this->load->view('kecamatan/index', [
			'model' => $model
		], true);
		
		$this->load->view('layouts/index', $data);
	}

	public function create()
	{
		$dataForm = [
			'nama_kecamatan' => $this->input->post('nama_kecamatan')
		];

		$data = [
			'action' => 'kecamatan/create/',
			'nama_kecamatan'=>[
				'name'          => 'nama_kecamatan',
				'label'			=> 'Nama kecamatan',
				'id'            => 'nama_kecamatan',
				'class'         => 'form-control',
				'placeholder'   => 'Nama kecamatan',
				'maxlength'     => '100'
			]
		];

		$this->form_validation->set_rules('nama_kecamatan', 'Nama kecamatan', 'required');

		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('kecamatan/create', [
				'data' => $data,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_kecamatan->insert($dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				kecamatan Berhasil Di Tambah. .
			</div>
			');
			redirect('kecamatan/index');

		}else{

			$data['content']   =  $this->load->view('kecamatan/create', [
				'data' => $data,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
	}
	public function update($id)
	{

		$model = $this->m_kecamatan->findone($id);

		$dataForm =[
			'nama_kecamatan' => $this->input->post('nama_kecamatan'),

		];

		$data = [
			'action' => 'kecamatan/update/'.$model->id,
			'nama_kecamatan'=>[
				'name'			=> 'nama_kecamatan',
				'value'			=> $model->nama_kecamatan,
				'id'			=> 'nama_kecamatan',
				'class'			=> 'form-control',
				'placeholder'	=> 'nama_kecamatan',
				'maxlength'		=> '100',

			]
		];

		$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');

		if($this->input->server('REQUEST_METHOD') == 'GET'){

		$data['content'] = $this->load->view('kecamatan/update',['data' => $data,], 
			true);

		
		}else if($this->form_validation->run() ){
			$this->m_kecamatan->update($id, $dataForm);

			$this->session->set_flashdata('succes',
			'<div class="alert alert-succes">
				Kecamatan Berhasil Di Ubah. .
			</div>
			');
			redirect('kecamatan/index');

		}else{

			$data['content'] = $this->load->view('kecamatan/update',[
				'data' => $data,
			], true);
		}
	
		$this->load->view('layouts/index', $data);
	}

	public function delete($id)
	{
		$model = $this->m_kecamatan->delete($id);

		$this->session->set_flashdata('succes',
			'<div class="alert alert-succes">
				Kecamatan Berhasil Dihapus.
			</div>
		');
		redirect('kecamatan/index');
	}
}

