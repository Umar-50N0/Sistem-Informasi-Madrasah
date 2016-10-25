<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	// Load database
	public function __construct() {
		parent::__construct();
		$this->load->model('site_model'); // Data Site
		$this->load->model('user_model'); //Data User
	}
	
	// fungsi index
	public function index(){
		$user	= $this->user_model->listing();
		$data	= array('title'		=>'Administrator',
						'user'		=> $user,
						'isi'		=>'admin/user/user_list');
		$this->load->view('admin/layout/wrapper',$data);
	}
	
	// fungsi tambah
	public function tambah(){
		$site	= $this->site_model->listing();
		
		//validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama','Nama','required',
				array('required'	=>'Nama harus diisi'));
		
		$valid->set_rules('username','Username','required|is_unique[tbl_user.username]',
				array('required'	=>'Username harus diisi',
						'is_unique'	=> 'Username :<strong>'.$this->input->post('username').'</strong> sudah digunakan!
						Buat username baru!'));
		
		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=>'Email harus diisi',
					'valid_email'	=>'Email tidak valid'));
		
		$valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
				array('required'	=>'Password harus diisi',
					'min_length'	=>'Password Minimal 6 karakter',
					'max_length'	=>'Password Maximal 32 karakter'));
		if($valid->run()===FALSE){
		//akhir validasi
		$data	= array('title'		=>'Tambah Administrator',
						'site'		=> $site,
						'isi'		=>'admin/user/user_tambah');
		$this->load->view('admin/layout/wrapper',$data);
		//Masuk database
		}else {
		$i		= $this->input;
		$data	= array(	'nama'		=> $i->post('nama'),
							'email'		=> $i->post('email'),
							'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),//Enkripsi sha1()
							'id_site'	=> $i->post('id_site'),
							'akses_level'=>$i->post('akses_level')
						);
		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses','User/Administrator berhasil ditambahkan');
		redirect(base_url('admin/user'));
		//Akhir masuk database
		}
	}

	
	//Edit
	public function edit($id_user)
	{
		$site	= $this->site_model->listing();
		$user	= $this->user_model->detail($id_user);
		
		//validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama','Nama','required',
				array('required'	=>'Nama harus diisi'));
		
		/*$valid->set_rules('username','Username','required|is_unique[tbl_user.username]',
				array('required'	=>'Username harus diisi',
						'is_unique'	=> 'Username :<strong>'.$this->input->post('username').'</strong> sudah digunakan!
						Buat username baru!'));
		*/
		
		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=>'Email harus diisi',
					'valid_email'	=>'Email tidak valid'));
		if(strlen($this->input->post('password')=='')){
		/*$valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
				array('required'	=>'Password harus diisi',
					'min_length'	=>'Password Minimal 6 karakter',
					'max_length'	=>'Password Maximal 32 karakter'));*/
		}else{
			$valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
				array('required'	=>'Password harus diisi',
					'min_length'	=>'Password Minimal 6 karakter',
					'max_length'	=>'Password Maximal 32 karakter'));
		}
		
		if($valid->run()===FALSE)
		{
		//akhir validasi
		$data	= array('title'		=>'Edit Administrator',
						'site'		=>$site,
						'user'		=>$user,
						'isi'		=>'admin/user/user_edit');
		$this->load->view('admin/layout/wrapper',$data);
		//Masuk database
		}else 
			{
		$i		= $this->input;
		//Jika password kurang dari 6 karakter atau lebih dari 32 karakter
		if(strlen($i->post('password')) < 6 || strlen($i->post('password'))> 32)
			{
		$data	= array(	'id_user'	=> $id_user,
							'nama'		=> $i->post('nama'),
							'email'		=> $i->post('email'),
							'username'	=> $i->post('username'),
							//'password'	=> $i->post('password'),//Enkripsi sha1()
							'id_site'	=> $i->post('id_site'),
							'akses_level'=>$i->post('akses_level')
						);
			}else
				{
			$data	= array('id_user'	=> $id_user,
							'nama'		=> $i->post('nama'),
							'email'		=> $i->post('email'),
							'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),//Enkripsi sha1()
							'id_site'	=> $i->post('id_site'),
							'akses_level'=>$i->post('akses_level')
						);
				}
			
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses','User/Administrator berhasil diubah');
		redirect(base_url('admin/user'));
		//Akhir masuk database
			}
	}
	
		//Delete
	public function delete($id_user){
		$data		= array('id_user'	=>$id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data User telah dihapus');
		redirect(base_url('admin/user'));
	}
	
	// fungsi tambah pendaftar
	public function tambah_daftar(){		
		//validasi
		$valid	= $this->form_validation;
		$valid->set_rules('nama','Nama','required',
				array('required'	=>'Nama harus diisi'));
		
		$valid->set_rules('username','Username','required|is_unique[tbl_user.username]',
				array('required'	=>'Username harus diisi',
						'is_unique'	=> 'Username :<strong>'.$this->input->post('username').'</strong> sudah digunakan!
						Buat username baru!'));
		
		$valid->set_rules('email','Email','required|valid_email',
				array('required'	=>'Email harus diisi',
					'valid_email'	=>'Email tidak valid'));
		
		$valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
				array('required'	=>'Password harus diisi',
					'min_length'	=>'Password Minimal 6 karakter',
					'max_length'	=>'Password Maximal 32 karakter'));
		if($valid->run()===FALSE){
		//akhir validasi
		$data	= array('title'		=>'Pendaftaran',
						//'site'		=> $site,
						'isi'		=>'front/pendaftaran');
		$this->load->view('front/layout/wrapper',$data);
		//Masuk database
		}else {
		$i		= $this->input;
		$data	= array(	'nama'		=> $i->post('nama'),
							'email'		=> $i->post('email'),
							'username'	=> $i->post('username'),
							'password'	=> sha1($i->post('password')),//Enkripsi sha1()
							'id_site'	=> $i->post('id_site'),
							'akses_level'=>$i->post('blocked')
						);
		$this->user_model->tambah($data);
		$this->session->set_flashdata('sukses','User/Administrator berhasil ditambahkan');
		redirect(base_url('front/prosedur_daftar'));
		//Akhir masuk database
		}
	}
	
}