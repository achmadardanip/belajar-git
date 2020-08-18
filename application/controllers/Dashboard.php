<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index() {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('tokoonline/header_v');
        $this->load->view('tokoonline/sidebar_v');
        $this->load->view('dashboard_v', $data);
        $this->load->view('tokoonline/footer_v');
    }


}