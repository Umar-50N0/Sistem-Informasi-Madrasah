<?php
// Tambah
class Berita {
	
	
	public function tambah() {
		// Dari database
		$kategori	= $this->kategori_berita_model->listing();
		$akhir		= $this->berita_model->akhir();
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('judul','Judul berita','required');
		$v->set_rules('isi','Isi News','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '12000'; // KB	
$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'title'		=> 'Add news',
						'kategori'	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/berita/tambah');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 200; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			$url_akhir	= $akhir['id_berita']+1;
			$slug = $url_akhir.'-'.url_title($i->post('judul'),'dash', TRUE);
			$data = array(	'slug'					=> $slug,
							'judul'					=> $i->post('judul'),
							'jenis'					=> $i->post('jenis'),
							'id_kategori_berita'	=> $i->post('id_kategori_berita'),
							'isi'				=> $i->post('isi'),
							'gambar'			=> $upload_data['uploads']['file_name'],
							'id_user'			=> $this->session->userdata('id'),
							'status_berita'		=> $i->post('status_berita'),
							'keywords'			=> $i->post('keywords'),
							'urutan'			=> $i->post('urutan')
							);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses','News has been added successfully');
			redirect(base_url('admin/berita'));
		}}
		// End masuk database
		$data = array(	'title'		=> 'Add news',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/berita/tambah');
		$this->load->view('admin/layout/wrapper', $data);
	}
}