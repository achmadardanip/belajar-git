<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
        $this->load->model('Kelas_m');
        $this->load->model('Jurusan_m');
    }
    
    //Halaman awal saat tombol lihat jurusan di klik maka akan menjalankan method ini
    public function index()
    {
        // $this->load->library('pagination');
        // $limit = !empty($this->input->get("limit")) ? $this->input->get("limit") : 5;
        // $limit = $limit == "all" ? 0 : $limit;
        // $search = !empty($this->input->get("search")) ? $this->input->get("search") : "";
        // $sorting = !empty($this->input->get('sort')) ? $this->input->get('sort') : "";
        // $data['data'] = $this->Kelas_m->getKelas("", 0, 0, $search)->result_array();
        // $config['base_url'] = site_url('Kelas').'?sort='.$sorting.'&limit='.$limit.'&search='.$search;
        // $config['total_rows'] = count($data['data']);
        // $config['per_page'] = $limit;
        // $config['first_link']       = 'First';
        // $config['last_link']        = 'Last';
        // $config['next_link']        = 'Next';
        // $config['prev_link']        = 'Prev';
        // $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close']   = '</ul></nav></div>';
        // $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close']    = '</span></li>';
        // $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        // $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        // $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close']  = '</span>Next</li>';
        // $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close']  = '</span></li>';
        // $config['page_query_string'] = true;
  

        // $this->pagination->initialize($config);
        // $num_link = $this->input->get('per_page');
        // $data['num_link'] = $num_link;
        // if(!empty($sorting)){
        //     $sorting = urldecode($sorting);
        //     $sorting = explode(",", $sorting);
        //     $this->db->order_by($sorting[0], $sorting[1]);
            
        // }

        // $data['data'] =  $this->Kelas_m->getKelas("", $limit, $num_link, $search)->result_array();
        // $data['search'] = $search;
        // $data['limit'] = $limit;
        // $data['limit_options'] = array(5=>5, 7=>7, 'all'=>"Semua");
        // $data['sorting'] = $sorting;
        // $data['pagination'] = $this->pagination->create_links();
        $this->template('Kelas/kelas_v');

        }
    
    public function data_kelas() {
        $get = $this->input->get();
        $limit = !empty($get['limit']) ? $get['limit'] : 0;
        $search = !empty($get['search']) ? $get['search'] : "";
        $offset = !empty($get['offset']) ? $get['offset'] : 0;
        $sort = !empty($get['sort']) ? $get['sort'] : "kode_kelas";
        $order = !empty($get['order']) ? $get['order'] : "asc";

        $data['total'] = $this->Kelas_m->getKelas("", 0, 0, $search)->num_rows();

        $this->db->order_by($sort, $order);
        $data['rows'] = $this->Kelas_m->getKelas("", $limit, $offset, $search)->result_array();

        echo json_encode($data);
    }


    // method ini akan dijalankan menu tambah kelas di klik
    public function tambah(){
        //disini kita meload jurusan_m untuk mendapatkan data id jurusan
        $data['data'] = $this->Jurusan_m->getJurusan()->result_array();	
        //meload view tambah_kelas_v yang berisis form input data	
		$this->template('kelas/tambah_kelas_v', $data);
    }
    
    //method in berfungsi untuk memproses data2 inputan pada form di view tambah_kelas_v
    public function submit_tambah(){

        $this->load->library('form_validation');

        //data2 inputan akan divalidasi tidak boleh kosong
        $this->form_validation->set_rules('kode_kelas', 'Kode Jurusan', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama kelas', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

		$post = $this->security->xss_clean($this->input->post());

        //jika rules tidak terpenuhi maka masih berada di halaman tambah_kelas 
        //dan menampikan pesan error di halaman tsb
        if ($this->form_validation->run() == FALSE)
        {
            $this->template('kelas/tambah_kelas_v');
        }
        //jika rules terpenuhi, data2 inputan dijadikan array
        else
        {
        	$data = ["kode_kelas" => $post["kode_kelas"], "nama_kelas" => $post["nama_kelas"], "id_jurusan" => $post["nama_jurusan"], "created_datetime" => date('Y-m-d H:i:s') ];
        	$insert = $this->Kelas_m->insertKelas($data); //array tsb akan dikirim ke method insertKelas untuk diproses insert ke db

        	if($insert){ //jika ada data yang terinput

                //maka buat sebuah flash data untuk menampilkan pesan "berhasil menambah kelas"
	            $this->session->set_flashdata('success_submit', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Berhasil menambah kelas
                </div>');
	            redirect(site_url('Kelas')); //lalu jika berhasil di redirect ke halaman index beserta flashdata ada di halaman index

        	}else{ //jika tidak ada data yng terinput maka buat flas data untuk menampilkan pesan eror
        		$this->session->set_flashdata('error_submit', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Gagal menambah kelas
                </div>');
        		$this->template('kelas/tambah_kelas_v'); //jika berhasil maka di redirect ke halaman tambah_kelas beserta flash data ditampilkan di halaman tambah_kelas
        	}

        }
    }
    
    //method ini dijalankan apabila tombol edit di klik
    //ketika di klik maka akan muncul tampilan edit_kelas, di edit_kelas ini sudah berisi data2 yg diinput
    public function edit($id) {
        $data['get'] = $this->Jurusan_m->getJurusan()->result_array();
        $data['data'] = $this->Kelas_m->getKelas($id)->row_array(); //mendapatkan data yang sudah diinput tapi didapatkannya berdasarkan id/per data
		$this->template('kelas/edit_kelas_v', $data); //meload view edit_kelas_v beserta membawa $data yang berisi data per id/per row
    }
    
    //method ini akan dijalankan apabila tombol submit di view edit di klik
    public function submit_edit(){

        $this->load->library('form_validation');

        //data2 inputan akan divalidasi terlebi dahulu
        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'Id jurusan', 'required');


		$post = $this->security->xss_clean($this->input->post());
		$id = $post['id']; 

        //jika rules tidak terpenuhi, maka masih di halaman edit dengan membuka kembali method edit berdasarkan id
        if ($this->form_validation->run() == FALSE)
        {
            
            $this->edit($id);
        }
        else //jika rules terpenuhi
        {
            //maka data2 inputan akan dijadikan array
        	$data = ["kode_kelas" => $post["kode_kelas"], "nama_kelas" => $post["nama_kelas"], "id_jurusan" => $post["nama_jurusan"],"updated_datetime" => date('Y-m-d H:i:s')];
            
            //data2 array dan id akan dikirim ke method updateKelas
        	$update = $this->Kelas_m->updateKelas($id, $data);

            if($update){ //jika ada data yang di update
                
                //maka akan membuat flas data berhasil mengubah kelas
	            $this->session->set_flashdata('success_submit', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Berhasil mengubah kelas
                </div>');
	            redirect(site_url('Kelas')); //flash data ini akan ditampilkan di halaman index

        	}else{ //jika tidak ada data yg diinput maka akan membuat flash data gagal mengubah kelas
        		$this->session->set_flashdata('error_submit', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Gagal mengubah kelas
                </div>');
        		
        		$this->edit($id); //flash data ini akan ditampilkan di dalam halaman edit_kelas_v yg dimana halamn tsb ditampilkan berdasarkan id
        	}

        }
    }

    //Method ini akan dijalankan apabila button hapus di klik, button hapus sendiri mengirimkan parameter id
    public function hapus($id){

        //memanggil method deleteKelas dengan parameter id
		$delete = $this->Kelas_m->deleteKelas($id);

    	if($delete){ //jika ada data yang terhapus

            //Maka akan membuat flash data berhasil
            $this->session->set_flashdata('success_submit', '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Berhasil menghapus kelas
            </div>');
            

    	}else{ //jika tidak ada data yang terhapus maka akan membuat flash data gagal menghapus data
    		$this->session->set_flashdata('error_submit', '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Gagal menghapus kelas
            </div>');
    		
    	}
    	redirect(site_url('Kelas')); //flash data berhasil akan di tampilkan di halaman index
    }

    public function detail($id) {
        $data['data'] = $this->Kelas_m->getKelas($id)->row_array();
        $this->template('kelas/detail_kelas_v', $data);


    }
    
}