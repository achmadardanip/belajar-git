<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bunga extends CI_Controller {
	
	public function jenis() {		
		echo "Bunga itu merupakan jenis " . $this->uri->segment('3');
		
    }
    
    public function data(){		
		echo "Segment 1 = ".$this->uri->segment('1');
		echo "<br/>";
		echo "Segment 2 = ".$this->uri->segment('2');
		echo "<br/>";
		echo "Segment 3 = ".$this->uri->segment('3');
		echo "<br/>";
		echo "Segment 4 = ".$this->uri->segment('4');
		echo "<br/>";
		echo "Segment 5 = ".$this->uri->segment('5');
	}
}
