<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_m extends CI_Model {

	//method ini berfungsi untuk menginsert data ke db
	//method ini menerima variabel $data, dimana $data sudah berisi data2 inputan dlm bentuk arraay
	public function insertKelas($data){
		$this->db->insert('kelas', $data); // INSERT INTO KELAS (KODE_KELAS, NAMA_KELAS, ID_JURUSAN) VALUES ('$POST['KODE_KELAS']', '$POST[NAMA_JURUSAN]')
		return $this->db->affected_rows();
	}

	//model ini berfungsi untuk mendapatkan data kelas dari database
	public function getKelas($id="", $limit=0, $offset=0, $search=""){
		if(!empty($id)){ //jika id tidak kdsong
			$this->db->where('kelas.id', $id); // WHERE ID = $ID
		}
	
		
		if(!empty($search)) {
			$this->db->group_start();
			$this->db->or_like('LOWER(nama_jurusan)', strtolower($search));
			$this->db->or_like('LOWER(kode_kelas)', strtolower($search));
			$this->db->or_like('LOWER(nama_kelas)', strtolower($search));
			$this->db->group_end();
			$this->db->last_query();

		}

		$this->db->select('kelas.*, jurusan.nama_jurusan');
		$this->db->join('jurusan', 'jurusan.id=kelas.id_jurusan', 'inner');
		return $this->db->order_by('kelas.id', 'asc')->get('kelas', $limit, $offset); // FROM KELAS ORDER BY UPDATED_DATETIME ASC
	}




	//method ini berfungsi untuk mengupdate data berdasarkan id dan data2 yg ingin diupdate
	public function updateKelas($id, $data){
		$this->db->where('id', $id); //WHERE id = $id
		return $this->db->update('kelas', $data); // UPDATE KELAS SET NAMA_KELAS = $POST['NAMA_KELAS'], KODE_KELAS= = $POST['KODE_KELAS'] dst..
		
	}

	//method ini digunakan untuk menghapus data berdasarkan id
	public function deleteKelas($id){
		$this->db->where('id', $id); // WHERE id = $id
		$this->db->delete('kelas'); // DELETE FROM KELAS

		return $this->db->affected_rows();
	}


}