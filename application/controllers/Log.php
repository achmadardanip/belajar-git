<?php

class Log extends CI_Controller {

    public function __construct()
	{
        parent::__construct();
        $this->load->model('Autentikasi_m');

    }
    
    public function index(){
        if($this->session->is_login)
        {
			redirect('rumah/index');
		}
        $this->load->view('log');
    }

    public function proses(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if($this->Autentikasi_m->login_user($username, $password)){
            redirect('rumah');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Username dan password tidak cocok dengan akun manapun
            </div>');
            redirect('log');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('rumah_welcome/index');
    }
 
}
