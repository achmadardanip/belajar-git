<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_m extends CI_Model {

	public function __construct()
	{
        parent::__construct();
    }
    
    //method ini menangani penginsertan data2 registrasi ke db
    public function register($username, $password, $nama) { //parameter in berisi data username, password, dan nama
    $data_user = array( //supaya bisa dikirim ke db, kita buat array untuk $username, $password, dan $nama
        'username'=>$username,
        'password'=>password_hash($password,PASSWORD_DEFAULT), //pasword_hash ada enkripsi password pada CI
        'nama'=>$nama
    );

    $this->db->insert('users', $data_user); //lalu dikirim array yg berisi data tsb ke db
    }

    //method ini untuk melakukan pengecekan username dan password
    //method ini meretutrn true /false
    public function login_user($username,$password) //$username berisi inputan username, $password berisi inputan password
	{
        $query = $this->db->get_where('users',array('username'=>$username)); //mencari data username dimana username nya = $username
        if($query->num_rows() > 0) //jika ada data yg dicari
        {
            $data_user = $query->row(); //maka data tsb disimpan
            if (password_verify($password, $data_user->password)) { //selanjutnya data akan dicek passwordnya apakah password di db sesuai dengan password yang diketik
                $this->session->set_userdata('username', $username); //jika sesuai maka akan membuat session username yg valuenya adalah username itu sendiri
				$this->session->set_userdata('nama',$data_user->nama); //dan membuat session nama
                $this->session->set_userdata('password',$password); //dan membuat session password
                $this->session->set_userdata('sesi', session_id()); 
                $this->session->set_userdata('is_login',TRUE); //is login juga diberikan nilai true
                return TRUE;
            } else {
                return FALSE; //jika verifikasi password gagal maka method ini akan mereturn false kpd controller
            }
        }
        else
        {
            return FALSE; //jika data yang ditemukan tidak ada maka method ini akan mereturn false kpd controller
        }
	}
    // pengecekan apakah memiliki session dengan nama is_login, jika ternyata empty / tidak memiliki,
    // maka akan diredirect ke controller Login untuk diminta login terlebih dahulu,
    // jadi ini pengecekan apakah kita sudah login/belum
    // public function cek_login()
    // {
    //     if(!$this->session->is_login)
    //     {
	// 		redirect('login/index');
	// 	}
    // }

}

?>