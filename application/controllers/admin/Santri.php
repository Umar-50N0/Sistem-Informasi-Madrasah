<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('santri_model');
		$this->load->model('daftar_model');
	}
		// fungsi index
	public function index(){
		$santri	=$this->santri_model->listing();
		$data	= array('title'		=>'Data Santri',
						'santri'		=>$santri,
						'isi'		=>'admin/santri/santri_list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
		// fungsi data santri
	public function data_santri(){
		$santri	=$this->santri_model->listing();
		$daftar =$this->daftar_model->listing();
		
		$data	= array('title'		=>'Data Santri',
						'daftar'	=> $daftar,
						'santri'		=>$santri,
						'isi'		=>'front/santri/santri_list');
		$this->load->view('front/layout/wrapper',$data);
	}
		// fungsi detail santri
	public function detail($id_santri){
		$santri	=$this->santri_model->detail($id_santri);
		$data	= array('title'		=>'Detail Calon Santri',
						'santri'		=>$santri,
						'isi'		=>'admin/daftar/detail_santri');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// fungsi detail santri
	public function detail_santri($id_santri){
		$santri	=$this->santri_model->detail($id_santri);
		$data	= array('title'		=>'Detail Calon Santri',
						'santri'		=>$santri,
						'isi'		=>'front/santri/detail_santri');
		$this->load->view('front/layout/wrapper',$data);
	}
	// fungsi tambah
	public function tambah(){
		$santri		=$this->santri_model->listing();
		// Validasi
		
		$valid	=$this->form_validation;
		
		$valid->set_rules ('nama_lengkap','Nama lengkap','required',
							array('required'	=>'Nama santri harus diisi'
								  ));
		if($valid->run()===FALSE){
			//akhir validasi
			$data	= array('title'				=>'Tambah Calon Santri',
						'santri'				=>$santri,
						'isi'					=>'admin/santri/tambah_santri'
						);
			$this->load->view('admin/layout/wrapper',$data);
		// Masuk ke database
		}else {
		$i		= $this->input;
		$slug	= url_title($this->input->post('nama_santri'),'dash',TRUE);
		$data	= array ('id_santri'			=>$this->santri_model->buat_kode(),
						 'nama_lengkap'			=> $i->post('nama_lengkap'),
						 'tmp_lahir'			=> $i->post('tmp_lahir'),
						 'tgl_lahir'			=> $i->post('tgl_lahir'),
						 'jn_kelamin'			=> $i->post('jn_kelamin'),
						 'pendidikan'			=> $i->post('pendidikan'),
						 'anak_ke'				=> $i->post('anak_ke'),
						 'jml_sdr'				=> $i->post('jml_sdr'),
						 'nama_ow'				=> $i->post('nama_ow'),
						 'pend_ow'				=> $i->post('pend_ow'),
						 'pekerjaan'			=> $i->post('pekerjaan'),
						 'alamat'				=> $i->post('alamat'),
						 'no_kontak'			=> $i->post('no_kontak')
						 );
		$this->santri_model->tambah($data);
		$this->session->set_flashdata('sukses','Data santri telah ditambah');
		redirect(base_url('admin/santri'));
		}
		
	}
	
	//Edit
	public function edit($id_santri){
		$santri	=$this->santri_model->detail($id_santri);
		// Validasi
		
		$valid	=$this->form_validation;
		
		$valid->set_rules ('nama_lengkap','Nama lengkap','required',
							array('required'	=>'Nama lengkap santri harus diisi',
								  ));
		if($valid->run()===FALSE){
			//akhir validasi
			$data	= array('title'					=>'Edit Santri',
							'santri'				=>$santri,
							'isi'					=>'admin/santri/edit');
			$this->load->view('admin/layout/wrapper',$data);
		// Masuk ke database
		}else {
		$i		= $this->input;
		$data	= array ('id_santri'			=>$id_santri,
						 'nama_lengkap'			=> $i->post('nama_lengkap'),
						 'tmp_lahir'			=> $i->post('tmp_lahir'),
						 'tgl_lahir'			=> $i->post('tgl_lahir'),
						 'jn_kelamin'			=> $i->post('jn_kelamin'),
						 'pendidikan'			=> $i->post('pendidikan'),
						 'anak_ke'				=> $i->post('anak_ke'),
						 'jml_sdr'				=> $i->post('jml_sdr'),
						 'nama_ow'				=> $i->post('nama_ow'),
						 'pend_ow'				=> $i->post('pend_ow'),
						 'pekerjaan'			=> $i->post('pekerjaan'),
						 'alamat'				=> $i->post('alamat'),
						 'no_kontak'			=> $i->post('no_kontak'),
						 'status'				=> $i->post('status')
						 );
		$this->santri_model->edit($data);
		$this->session->set_flashdata('sukses','Data Santri telah diubah');
		redirect(base_url('admin/santri'));
		}
		
	}
	
	//Edit
	public function ubah($id_santri){
		$santri	=$this->santri_model->detail($id_santri);
		// Validasi
		
		$valid	=$this->form_validation;
		
		$valid->set_rules ('nama_lengkap','Nama lengkap','required',
							array('required'	=>'Nama lengkap santri harus diisi',
								  ));
		if($valid->run()===FALSE){
			//akhir validasi
			$data	= array('title'					=>'Ubah Data Calon Santri',
							'santri'				=>$santri,
							'isi'					=>'front/santri/edit');
			$this->load->view('front/layout/wrapper',$data);
		// Masuk ke database
		}else {
		$i		= $this->input;
		$data	= array ('id_santri'			=>$id_santri,
						 'nama_lengkap'			=> $i->post('nama_lengkap'),
						 'tmp_lahir'			=> $i->post('tmp_lahir'),
						 'tgl_lahir'			=> $i->post('tgl_lahir'),
						 'jn_kelamin'			=> $i->post('jn_kelamin'),
						 'pendidikan'			=> $i->post('pendidikan'),
						 'anak_ke'				=> $i->post('anak_ke'),
						 'jml_sdr'				=> $i->post('jml_sdr'),
						 'nama_ow'				=> $i->post('nama_ow'),
						 'pend_ow'				=> $i->post('pend_ow'),
						 'pekerjaan'			=> $i->post('pekerjaan'),
						 'alamat'				=> $i->post('alamat'),
						 'no_kontak'			=> $i->post('no_kontak'),
						 'status'				=> $i->post('status')
						 );
		$this->santri_model->edit($data);
		$this->session->set_flashdata('sukses','Data Santri telah diubah');
		redirect(base_url('admin/santri'));
		}
		
	}
	
	//Delete
	public function delete($id_santri){
		$data		= array('id_santri'	=>$id_santri);
		$this->santri_model->delete($data);
		$this->session->set_flashdata('sukses','Data santri telah dihapus');
		redirect(base_url('admin/santri'));
	}
	
	// fungsi daftar
	public function daftar(){
		$santri		=$this->santri_model->listing();
		// Validasi
		
		$valid	=$this->form_validation;
		
		$valid->set_rules ('nama_lengkap','Nama lengkap','required',
							array('required'	=>'Nama santri harus diisi'
								  ));
		if($valid->run()===FALSE){
			//akhir validasi
			$data	= array('title'				=>'Data Calon Santri',
						'santri'				=>$santri,
						'isi'					=>'admin/santri/tambah_santri');
			$this->load->view('front/layout/wrapper',$data);
		// Masuk ke database
		}else {
		$i		= $this->input;
		$slug	= url_title($this->input->post('nama_santri'),'dash',TRUE);
		$data	= array (
						 'nama_lengkap'			=> $i->post('nama_lengkap'),
						 'tmp_lahir'			=> $i->post('tmp_lahir'),
						 'tgl_lahir'			=> $i->post('tgl_lahir'),
						 'jn_kelamin'			=> $i->post('jn_kelamin'),
						 'pendidikan'			=> $i->post('pendidikan'),
						 'anak_ke'				=> $i->post('anak_ke'),
						 'jml_sdr'				=> $i->post('jml_sdr'),
						 'nama_ow'				=> $i->post('nama_ow'),
						 'pend_ow'				=> $i->post('pend_ow'),
						 'pekerjaan'			=> $i->post('pekerjaan'),
						 'alamat'				=> $i->post('alamat'),
						 'no_kontak'			=> $i->post('no_kontak')
						 );
		$this->santri_model->tambah($data);
		$this->session->set_flashdata('sukses','Data santri telah ditambah');
		redirect(base_url('admin/santri'));
		}
		
	}
	
}