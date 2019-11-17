<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ta_loket extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('arrayhelper');
		$this->load->model('m_ta_loket');
	}	

	public function index()
	{
		$model = $this->m_ta_loket->getAll();
		$data['content']   =  $this->load->view('ta_loket/index', [
			'model' => $model
		], true);
		
		$this->load->view('layouts/index', $data);
	}

	public function create()
	{
		$dataForm = [
			'id_loket' => $this->input->post('id_loket'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			
		];

		$id_loket = map($this->m_ta_loket->getIdloket(), 'id', 'nama_loket');
		$id_kecamatan = map($this->m_ta_loket->getIdkecamatan(), 'id', 'nama_kecamatan');
		

		$pilihan1 = $id_loket;
		$pilihan2 = $id_kecamatan;

		$data = [
			'action' => 'ta_loket/create/',
			'id_loket'=>[
				'name'          => 'id_loket',
				'selected'		=> ''
			],
			'id_kecamatan'=>[
				'name'          => 'id_kecamatan',
				'selected'		=> ''
			]
		];

		$this->form_validation->set_rules('id_loket', 'Id Loket', 'required');
		$this->form_validation->set_rules('id_kecamatan', 'Id kecamatan', 'required');
		
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('ta_loket/create', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' => $pilihan2,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_ta_loket->insert($dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				loket Berhasil Di Tambah. .
			</div>
			');
			redirect('ta_loket/index');

		}else{

			$data['content']   =  $this->load->view('ta_loket/create', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' => $pilihan2,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
	}
	public function update($id)
	{
		$model = $this->m_ta_loket->findOne($id);

		$dataForm = [
			'id_loket' => $this->input->post('id_loket'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			
		];

		$id_loket = map($this->m_ta_loket->getIdloket(), 'id', 'nama_loket');
		$id_kecamatan = map($this->m_ta_loket->getIdkecamatan(), 'id', 'nama_kecamatan');
		

		$pilihan1 = $id_loket;
		$pilihan2 = $id_kecamatan;

		$data = [
			'action' => 'ta_loket/update/'.$model->id,
			'id_loket'=>[
				'name'          => 'id_loket',
				'selected'		=> $model->id_loket,
			],
			'id_kecamatan'=>[
				'name'          => 'id_kecamatan',
				'selected'		=> $model->id_kecamatan,
			]
		];

		$this->form_validation->set_rules('id_loket', 'Id Loket', 'required');
		$this->form_validation->set_rules('id_kecamatan', 'Id Kecamatan', 'required');

		

		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('ta_loket/update', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' =>$pilihan2,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_ta_loket->update($id, $dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				Loket Berhasil Di Ubah. .
			</div>
			');
			redirect('ta_loket/index');

		}else{

			$data['content']   =  $this->load->view('ta_loket/update', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' =>$pilihan2,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
	}

	public function delete($id)
	{
		$model = $this->m_ta_loket->delete($id);

		$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				Loket Berhasil Di dihapus. 
			</div>
		');
		redirect('ta_loket/index');
	}
}
