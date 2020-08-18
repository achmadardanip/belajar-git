<?php

class Check_username extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Autentikasi_m');
    }

    public function index(){
        $this->load->view('check_username');
    }

    public function proses(){
        $this->form_validation->set_rules('username', 'username', 'required');

        if ($this->form_validation->run()==true) {
            $username = $this->input->post('username');
            
            $check_username = $this->Autentikasi_m->check_username($username);
            if($check_username==FALSE){
                $this->sesssion->set_flashdata('username_error', 'Maaf nama pengguna tidak ditemukan');
                redirect('check_username');
            } else {
                $this->load->view('change_pass2');
            }
        }
    }
}