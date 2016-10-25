<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_santri extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('daftar_santri_model');
		$this->load->model('user_model');
	}
	// fungsi index
	public function index(){
		$daftar	=$this->daftar_model->listing();
		$data	= array('title'		=>'Pendaftaran',
						'daftar'	=>$daftar,
						'isi'		=>'front/santri/tambah_santri');
		$this->load->view('front/layout/wrapper',$data);
	}
	
		// menu Pendaftaran
	public function prosedur(){
		$data	= array('title'		=>'Prosedur Pendaftaran',
						'isi'		=>'front/prosedur_daftar');
		$this->load->view('front/layout/wrapper',$data);
	}
	// fungsi tambah
	/*public function tambah(){
		
		// Validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama_lengkap','Nama lengkap','required',
			array('required'	=>'Nama harus diisi'));
			
		$valid->set_rules('tmp_lahir','Tempat Lahir','required',
			array('required'	=>'Tempat Lahir harus diisi'));
			
		$valid->set_rules('tgl_lahir','Tanggal Lahir','required',
			array('required'	=>'Tanggal Lahir harus diisi'));
			
		$valid->set_rules('nama_ow','Nama Orangtua','required',
			array('required'	=>'Nama Orangtua/Wali harus diisi'));
			
		$valid->set_rules('alamat','Alamat','required',
			array('required'	=>'Alamat harus diisi'));
					
		if($valid->run()) {
				
			
			$config['upload_path'] 		= './assets/upload/image/'; // Lokasi file yang di upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; // tipe file yang di iikan
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('foto')) {
			$data	= array('title'		=>'Pendaftaran',
							'error'		=> $this->upload->display_errors(),
							'isi'		=>'front/pendaftaran');
			$this->load->view('front/layout/wrapper',$data);
			
				
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i 			= $this->input;
			$data	= array ('id_santri'		=> $this->daftar_santri_model->buat_kode(),
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
						 'foto'					=> $upload_data['uploads']['file_name']
						 );
		$this->daftar_santri_model->tambah($data);
		$this->session->set_flashdata('sukses','Pendaftaran Berhasil. Silahkan mendaftar ulang untuk konfirmasi');
		redirect(base_url('home/prosedur'));
		}}
		// End masuk database
		
		$data	= array('title'		=>'Pendaftaran',
						'isi'		=>'front/pendaftaran');
		$this->load->view('front/layout/wrapper',$data);
	}*/
	
	public function tambah(){ //awal fungsi
		
		// Validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama_lengkap','Nama lengkap','required',
			array('required'	=>'Nama harus diisi'));
			
		$valid->set_rules('tmp_lahir','Tempat Lahir','required',
			array('required'	=>'Tempat Lahir harus diisi'));
			
		$valid->set_rules('tgl_lahir','Tanggal Lahir','required',
			array('required'	=>'Tanggal Lahir harus diisi'));
			
		$valid->set_rules('nama_ow','Nama Orangtua','required',
			array('required'	=>'Nama Orangtua/Wali harus diisi'));
			
		$valid->set_rules('alamat','Alamat','required',
			array('required'	=>'Alamat harus diisi'));
					
		if($valid->run()) { //awal run
		// kalau ada foto
			if(!empty($_FILES['foto']['name'])){
			$config['upload_path'] 		= './assets/upload/image/'; // Lokasi file yang di upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; // tipe file yang di iikan
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('foto')) {
			$data	= array('title'		=>'Pendaftaran',
							'error'		=> $this->upload->display_errors(),
							'isi'		=>'front/pendaftaran');
			$this->load->view('front/layout/wrapper',$data);
		
		
		}else{// Masuk database
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
				// hapus foto lama
				if($santri->foto != ""){
			unlink('./assets/upload/image/'.$santri->foto);
			unlink('./assets/upload/image/thumbs/'.$santri->foto);
				}
		//hapus foto lama
				
			$i 			= $this->input;
			$data	= array ('id_santri'		=> $this->daftar_santri_model->buat_kode(),
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
						 'foto'					=> $upload_data['uploads']['file_name']
						 );
		$this->daftar_santri_model->tambah($data);
		$this->session->set_flashdata('sukses','Pendaftaran Berhasil. Silahkan mendaftar ulang untuk konfirmasi');
		redirect(base_url('home/prosedur'));
		// End masuk database
		}
		}else{ //awal else upload tanpa foto
			//upload tanpa foto
			$i 			= $this->input;
			$data	= array ('id_santri'		=> $this->daftar_santri_model->buat_kode(),
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
		$this->daftar_santri_model->tambah($data);
		$this->session->set_flashdata('sukses','Pendaftaran Berhasil. Silahkan mendaftar ulang untuk konfirmasi');
		redirect(base_url('home/prosedur'));
		}//akhir else upload tanpa foto
		}//akhir run
		$data	= array('title'		=>'Pendaftaran',
						'isi'		=>'front/pendaftaran');
		$this->load->view('front/layout/wrapper',$data);
	}//akhir fungsi
}