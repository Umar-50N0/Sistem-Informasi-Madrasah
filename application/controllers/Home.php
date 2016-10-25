<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	// fungsi index
	public function index(){
		$data	= array('title'		=>'Beranda',
						'isi'		=>'front/home');
		$this->load->view('front/layout/wrapper',$data);
	}
	// menu profil
	public function profil(){
		$data	= array('title'		=>'Profil',
						'isi'		=>'front/profil');
		$this->load->view('front/layout/wrapper',$data);
	}
		// menu Pendaftaran
		public function pendaftaran(){
		$data	= array('title'		=>'Pendaftaran',
						'isi'		=>'front/santri/tambah_santri');
		$this->load->view('front/layout/wrapper',$data);
	}
	// menu Pendaftaran
		public function prosedur(){
		$data	= array('title'		=>'Tata Cara Pendaftaran',
						'isi'		=>'front/prosedur_daftar');
		$this->load->view('front/layout/wrapper',$data);
	}
	// menu kegiatan
		public function kegiatan(){
		$data	= array('title'		=>'Kegiatan',
						'isi'		=>'front/kegiatan');
		$this->load->view('front/layout/wrapper',$data);
	}
	// menu galeri
	public function galeri(){
		$data	= array('title'		=>'Galeri',
						'isi'		=>'front/galeri');
		$this->load->view('front/layout/wrapper',$data);
		}
	}