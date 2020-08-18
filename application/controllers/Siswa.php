<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends MY_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('Student_m');
    }

    public function index() {
        $data['data_siswa'] = $this->Student_m->getSiswa()->result();
        $this->load->view('crud2/header_v');
        $this->load->view('crud2/data_siswa_v', $data);
        $this->load->view('crud2/footer_v');
    }

    public function tambah() {
        $this->load->view('crud2/header_v');
        $this->load->view('crud2/tambah_siswa');
        $this->load->view('crud2/footer_v');

    }

    public function simpan() {
        $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required|max_length[255]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[8]|max_length[255]');
        if ($this->form_validation->run()==true) {
        $data['nisn'] = $this->security->xss_clean($this->input->post('nisn'));
        $data['nama_siswa'] = $this->security->xss_clean($this->input->post('nama_siswa'));
        $data['alamat'] = $this->security->xss_clean($this->input->post('alamat'));

        $this->Student_m->simpan_siswa($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Ditambahkan
        </div>');
        redirect('siswa');
        } else {
            $this->load->view('crud2/header_v');
            $this->load->view('crud2/tambah_siswa');
            $this->load->view('crud2/footer_v');
        }
    }

    public function edit($id_siswa) {
        $id_siswa = $this->uri->segment(3);
        $data['data_siswa'] = $this->Student_m->edit_siswa($id_siswa);
        $this->load->view('crud2/header_v');
        $this->load->view('crud2/edit_siswa_v', $data);
        $this->load->view('crud2/footer_v');
    }

    public function update() {
        $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required|max_length[255]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[8]|max_length[255]');
        if ($this->form_validation->run()==true) {
        $id_siswa['id_siswa'] = $this->input->post('id_siswa');
        $nisn = $this->security->xss_clean($this->input->post('nisn'));
        $nama_siswa = $this->security->xss_clean($this->input->post('nama_siswa'));
        $alamat = $this->security->xss_clean($this->input->post('alamat'));

        $data = array(
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'alamat' => $alamat
        );

        $this->Student_m->update_siswa($data, $id_siswa);

        $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Diupdate
        </div>');

        redirect('siswa');
        } else {
            $id_siswa = $this->input->post('id_siswa');
            $data['data_siswa'] = $this->Student_m->edit_siswa($id_siswa);
            $this->load->view('crud2/header_v');
            $this->load->view('crud2/edit_siswa_v', $data);
            $this->load->view('crud2/footer_v');
        }
    }

    public function hapus($id_siswa) {
        $id['id_siswa'] = $this->uri->segment(3);
        $this->Student_m->hapus_siswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus
        </div>');
        redirect('siswa');

    }

}