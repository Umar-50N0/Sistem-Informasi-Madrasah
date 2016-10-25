<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('site_model');
	}
	// fungsi index
	public function index(){
		$site	=$this->site_model->listing();
		$data	= array('title'		=>'Data Situs',
						'site'		=>$site,
						'isi'		=>'admin/site/site_list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	// Fungsi Tambah
	public function tambah(){
		// Validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama_site','Nama site','required',
			array('required'	=>'Nama site harus diisi'));
		if($valid->run()===FALSE){
		//akhir validasi	
		
		$data	= array('title'		=>'Tambah Situs',
						'isi'		=>'admin/site/tambah_site');
		$this->load->view('admin/layout/wrapper',$data);
		// Masuk ke database
	}else{
		$i		= $this->input;
		$data	= array ('id_user'		=> 1,
						 'nama_site'	=> $i->post('nama_site'),
						 'contact'		=> $i->post('contact'),
						 'telepon'		=> $i->post('telepon'),
						 'alamat'		=> $i->post('alamat'),
						 'kota'			=> $i->post('kota'),
						 'email'		=> $i->post('email'),
						 'keterangan'	=> $i->post('keterangan'),
						 );
		$this->site_model->tambah($data);
		$this->session->set_flashdata('sukses','Data site telah ditambah');
		redirect(base_url('admin/site'));
	}
	// Akhir masuk database
	}
	
	//Delete
	public function delete($id_site){
		$data		= array('id_site'	=>$id_site);
		$this->site_model->delete($data);
		$this->session->set_flashdata('sukses','Data site telah dihapus');
		redirect(base_url('admin/site'));
	}
	
	//Edit
	public function edit($id_site){
		$site		=$this->site_model->listing();
		$sites		=$this->site_model->detail($id_site);
		// Validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama_site','Nama site','required',
			array('required'	=>'Nama site harus diisi'));
		if($valid->run()===FALSE){
		//akhir validasi	
		
		$data	= array('title'		=>'Edit Site',
						'isi'		=>'admin/site/tambah_site');
		$this->load->view('admin/layout/wrapper',$data);
		// Masuk ke database
	}else{
		$i		= $this->edit;
		$data	= array ('nama_site'	=> $i->post('nama_site'),
						 'contact'		=> $i->post('contact'),
						 'telepon'		=> $i->post('telepon'),
						 'alamat'		=> $i->post('alamat'),
						 'kota'			=> $i->post('kota'),
						 'email'		=> $i->post('email'),
						 'keterangan'	=> $i->post('keterangan'),
						 );
		$this->site_model->edit($data);
		$this->session->set_flashdata('sukses','Data site telah ditambah');
		redirect(base_url('admin/site'));
	}
	// Akhir masuk database
	}
}