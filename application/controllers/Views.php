<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Views extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('MM_Condition') != true){
			redirect(base_url("login"));
		}
		$this->load->model('User_model');

	}

	public function index()
	{
		$data['judul'] = 'Home | PerpusKU';
		$data['a'] = array('active',null,null,null,null,null);
		$data['b'] = array(null,null,null,null);

		$id = $this->input->get('id');
		$status = $this->input->get('status');
		if (!empty($id) && !empty($status)) {
			if ($status == 'visitor') {
				$where = array(
					'id_user' => $id,
					'waktu' => date('Y-m-d'),
					'activity' => 'visit online',
				);
				$cek = $this->User_model->cek($where,'tbl_activity');
				if ($cek == null) {
					$dt = array(
						'id_user' => $id,
						'activity' => 'visit online',
						'ket' => 'Login PerpusKU',
						'waktu' => date('Y-m-d'),
						'add_date' => date('Y-m-d H:i:s'),
						'update_date' => date('Y-m-d H:i:s'),
						'point' => 1,
						'status' => $this->session->userdata('MM_Status'),
					);
					$this->User_model->add_user($dt,'tbl_activity');
				}
			} else {
				$where = array(
					'id_user' => $id,
					'waktu' => date('Y-m-d'),
					'activity' => 'login admin',
				);
				$cek = $this->User_model->cek($where,'tbl_activity');
				if ($cek == null) {
					$dt = array(
						'id_user' => $id,
						'activity' => 'login admin',
						'ket' => 'Login PerpusKU',
						'waktu' => date('Y-m-d'),
						'add_date' => date('Y-m-d H:i:s'),
						'update_date' => date('Y-m-d H:i:s'),
						'point' => 0,
						'status' => $this->session->userdata('MM_Status'),
					);
					$this->User_model->add_user($dt,'tbl_activity');
				}
			}
		}


		$this->load->view('theme/head',$data);
		$this->load->view('theme/navbar');
		$this->load->view('theme/sidebar');
		$this->load->view('dash/index');
		$this->load->view('theme/js');
		$this->load->view('dash/index_js');
		$this->load->view('theme/foot');
    }
	
	public function koleksi()
	{
		$data['judul'] = 'Koleksi Buku | PerpusKU';
		$data['a'] = array(null,'active',null,null,null,null);
		$data['b'] = array(null,null,null,null);

		$this->load->view('theme/head',$data);
		$this->load->view('theme/navbar');
		$this->load->view('theme/sidebar');
		$this->load->view('buku/index');
		$this->load->view('theme/js');
		$this->load->view('buku/index_js');
		$this->load->view('theme/foot');
	}

	public function detail_buku()
	{
		$id = $this->input->get('id', true);
		// $id = base64_decode($id);
		$data['judul'] = $id.' | PerpusKU';
		$data['id'] = $id;

		$this->load->view('theme/head',$data);
		$this->load->view('buku/detail_buku/index');
		$this->load->view('theme/js');
		$this->load->view('buku/detail_buku/index_js');
		$this->load->view('theme/foot');
	}

	public function form_buku()
	{
		$data['judul'] = 'Form Buku | PerpusKU';
		$data['a'] = array(null,null,'active',null,null,null);
		$data['b'] = array('active',null,null,null);
		$status = $this->input->get('status');
		if (!empty($status)) {
			if ($status == 'berhasil') {
				$tampil = '<div class="alert bg-green alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Berhasil</strong>, Data berhasil disimpan !
							</div>';
			}else {
				$tampil = '<div class="alert bg-red alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Gagal</strong>, Terjadi kesalahan saat upload file yang berukuran >20 MB !
							</div>';
			}
		} else {
			$tampil = '';
		}
		$data['status'] = $tampil;

		$this->load->view('theme/head',$data);
		$this->load->view('theme/navbar');
		$this->load->view('theme/sidebar');
		$this->load->view('buku/form_buku/index');
		$this->load->view('theme/js');
		$this->load->view('buku/form_buku/index_js');
		$this->load->view('theme/foot');
	}

	public function peminjaman()
	{
		$data['judul'] = 'Data Peminjaman | PerpusKU';
		$data['a'] = array(null,null,null,'active',null,null);
		$data['b'] = array(null,null,null,null);

		$this->load->view('theme/head',$data);
		$this->load->view('theme/navbar');
		$this->load->view('theme/sidebar');
		$this->load->view('peminjaman/index');
		$this->load->view('theme/js');
		$this->load->view('peminjaman/index_js');
		$this->load->view('theme/foot');
	}

	public function aktivitas()
	{
		$data['judul'] = 'Aktivitas | PerpusKU';
		$data['a'] = array(null,null,null,null,'active',null);
		$data['b'] = array(null,null,null,'active');

		$this->load->view('theme/head',$data);
		$this->load->view('theme/navbar');
		$this->load->view('theme/sidebar');
		$this->load->view('history/aktivitas/index');
		$this->load->view('theme/js');
		$this->load->view('history/aktivitas/index_js');
		$this->load->view('theme/foot');
	}
	
    public function users()
	{
		$data['judul'] = 'User Admin | PerpusKU';
		$data['a'] = array(null,null,'active',null,null,null);
		$data['b'] = array(null,'active',null,null);

		$this->load->view('theme/head',$data);
		$this->load->view('theme/navbar');
		$this->load->view('theme/sidebar');
		$this->load->view('user/index');
		$this->load->view('theme/js');
		$this->load->view('user/index_js');
		$this->load->view('theme/foot');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
