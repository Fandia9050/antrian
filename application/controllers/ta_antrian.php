<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ta_antrian extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('arrayhelper');
		$this->load->model('m_ta_antrian');
	}	

	public function index()
	{
		$model = $this->m_ta_antrian->getAll();
		$data['content']   =  $this->load->view('ta_antrian/index', [
			'model' => $model
		], true);
		
		$this->load->view('layouts/index', $data);
	}

	public function create()
	{
		$dataForm = [
			'no_antrian' => $this->input->post('no_antrian'),
			'id_loket' => $this->input->post('id_loket'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			
		];

		$id_loket = map($this->m_ta_antrian->getIdloket(), 'id', 'nama_loket');
		$id_kecamatan = map($this->m_ta_antrian->getIdkecamatan(), 'id', 'nama_kecamatan');
		

		$pilihan1 = $id_loket;
		$pilihan2 = $id_kecamatan;

		$data = [
			'action'=>'ta_antrian/create',
			'no_antrian'=>[
				'name'          => 'no_antrian',
				'id'            => 'no_antrian',
				'class'         => 'form-control',
				'placeholder'   => 'No Antrian',
				'maxlength'     => '100'
			],
			'id_loket'=>[
				'name'          => 'id_loket',
				'selected'		=> ''
			],
			'id_kecamatan'=>[
				'name'          => 'id_kecamatan',
				'selected'		=> ''
			]
		];

		$this->form_validation->set_rules('no_antrian', 'No Antrian', 'required');
		$this->form_validation->set_rules('id_loket', 'Id Loket', 'required');
		$this->form_validation->set_rules('id_kecamatan', 'Id kecamatan', 'required');
		
		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('ta_antrian/create', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' => $pilihan2,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_ta_antrian->insert($dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				loket Berhasil Di Tambah. .
			</div>
			');
			redirect('ta_antrian/index');

		}else{

			$data['content']   =  $this->load->view('ta_antrian/create', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' => $pilihan2,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
	}
	public function update($id)
	{
		$model = $this->m_ta_antrian->findOne($id);

		$dataForm = [
			'no_antrian' => $this->input->post('no_antrian'),
			'id_loket' => $this->input->post('id_loket'),
			'id_kecamatan' => $this->input->post('id_kecamatan'),
			
		];

		$id_loket = map($this->m_ta_antrian->getIdloket(), 'id', 'nama_loket');
		$id_kecamatan = map($this->m_ta_antrian->getIdkecamatan(), 'id', 'nama_kecamatan');
		

		$pilihan1 = $id_loket;
		$pilihan2 = $id_kecamatan;

		$data = [
			'action' => 'ta_antrian/update/'.$model->id,
			'no_antrian'=>[
				'name'          => 'no_antrian',
				'id'            => 'no_antrian',
				'class'         => 'form-control',
				'value'			=> $model->no_antrian,
				'placeholder'   => 'no_antrian',
				'maxlength'     => '100'
			],
			'id_loket'=>[
				'name'          => 'id_loket',
				'selected'		=> $model->id_loket,
				
			],
			'id_kecamatan'=>[
				'name'          => 'id_kecamatan',
				'selected'		=> $model->id_kecamatan,
			]
		];
		$this->form_validation->set_rules('no_antrian', 'No Antrian', 'required');
		$this->form_validation->set_rules('id_loket', 'Id Loket', 'required');
		$this->form_validation->set_rules('id_kecamatan', 'Id Kecamatan', 'required');

		

		if($this->input->server('REQUEST_METHOD') == 'GET'){
			
			$data['content']   =  $this->load->view('ta_antrian/update', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' =>$pilihan2,
			], true);

		}else if($this->form_validation->run() ){
			$this->m_ta_antrian->update($id, $dataForm);
			
			$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				Loket Berhasil Di Ubah. .
			</div>
			');
			redirect('ta_antrian/index');

		}else{

			$data['content']   =  $this->load->view('ta_antrian/update', [
				'data' => $data,
				'pilihan1' => $pilihan1,
				'pilihan2' =>$pilihan2,
			], true);
		}
		
		$this->load->view('layouts/index', $data);
	}

	public function delete($id)
	{
		$model = $this->m_ta_antrian->delete($id);

		$this->session->set_flashdata('success', 
			'<div class="alert alert-success">
				Loket Berhasil Di dihapus. 
			</div>
		');
		redirect('ta_antrian/index');
	}
}
