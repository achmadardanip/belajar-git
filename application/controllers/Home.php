<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        if(!$this->session->is_login)
        {
			redirect('login/index');
		}
    }
    
    public function index(){
        $this->load->view('templating/header_succes_v'); //header_success_v ini berisi tombol logout
        $this->load->view('login_success_v'); //membawa data cookie dan username ke page result
        $this->load->view('footer_v');
    }

}