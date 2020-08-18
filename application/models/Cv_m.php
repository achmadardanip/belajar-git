<?php
class Cv_m extends CI_Model{

    public function __construct()
	{
        parent::__construct();
    }
    
    public function insert_data($nama_awal, $nama_akhir, $tanggal_lahir, $alamat, $deskripsi, $hobi, $foto_data, $file_data, $informasi)
	{
		$data_user = array(
			'nama_awal'=>$nama_awal,
			'nama_akhir'=>$nama_akhir,
            'tanggal_lahir'=>$tanggal_lahir,
            'alamat'=>$alamat,
            'deskripsi'=>$deskripsi,
            'hobi'=>$hobi,
            'foto'=>$foto_data,
            'file'=>$file_data,
            'informasi'=>$informasi
		);
        $this->db->insert('tb_cv',$data_user);
    }

    public function detail_data_profil() {
        // $query = $this->db->query('SELECT * from tb_cv JOIN tb_user ON tb_cv.id=tb_user.id order by tb_cv.id asc'); // SELECT * FROM t_siswa WHERE id = $id secara per row
        // return $query;

        $this->db->select('*');
        $this->db->from('tb_cv');
        $this->db->join('tb_user', 'tb_cv.id = tb_user.id');
        // $this->db->get('tb_cv.id', array('tb_cv.id' => 'tb_user.id'));
        $query = $this->db->get();
    }
}