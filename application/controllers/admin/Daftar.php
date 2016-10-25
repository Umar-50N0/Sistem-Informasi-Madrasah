<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('daftar_model');
		$this->load->model('santri_model');
	}
	// fungsi index
	public function index(){
		$daftar	=$this->daftar_model->listing();
		$data	= array('title'		=>'Data Pendaftaran',
						'daftar'	=>$daftar,
						'isi'		=>'admin/daftar/daftar_list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// fungsi tambah
	public function tambah(){
		$santri		=$this->santri_model->listing();
		$akhir		= $this->daftar_model->akhir();
		
		// Validasi
		$v	= $this->form_validation;
		$v->set_rules('status','Status','required',
					array('required'	=> 'Status harus diisi!'));
					
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/'; // Lokasi file yang di upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; // tipe file yang di iikan
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data	= array('title'		=>'Pendaftaran Calon Santri',
						'santri'	=>$santri,
						'error'		=> $this->upload->display_errors(),
						'isi'		=>'admin/daftar/tambah_daftar');
		$this->load->view('admin/layout/wrapper',$data);
		// Masuk database
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
			$url_akhir	= $akhir->id_santri +1;
			$slug 		= $url_akhir.'-'.url_title($i->post('status'),'dash', TRUE);
			$data 		= array(	'slug_daftar'			=> $slug,
									'id_santri'				=> $i->post('id_santri'),
									'status'				=> $i->post('status'),
									'keterangan'			=> $i->post('keterangan'),
									'gambar'				=> $upload_data['uploads']['file_name'],
									'id_user'				=> $this->session->userdata('id')			
							);
			$this->daftar_model->tambah($data);
			$this->session->set_flashdata('sukses','Pendaftaran berhasil ditambah');
			redirect(base_url('admin/daftar'));
		}}
		// End masuk database
		
		$data	= array('title'		=>'Tambah Pendaftaran',
						'santri'	=>$santri,
						'isi'		=>'admin/daftar/tambah_daftar');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
		//Edit
	public function edit($id_daftar){ //awal fungsi
		$daftar		=$this->daftar_model->detail($id_daftar);
		$santri		=$this->santri_model->listing();
		$akhir		=$this->daftar_model->akhir();
		
		// Validasi
		$v	= $this->form_validation;
		$v->set_rules('status','Status','required',
					array('required'	=> 'Status harus diisi!'));
					
		if($v->run()) { //awal run
		// kalau ada gambar
			if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 		= './assets/upload/image/'; // Lokasi file yang di upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; // tipe file yang di iikan
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data	= array('title'		=>'Edit Berita',
						'santri'	=> $santri,
						'daftar'	=> $daftar,
						'error'		=> $this->upload->display_errors(),
						'isi'		=>'admin/daftar/edit');
		$this->load->view('admin/layout/wrapper',$data);
		
		
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
				
				// hapus gambar lama
				if($daftar->gambar != ""){
			unlink('./assets/upload/image/'.$daftar->gambar);
			unlink('./assets/upload/image/thumbs/'.$daftar->gambar);
				}
		//hapus gambar lama
				
			$i 			= $this->input;
			$data 		= array(	'id_daftar'				=> $id_daftar,
									'status'				=> $i->post('status'),
									'id_santri'				=> $i->post('id_santri'),
									'gambar'				=> $upload_data['uploads']['file_name'],
									'keterangan'			=> $i->post('keterangan'),
									'id_user'				=> $this->session->userdata('id')			
							);
			$this->daftar_model->edit($data);
			$this->session->set_flashdata('sukses','Data pendaftaran berhasil diubah');
			redirect(base_url('admin/daftar'));
		// End masuk database
		}
		}else{ //awal else upload tanpa gambar
			//upload tanpa gambar
			$i 			= $this->input;
			$data 		= array(	'id_daftar'				=> $id_daftar,
									'status'				=> $i->post('status'),
									'id_santri'				=> $i->post('id_santri'),
									'keterangan'			=> $i->post('keterangan'),
									'id_user'				=> $this->session->userdata('id'),			
							);
			$this->daftar_model->edit($data);
			$this->session->set_flashdata('sukses','Daftar berhasil diubah');
			redirect(base_url('admin/daftar'));
		}//akhir else upload tanpa gambar
		}//akhir run
		$data	= array('title'		=>'Edit Pendaftaran',
						'santri'	=> $santri,
						'daftar'	=> $daftar,
						'isi'		=>'admin/daftar/edit');
		$this->load->view('admin/layout/wrapper',$data);
	}//akhir fungsi
	
	//Delete
	public function delete($id_daftar){
		$daftar		=$this->daftar_model->detail($id_daftar);
		// hapus gambar
		if($daftar->gambar != ""){
			unlink('./assets/upload/image/'.$daftar->gambar);
			unlink('./assets/upload/image/thumbs/'.$daftar->gambar);
		}
		//akhir hapus gambar
		$data		= array('id_daftar'	=>$id_daftar);
		$this->daftar_model->delete($data);
		$this->session->set_flashdata('sukses','Data daftar telah dihapus');
		redirect(base_url('admin/daftar'));
		
}
}