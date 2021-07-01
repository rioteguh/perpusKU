<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('User_model');
		$this->load->model('Buku_model');
		$this->load->model('Aktivitas_model');
	}

	public function index()
	{
		if($this->session->userdata('MM_Condition') == true){
			redirect(base_url("home"));
		}else{
			$error = $this->input->get('err');
			if ($error != null) {
				$err = '<div class="alert bg-red alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						User akun tidak valid, silahkan login kembali. !
					</div>';
			}else {
				$err = null;
			}

			$data['judul'] = 'Login | PerpusKU';
			$data['error'] = $err;
			$this->load->view('login/index',$data);
		}
	}

	public function login()
	{
		$username = $this->input->post('username',true);
		$password = $this->input->post('password',true);

		echo json_encode(array('username' => $username, 'password' => $password));

		$where = array(
			'id_perpus' => $username,
			// 'pass' => md5($password)
		);

		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        //set message form validation
        $this->form_validation->set_message('required', '<div class="alert alert-warning alert-dismissable">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi.
                                </div>');

		$cek = $this->User_model->cek($where,'tbl_akun');
		if ($cek->password == $password) {
			$data_session = array(
				'MM_Condition'  => TRUE,
				'MM_Username'   => $cek->id_perpus,
				'MM_Name'		=> $cek->nis,
				'MM_Status'  	=> $cek->status,
				'MM_UserPass' 	=> $cek->password,
				'MM_email' 		=> $cek->email,
				'MM_Iduser' 	=> $cek->id,
				'MM_Hidden'     => 'hidden',
				'status' 		=> "login"
			);
	
			$this->session->set_userdata($data_session);
			redirect("home?id=".$data_session['MM_Username']."&status=".$data_session['MM_Status']);
		}else{
			redirect("login?err=user");
		}
	}

	public function pencarian()
	{
		$id = $this->input->get('id', true);
		// $id = base64_decode($id);
		$data['judul'] = 'Pencarian Buku | PerpusKU';
		$data['id'] = $id;

		$this->load->view('theme/head',$data);
		$this->load->view('login/pencarian/index');
		$this->load->view('theme/js');
		$this->load->view('login/pencarian/index_js');
		$this->load->view('theme/foot');
	}

	public function bukutamu()
	{
		$id = $this->input->get('id', true);
		// $id = base64_decode($id);
		$data['judul'] = 'Buku Tamu Visitor | PerpusKU';
		$data['id'] = $id;

		$this->load->view('theme/head',$data);
		$this->load->view('login/bukutamu/index');
		$this->load->view('theme/js');
		$this->load->view('login/bukutamu/index_js');
		$this->load->view('theme/foot');
	}

	public function pencarian_api()
	{
		$search = $this->input->post('search');
        $data = $this->Buku_model->load_buku2($search);
        
		echo json_encode(array('status'=>true,'search'=>$search, 'data'=>$data, 'jml_data'=>count($data)));
	}

	public function detail_buku()
	{
		$search = $this->input->post('search');
		$kategori = array('id'=>$this->input->post('kategori'));
        $data = $this->Buku_model->load_buku($kategori,$search);
        
		echo json_encode(array('status'=>true,'search'=>$search, $kategori, 'data'=>$data, 'jml_data'=>count($data)));
	}

	public function tambah_aktivitas()
	{
		$data = array(
			'id_user'=> $this->input->post('nis',true),
			'ket'=> $this->input->post('tujuan',true),
			'activity'=> 'visit offline',
			'waktu'=> date('Y-m-d'),
			'add_date'=> date('Y-m-d H:i:s'),
			'update_date'=> date('Y-m-d H:i:s'),
			'point'=> 2,
		);

		if ($this->input->post('nis',true) == null || $this->input->post('tujuan',true) == null) {
			echo json_encode(array('status'=>false,'keterangan' => 'data kosong'));
		}else {
			$where = array(
				'id_user' => $this->input->post('nis',true),
				'waktu' => date('Y-m-d'),
				'activity' => 'visit offline',
			);
			$cek = $this->User_model->cek($where,'tbl_activity');
			if ($cek == null) {
				$tambah = $this->Buku_model->add_buku($data,'tbl_activity');
				echo json_encode(array('status'=>true, 'keterangan' => 'berhasil'));
			}else {
				echo json_encode(array('status'=>false, 'keterangan' => 'sudah ada'));
			}
		}
	}
}
