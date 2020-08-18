<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_m extends CI_Model {

	public function insertJurusan($data){
		$this->db->insert('jurusan', $data);
		return $this->db->affected_rows();
	}

	public function getJurusan($id="", $limit=0, $offset=0, $search=""){
		if(!empty($id)){
			$this->db->where('id', $id);
		}
		// 
		// $this->db->get('table_name', $limit, $offset);
		if(!empty($search)) {
			$this->db->group_start();
			$this->db->like('LOWER(kode_jurusan)', strtolower($search));
			$this->db->or_like('LOWER(nama_jurusan)', strtolower($search));
			$this->db->group_end();

		}

		// if(!empty($orderBy)) {
			// $this->db->order_by($sorting[0], $sorting[1]);
		// }

		return $this->db->order_by('updated_datetime', 'asc')->get('jurusan', $limit, $offset);
	}

	public function updateJurusan($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('jurusan', $data);
		
	}

	public function deleteJurusan($id){
		$this->db->where('id', $id);
		$this->db->delete('jurusan');

		return $this->db->affected_rows();
	}	

}

/* End of file Jurusan_m.php */
/* Location: ./application/models/Jurusan_m.php */