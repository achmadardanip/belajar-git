<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Siswa_m extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get () {
        $query = $this->db->query('Select * from t_siswa'); //query menampilkan data dlm tabel t_siswa
        if($query) { //jika $query menyimpan hasil select (data yg select ada)
            return $query->result(); //maka hasilnya akan dikembalikan ke kontroller
        } else {
            return false; // jika tidak ada maka akan false
        }
    }

    public function save() { //query menginput data ke dalam db
        $query = $this->db->query("insert into t_siswa (nama, alamat, tanggal_lahir) values ('asa', 'jepara', '1995-07-11')");
        
        if($query) { //jika berhasil diinput
            return true; //maka kembalikan true
        } else {
            return false; //jika tdk berhasil, maka kembalikan false
        }
    }

    public function update($id) {
        $query=$this->db->query("Update t_siswa set alamat='Depok' where id =" .$id);
        if($query) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $query = $this->db->query("Delete from t_siswa where id=" .$id);
        if($query) {
            return true;
        } else {
            return false;
        }
    }
}