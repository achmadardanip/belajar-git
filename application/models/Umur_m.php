<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Umur_m extends CI_Model {
    public function __construct() {
		parent::__construct();
    }

    public function umur($th_lahir) {
        $th_lahir = strtotime($th_lahir);
        $now = time();
        return timespan($th_lahir, $now, 1);
    }
}