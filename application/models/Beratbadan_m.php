<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Beratbadan_m extends CI_Model {
    public function __construct() {
		parent::__construct();
    }
    
    public function beratbadanideal($tinggi,$berat) {
        $tinggi = $tinggi/100;
        $bmi = $berat/($tinggi*$tinggi);
        if($bmi > 27)
			return "Obesitas";
		else if($bmi >= 25)
			return "Overweight";
		else if($bmi >= 18)
			return "Normal";
		else
			return "Underweight";        
	}
}


