<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('daftar_model');
	}
		// fungsi index
	public function index(){
		$daftar	=$this->daftar_model->listing();
		$data	= array('title'		=>'Data Calon Santri',
						'daftar'	=>$daftar,
						'isi'		=>'admin/santri/tambah_santri');
		$this->load->view('front/layout/wrapper',$data);
	}
		// fungsi tambah
	public function tambah(){
		$daftar	=$this->daftar_model->listing();
		

		//validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama_lengkap','Nama lengkap','required',
				array('required'	=>'Nama lengkap harus diisi'));
		
		$valid->set_rules('tmp_lahir','Tempat lahir','required',
				array('required'	=>'Tempat lahir harus diisi',
						));
		
		$valid->set_rules('nama_ow','Nama orangtua','required',
				array('required'	=>'Nama Orangtua harus diisi',
					));
		
		$valid->set_rules('pekerjaan','Pekerjaan','required',
				array('required'	=>'Password harus diisi',
					));
		if($valid->run()===FALSE){
		//akhir validasi
		$data	= array('title'		=>'Tambah Calon Santri',
						'daftar'	=> $daftar,
						'isi'		=>'front/pendaftaran/tambah_daftar');
		$this->load->view('front/layout/wrapper',$data);
		//Masuk database
		}else {
		$i		= $this->input;
		$data	= array(	'id_santri'		=> $this->daftar_model->buat_kode(),
							'nama_lengkap'	=> $i->post('nama_lengkap'),
							'tmp_lahir'		=> $i->post('tmp_lahir'),
							'tgl_lahir'		=> $i->post('tgl_lahir'),
							'jn_kelamin'	=> $i->post('jn_kelamin'),
							'pendidikan'	=>$i->post('pendidikan'),
							'anak_ke'		=>$i->post('anak_ke'),
							'jml_sdr'		=>$i->post('jml_sdr'),
							'nama_ow'		=>$i->post('nama_ow'),
							'pend_ow'		=>$i->post('pend_ow'),
							'pekerjaan'		=>$i->post('pekerjaan'),
							'alamat'		=>$i->post('alamat'),
							'no_kontak'		=>$i->post('no_kontak'),
							//'id_daftar'		=>$this->daftar_model->kode_daftar()
						);
		$this->daftar_model->tambah($data);
		$this->session->set_flashdata('sukses','Putra/Putri anda telah terdaftar');
		redirect(base_url('daftar'));
		//Akhir masuk database
		}
	}

	
	//Edit
	public function edit(){
		$daftar	= $this->daftar_model->detail();
		
		
		//validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama_lengkap','Nama lengkap','required',
				array('required'	=>'Nama lengkap harus diisi'));
		
		$valid->set_rules('tempat_lahir','Tempat lahir','required',
				array('required'	=>'Tempat lahir harus diisi',
						));
		
		$valid->set_rules('nama_ow','Nama orangtua','required',
				array('required'	=>'Nama Orangtua harus diisi',
					));
		
		$valid->set_rules('pekerjaan','Pekerjaan','required',
				array('required'	=>'Password harus diisi',
					));
		if($valid->run()===FALSE){
		//akhir validasi
		$data	= array('title'		=>'Tambah Calon Santri',
						'santri'		=> $santri,
						'isi'		=>'front/pendaftaran/tambah_daftar');
		$this->load->view('front/layout/wrapper',$data);
		//Masuk database
		}else {
		$i		= $this->input;
		$data	= array(	//'id_santri'		=> $id_daftar,
							'nama_lengkap'	=> $i->post('nama_lengkap'),
							'tmp_lahir'		=> $i->post('tmp_lahir'),
							'tgl_lahir'		=> $i->post('tgl_lahir'),
							'jn_kelamin'	=> $i->post('jn_kelamin'),
							'pendidikan'	=>$i->post('pendidikan'),
							'anak_ke'		=>$i->post('anak_ke'),
							'jml_sdr'		=>$i->post('jml_sdr'),
							'nama_ow'		=>$i->post('nama_ow'),
							'pend_ow'		=>$i->post('pend_ow'),
							'pekerjaan'		=>$i->post('pekerjaan'),
							'alamat'		=>$i->post('alamat'),
							'no_kontak'		=>$i->post('no_kontak'),
							'status'		=>$i->post('status'),
							'keterangan'	=>$i->post('keterangan'),
						);
		$this->daftar_model->tambah($data);
		$this->session->set_flashdata('sukses','Data santri telah diupdate');
		redirect(base_url());
		//Akhir masuk database
		}
	}
	
		//Delete
	public function delete($daftar){
		$data		= array('id_santri'	=>$daftar);
		$this->daftar_model->delete($data);
		$this->session->set_flashdata('sukses','Data santri telah dihapus');
		redirect(base_url('daftar/delete'));
	}
}