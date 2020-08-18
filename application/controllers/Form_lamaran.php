<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Form_lamaran extends CI_Controller {
 
	function __construct()
	{
        parent::__construct();
        if(!$this->session->is_login){
            redirect('login_lamaran/index');
        }

	}
 
	public function index()
	{
		$this->load->view('form_lamaran_v');
	}
}