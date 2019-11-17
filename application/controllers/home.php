<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('arrayhelper');
		$this->load->model('m_home');
		$this->load->model('m_ta_loket');
	}	
	

	public function index()
	{
		$kecamatan1 = $this->m_home->getkecamatan(1);
		$kecamatan2 = $this->m_home->getkecamatan(2);
		$kecamatan3 = $this->m_home->getkecamatan(3);
		$kecamatan4 = $this->m_home->getkecamatan(4);
		$kecamatan5 = $this->m_home->getkecamatan(5);

		$data['content']   =  $this->load->view('home/index', [
			'kecamatan1' => $kecamatan1,
			'kecamatan2' => $kecamatan2,
			'kecamatan3' => $kecamatan3,
			'kecamatan4' => $kecamatan4,
			'kecamatan5' => $kecamatan5
		], true);
		

		$this->load->view('layout_pengunjung/index', $data);
	}

	public function nomor_antrian($loket){
		$model = $this->m_home->getAntrian($loket);
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