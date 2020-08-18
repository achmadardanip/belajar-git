<?php

class Autentikasi_m extends CI_Model {

    public function __construct()
	{
        parent::__construct();
        $this->load->library('user_agent');
    }
    
    public function register($table, $data){
        $this->db->insert($table,$data);
    }

    public function tampil_data() {
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('t_users');
        return $query;
    }

    public function login_user($username,$password){
        $query = $this->db->get_where('t_users',array('username'=>$username));
        
        if($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('password',$password);
                $this->session->set_userdata('id', $data_user->id);
                $this->session->set_userdata('nama',$data_user->nama);
                $this->session->set_userdata('email', $data_user->email);
                $this->session->set_userdata('jenis_kelamin',$data_user->jenis_kelamin);
                $this->session->set_userdata('no_hp', $data_user->no_hp);
                $this->session->set_userdata('alamat', $data_user->alamat);
                $this->session->set_userdata('foto',$data_user->foto);
                $this->session->set_userdata('is_login',TRUE);
                
                if ($this->agent->is_mobile())
                {
                    $agent = $this->agent->mobile();
                }
                else
                {
                    $agent = 'PC/Laptop';
                }
                $wkt = date("Y/m/d H:i:s");
                $id = $this->session->userdata('id');
                $ip = $this->input->ip_address();
                $waktu = $wkt;
                $os = $this->agent->platform();
                $device = $agent;
                $browser = $this->agent->browser();
                $data = array(
                    'id' => $id,
                    'ip_address' => $ip,
                    'waktu_login' => $waktu,
                    'os' => $os,
                    'device' => $device,
                    'browser' => $browser
                );
                $this->insert_log($data);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function cek_login(){
        if(empty($this->session->userdata('is_login'))) {
            redirect('log');
        }
    }

    public function insert_log($data){
        $this->db->insert('login_log',$data);
    }

    public function detail_data($id = '') {
        if(!empty($id)){
            $query = $this->db->get_where('t_users', array('id' => $id))->row(); // SELECT * FROM t_siswa WHERE id = $id secara per row
            return $query;
        }
    }

    public function edit_user($id='') {
        if(!empty($id)){
            $query = $this->db->where('id', $id)->get('t_users');
            return $query->row();
        }
    }

    public function update_user($data, $id) {
        return $this->db->update('t_users', $data, $id);
    }

    public function hapus($id = '') {
        if(!empty($id)){
            $row = $this->db->where('id',$id)->get('t_users')->row();
            unlink('assets/foto/'.$row->foto);
            $this->db->where('id', $id);
            $this->db->delete('t_users');
            return true;
        }
         
    }

    function check_unique_user_username($id = '', $username) {
        $this->db->where('username', $username);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get('t_users')->num_rows();
    }

    public function data_email(){
        $this->db->select('*'); 
        $this->db->from('t_users');   
        return $this->db->get()->result();
    }

    public function save_pass($id){
        $pass = $this->input->post('new-password');
        $pass_hash = password_hash($pass,PASSWORD_DEFAULT);
        $data = array(
            'password' => $pass_hash
        );
        $this->db->where('id', $id);
        $this->db->update('t_users',$data);
    }

    public function cek_old($pass_old, $id){
        $query = $this->db->get_where('t_users', array('id'=>$id));
        if($query->num_rows() > 0){
            $data_user = $query->row();
            if(password_verify($pass_old, $data_user->password)){
                return TRUE;
            } else{
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function update_reset_key($reset_key, $username){
        $this->db->where('username',$username);
        $data = array('reset_password' => $reset_key);
        $this->db->update('t_users', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }

    }

    public function reset_password($reset_key, $password){
        $this->db->where('reset_password', $reset_key);
        $data = array('password' => $password);
        $this->db->update('t_users', $data);
        return ($this->db->affected_rows()>0) ? TRUE : FALSE;
    }

    public function check_reset_key($reset_key){
        $this->db->where('reset_password', $reset_key);
        $this->db->from('t_users');
        return $this->db->count_all_results();
    }

    public function check_username_exist(){
        $this->db->select('username');
        $this->db->from('t_users');
        return $this->db->get()->result();
    }

    
}