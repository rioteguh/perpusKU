<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_api extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MM_Condition') != true){
			redirect(base_url("login"));
		}
        $this->load->model('User_model');
        $this->load->model('Buku_model');
    }

	public function index()
	{
		$list = $this->User_model->get_dt_user();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->id_perpus;
            $row[] = $user->nis;
            $row[] = $user->email;
            $row[] = strtoupper($user->status);
            $row[] = '<button class="btn bg-red waves-effect m-r-20" onclick="delete_user('."'".$user->id."'".')"><i class="material-icons">delete</i></button> <button class="btn bg-yellow waves-effect m-r-20"><i class="material-icons">edit</i></button>';
 
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->User_model->count_all_user(),
                        "recordsFiltered" => $this->User_model->count_filtered_user(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
	}

    public function add_user()
    {
        $data = array(
            'id_perpus' => $this->input->post('id_perpus'),
            'nis' => $this->input->post('nis'),
            'status' => $this->input->post('status'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'add_date' => date('Y-m-d H:i:s'),
            'update_date' => date('Y-m-d H:i:s'),
        );
        $data2 = array(
            'id_user' => $this->input->post('id_perpus'),
            'nim' => $this->input->post('id_perpus'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nis'),
            'add_date' => date('Y-m-d H:i:s'),
            'update_date' => date('Y-m-d H:i:s'),
        );
        $insert = $this->User_model->add_user($data,'tbl_akun');
        if ($this->input->post('status') == 'visitor') {
            $insert2= $this->Buku_model->add_buku($data2,'tbl_siswa');
        }
        echo json_encode(array("status" => TRUE));
    }

    public function delete_user($id)
    {
        $this->User_model->delete_user($id,'tbl_akun');
        echo json_encode(array("status" => TRUE));
    }
    
}
