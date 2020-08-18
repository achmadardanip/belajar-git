<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beratbadan extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('Beratbadan_m');
     }
    
    public function index(){
        $this->load->view('templating/header');
        $this->load->view('templating/index');
        $this->load->view('templating/footer');
    }

    public function beratbadan(){
		$b = 65; // bmi
        $t = 170; // tinggi
        $data['berat'] = $b;
        $data['tinggi'] = $t;
        $data['hasil'] = $this->Beratbadan_m->beratbadanideal($t,$b);
        $this->load->view("templating/header");
        $this->load->view('hasilberatbadan',$data);
        $this->load->view("templating/footer");

	}
}

