<?php

class Forgot_pass extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Autentikasi_m');
        $this->encryption->initialize(
            array(
            'cipher' => 'aes-192',
            'mode' => 'ofb',
            'key' => 'PasswordFish9909?')
        );
    }

    public function index(){
        $this->load->view('check_email');
    }

    public function reset_password_validation(){
        $this->form_validation->set_rules('email','email', 'required|valid_email|xss_clean');
        $this->form_validation->set_rules('username', 'username', 'required|xss_clean');
        
        if($this->form_validation->run()==TRUE){
            $email = $this->input->post('email');
            $reset_key =  random_string('alnum', 50);
            $username = $this->input->post('username');

            $data['user'] = $this->Autentikasi_m->data_email();
            $a = false;
            foreach($data['user'] as $usr){
                $email_dekrip = $usr->email;
                $email_dekripan = $this->encryption->decrypt($email_dekrip);
                if($email == $email_dekripan){
                    $a = true;
                }
            }

            $data['username'] = $this->Autentikasi_m->check_username_exist();
            $b = false;
            foreach($data['username'] as $uname){
                $namapengguna = $uname->username;
                if($username == $namapengguna){
                    $b = true;
                }
            }

            if ($a==true && $b==true){
                if($this->Autentikasi_m->update_reset_key($reset_key, $username)){
                    $this->load->library('email');
                    $config = array();
                    $config['charset'] = 'utf-8';
                    $config['protocol']= "smtp";
                    $config['mailtype']= "html";
                    $config['smtp_host']= "ssl://smtp.gmail.com";
                    $config['smtp_port']= "465";
                    $config['smtp_user']= "achmadardani7@gmail.com";
                    $config['smtp_pass']= "zpstbbtgipovqusk";
                    $config['crlf']="\r\n"; 
                    $config['newline']="\r\n"; 
                    $config['wordwrap'] = TRUE;
                        
                    $this->email->initialize($config);
                    $this->email->from($config['smtp_user'], 'no-reply');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject("Reset your password");

                    $message = "<p>Anda melakukan permintaan reset password</p>";
                    $message .= "<p>Silakan masukan kode berikut <b>$reset_key</b> di bagian reset key</p>";
                    $message .= "<a href='".site_url('forgot_pass/reset_password/'.$reset_key)."'>klik reset password</a>";
                    $this->email->message($message);

                    if($this->email->send())
                    {
                        $flash_message = "Silakan cek email <b>$email</b> untuk melakukan reset password";
                        $this->session->set_flashdata('email_send', $flash_message);
                        redirect('forgot_pass');
                    }else {
                        $this->session->set_flashdata('email_send_error', 'Gagal mengirim verifikasi email');
                        redirect('forgot_pass');
                    }
                    

                }
            } else {
                $this->session->set_flashdata('email_none', 'Email dan username tidak cocok dengan akun manapun');
                redirect('forgot_pass');
            }

        } else {
            $this->load->view('check_email');

        }
    }

    public function reset_password(){
        $reset_key = $this->uri->segment(3);

        if($this->Autentikasi_m->check_reset_key($reset_key)==1){
            $this->load->view('reset_password');
        } else {
            $this->session->set_flashdata('pass_change_error', 'Reset key salah. Password gagal diubah');
            $this->load->view('reset_password');
        }
    }

    public function change_password_validation(){
        $this->form_validation->set_rules('password','password','required|min_length[8]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('retype_password','retype password','required|min_length[8]|max_length[16]|matches[password]|xss_clean');
        $this->form_validation->set_rules('reset_key', 'reset key', 'required|xss_clean');
        if($this->form_validation->run()==true){
            $password = $this->input->post('password');
            $reset_key = $this->input->post('reset_key');
            $password = password_hash($password, PASSWORD_DEFAULT);

            if($this->Autentikasi_m->reset_password($reset_key,$password)){
                $this->session->set_flashdata('pass_change_success', 'Password berhasil diubah. Silakan kembali login');
                redirect('log');
            } else {
                $this->session->set_flashdata('pass_change_error', 'Reset key salah. Password gagal diubah');
                redirect('forgot_pass/reset_password');
            }
        } else {
            $this->load->view('reset_password'); //ini digunakan untuk kembali ke view reset_password jika form validation salah
        }

    }

            

}