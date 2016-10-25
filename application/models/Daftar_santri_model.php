<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_santri_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	//listing
	public function listing () {
		$query	= $this->db->get('tbl_calon_santri');
		return $query->result();
	}
	
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_calon_santri',$data);
	}
	
	// Edit
	public function edit ($data) {
		$this->db->where('noreg',$data['noreg']);
		$this->db->update('tbl_calon_santri',$data);
	}
	
	// Delete
	public function delete ($data) {
		$this->db->where('noreg',$data['noreg']);
		$this->db->delete('tbl_calon_santri',$data);
	}
	
	// fungsi kode otomatis
	function buat_kode(){
		$this->db->select('RIGHT(tbl_calon_santri.id_santri,5) as kode', FALSE);
		$this->db->order_by('id_santri','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_calon_santri');
		//cek dulu apakah ada sudah ada kode di tabel.
		if($query->num_rows() <> 0){
		//jika kode ternyata sudah ada.
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		}else{
		//jika kode belum ada
		$kode = 1;
		}
		$kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
		$kodejadi = "CS".$kodemax;
		return $kodejadi;
		
		}
		
}