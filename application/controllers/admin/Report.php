<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Report extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('santri_model');
	}
 
	public function pdf($id_santri)
	{
		$this->load->library('pdfgenerator');
		$santri	=$this->santri_model->detail($id_santri);
		$data	= array('santri'		=>$santri,
					);
		
 
	    $html = $this->load->view('admin/report_table', $data, true); 
	    
	    $this->pdfgenerator->generate($html,$id_santri);
	}
}