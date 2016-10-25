<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('santri_model');
	}
	
	public function index(){
		$data	= array('title'		=>'Dashboard Sistem Informasi Pendaftaran Online',
						'charts'	=>$this->santri_model->charts(),
						'isi'		=>'admin/dashboard/dashboard_list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
}
  


