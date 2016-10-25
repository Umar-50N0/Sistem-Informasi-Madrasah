<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	//listing
	public function listing () {
		$query	= $this->db->get('tbl_site');
		return $query->result();
	}
	
	//Detail
		public function detail ($id_site) {
		$query	= $this->db->get_where('tbl_site',array('id_site'=>$id_site));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_site',$data);
	}
	
	// Edit
	public function edit ($data) {
		$this->db->where('id_site',$data['id_site']);
		$this->db->update('tbl_site',$data);
	}
	
	// Delete
	public function delete ($data) {
		$this->db->where('id_site',$data['id_site']);
		$this->db->delete('tbl_site',$data);
	}
	
	//listing santri
	public function list_santri(){
	$this->db->get('tbl_calon_santri');
	return $query->result();
	}
}