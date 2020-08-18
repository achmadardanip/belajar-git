<?php

class Dashboard_admin extends CI_Controller{

    public function index(){
        $this->load->view('tokoonline_admin/header_v');
        $this->load->view('tokoonline_admin/sidebar_v');
        $this->load->view('admin_tokoonline/dashboard');
        $this->load->view('tokoonline_admin/footer_v');

        
    }
}