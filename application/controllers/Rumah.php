<?php

class Rumah extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		$this->load->model('Autentikasi_m');
        $this->Autentikasi_m->cek_login();
        $this->encryption->initialize(
            array(
            'cipher' => 'aes-192',
            'mode' => 'ofb',
            'key' => 'PasswordFish9909?')
        );

        if(!$this->session->is_login)
        {
			redirect('log/index');
		}
    }
    
    public function index(){
        $data['user'] = $this->Autentikasi_m->tampil_data();
        $this->load->view('rumah', $data);
    }

    public function detail($id){
        $real_id = $this->encryption->decrypt(str_replace(['garing', 'samadengan', 'plus'], ['/', '=', '+'], $id));
        $detail = $this->Autentikasi_m->detail_data($real_id);
        $data['detail'] = $detail;
        $this->load->view('rumah_detail', $data);
    }

    public function edit_user(){
        $id = $this->uri->segment(3);
        $real_id = $this->encryption->decrypt(str_replace(['garing', 'samadengan', 'plus'], ['/', '=', '+'], $id));
        $edit = $this->Autentikasi_m->edit_user($real_id);
        $data['edit'] = $edit;
        $this->load->view('rumah_edit', $data);
    }

    public function update(){
        $this->form_validation->set_rules('username', 'username','trim|required|min_length[1]|max_length[15]|callback_check_user_username|xss_clean');
        $this->form_validation->set_rules('nama', 'nama','trim|required|min_length[1]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('email', 'email','trim|valid_email|required|min_length[10]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('no_hp', 'nomor handphone','trim|numeric|required|min_length[10]|max_length[15]|xss_clean');
        $this->form_validation->set_rules('alamat', 'alamat','trim|required|min_length[10]|max_length[255]|xss_clean');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin','required');

        if ($this->form_validation->run()==true) {
            $username = $this->input->post('username');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_hp = $this->input->post('no_hp');
            $emailhide = $this->input->post('email_hidden');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $id['id'] = $this->input->post('id');


            if(!empty($_FILES['foto']['name'])){
                $foto = $this->uploadImage();
            } else {
                $foto = $this->input->post('old_image');
            }

            $data['user'] = $this->Autentikasi_m->data_email();
            $a = false;
            foreach($data['user'] as $usr){
                $email_dekrip = $usr->email;
                $email_dekripan = $this->encryption->decrypt($email_dekrip);
                if($email == $email_dekripan && $emailhide != $email){
                    $a = true;
                }
            }
            if ($a==true){
                $id = $this->input->post('id');
                $this->session->set_flashdata('email_error', 'Email sudah terdaftar');
                redirect('rumah/edit_user/'.str_replace(['/', '=', '+'],['garing', 'samadengan', 'plus'], $this->encryption->encrypt($id)));
            } else {
                $email = $this->encryption->encrypt($email);
                $data = array(
                    'username' => $username,
                    'nama' => $nama,
                    'email' => $email,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                    'jenis_kelamin' => $jenis_kelamin,
                    'foto' => $foto
                );
    
                $this->Autentikasi_m->update_user($data, $id);
                $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Data Berhasil Diupdate
                </div>');
                redirect('rumah');
            }
        } else {
            $id = $this->input->post('id');
            $data['edit'] = $this->Autentikasi_m->edit_user($id);
            $this->load->view('rumah_edit', $data);
        }

        

    }


    function check_user_username($username) {        
        if($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->Autentikasi_m->check_unique_user_username($id, $username);
        if($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_user_username', 'Username must be unique');
            $response = false;
        }
        return $response;
    }
    

    public function hapus_user($id) {
        $id = $this->uri->segment(3);
        $id_real = $this->encryption->decrypt(str_replace(['garing', 'samadengan', 'plus'], ['/', '=', '+'], $id));
        $query = $this->Autentikasi_m->hapus($id_real);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus
        </div>');
        redirect('rumah');

    }

    private function uploadImage(){
        $config['upload_path']          = './assets/foto';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data("file_name");
        }
    
        return "default.jpg";
    }

    public function detail_profil(){
        $this->load->view('detail_profil');
    }


}