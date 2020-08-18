<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Jurusan_m');
	}

	public function index()
	{
		// $this->load->library('pagination');
		// $limit = !empty($this->input->get("limit")) ? $this->input->get("limit") : 2;
		// $limit = $limit == "all" ? 0 : $limit;
		// $search = !empty($this->input->get("search")) ? $this->input->get("search") : "";
		// $sorting = !empty($this->input->get('sort')) ? $this->input->get('sort') : "";
		// $data['data'] = $this->Jurusan_m->getJurusan("", 0, 0, $search)->result_array();
		// // echo $this->db->last_query();
		// $config['base_url'] = site_url('Jurusan').'?sort='.$sorting.'&limit='.$limit.'&search='.$search;
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
		// 	$sorting = urldecode($sorting);
		// 	$sorting = explode(",", $sorting);
		// 	$this->db->order_by($sorting[0], $sorting[1]);
		// }
		// $data['data'] =  $this->Jurusan_m->getJurusan("", $limit, $num_link, $search)->result_array();
		// $data['search'] = $search;
		// $data['limit'] = $limit;
		// $data['limit_options'] = array(5=>5, 7=>7, 'all'=>"Semua");
		// $data['sorting'] = $sorting;
		// $data['pagination'] = $this->pagination->create_links();
		
		$this->template('jurusan/jurusan_v');
	}

	// public function index()
	// {

	// 	$data['data'] = $this->Jurusan_m->getJurusan()->result_array();
	// 	// echo $this->db->last_query();
		
	// 	$this->template('jurusan/jurusan_v', $data);
	// }

	public function data_jurusan() {
        $get = $this->input->get();
        $limit = !empty($get['limit']) ? $get['limit'] : 0;
        $search = !empty($get['search']) ? $get['search'] : "";
        $offset = !empty($get['offset']) ? $get['offset'] : 0;
        $sort = !empty($get['sort']) ? $get['sort'] : "kode_jurusan";
        $order = !empty($get['order']) ? $get['order'] : "asc";

        $data['total'] = $this->Jurusan_m->getJurusan("", 0, 0, $search)->num_rows();

        $this->db->order_by($sort, $order);
        $data['rows'] = $this->Jurusan_m->getJurusan("", $limit, $offset, $search)->result_array();

        echo json_encode($data);
	}
	
	public function test()
	{
		
		$data = $this->Jurusan_m->getJurusan()->result();

		foreach ($data as $k => $v) {
			echo "kode jurusan :". $v->kode_jurusan;
			echo "<br/>";
			echo "nama jurusan :". $v->nama_jurusan;
			echo "<br/>";
			echo "=====================================";
			echo "<br/>";
		}

		// echo "kode jurusan :". $data->kode_jurusan;
		// echo "<br/>";
		// echo "nama jurusan :". $data->nama_jurusan;
		// echo "<br/>";
		// echo "=====================================";
		// echo "<br/>";
		
		
	}

	public function tambah(){
		$this->template('jurusan/tambah_jurusan_v');
	}

	public function submit_tambah(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');
		$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

		$post = $this->security->xss_clean($this->input->post());

        if ($this->form_validation->run() == FALSE)
        {
            $this->template('jurusan/tambah_jurusan_v');
        }
        else
        {
        	$data = ["kode_jurusan" => $post["kode_jurusan"], "nama_jurusan" => $post["nama_jurusan"], "created_datetime" => date('Y-m-d H:i:s') ];
        	$insert = $this->Jurusan_m->insertJurusan($data);

        	if($insert){

	            $this->session->set_flashdata('success_submit', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Berhasil menambah jurusan
                </div>');
	            redirect(site_url('Jurusan'));

        	}else{
        		$this->session->set_flashdata('error_submit', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Gagal menambah jurusan
                </div>');
        		$this->template('jurusan/tambah_jurusan_v');
        	}

        }
	}

	public function edit($id){

		$data['data'] = $this->Jurusan_m->getJurusan($id)->row_array();
		$this->template('jurusan/edit_jurusan_v', $data);

	}

	public function submit_edit(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required');
		$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

		$post = $this->security->xss_clean($this->input->post());
		$id = $post['id'];

        if ($this->form_validation->run() == FALSE)
        {
            
            $this->edit($id);
        }
        else
        {
        	$data = ["kode_jurusan" => $post["kode_jurusan"], "nama_jurusan" => $post["nama_jurusan"]];
        	
        	$update = $this->Jurusan_m->updateJurusan($id, $data);

        	if($update){

	            $this->session->set_flashdata('success_submit', '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Berhasil mengubah jurusan
                </div>');
	            redirect(site_url('Jurusan'));

        	}else{
        		$this->session->set_flashdata('error_submit', '<div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Gagal mengubah jurusan
                </div>');
        		
        		$this->edit($id);
        	}

        }
	}

	public function hapus($id){

		$delete = $this->Jurusan_m->deleteJurusan($id);

    	if($delete){

            $this->session->set_flashdata('success_submit', '<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Berhasil menghapus jurusan
			</div>');
            

    	}else{
    		$this->session->set_flashdata('error_submit', '<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Gagal menghapus jurusan
			</div>');
    		
    	}
    	redirect(site_url('Jurusan'));
	}
	
	public function detail($id) {
		$data['data'] = $this->Jurusan_m->getJurusan($id)->row_array();
		$this->template('jurusan/detail_jurusan_v', $data);
	}


}

/* End of file Tambah_kelas.php */
/* Location: ./application/controllers/Tambah_kelas.php */