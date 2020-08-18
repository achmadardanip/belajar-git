<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller {

    public function index() {
        if($this->session->is_login)
        {
			redirect('home/index');
		}
        $this->load->view('header_v');
		$this->load->view('login_v');
		$this->load->view('footer_v');
    }

    public function login_success() {
        $username = $this->input->post('username'); //nangkep inputan username
        $password = $this->input->post('password'); //nangkep inputan password

        $data['nama'] = $this->security->xss_clean($this->input->post('username'));  //mendapatkan data inputan username lalu disimpan dalam $data
        $set = array(
            'name' => 'kukiku',
            'value' => $this->input->post('username'), //menyimmpan username ke dalam cookie
            'expire' => '30'
        );
        $this->input->set_cookie($set); //mengatur array menjadi cookie
        if(!empty($_POST["remember"])) { //jika button remember me di klik maka akan membuat cookie
            setcookie ("username",$_POST["username"],time()+ 30);
            setcookie ("password",$_POST["password"],time()+ 30);
        } else { //jika rememberme tdk di klik tdk akan membuat cookie
            setcookie("username","");
            setcookie("password","");
        }

        if($this->Auth_m->login_user($username,$password)) { //method login_user akan mereturn nilai true/false jika true maka akan ke halaman form
        $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Anda berhasil login
        </div>');
        redirect('home/index');
        } else { //namun jika method login_user mereturn false maka akan membuat flasdata bahwa username & password salah
            $this->session->set_flashdata('error','Username & Password Salah');
			redirect('login/index'); //jika salah maka akan di redirect di halaman login
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login/index');
    }

}