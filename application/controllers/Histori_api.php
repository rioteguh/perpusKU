<?php

class Histori_api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MM_Condition') != true){
			redirect(base_url("login"));
		}
        $this->load->model('Aktivitas_model');
    }

	public function index()
	{
        $where = array(
            'id_user' => $this->session->userdata('MM_Username'),
            'waktu' => date('Y-m-d'),
        );
        $data = $this->Aktivitas_model->get_data('tbl_activity',$where);

        foreach ($data as $list) {
            $output[] = array(
                'ket' => $list->ket,
                'date' =>  date("Y-m-d", strtotime($list->waktu)),
            );
        }
        
		echo json_encode(array('status'=>true, 'data'=>$output));
	}
}