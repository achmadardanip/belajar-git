<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rumus_m extends CI_Model {

    public function luaspersegipanjang($panjang, $lebar) {
        return $panjang * $lebar;
    }
}