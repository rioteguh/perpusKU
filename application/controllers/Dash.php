<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MM_Condition') != true){
			redirect(base_url("login"));
		}
        $this->load->model('Buku_model');
        $this->load->model('Aktivitas_model');
    }

	public function index()
	{
		$data['judul'] = 'Home | PerpusKU';
		$data['a'] = array('active',null,null,null,null);
		$data['b'] = array(null,null,null,null,null,null,null);

		$this->load->view('theme/head',$data);
		$this->load->view('theme/navbar');
		$this->load->view('theme/sidebar');
		$this->load->view('dash/index');
		$this->load->view('theme/js');
		$this->load->view('theme/foot');
	}

	public function data_dashboard()
	{
		$data = array(
			'tot_buku'=>$this->Buku_model->count_all_buku(),
			'visit_on'=>$this->Aktivitas_model->visitor_on()[0]->jmlh,
			'visit_off'=>$this->Aktivitas_model->visitor_off()[0]->jmlh,
			'reward' => $this->Aktivitas_model->data_reward(),
		);

		echo json_encode($data);
	}

	public function v_dash()
	{
		$data = array(
			'reward' => $this->Aktivitas_model->data_reward(),
		);

		echo json_encode($data);
	}

}
