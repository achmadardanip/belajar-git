<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

public function __construct() {
    parent::__construct();
}

 protected function template($view, $data=array())
 {
  $this->load->view('header_jurusan_v', $data);
  $this->load->view($view, $data);
  $this->load->view('footer_jurusan_v', $data);
 }

 function msg($value='', $type=''){
    switch($type){
        
        case 'warning':
            echo '<div class="p-3 mb-2 bg-warning text-dark text-center">'.$value.'</div>';
            break; 
        case 'success':
            echo '<div class="p-3 mb-2 bg-primary text-white text-center">'.$value.'</div>';
            break;
        case 'danger':
            echo '<div class="p-3 mb-2 bg-danger text-white text-center">'.$value.'</div>';
            break;
        default:
            echo '<div class="p-3 mb-2 bg-dark text-white text-center">'.$value.'</div>';
            break;
    }

}


}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */