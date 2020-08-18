<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_lamaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_lamaran_m');
	}

	public function index()
	{
        if($this->session->is_login)
        {
			redirect('form_lamaran/index');
		}
		$this->load->view('login_lamaran_v');
	}

	public function proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($this->Auth_lamaran_m->login_user($username,$password))
		{
			redirect('form_lamaran');
		}
		else
		{
			$this->session->set_flashdata('error','Username & Password salah');
			redirect('login_lamaran');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('is_login');
		redirect('login_lamaran');
	}

	

}