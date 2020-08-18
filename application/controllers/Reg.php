<?php

class Reg extends CI_Controller{

    public function __construct(){
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
        $this->load->view('reg');
    }

    public function proses(){
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[15]|xss_clean|is_unique[t_users.username]');
		$this->form_validation->set_rules('password', 'password','trim|required|min_length[8]|max_length[16]|xss_clean');
        $this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('email', 'email','trim|required|min_length[10]|max_length[30]|is_unique[t_users.email]|xss_clean');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin','required');
        $this->form_validation->set_rules('no_hp', 'nomor handphone','trim|numeric|required|min_length[10]|max_length[15]|xss_clean');
        $this->form_validation->set_rules('alamat', 'alamat','trim|required|min_length[10]|max_length[255]|xss_clean');

        if ($this->form_validation->run()==true)
        {
            $username = $this->input->post('username');
			$password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $foto = $this->uploadImage();

            $data['user'] = $this->Autentikasi_m->data_email();
            $a = false;
            foreach($data['user'] as $usr){
                $email_dekrip = $usr->email;
                $email_dekripan = $this->encryption->decrypt($email_dekrip);
                if($email == $email_dekripan){
                    $a = true;
                }
            }
            if ($a==true){
                $this->session->set_flashdata('email_error', 'Email sudah terdaftar');
                redirect('reg');
            } else {
                $email = $this->encryption->encrypt($email);
                $data = array(
                    'username' => $username,
                    'password' => password_hash($password,PASSWORD_DEFAULT),
                    'nama' => $nama,
                    'email' => $email,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                    'jenis_kelamin' => $jenis_kelamin,
                    'foto' => $foto
                );
    
                $this->Autentikasi_m->register('t_users', $data);
                $this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil');
                redirect('log');
            }

        } else {
            $this->load->view('reg');

        }
    }

    private function uploadImage(){
        $config['upload_path']          = './assets/foto';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
    
        return "default.jpg";
    }

}