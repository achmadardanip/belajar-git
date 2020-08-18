<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email2 extends CI_Controller {

    public function index(){
        $this->load->view('email_v');
    }

    public function send_mail() {
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('to_email', 'To', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('email_v');
        } else {
            $subject = 'Pemberitahuan Status Berlangganan Majalah Bobo';
            $message = 'Selamat, Anda Telah Berlangganan Majalah Bobo';
            $sender_email = $this->input->post('user_email');
            $user_password = $this->input->post('user_password');
            // $receiver_email = $this->input->post('to_email');
            $nama = $this->input->post('name');
            // $subject = $this->input->post('subject');
            // $message = $this->input->post('message');
            if (isset($_FILES['file'])) {
                $file_data = $this->upload_file();
            }

            $config['mailtype'] = 'html';
            $config['charset'] = 'utf-8';
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = 465;
            $config['smtp_user'] = 'achmadardani7@gmail.com';
            $config['smtp_pass'] = 'zpstbbtgipovqusk';
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";

            $this->load->library(['email', 'parser']);
            $this->email->initialize($config);

            $data['message'] = $message;
            $data['nama'] = $nama;
            $data['subject'] = $subject;

            $body = $this->parser->parse('email_subs', $data, true);

            // Sender email address
            $this->email->from('achmadardani7@Gmail.com', 'no-reply');
            // Receiver email address
            $this->email->to('achmadardani7@Gmail.com');
            // Subject of email
            $this->email->subject($subject);
            // Message in email
            $this->email->message($body);
            // attachment in email
            if(isset($file_data["full_path"]) && $file_data["full_path"] != ""){
                $this->email->attach($file_data['full_path']);
            }
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Email berhasil terkirim');
                redirect('email2');
            } else {
                $this->session->set_flashdata('error', 'Email atau Password Salah!');
                redirect('email2');


            }
            // $this->load->view('email_v', $data);
        }
    }

    public function upload_file(){
        $config['upload_path'] = APPPATH . "uploads/";
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('file')) {
            return $this->upload->data();
        } else {
            return $this->upload->display_errors();
        }
    }


}