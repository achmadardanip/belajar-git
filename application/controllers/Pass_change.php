<?php

class Pass_change extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Autentikasi_m');

        if(!$this->session->is_login)
        {
			redirect('log/index');
		}
    }

    public function index(){
        $this->load->view('change_pass2');
    }

    public function proses(){
        $this->form_validation->set_rules('old-password', 'password lama', 'required');
        $this->form_validation->set_rules('new-password', 'password baru', 'trim|required|min_length[8]|max_length[16]');
        $this->form_validation->set_rules('conf-password', 'konfirmasi password', 'matches[new-password]');

        if ($this->form_validation->run()==true) {
            $pass_old = $this->input->post('old-password');
            $id = $this->session->userdata('id');
            $cek_old = $this->Autentikasi_m->cek_old($pass_old, $id);
            if($cek_old == FALSE){
                $this->session->set_flashdata('pass_error', 'Password lama salah');
                // echo'<pre>';
                // var_dump($this->session);
                redirect('Pass_change');
            } else{
                $this->Autentikasi_m->save_pass($id);
                // $this->session->sess_destroy();
                $this->session->set_userdata('is_login', FALSE);
                
                $this->session->set_flashdata('pass_successful', 'Password berhasil diubah. Silakan login kembali');
                // echo '<pre>';
                // var_dump($this->session);
                redirect('log');
            }
        } else {
            $this->load->view('change_pass2');
        }

    }
}