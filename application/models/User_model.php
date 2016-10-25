<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// listing 
	public function listing(){
		$this->db->select('tbl_user.*, tbl_site.nama_site' );
		$this->db->from('tbl_user');
		// relasi dengan tabel site
		$this->db->join('tbl_site','tbl_site.id_site = tbl_user.id_site','LEFT');
		$this->db->order_by('id_user','DESC');
		$query	= $this->db->get();
		return $query->result();
	}
	// Dtail, mengambil data berupa array dari tabel user berdasarkan id_user
	public function detail($id_user){
		$query	= $this->db->get_where ('tbl_user', array('id_user' => $id_user));
		return $query->row();
	}
	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_user',$data);
	}
	
	// Edit
	public function edit ($data) {
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('tbl_user',$data);
	}
	
	// Delete
	public function delete ($data) {
		$this->db->where('id_user',$data['id_user']);
		$this->db->delete('tbl_user',$data);
	}
}