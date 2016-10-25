<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	//listing
	public function listing () {
		$query	= $this->db->get('tbl_calon_santri');
		return $query->result();
	}
	
	//Detail
		public function detail ($id_santri) {
		$query	= $this->db->get_where('tbl_calon_santri',array('id_santri'=>$id_santri));
		return $query->row();
	}
	
	// Tambah
	public function tambah ($data) {
		$this->db->insert('tbl_calon_santri',$data);
	}
	
	// Edit
	public function edit ($data) {
		$this->db->where('id_santri',$data['id_santri']);
		$this->db->update('tbl_calon_santri',$data);
	}
	
	// Delete
	public function delete ($data) {
		$this->db->where('id_santri',$data['id_santri']);
		$this->db->delete('tbl_calon_santri',$data);
	}
	
	public function charts (){
        $query = $this->db->query("SELECT * from tbl_calon_santri");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
	   } 
	}
	
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