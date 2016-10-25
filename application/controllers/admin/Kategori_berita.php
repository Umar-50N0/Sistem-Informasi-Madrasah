<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('kategori_model');
	}
	// fungsi index
	public function index(){
		$kategori_berita	=$this->kategori_model->listing();
		// Validasi
		
		$valid	=$this->form_validation;
		
		$valid->set_rules ('nama_kategori','Nama kategori','required|is_unique[tbl_kategori_berita.nama_kategori]',
							array('required'	=>'Nama kategori harus diisi',
								  'is_unique'	=>'Kategori : <strong>'.$this->input->post('nama_kategori').'</strong> Sudah ada!
								  					Buat kategori baru!'));
		if($valid->run()===FALSE){
			//akhir validasi
			$data	= array('title'				=>'Data Kategori Berita',
						'kategori_berita'		=>$kategori_berita,
						'isi'					=>'admin/kategori_berita/kategori_list');
			$this->load->view('admin/layout/wrapper',$data);
		// Masuk ke database
		}else {
		$i		= $this->input;
		$slug	= url_title($this->input->post('nama_kategori'),'dash',TRUE);
		$data	= array ('nama_kategori'		=> $i->post('nama_kategori'),
						 'urutan'				=> $i->post('urutan'),
						 'keterangan'			=> $i->post('keterangan'),
						 'slug_kategori_berita'	=> $slug,
						 );
		$this->kategori_model->tambah($data);
		$this->session->set_flashdata('sukses','Kategori telah ditambah');
		redirect(base_url('admin/kategori_berita'));
		}
		
	}
	
	//Edit
	public function edit($id_kategori_berita){
		$kategori_berita	=$this->kategori_model->detail($id_kategori_berita);
		// Validasi
		
		$valid	=$this->form_validation;
		
		$valid->set_rules ('nama_kategori','Nama kategori','required',
							array('required'	=>'Nama kategori harus diisi',
								  ));
		if($valid->run()===FALSE){
			//akhir validasi
			$data	= array('title'					=>'Edit Kategori Berita',
							'kategori_berita'		=>$kategori_berita,
							'isi'					=>'admin/kategori_berita/edit');
			$this->load->view('admin/layout/wrapper',$data);
		// Masuk ke database
		}else {
		$i		= $this->input;
		$data	= array ('id_kategori_berita'	=>$id_kategori_berita,
						 'nama_kategori'		=> $i->post('nama_kategori'),
						 'urutan'				=> $i->post('urutan'),
						 'keterangan'			=> $i->post('keterangan'),
						 );
		$this->kategori_model->edit($data);
		$this->session->set_flashdata('sukses','Kategori telah diubah');
		redirect(base_url('admin/kategori_berita'));
		}
		
	}
	
	//Delete
	public function delete($id_kategori_berita){
		$data		= array('id_kategori_berita'	=>$id_kategori_berita);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses','Data kategori berita telah dihapus');
		redirect(base_url('admin/kategori_berita'));
	}
}