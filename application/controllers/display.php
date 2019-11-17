<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Display extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('arrayhelper');
		$this->load->model('m_home');
		$this->load->model('m_ta_loket');
		
	}	

	// public function index($id)
	// {
	// 	$kecamatan = $this->m_home->getkecamatan($id);

	// 	$data['content']   =  $this->load->view('display/index', [
	// 		'kecamatan' => $kecamatan
	// 	], true);
		

	// 	$this->load->view('display/index', $data);
	// }

	public function index($loket){
		$model = $this->m_home->getAntrian($loket);
		if($model){
			echo "<h1>"+$model->no_antrian+"</h1>";
		}else{
			echo 1;
		}
		
	}

	// public function simpan_antrian($loket, $kecamatan, $no_antrian){
	// 	$model = $this->m_home->simpanAntrian([
	// 		'no_antrian' => $no_antrian,
	// 		'id_loket' => $loket,
	// 		'id_kecamatan' => $kecamatan,

	// 	]);
	// }
}