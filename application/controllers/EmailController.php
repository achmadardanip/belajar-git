<?php

class EmailController extends MY_Controller {

    function __construct(){
        parent:: __construct();
    }

    public function index(){
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);

        if(isset($_POST['submit'])){
            if(empty($name)){
                $this->msg('Nama wajib diisi', 'danger');
            } else if(empty($email)){
                $this->msg('Email wajib diisi', 'danger');
            } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $this->msg('Gagal karena email tidak valid', 'danger');
            } else{
                if($this->send_mail($name, $email)){
                    $result = $this->msg('Email berhasil dikirim', 'success');
                } else {
                    $result = $this->msg('Email gagal dikirim', 'danger');
                }
            }
        }
    $this->load->view('email_rev_v');
    }

    public function send_mail($name='', $email=''){
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'achmadardani7@gmail.com';
        $config['smtp_pass'] = 'zpstbbtgipovqusk';
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";

        $this->load->library('email', $config);
        $this->load->initialize($config);
        $this->load->library('parser');

        $data['name'] = $name;

        $body = $this->parser->parse('email_template', $data, true);

        $this->email->from('achmadardani7@gmail.com', 'no-reply');
        $this->email->to($email);
        $this->email->subject('Pemberitahuan Status Berlangganan Majalah BoBi');
        $this->email->message($body);
        $this->email->attach(base_url('uploads/Majalah_Bobo_Edisi_Mey_2020.docx'));

        //tempatkan di functionemail
        $this->output->set_header('content-type: text/css');
        $this->email->set_header('Content-Type', 'text/html');
        
        return $this->email->send();

        // if($this->email->send()){
        //     $this->msg('Kamu berhasil berlangganan, cek emailmu sekarang!');
        //     redirect('EmailController');
        // } else {
        //     echo $this->email->print_debugger();
        // }

    }
}

?>