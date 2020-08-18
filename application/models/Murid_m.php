<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Murid_m extends CI_Model {

    //method ini digunakan untuk mengambil data dari database
    public function tampil_data() {
        return $this->db->order_by("id", "asc")->get('t_siswa'); // SELECT * FROM t_siswa

    }

    //method ini digunakan untuk menginput data ke db menggunkan inputan data array dan nama table
    public function input_data($data,$table) {
        $this->db->insert($table,$data); // INSERT INTO t_siswa (nama, tanggal_lahir, jenis_kelamin, no_hp, alamat VALUES ($nama, $tanggal_lahir, $jenis_kelamin, $no_hp, $alamat)
    }

    // method ini digunakan untuk menghapus data menggunakan inputan $where array yg berisi data id
    // dan $table yang berisi nama tabel
    public function hapus_data($where,$table) {
        $this->db->where($where); //WHERE = $where
        $this->db->delete($table); //delete from 't_siswa'
    }

    //method ini digunakan untuk mendapatkan data per id dari data yang sudah diinpuT
    public function edit_data($where,$table) {
        return $this->db->get_where($table, $where); // SELECT * FROM t_siswa WHERE = $where($where adalah data id)
    }

    //method ini digunakan untuk memproses inputan yang tadi dikirim oleh method update pada controller untuk
    //kemudian dilakukan proses update pd db
    public function update_data($where,$data,$table) {
        $this->db->where($where); //WHERE = $where
        $this->db->update($table, $data); //UPDATE t_siswa SET nama = {$nama}, tanggal_lahir = {$tanggal_lahir}
    }

    //Method ini akan memproses parameter $id yang dikirim dari method detail pada controller
    public function detail_data($id = NULL) {
        $query = $this->db->get_where('t_siswa', array('id' => $id))->row(); // SELECT * FROM t_siswa WHERE id = $id secara per row
        return $query;
    }

    //method ini akan memproses keyword yang dikirim dari method search pada controller
    public function get_keyword($keyword) {
        $this->db->select('*'); //SELECT *
        $this->db->from('t_siswa'); //FROM t_siswa
        $this->db->like('nama', $keyword); // WHERE nama LIKE %keyword%
        $this->db->or_like('tanggal_lahir', $keyword); //OR tangal_lahir LIKE %keyword%
        $this->db->or_like('jenis_kelamin', $keyword); //OR jenis_kelamin LIKE %keyword%
        $this->db->or_like('no_hp', $keyword); //OR no_hp LIKE %keyword%
        $this->db->or_like('alamat', $keyword); //OR alamat LIKE %keyword%
        $this->db->or_like('email', $keyword); //OR email LIKE %keyword%
        $this->db->or_like('sekolah', $keyword); //OR sekolah LIKE %keyword%
        $this->db->or_like('hobi', $keyword); //OR hobi LIKE %keyword%
        return $this->db->get()->result(); //Mengembalikan hasilnya ke fungsi yang memanggilnya
    }

}