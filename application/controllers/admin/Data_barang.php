<?php

class Data_barang extends CI_Controller{

    public function index(){
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('tokoonline_admin/header_v');
        $this->load->view('tokoonline_admin/sidebar_v');
        $this->load->view('admin_tokoonline/data_barang', $data);
        $this->load->view('tokoonline_admin/footer_v');
    }

    public function tambah_aksi(){
        $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required|xss_clean');
        $this->form_validation->set_rules('harga', 'Harga', 'numeric|trim|required|xss_clean');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required|xss_clean');
        if(empty($_FILES['gambar']['name'])){
            $this->form_validation->set_rules('gambar', 'Gambar Produk', 'required');
        }

        if ($this->form_validation->run() == FALSE)
        {   //validation fails
            echo validation_errors();
        } else {
            $nama_brg = $this->input->post('nama_brg');
            $keterangan = $this->input->post('keterangan');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $gambar = $_FILES['gambar']['name'];
            if($gambar = ''){} else {
                $config['upload_path'] = './uploads';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                $this->load->library('upload', $config);

                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar gagal diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array(
                'nama_brg' => $nama_brg,
                'keterangan' => $keterangan,
                'kategori' => $kategori,
                'harga' => $harga,
                'stok' => $stok,
                'gambar' => $gambar
            );

            $this->model_barang->tambah_barang($data, 'tb_barang');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Berhasil Ditambahkan
            </div>');
            redirect('admin/data_barang/index');

        }
    }

    public function edit($id){
        $where = array('id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $this->load->view('tokoonline_admin/header_v');
        $this->load->view('tokoonline_admin/sidebar_v');
        $this->load->view('admin_tokoonline/edit_barang', $data);
        $this->load->view('tokoonline_admin/footer_v');
    }

    public function update(){
        // $this->form_validation->set_rules('nama_brg', 'Nama Barang', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required|xss_clean');
        // $this->form_validation->set_rules('harga', 'Harga', 'numeric|trim|required|xss_clean');
        // $this->form_validation->set_rules('stok', 'Stok', 'trim|required|xss_clean');

        // if ($this->form_validation->run() == FALSE){
        //     $this->edit($id);
        //     redirect('admin/data_barang/edit'.$id);
        // } else {
            $id_brg = $this->input->post('id_brg');
            $nama_brg = $this->input->post('nama_brg');
            $keterangan = $this->input->post('keterangan');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $gambar = $_FILES['gambar'];
            if($gambar = ''){}else{
                $config['upload_path'] = '.uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar gagal diupload";
                } else {
                    $gambar = $this->upload->data('file_name');
                }
            }

            $data = array (
            'nama_brg'=> $nama_brg,
            'keterangan' => $keterangan,
            'kategori' => $kategori,
            'harga' => $harga,
            'stok' => $stok,
            'gambar' => $gambar
            );

            $where = array(
                'id_brg' => $id_brg
            );

            $this->model_barang->update_data($where,$data,'tb_barang');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Data Berhasil Diupdate
            </div>');
            redirect('admin/data_barang/index');
        // }

    }

    public function hapus($id){
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where,'tb_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Data Berhasil Dihapus
        </div>');
        redirect('admin/data_barang/index');
    }

}