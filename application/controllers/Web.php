<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    // public function __construct() {
    //     parent:: __construct ();
    //     if (!$this->session->login)
    //     {
    //         redirect('login');
    //     }
    // }

    public function index() {
        $data['title'] = "Home";
        $this->load->view('header_v', $data);
        $this->load->view('index_v', $data);
        $this->load->view('footer_v', $data);
    }

    public function about(){		
		$data['title'] = "FORM";
		$this->load->view('header_v');
		$this->load->view('about_v',$data);
		$this->load->view('footer_v');
    }

    public function aboutme() {
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('thn_lahir','Thn_lahir','required');
        $this->form_validation->set_rules('jeniskelamin','Jenis_kelamin','required');
        $this->form_validation->set_rules('kota','Kota','required');
        $this->form_validation->set_rules('kutipan','Kutipan','required');
        if(empty($_FILES['file']['name'])) { // pengecekan apakah file diinput atau tidak
            $this->form_validation->set_rules('file', 'Document', 'required'); // jika tdk diinput maka keluar rules yg mengharuskan datanya diinput
        $post = $this->input->post();
        foreach(['nama', 'kutipan'] as $key => $value) { //membuat xss clean untuk nama dan kutipan
        $post[$value] = $this->security->xss_clean($post[$value]);
        }
        }

        if ($this->form_validation->run()==true) { // pengecekan apakah semua rules terpenuhi / tidak
        $data['nama'] = $post['nama'];
        $th_lahir = $this->input->post('thn_lahir');
        $data['jk'] = $this->input->post('jeniskelamin');
        $data['kota'] = $this->input->post('kota');
        $data['kutipan'] = $post['kutipan'];
        $data['title'] = "About Me";
        $data['umur'] = $this->Umur_m->umur($th_lahir);
        if (isset($_FILES['file'])) { // mengecek apakah ada data yg disubmit
            $file = $_FILES['file']; // jika ada maka data tsb akan di get dan dimasukan ke $file
            $upload = $this->uploadfile($file); // $upload masuk ke method uploadfile dengan membawa parameter $file yg sudah berisi filenya
            // print_r($upload); die(); // untuk cek isi/return dari fungsi uploadfile()
            $data['file_name'] = $upload['file_name']; // mendapatkan nama file (file_name), lalu disimpan dalam $data berindeks 'file_name'
            $data['orig_name'] = $upload['orig_name']; // mendapatkan origin name, lalu disimpan dalam $data berindeks 'origin name'
        }
        $this->load->view('header_v');
        $this->load->view('about_me_v', $data);
        $this->load->view('footer_v');
    } else { // jika set_rules tidak terpenuhi, maka akan masuk ke form
        $data['title'] = "FORM";
		$this->load->view('header_v');
		$this->load->view('about_v',$data);
		$this->load->view('footer_v');
    }
}

    // method upload file menerima $file yang sudah dikirimkan saat di isset
    public function uploadfile($file){
        $dir = APPPATH . "uploads/"; // $dir berisi path application/uploads
        $dir = str_replace(array("\\", "//"), "/", $dir); // merubah string jika "\\" atau "//" dtemukan maka akan diganti menjadi /
        if(!file_exists($dir)) { //jika direktori belum ada maka akan dibuat direktori baru dengan permission 777
            mkdir($dir, 777, true);
        }
        $config['upload_path'] = $dir; // menentukan kemana file akan diupload
        $config['allowed_types'] = '*'; // membatasi tipe file yang boleh di upload
        $config['file_name'] = $file['name']; // untuk menentukan nama filenya
        $config['overwrite'] = true; // untuk menindih file yang sudah ter-upload saat di-upload file baru 
        $config['encrypt_name'] = true; // memberikan enkripsi pada nama file

        $this->load->library('upload', $config); // meload library 'upload'

        if($this->upload->do_upload('file')) { // berfungsi melakukan pengecekan apakah file yg diupload sudah sesuai dengan kriteria yg sdh kita tentukan tadi
            $upload = $this->upload->data();  // jika sudah sesuai, maka akan data yg sudah di upload akan dikembalikan dan dimasukan ke $upload
        }
        return $upload; // kalo file tidak ke upload akan error

    }

    public function download($filename, $orig_name) {
        $file = APPPATH . "uploads/". $filename; // variabel $file berisi alamat lokasi file (hanya nama file) , didapat dari link pada view

        if(file_exists($file)) { // pengecekan ada filenya atau tidak di local kita/server
            $this->load->helper('download'); // meload helper download
            force_download($orig_name, file_get_contents($file)); // jika filenya ada maka akan di-get dan di download
            exit;
        }
    }

    // public function login() { //halaman login
    //     $cookie_username = $this->input->cookie('kukiku');
    //     $cookie_pass = $this->input->cookie('password');
    //     if($cookie_username) {
    //         $data['username'] = $cookie_username;
    //     } else {
    //         $data['username'] = '';
    //     }
    //     if($cookie_pass) {
    //         $data['password'] = $cookie_pass;
    //     } else {
    //         $data['password'] = '';
    //     }
    //     $this->load->view('header_v');
	// 	$this->load->view('login_v', $data);
	// 	$this->load->view('footer_v');

    // }

    //method ini akan memproses data2 inputan form login
    // public function login_success() {
    //     // $this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[255]');
    //     // $this->form_validation->set_rules('password','Password','required|min_length[8]|max_length[20]');

    //     // if ($this->form_validation->run()==true) // mengecek apakah rules terpenuhi
    //     // {
    //     $username = $this->input->post('username'); //nangkep inputan username
    //     $password = $this->input->post('password'); //nangkep inputan password

    //     $data['nama'] = $this->security->xss_clean($this->input->post('username'));  //mendapatkan data inputan username lalu disimpan dalam $data
    //     $set = array(
    //         'name' => 'kukiku',
    //         'value' => $this->input->post('username'), //menyimmpan username ke dalam cookie
    //         'expire' => '30'
    //     );
    //     $this->input->set_cookie($set); //mengatur array menjadi cookie
    //     if(!empty($_POST["remember"])) { //jika button remember me di klik maka akan membuat cookie
    //         setcookie ("username",$_POST["username"],time()+ 30);
    //         setcookie ("password",$_POST["password"],time()+ 30);
    //     } else { //jika rememberme tdk di klik tdk akan membuat cookie
    //         setcookie("username","");
    //         setcookie("password","");
    //     }

    //     if($this->Auth_m->login_user($username,$password)) { //method login_user akan mereturn nilai true/false jika true maka akan ke halaman form
    //     $this->Auth_m->cek_login();
    //     $data['username'] = $this->input->post('username');
    //     $data['password'] = $this->input->post('password');
    //     $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible" role="alert">
    //     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    //     Anda berhasil login
    //     </div>');
    //     $this->load->view('templating/header_succes_v'); //header_success_v ini berisi tombol logout
    //     $this->load->view('login_success_v', $data); //membawa data cookie dan username ke page result
    //     $this->load->view('footer_v');
    //     } else { //namun jika method login_user mereturn false maka akan membuat flasdata bahwa username & password salah
    //         $this->session->set_flashdata('error','Username & Password Salah');
	// 		redirect('web/login'); //jika salah maka akan di redirect di halaman login
    //     }
        
        // }else { //jika rules tidak terpenuhi maka akan kembali ke halaman login dan muncul pesan error
        //     $this->load->view('header_v');
        //     $this->load->view('login_v');
        //     $this->load->view('footer_v');
        // }


    // }

    // public function logout() { //method yang dijalankan apabla tombol logout di klik
    //     delete_cookie('kukiku'); //menghapus cookie 'kukiku'
    //     delete_cookie('kuki_nama'); 
    //     delete_cookie('kuki_tgl'); 
    //     delete_cookie('kuki_jk'); 
    //     delete_cookie('kuki_hp'); 
    //     delete_cookie('kuki_alamat'); 
    //     $this->session->unset_userdata('username'); //menghapus session username
	// 	$this->session->unset_userdata('nama'); //menghapus session nama
    //     $this->session->unset_userdata('is_login'); //menghapus session is_Login
    //     $this->session->unset_userdata('sesi'); //menghapus session is_Login
    //     redirect('/web/login/'); //jika sudah dihapus akan dialihkan ke method login yang berisi halaman login itu sendiri
    // }

    //Method ini akan me load view register
    // public function register() {
    //     $this->load->view('header_v');
    //     $this->load->view('register_v');
    //     $this->load->view('footer_v');
    // }

    // //method ini digunakan untuk menangkap dan memproses inputan form register
    // public function register_proses(){
    // //menulis aturan untuk form validation
	// $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[255]|is_unique[users.username]');
	// $this->form_validation->set_rules('password', 'password','trim|required|min_length[8]|max_length[255]');
    // $this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[255]');  
    
    // //jika benar maka inputan akan ditangkap lalu dikirim ke method register pada model untuk selanjutnya di proses di model
    // if ($this->form_validation->run()==true) {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $nama = $this->input->post('nama');
    //     $this->Auth_m->register($username,$password,$nama);
    //     $this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil Silakan Login'); //jika registrasi berhasil maka akan tampil pesan ini, flashdata ini akan nampil di view login
    //     redirect ('web/login'); //setelah register berhasil maka akan di redirect ke login
    // } else {
    // //jika salah maka akan membuat flashdata untuk menampilkan pesan error dan di redirect ke method register (halaman register)
    // $this->session->set_flashdata('error', validation_errors()); //flashdata ini berisi pesan validasi error, dan nanti dipanggil pada view register
    // redirect('web/register');
    // }

    // }

    // public function cek_kuki() {
    //     $login = $this->input->cookie('kukiku');
    //     if(!$login) {
    //      redirect('web/login/');
    //  } else {
    //     $data['title'] = "FORM";
    //     $this->load->view('templating/header_succes_v'); //header_success_v ini berisi tombol logout
    //     $this->load->view('form_v', $data); //membawa data cookie dan username ke page result
    //     $this->load->view('footer_v');
    // }
    // }

    public function form() {
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('tgl_lahir','Tgl_lahir','required');
        $this->form_validation->set_rules('jeniskelamin','Jenis_kelamin','required');
        $this->form_validation->set_rules('nohp','Nohp','required|numeric|min_length[10]|max_length[12]');
        $this->form_validation->set_rules('alamat','Kutipan','required');
        if(empty($_FILES['file']['name'])) { // pengecekan apakah file diinput atau tidak
        $this->form_validation->set_rules('file', 'Document', 'required');
        }

        if ($this->form_validation->run()==true) {
            $login = $this->input->cookie('kukiku');
            if ($login=null) {
                redirect('/web/login/');
            }
            $c_name = array(
                'name' => 'kuki_nama',
                'value' => $this->input->post('nama'), //menyimmpan username ke dalam cookie
                'expire' => '60'
            );
            $this->input->set_cookie($c_name);

            $c_tgl = array(
                'name' => 'kuki_tgl',
                'value' => $this->input->post('tgl_lahir'), //menyimmpan username ke dalam cookie
                'expire' => '60'
            );
            $this->input->set_cookie($c_tgl);

            $c_jk = array(
                'name' => 'kuki_jk',
                'value' => $this->input->post('jeniskelamin'), //menyimmpan username ke dalam cookie
                'expire' => '60'
            );
            $this->input->set_cookie($c_jk);

            $c_hp = array(
                'name' => 'kuki_hp',
                'value' => $this->input->post('nohp'), //menyimmpan username ke dalam cookie
                'expire' => '60'
            );
            $this->input->set_cookie($c_hp);

            $c_alamat = array(
                'name' => 'kuki_alamat',
                'value' => $this->input->post('alamat'), //menyimmpan username ke dalam cookie
                'expire' => '60'
            );
            $this->input->set_cookie($c_alamat);

            // $cookie_nama = $this->input->cookie('kuki_nama');
            // $cookie_tgl = $this->input->cookie('kuki_tgl');
            // $cookie_jk = $this->input->cookie('kuki_jk');
            // $cookie_hp = $this->input->cookie('kuki_hp');
            // $cookie_alamat = $this->input->cookie('kuki_alamat');

            // if($cookie_nama) {
            //     $cookie['nama'] = $cookie_nama;
            // } else {
            //     $cookie['nama'] = '';
            // }
            // if($cookie_tgl) {
            //     $cookie['tanggal'] = $cookie_tgl;
            // } else {
            //     $cookie['tanggal'] = '';
            // }
            // if($cookie_jk) {
            //     $cookie['jk'] = $cookie_jk;
            // } else {
            //     $cookie['jk'] = '';
            // }
            // if($cookie_hp) {
            //     $cookie['hp'] = $cookie_hp;
            // } else {
            //     $cookie['hp'] = '';
            // }
            // if($cookie_alamat) {
            //     $cookie['alamat'] = $cookie_alamat;
            // } else {
            //     $cookie['alamat'] = '';
            // }
            $cookie['title'] = "FORM";
            $this->load->view('templating/header_succes_v');
            $this->load->view('form_v', $cookie);
            $this->load->view('footer_v');

        } else {
            $data['title'] = "FORM";
            $this->load->view('templating/header_succes_v');
            $this->load->view('form_v', $data);
            $this->load->view('footer_v');

        }
    }




    public function calculator () {
        $data['hasilhitung'] = '';
        $this->form_validation->set_rules('panjang','Panjang','numeric|required|min_length[1]|max_length[6]');
        $this->form_validation->set_rules('lebar','Lebar','numeric|required|min_length[1]|max_length[6]');

        if($this->form_validation->run()==true)
        {
        $p = $this->input->post('panjang');
        $l = $this->input->post('lebar');
        $luas = $this->Rumus_m->luaspersegipanjang($p, $l);
        // print_r($luas); die();
        $data['hasilhitung'] = "Luas persegi panjang = $luas";
        $this->load->view('header_v');
        $this->load->view('calculator_v', $data);
        $this->load->view('footer_v');
        }
        
        else {
            $this->load->view('header_v');
            $this->load->view('calculator_v', $data);
            $this->load->view('footer_v');
        }
    }

    // public function create() { //method untuk membuat cookie
    //     $set = array ( //ini membuat cookie
    //         'name' => 'cookie', //membuat nama cookie
    //         'value' => 'Hello i am cookies which saved in this broswer', //membuat value cookie
    //         'expire' => '500' //membuat waktu expire cookie dalam detik
    //     );
    
    //     $this->input->set_cookie($set);
    // }
    
    //method ini digunakan untuk menampilkan halaman awal dari aplikasi crud
    public function index_crud() {
        $data['title'] = "DATA SISWA PKL DEVELOPER 2020";
        $data['murid'] = $this->Murid_m->tampil_data()->result(); //mengambil data dari database untuk ditampilkan
        if(count($data['murid']) >= 6) {
            $data['footer_class'] = 'footer-class-in-edit-page';
        }
        $this->load->view('header_v');
        $this->load->view('crud/data_siswa_v', $data); //melempar data ke view data_siswa_v
        $this->load->view('footer_v', $data);
    }

    //method ini digunakan untuk menangkap inputan dari form modal
    public function tambah_aksi() {
        $nama = $this->security->xss_clean($this->input->post('nama'));
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->security->xss_clean($this->input->post('alamat'));
        //menangkap input field tambahan (email,sekolah, hobi, foto)
        $email = $this->security->xss_clean($this->input->post('email'));
        $sekolah = $this->security->xss_clean($this->input->post('sekolah'));
        $hobi = $this->security->xss_clean($this->input->post('hobi'));
        $foto = $_FILES['foto'];
        if($foto=''){}else{
            $config['upload_path'] = './assets/foto';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('foto')) {
                echo "Upload gagal"; die();
            } else {
                $foto = $this->upload->data('file_name');
            }
        }

        //tangkapan inputan dirubah jadi array
        $data = array(
            'nama'          => $nama,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'no_hp'         => $no_hp,
            'alamat'        => $alamat,
            'email'         => $email, //merubah field tambahan menjadi array
            'sekolah'       => $sekolah,
            'hobi'          => $hobi,
            'foto'          => $foto
        );

        $this->Murid_m->input_data($data, 't_siswa'); //data array tadi akan dimasukan ke metod input_data pada model Murid_m
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan
        </div>'); //menambahkan session flash data ketika data berhasil diinput akan ada message bahwa data berhasil ditambahkan, message berada dalam bootstrap alert
        redirect('web/index_crud/'); //setelah input berhasil maka akan di redirect ke halama index crud

    }


    //method ini digunakan untuk mengapus data berdasarkan parameter yg diterima, yaitu id, ketika tombol hapus diklik akan menjalankan method ini
    public function hapus($id, $foto) {
        $where = array('id' => $id); //$where berisi data id yg berbentuk array $where
        $this->Murid_m->hapus_data($where, 't_siswa'); //$where yang sudah berisi id akan dikirim ke method hapus_data pada model untuk memproses penghapusan data
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus
        </div>'); //menambahkan session flash data ketika data berhasil diinput akan ada message bahwa data berhasil dihapus, message berada dalam bootstrap alert
        $filepath = APPPATH .'/assets/foto' .'/' .$foto;
        $filepath = str_replace(array("\\", "//"), "/", $filepath);
        unlink($filepath);
        redirect('web/index_crud/'); //setelah selesai dihapus, maka akan kembali ke halaman index
    }

    //method ini digunakan untuk menampilkan data2 yg sudah diinput ketika tombol edit di klik berdasarkan parameter yg diterima, yaitu id
    public function edit($id) {
        $where = array('id' => $id); //$where berisi data id yang berbentuk array $where
        $data['footer_class'] = 'footer-class-in-edit-page';
        $data['siswa'] = $this->Murid_m->edit_data($where, 't_siswa')->result(); //mengambil data yang sudah diinput scr satu persatu berdasarkan id
        $this->load->view('header_v');
        $this->load->view('crud/edit', $data); //melampar $data yg berisi data yang sudah diinput ke view edit untuk ditampilkan kembali
        $this->load->view('footer_v', $data);
    }

    //Mmethod ini digunakan untuk menangkap inputan form dari view edit dan memproses inputan tsb
    //sebagai sebuah update
    public function update() {
        $id = $this->input->post('id');
        $nama = $this->security->xss_clean($this->input->post('nama'));
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->security->xss_clean($this->input->post('alamat'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $sekolah = $this->security->xss_clean($this->input->post('sekolah'));
        $hobi = $this->security->xss_clean($this->input->post('hobi'));
        $foto = $_FILES['foto']; //menangkap inputan foto kemudian disimpan dalam $foto
        if($foto=''){}else{ //Jika tidak ada foto maka tidak terjadi apa-apa, jika ada maka akan dilakukan konfigurasi
            $config['upload_path'] = './assets/foto'; //konfigurasi untuk menentukan lokasi untuk menyimpan file yg telah diupload
            $config['allowed_types'] = 'jpg|png|gif'; //Konfigurasi tipe file yang diizinkan untuk diupload

            $this->load->library('upload', $config); //maload library upload dan memanggil $config
            if(!$this->upload->do_upload('foto')) { //apabila percobaan upload gagal
                echo "Upload gagal"; die(); //maka akan tampilkan pesan gagal
            } else {
                $foto = $this->upload->data('file_name'); //Jika percobaan upload berhasil maka datanya akan diupload
            }
        }

        //input yang sudah ditangkap akan dirubah menjadi array
        $data = array (
            'nama'          => $nama,
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'no_hp'         => $no_hp,
            'alamat'        => $alamat,
            'email'         => $email,
            'sekolah'       => $sekolah,
            'hobi'          => $hobi,
            'foto'          => $foto
        );

        //$where berisi data id yang berbentuk array
        $where = array(
            'id' => $id
        );
        
        $this->Murid_m->update_data($where, $data, 't_siswa'); //memanggil method update_data pada model sekaligus mengirimkan array data inputan dan nama tabel
        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate
        </div>'); //menambahkan session flash data ketika data berhasil diinput akan ada message bahwa data berhasil diedit, message berada dalam bootstrap alert
        redirect('web/index_crud'); //jika proses update sudah selesai maka akan di redirect ke halaman index
    }

    //method ini digunakan untuk menampilkan data detail apabila button detail di klik maka akan menjalankan method ini
    public function detail($id) {
        $detail = $this->Murid_m->detail_data($id); //memanggil method detail_data pada model sekaligus mengiriminya parameter id yg berisi data id
        $data['detail'] = $detail; //$detail dijadikan array $data
        $data['footer_class'] = 'footer-class-in-edit-page';
        $this->load->view('header_v');
        $this->load->view('crud/detail', $data); //meload & mengirim data detail ke view 'detail'
        $this->load->view('footer_v', $data);

    }

    //method ini dijalankan jika button print di klik
    public function print_siswa() {
        $data['siswa'] = $this->Murid_m->tampil_data('t_siswa')->result(); //memanggil method tampil_data untuk mengambil data dari database untuk ditampilkan
        $this->load->view('crud/print_siswa_v', $data); //mengirimkan data yang didapat dr db ke view print
    }

    //method ini dijalankan jika button search di klik method ini akan mengirimkan inputan pada form searh
    //ke method get_keyword pada model murid_m
    public function search() {
        $keyword = $this->input->post('keyword'); //menangkap inputan form name keyword
        $data['murid'] = $this->Murid_m->get_keyword($keyword); //memanggil method get_keyword pada model dengan inputannya adalah tangkapan inputan pada form keyword
        if(count($data['murid']) >= 6) {
            $data['footer_class'] = 'footer-class-in-edit-page';
        }
        $data['title'] = "DATA SISWA PKL DEVELOPER";
        $this->load->view('header_v');
        $this->load->view('crud/data_siswa_v', $data); //meload & mengirim data detail ke view 'detail'
        $this->load->view('footer_v', $data);
    }

    //method ini dijalankan jika button export pdf di klik
    //method ini merubah data db dalam bentuk tabel html menjadi data tabel dalam bentuk pdf
    public function pdf() {
        $this->load->library('dompdf_gen'); //meload library dom
        $data['siswa'] = $this->Murid_m->tampil_data('t_siswa')->result(); //memanggil method tampil_data pada model untuk mendapatkan data yang akan dijadikan pdf
        
        $this->load->view('crud/laporan_pdf', $data); //data db yang sudah didapatkan akan dikirim ke view laporan_pdf
        
        $paper_size = 'A4'; //Menentukan ukuran kertas untuk hasil eksport
        $orientation = 'landscape'; //menentukan orientasi halaman pdf
        $html = $this->output->get_output(); //library output ini bertujuan untuk meng-handle output dari CodeIgniter, get_output memeungkinkan kita untuk menerima output apa saja
        $this->dompdf->set_paper($paper_size, $orientation); //ukuran kertas yang sudah ditentukan akan dimasukan ke set_paper untuk selanjutnya akan di proses menjadi pdf
        $this->dompdf->load_html($html); //melakukan konversi dari code html yang ada di variabel $html, menjadi bentuk PDF
        $this->dompdf->render(); //rendering report pdf
        $this->dompdf->stream("laporan data siswa pkl developer 2020.pdf", array('Attachment' => 0)); // melakukan output file PDF dengan nama laporan data siswa pkl developer 2020.pdf
        //atachment = 0 berarti kita bisa mereview pdfnya di browser sebelum melakukan download, tanpa parameter ini maka dokumen akan langsung didownload.
    }

    //method ini dijalankan saat button excel di klik
    //method ini merubah data db dalam bentuk tabel html menjadi data tabel dalam bentuk dokumen Excel
    public function excel(){
        $data['murid'] = $this->Murid_m->tampil_data('t_siswa')->result(); ////memanggil method tampil_data pada model untuk mendapatkan data yang akan dijadikan excel
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php'); //memasukkan file PHPExcel.php yg berada pada library php excel. Require merupakan fungsi yang digunakan untuk menyertakan file php lain ke dalam suatu program PHP.
        require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php'); //memasukan file excel2007.php yang berada pada direktori writer
        
        //membuat property dokumen Excel
        $object = new PHPExcel(); //membuat objek dari class PHPExcel, membuat objek menandakan kita membuat sebuah workbook baru di excel
        $object->getProperties()->setCreator("Achmad Ardani Prasha"); //membuat author file excel
        $object->getProperties()->setLastModifiedBy("Achmad Ardani Prasha"); //membuat last saved by file excel
        $object->getProperties()->setTitle("Data Siswa PKL Developer ADW 2020"); //membuat judul pada properties

        //seting posisi sheet excel yang akan digunakan
        $object->setActiveSheetIndex(0); //untuk mengeset worksheet aktif adalah sheet ke-1 atau worksheet yang berindex-0. Worksheet yang aktif adalah worksheet yang akan langsung muncul/tampil ketika file excel hasil generate dibuka

        //header dari tabel dari cell A1 sampai I1
        $object->getActiveSheet()->setCellValue('A1', 'ID'); //untuk mengisi value pada cell A1 berisi kolom ID pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('B1', 'NAMA SISWA'); //untuk mengisi value pada cell B1 berisi kolom NAMA SISWA pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('C1', 'TANGGAL LAHIR'); //untuk mengisi value pada cell C1 berisi kolom TANGGAL LAHIR pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('D1', 'JENIS KELAMIN'); //untuk mengisi value pada cell D1 berisi kolom JENIS KELAMIN pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('E1', 'NOMOR HANDPHONE'); //untuk mengisi value pada cell E1 berisi kolom NOMOR HANDPHONE pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('F1', 'ALAMAT'); //untuk mengisi value pada cell F1 berisi kolom ALAMAT pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('G1', 'EMAIL'); //untuk mengisi value pada cell G1 berisi kolom EMAIL pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('H1', 'SEKOLAH'); //untuk mengisi value pada cell H1 berisi kolom SEKOLAH pada worksheet ke-1
        $object->getActiveSheet()->setCellValue('I1', 'HOBI'); //untuk mengisi value pada cell I1 berisi kolom HOBI pada worksheet ke-1

        $baris = 2; //baris untuk mengisi data dimulai pada baris ke-2
        $no = 1; //id pertama adalah 1

        //disini kita memamsukkan datanya. pertama buat perulangan untuk get semua data yang ada di db
        foreach ($data['murid'] as $mrd) {
            $object->getActiveSheet()->setCellValue('A' .$baris, $no++); //kolom A baris ke-2/A2 berisi data2 id, dimulai dr id 1
            $object->getActiveSheet()->setCellValue('B' .$baris, $mrd->nama); //kolom B baris ke-2/B2 berisi data nama
            $object->getActiveSheet()->setCellValue('C' .$baris, $mrd->tanggal_lahir); //kolom C baris ke-2/C2 berisi data tanggal lahir
            $object->getActiveSheet()->setCellValue('D' .$baris, $mrd->jenis_kelamin); //kolom D baris ke-2/D2 berisi data jenis kelamin
            $object->getActiveSheet()->setCellValue('E' .$baris, $mrd->no_hp); //kolom E baris ke-2/E2 berisi data nomor handphone
            $object->getActiveSheet()->setCellValue('F' .$baris, $mrd->alamat); //kolom F baris ke-2/F2 berisi data alamat
            $object->getActiveSheet()->setCellValue('G' .$baris, $mrd->email); //kolom G baris ke-2/G2 berisi data email
            $object->getActiveSheet()->setCellValue('H' .$baris, $mrd->sekolah); //kolom H baris ke-2/H2 berisi data sekolah
            $object->getActiveSheet()->setCellValue('I' .$baris, $mrd->hobi); //kolom I baris ke-2/I2 berisi data hobi

            $baris++; //baris akan nambah, setelah 2, yaitu 3,4,5,6,7,8,9 dst.. (tambah baris setiap looping)


        }

        //menentukan nama output file excel yg nanti akan diexport
        $filename = "Data_Siswa_PKL_Developer_ADW_2020" . '.xlsx'; //nama file : Data_Siswa_PKL_Developer_ADW_2020.xls
        
        $object->getActiveSheet()->setTitle("Data Siswa"); //memberi nama sheet "Data Siswa" nama saheet tidak boleh > 30 karakter
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //menentukan media type untuk xlsx

        header('Content-Disposition: attachment;filename="' .$filename. '"'); // Mendefinisikan nama file ekspor Data_Siswa_PKL_Developer_ADW_2020.xls

        header('Cache-Control: max-age=0'); //max-age=0 berarti bahwa cache selalu DIANGGAP expired sehingga browser HARUS melakukan validasi. no cache

        $writer = PHPExcel_IOFactory::createwriter($object, 'Excel2007'); //menyimpan .xlsx dalam format excel 2007

        $writer->save('php://output'); //force download file tanpa menguploadnya ke server

        exit;
    }

    
}