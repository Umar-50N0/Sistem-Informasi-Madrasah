<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	//listing
	public function listing () {
		$this->db->select('tbl_daftar.*, tbl_calon_santri.nama_lengkap, tbl_user.nama');
		$this->db->from('tbl_daftar');
		// Relasi user dengan santri daftar
		$this->db->join('tbl_calon_santri','tbl_calon_santri.id_santri = tbl_daftar.id_daftar','LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_daftar.id_user','LEFT');
		// Akhir relasi
		$this->db->order_by('id_daftar','DESC');
		$query	= $this->db->get();
		return $query->result();
	}
	
	//Detail
		public function detail ($id_daftar) {
		$query	= $this->db->get_where('tbl_daftar',array('id_daftar'=>$id_daftar));
		return $query->row();
	}
	// Akhir
	public function akhir(){
		$query	=$this->db->query('SELECT * FROM tbl_daftar ORDER BY id_daftar DESC');
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_daftar',$data);
	}
	
	// Edit
	public function edit ($data) {
		$this->db->where('id_daftar',$data['id_daftar']);
		$this->db->update('tbl_daftar',$data);
	}
	
	// Delete
	public function delete ($data) {
		$this->db->where('id_daftar',$data['id_daftar']);
		$this->db->delete('tbl_daftar',$data);
	}
	
	// fungsi kode otomatis
	function buat_kode(){
		$this->db->select('RIGHT(tbl_calon_santri.id_santri,3) as kode', FALSE);
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
		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodejadi = $kodemax;
		return $kodejadi;
		return $kode;
		}
}