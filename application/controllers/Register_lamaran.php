<?php

class Register_lamaran extends MY_Controller{

    function __construct()
	{
		parent::__construct();
        $this->load->model('Auth_lamaran_m');
    }
    
    public function index(){
        $this->load->view('register_lamaran_v');
    }
    
    public function proses()
	{
		$this->form_validation->set_rules('username', 'Username','trim|required|min_length[1]|max_length[15]|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password', 'Password','trim|required|min_length[8]|max_length[16]');
		$this->form_validation->set_rules('nama', 'Nama','trim|required|min_length[1]|max_length[255]');
        $this->form_validation->set_rules('email', 'Email','trim|required|min_length[10]|max_length[255]');
        
        if ($this->form_validation->run()==true)
	   	{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // if(isset($_POST['submit'])){
                if(empty($username)){
                    $this->msg('Username wajib diisi', 'danger');
                } else if(empty($password)){
                    $this->msg('Password wajib diisi', 'danger');
                } else if(empty($nama)){
                    $this->msg('Nama wajib diisi', 'danger');
                } else if(empty($email)){
                    $this->msg('Email wajib diisi', 'danger');
                } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $this->msg('Email tidak valid');
                }
            // }
            // $this->load->view('register_lamaran_v');

            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'achmadardani7@gmail.com';
            $config['smtp_pass'] = 'zpstbbtgipovqusk';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";

            $this->load->library('email', $config);
            $this->load->initialize($config);
            $this->load->library('parser');
    
            $data['nama'] = $nama;
    
            $body = $this->parser->parse('email_template_job', $data, true);
    
            $this->email->from('achmadardani7@gmail.com', 'no-reply');
            $this->email->to($email);
            $this->email->subject('Your Registration Was Successfull!');
            $this->email->message($body);

            // if (!$this->email->send()) {
            //     echo $this->email->print_debugger();
            // }

			$this->Auth_lamaran_m->register($username,$password,$nama,$email);
			$this->session->set_flashdata('success_register','Proses Pendaftaran User Berhasil. Silakan login');
			redirect('login_lamaran');
		}
		else
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('register_lamaran');
		}
	}
}