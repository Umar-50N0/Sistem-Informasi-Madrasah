<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	//listing
	public function listing () {
		$query	= $this->db->get('tbl_kategori_berita');
		return $query->result();
	}
	
	//Detail
		public function detail ($id_kategori_berita) {
		$query	= $this->db->get_where('tbl_kategori_berita',array('id_kategori_berita'=>$id_kategori_berita));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_kategori_berita',$data);
	}
	
	// Edit
	public function edit ($data) {
		$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
		$this->db->update('tbl_kategori_berita',$data);
	}
	
	// Delete
	public function delete ($data) {
		$this->db->where('id_kategori_berita',$data['id_kategori_berita']);
		$this->db->delete('tbl_kategori_berita',$data);
	}
}