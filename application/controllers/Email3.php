<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email3 extends CI_Controller {

    public function index() {
        $this->load->view('email_intv');
    }

    public function send(){
        $subject = 'Application for Programmmer Registration By - '.$this->input->post('nama');
        $programming_languages = implode(", ", $this->input->post('programming_languages'));
        $sender = $this->input->post('sender_email');
        $receiver = $this->input->post('receiver_email');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $pengalaman = $this->input->post('pengalaman');
        $informasi = $this->input->post('informasi');
        $password = $this->input->post('password');
        $file_data = $this->upload_file();

        if(is_array($file_data)) {
            $data = array (
                'nama' => $nama,
                'alamat' => $alamat,
                'email' => $sender,
                'programming_languages' => $programming_languages,
                'pengalaman' => $pengalaman,
                'no_hp' => $no_hp,
                'informasi' => $informasi
            );

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => $sender,
                'smtp_pass' => $password,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");  

            $this->email->from($sender, $nama);
            $this->email->to($receiver);
            $this->email->subject($subject);
            $this->email->message($this->load->view('email_msg', $data, true));
            $this->email->attach($file_data['full_path']);
            if($this->email->send()) {
                
                if(delete_files($file_data['file_path'])){
                    $this->session->set_flashdata('success', 'Email terkirim');
                    redirect('email3');
                }
            } else {
                $this->session->set_flashdata('error', 'Email atau Password Salah');
                redirect('email3');
            }
        } else {
            $this->session->set_flashdata('message', 'Terjadi error ketika melampirkan file');
        }

    }

    public function upload_file(){
        $config['upload_path'] = APPPATH . "uploads/";
        $config['allowed_types'] = 'doc|docx|pdf';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('file')) {
            return $this->upload->data();
        } else {
            return $this->upload->display_errors();
        }

    }
}
