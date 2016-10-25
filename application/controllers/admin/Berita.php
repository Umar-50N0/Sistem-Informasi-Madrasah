<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	//load database
	public function __construct() {
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
	}
	// fungsi index
	public function index(){
		$berita	=$this->berita_model->listing();
		$data	= array('title'		=>'Data Berita',
						'berita'		=>$berita,
						'isi'		=>'admin/berita/berita_list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// fungsi tambah
	public function tambah(){
		$kategori	=$this->kategori_model->listing();
		$akhir		= $this->berita_model->akhir();
		
		// Validasi
		$v	= $this->form_validation;
		$v->set_rules('judul','Judul','required',
					array('require'	=> 'Judul harus diisi!'));
					
		$v->set_rules('isi','Isi','required',
					array('require'	=> 'Isi berita harus diisi!'));
					
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/'; // Lokasi file yang di upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; // tipe file yang di iikan
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data	= array('title'		=>'Tambah Berita',
						'kategori'	=>$kategori,
						'error'		=> $this->upload->display_errors(),
						'isi'		=>'admin/berita/tambah_berita');
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
			$url_akhir	= $akhir->id_berita +1;
			$slug 		= $url_akhir.'-'.url_title($i->post('judul'),'dash', TRUE);
			$data 		= array(	'slug_berita'			=> $slug,
									'judul'					=> $i->post('judul'),
									'id_kategori_berita'	=> $i->post('id_kategori_berita'),
									'isi'					=> $i->post('isi'),
									'gambar'				=> $upload_data['uploads']['file_name'],
									'id_user'				=> $this->session->userdata('id'),
									'status_berita'			=> $i->post('status_berita'),
									'jenis_berita'			=> $i->post('jenis_berita')				
							);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses','Berita berhasil ditambah');
			redirect(base_url('admin/berita'));
		}}
		// End masuk database
		
		$data	= array('title'		=>'Tambah Berita',
						'kategori'		=>$kategori,
						'isi'		=>'admin/berita/tambah_berita');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
		//Edit
	public function edit($id_berita){ //awal fungsi
		$berita		=$this->berita_model->detail($id_berita);
		$kategori	=$this->kategori_model->listing();
		$akhir		= $this->berita_model->akhir();
		
		// Validasi
		$v	= $this->form_validation;
		$v->set_rules('judul','Judul','required',
					array('require'	=> 'Judul harus diisi!'));
					
		$v->set_rules('isi','Isi','required',
					array('require'	=> 'Isi berita harus diisi!'));
					
		if($v->run()) { //awal run
		// kalau ada gambar
			if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 		= './assets/upload/image/'; // Lokasi file yang di upload
			$config['allowed_types'] 	= 'gif|jpg|png|svg'; // tipe file yang di iikan
			$config['max_size']			= '12000'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
				
		$data	= array('title'		=>'Edit Berita',
						'kategori'	=>$kategori,
						'berita'	=> $berita,
						'error'		=> $this->upload->display_errors(),
						'isi'		=>'admin/berita/edit');
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
				if($berita->gambar != ""){
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
				}
		//hapus gambar lama
				
			$i 			= $this->input;
			$data 		= array(	'id_berita'				=> $id_berita,
									'judul'					=> $i->post('judul'),
									'id_kategori_berita'	=> $i->post('id_kategori_berita'),
									'isi'					=> $i->post('isi'),
									'gambar'				=> $upload_data['uploads']['file_name'],
									'id_user'				=> $this->session->userdata('id'),
									'status_berita'			=> $i->post('status_berita'),
									'jenis_berita'			=> $i->post('jenis_berita')				
							);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses','Berita berhasil diubah');
			redirect(base_url('admin/berita'));
		// End masuk database
		}
		}else{ //awal else upload tanpa gambar
			//upload tanpa gambar
			$i 			= $this->input;
			$data 		= array(	'id_berita'				=> $id_berita,
									'judul'					=> $i->post('judul'),
									'id_kategori_berita'	=> $i->post('id_kategori_berita'),
									'isi'					=> $i->post('isi'),
									'id_user'				=> $this->session->userdata('id'),
									'status_berita'			=> $i->post('status_berita'),
									'jenis_berita'			=> $i->post('jenis_berita')				
							);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses','Berita berhasil diubah');
			redirect(base_url('admin/berita'));
		}//akhir else upload tanpa gambar
		}//akhir run
		$data	= array('title'		=>'Edit Berita',
						'kategori'		=>$kategori,
						'berita'	=> $berita,
						'isi'		=>'admin/berita/edit');
		$this->load->view('admin/layout/wrapper',$data);
	}//akhir fungsi
	
	//Delete
	public function delete($id_berita){
		$berita		=$this->berita_model->detail($id_berita);
		// hapus gambar
		if($berita->gambar != ""){
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
		}
		//akhir hapus gambar
		$data		= array('id_berita'	=>$id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses','Data berita telah dihapus');
		redirect(base_url('admin/berita'));
		
}
}