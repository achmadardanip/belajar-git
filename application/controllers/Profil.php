<?php

class Profil extends CI_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->model('Auth_lamaran_m');
        $this->load->model('Cv_m');
    }

    public function index(){
        // $profil = $this->Cv_m->detail_data_profil(); //memanggil method detail_data pada model sekaligus mengiriminya parameter id yg berisi data id
        // $data['profil'] = $profil; 
        $this->load->view('profil_v');
    }
}