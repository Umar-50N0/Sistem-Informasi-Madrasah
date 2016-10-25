<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller{
	
		public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','cetakpdf'));
		$this->load->model('santri_model');
	}
	function index ($id_santri){
		$santri	=$this->santri_model->detail($id_santri);
		$data	= array('title'		=>'Detail Calon Santri',
						'santri'		=>$santri,
						'isi'		=>'front/santri/detail_santri');
		$this->load->view('front/layout/wrapper',$data);
		/*
		$santri	=$this->santri_model->detail($id_santri);
		$ret ='';
		$pdf_filename = 'data_santri_'.$santri.'.pdf';
		$link_download = ($download_pdf == TRUE)?'':anchor(base_url().'pdf/index/true/','Buat PDF');
		
		if($santri->num_rows()>0){
		$detail_santri = $santri->row_array();
		
		$data	= array('title'		=>'Detail Calon Santri',
						
						'santri'=>$detail_santri,
						'link_download'=>$link_download,
						'isi'		=>'admin/pdf');	
		$this->load->view('front/layout/wrapper',$data);	
		
		/*$data	= array('title'		=>'Detail Calon Santri',
						'santri'		=>$santri,
						'isi'		=>'admin/daftar/detail_santri')*/
		
}
}