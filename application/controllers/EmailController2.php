<?php

class EmailController2 extends MY_Controller{

    function __construct(){
        parent:: __construct();
        $this->load->model('Cv_m');
        $this->load->model('Auth_lamaran_m');
    }

    public function index(){
        $nama_awal = $this->input->post('nama_awal');
        $nama_akhir = $this->input->post('nama_akhir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $deskripsi = $this->input->post('deskripsi');
        $hobi = $this->input->post('hobi');
        $file_data = $this->upload_file();
        $foto_data = $this->upload_file_foto();
        $informasi = $this->input->post('informasi');

        if(isset($_POST['submit'])){
            if(empty($nama_awal)){
                $this->msg('Nama awal wajib diisi', 'danger');
            } else if(empty($nama_akhir)){
                $this->msg('Nama akhir wajib diisi', 'danger');
            } else if(empty($tanggal_lahir)){
                $this->msg('Tanggal lahir wajib diisi', 'danger');
            }  else if(empty($alamat)){
                $this->msg('Alamat wajib diisi', 'danger');
            } else if(empty($deskripsi)){
                $this->msg('Deskripsi wajib diisi', 'danger');
            } else if(empty($hobi)){
                $this->msg('Hobi wajib diisi', 'danger');
            } else if(empty($file_data)){
                $this->msg('Lampiran wajib diisi', 'danger');
            } else if(empty($foto_data)){
                $this->msg('Foto wajib diisi', 'danger');
            } else if(empty($informasi)){
                $this->msg('Informasi tambahan wajib diisi', 'danger');
            }  else{
                if($this->send_mail($nama_awal, $nama_akhir, $tanggal_lahir, $alamat, $deskripsi, $hobi, $foto_data, $file_data, $informasi)){
                   if(delete_files($file_data['file_path'])){
                        $this->session->set_flashdata('success', 'Lamaran terkirim. Berikut Profil Kamu');
                        redirect('profil');
                    } else {
                        $this->session->set_flashdata('error', 'Lamaran gagal terkirim');
                        redirect('emailcontroller2');
                    }

                }
            }
        }

        $this->load->view('form_lamaran_v');
    }

    public function send_mail($nama_awal='', $nama_akhir='', $tanggal_lahir='', $alamat='', $deskripsi='', $hobi='', $foto_data, $file_data, $informasi=''){
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


        if(is_array($file_data)) {
            $data = array(
                'nama_awal' => $nama_awal,
                'nama_akhir' => $nama_akhir
            );

            $body = $this->parser->parse('email_job_tmp', $data, true);

            $penerima = $this->session->userdata('email');
            $this->email->from('achmadardani7@gmail.com', 'no-reply');
            $this->email->to($penerima);
            $this->email->subject('Pemberitahuan Status Lamaran Pekerjaan');
            $this->email->message($body);
            $this->email->attach($file_data['full_path']);

            $foto_data = $_FILES['foto']['name'];
            $file_data = $_FILES['file']['name'];
            $this->Cv_m->insert_data($nama_awal, $nama_akhir, $tanggal_lahir, $alamat, $deskripsi, $hobi, $foto_data, $file_data, $informasi);
            return $this->email->send();
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
        } else 
        {
            return $this->upload->display_errors();
        }

    }

    public function upload_file_foto(){
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = FALSE;

        $this->upload->initialize($config);
        $this->load->library('upload');
        if(!empty($_FILES['foto']['name'])){
            if($this->upload->do_upload('foto')){
                $foto = $this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images'.$foto['file_name'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '50%';
                $config['width'] = 150;
                $config['height'] = 400;
                $config['new_image'] = '.assets/images/'.$foto['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                return $foto_data = $foto['file_name'];
                // $this->Cv_m->simpan_upload($foto);
                // return $this->upload_file_foto();
                echo "Image berhasil di upload";
            } else {
                echo "Image yang diupload kosong";
            }
        }
    }
}