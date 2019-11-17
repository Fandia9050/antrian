<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userloket extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('arrayhelper');
		$this->load->model('m_userloket');
		$this->load->model('m_ta_loket');
	}	

	public function index()
	{
		$kecamatan1 = $this->m_userloket->getkecamatan(1);
		$kecamatan2 = $this->m_userloket->getkecamatan(2);
		$kecamatan3 = $this->m_userloket->getkecamatan(3);
		$kecamatan4 = $this->m_userloket->getkecamatan(4);
		$kecamatan5 = $this->m_userloket->getkecamatan(5);

		$data['content']   =  $this->load->view('userloket/index', [
			'kecamatan1' => $kecamatan1,
			'kecamatan2' => $kecamatan2,
			'kecamatan3' => $kecamatan3,
			'kecamatan4' => $kecamatan4,
			'kecamatan5' => $kecamatan5
		], true);
		

		$this->load->view('layout_loket/index', $data);
	}

	public function nomor_antrian($loket){
		$model = $this->m_userloket->getAntrian($loket);
		if($model){
			echo $model->no_antrian + 1;
		}else{
			echo 1;
		}
		
	}

	public function simpan_antrian($loket, $kecamatan, $no_antrian){
		$model = $this->m_home->simpanAntrian([
			'no_antrian' => $no_antrian,
			'id_loket' => $loket,
			'id_kecamatan' => $kecamatan,
		]);
	}
}