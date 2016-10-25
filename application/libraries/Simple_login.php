<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login {
	function __construct() {
		$this->CI =& get_instance();
	}
	
	// fungsi Login
	public function login ($username,$password)
	{
		//Query untuk pencocokan data
		$query	= $this->CI->db->get_where('tbl_user',array(
											'username'	=>$username,
											'password'	=>sha1($password)
											));
		//Jika ada hasilnya
		if($query->num_rows()==1)
		{
			$row	=$this->CI->db->query('SELECT * FROM tbl_user WHERE username="'.$username.'"');
			$admin	=$row->row();
			$id		=$admin->id_user;
			$nama	=$admin->nama;
			$level	=$admin->level;
			// $_SESSION['username'] = $username;
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_level',$level);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('id_admin', uniqid(rand()));
			$this->CI->session->set_userdata('id',$id);
			// Jika benar diarahkan ke
			redirect(base_url('admin/dashboard'));
		}else 
			{
			$this->CI->session->set_flashdata('sukses','Username / password yang anda masukan salah!');
			redirect(base_url().'login');
			}
			return false;
	}// akhir fungsi Login
	
	//cek Login
	public function cek_login()
	{
	if ($this->CI->session->userdata('username')=='' &&
		$this->CI->session->userdata('akses_level')=='')
		{
		$this->CI->session->set_flashdata('sukses','Silahkan Login terlebih dahulu');
		redirect(base_url('login'));
		}	
	}//akhir cek Login
	
	// fungsi logout
	public function logout()
	{
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('akses_level');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('id_admin');
		$this->CI->session->unset_userdata('id');
		$this->CI->session->set_flashdata('sukses','Terima kasih');
		redirect(base_url().'login');
	}//akhir fungsi logout
}