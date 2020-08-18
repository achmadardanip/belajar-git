<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_tr extends CI_Controller {

    function __construct() {
        parent:: __construct ();
        $this->load->model('Siswa_m'); //load model Siswa_m
    }

    public function index() {
        $query = $this->Siswa_m->get(); //mendapatkan data dr db lalu disimpan dalam $query

        foreach($query as $i => $val) {
            echo $val->nama .' '.$val->tanggal_lahir.' '.$val->alamat;
            echo '<br>';
        }
    }

    public function create() {
        $insert = $this->Siswa_m->save(); //mendapatkan data yang diinput dr db/memanggil method dr model
        if($insert) { //jika data yang diinput berhasil
            echo "Berhasil menyimpan data"; //maka tampilkan pesan berhasil menyimpan data
        } else {
            echo "gagal menyimpan data"; //jika data gagal diinput maka tampilkan pesan gagal menyimpan data
        }
    }

    public function update() {
        $id=$this->uri->segment(3);
        $update = $this->Siswa_m->update($id); 
        if($update) {
            echo "berhasil mengubah data";
        } else {
            echo "gagal mengubah data";
        }
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $delete = $this->Siswa_m->delete($id);
        if($delete) {
            echo "berhasil menghapus data";
        } else {
            echo "gagal menghapus data";
        }
    }
}