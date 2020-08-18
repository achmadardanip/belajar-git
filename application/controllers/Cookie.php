<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// class Cookie extends CI_Controller {

// public function index() {
//     $nama = $this->input->cookie('nama'); //ini menampilkan cookie, lalu disimpan ke dalam $nama

//     if($nama) { //pengecekan apakah ada / terhapus cookienya
//         echo $nama; //jika ada akan ditampilkan nama cookienya
//     } else {
//         echo "kuki nama kosong"; //jika tidak ada maka muncul tulisan "cookie nama kosong"
//     }
// }

// public function create() { //method untuk membuat cookie
//     $set = array ( //ini membuat cookie
//         'name' => 'nama', //membuat nama cookie
//         'value' => 'Dilan', //membuat value cookie
//         'expire' => '500' //membuat waktu expire cookie dalam detik
//     );

//     $this->input->set_cookie($set);

//     echo "berhasil membuat cookie nama";
// }

// public function delete() { //method untuk menghapus cookie
//     delete_cookie('nama'); //ini menghapus cookie

//     echo "berhasil hapus cookie nama"; //ini tidak ditampilkan krn seteleah selesai dihapus lngsung redirecr ke index

//     redirect('/cookie/index'); //jika cookie sudah terhapus kembali ke method index
// }
// }