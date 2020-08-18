<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Register extends CI_Controller {

    public function index() {
        if($this->session->is_login)
        {
			redirect('home/index');
		}
        $this->load->view('header_v');
        $this->load->view('register_v');
        $this->load->view('footer_v');
    }

    //method ini digunakan untuk menangkap dan memproses inputan form register
    public function register_proses(){
    //menulis aturan untuk form validation
    $this->form_validation->set_rules('username', 'username','trim|required|min_length[3]|max_length[30]|is_unique[users.username]');
    $this->form_validation->set_rules('password', 'password','trim|numeric|required|min_length[8]|max_length[20]');
    $this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[255]');  
            
    //jika benar maka inputan akan ditangkap lalu dikirim ke method register pada model untuk selanjutnya di proses di model
    if ($this->form_validation->run()==true) {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $this->Auth_m->register($username,$password,$nama);
        $this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil Silakan Login'); //jika registrasi berhasil maka akan tampil pesan ini, flashdata ini akan nampil di view login
        redirect ('login'); //setelah register berhasil maka akan di redirect ke login
    } else {
        //jika salah maka akan membuat flashdata untuk menampilkan pesan error dan di redirect ke method register (halaman register)
        $this->session->set_flashdata('error', validation_errors()); //flashdata ini berisi pesan validasi error, dan nanti dipanggil pada view register
        redirect('register');
    }   
    }

}