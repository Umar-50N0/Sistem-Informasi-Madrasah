<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	//listing
	public function listing () {
		$this->db->select('tbl_berita.*, tbl_kategori_berita.nama_kategori, tbl_user.nama');
		$this->db->from('tbl_berita');
		// Relasi user dengan kategori berita
		$this->db->join('tbl_kategori_berita','tbl_kategori_berita.id_kategori_berita = tbl_berita.id_berita','LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_berita.id_user','LEFT');
		// Akhir relasi
		$this->db->order_by('id_berita','DESC');
		$query	= $this->db->get();
		return $query->result();
	}
	
	//Detail
		public function detail ($id_berita) {
		$query	= $this->db->get_where('tbl_berita',array('id_berita'=>$id_berita));
		return $query->row();
	}
	// Akhir
	public function akhir(){
		$query	=$this->db->query('SELECT * FROM tbl_berita ORDER BY id_berita DESC');
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_berita',$data);
	}
	
	// Edit
	public function edit ($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('tbl_berita',$data);
	}
	
	// Delete
	public function delete ($data) {
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('tbl_berita',$data);
	}
}