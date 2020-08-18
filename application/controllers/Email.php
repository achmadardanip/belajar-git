<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

     public function send()
     {
          $config['mailtype'] = 'text';
          $config['protocol'] = 'smtp';
          $config['smtp_host'] = 'smtp.mailtrap.io';
          $config['smtp_user'] = 'cbbd272a9065a5';
          $config['smtp_pass'] = '0d4625f170e4a5';
          $config['smtp_port'] = 2525;
          $config['newline'] = "\r\n";

          $this->load->library('email', $config);

          $this->email->from('no-reply@bahasaweb.com', 'Achmad Ardani Prasha');
          $this->email->to('admin@bahasaweb.com');
          $this->email->subject('Contoh Kirim Email Dengan Codeigniter');
          $this->email->message('Contoh pesan yang dikirim dengan codeigniter');
          $this->email->attach('./assets/attachment.docx');

          if($this->email->send()) {
               echo 'Email berhasil dikirim';
          }
          else {
               echo 'Email tidak berhasil dikirim';
               echo '<br />';
               echo $this->email->print_debugger();
          }

     }

}