<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

    //membuat session
	public function setdata()
	{
		$this->session->set_userdata('username','administrator'); //session username dengan value administrator
		$this->session->set_userdata('nama','Budi Cahyadi');
		echo 'Session telah dibuat';
	}


    //mengambil data sesssion
	public function getdata()
	{
		$data['username'] = $this->session->userdata('username');
		$data['nama'] = $this->session->userdata('nama');
		$this->load->view('session_v',$data);
    }
    
    //menghapus session
    public function deletedata()
    {
    $array = array('username', 'nama');
    $this->session->unset_userdata($array);
    echo 'Session telah dihapus';
    }
}

?>