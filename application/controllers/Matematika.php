<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// syntax ini memiliki fungsi untuk mencegah akses langsung ke file controller.

class Matematika extends CI_Controller { 
	// Syntax ini digunakan untuk memberikan nama terhadap class,nama class harus diawali dengan huruf besar, nama class juga harus sesuai dengan nama file controller, karena nama file controller adalah Matematika, sehingga untuk nama class adalah Matematika, Class controller harus extends class CI_Controller

	// function __construct(){ 
	// 	// Merupakan konstruktor / method yang dijalankan pertama kali pada saat sebuah class dijalankan
	// 	// Pada method __construct digunakan untuk menjalankan fungsi yang anda inginkan pada saat controller diakses, pada bagian method __construct diletakkan fungsi untuk memanggil helper ataupun library, serta mendeklarasikan variable yang akan sering digunakan dibagian method pada controller itu sendiri
	// 	parent::__construct();
	// 	$this->load->model('Matematika_m');
	// }


// Dalam contoh ini kita membuat 2 method didalam class Matematika, yaitu index (merupakan method yang dijalankan ketika controller tersebut diakses di bagian URL),  method segitiga dan lain2
	public function index(){ 
		// Merupakan fungsi default jika saat memanggil class tanpa menyebutkan fungsinya
		$data['data'] = "hello world"; // 'dt' = $data di view hasil.php
		$data['luas'] = '';
		$this->load->view('hasil', $data);
	}

	// public function segitiga(){
	// 	$a = 5;
	// 	$t = 3;
    //     $luas = 0.5 * $a * $t;
	// 	$data['data'] = "l segitiga = $luas";
	// 	$this->load->view('hasil', $data);
	// }

	
	public function segitiga(){
		$a = 5;
		$t = 3;
        $luas = 0.5 * $a * $t;
		$data['data'] = "l segitiga = ";
		$data['luas'] = $luas;
		$this->load->view('hasil', $data);
	}
	
}