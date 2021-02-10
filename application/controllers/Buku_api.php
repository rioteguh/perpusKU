<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_api extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('MM_Condition') != true){
			redirect(base_url("login"));
		}
        $this->load->model('Buku_model');
    }

	public function index()
	{
        $kategori = array('kategori'=>$this->input->post('kategori'));
        $search = $this->input->post('search');
        $data = $this->Buku_model->load_buku($kategori,$search);
        
		echo json_encode(array('status'=>true, $kategori, 'data'=>$data));
	}

    public function load_by_id($id)
    {
        $data = $this->Buku_model->load_buku_by_id($id);
		echo json_encode(array('status'=>true, 'data'=>$data));
    }

    public function selisih()
    {
        $tgl1 = new DateTime(date('Y-m-').'02');
        $tgl2 = new DateTime(date('Y-m-d'));
        $d = $tgl2->diff($tgl1)->days + 1;

        echo json_encode(array('jum_hari'=>$d." hari"));
    }

    public function list_buku()
    {
        $list = $this->Buku_model->get_dt_buku();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->id_buku;
            $row[] = $user->judul;
            $row[] = $user->thn_terbit;
            $row[] = '<button class="btn bg-red waves-effect m-r-20" onclick="delete_user('."'".$user->id."'".')"><i class="material-icons">delete</i></button> <button class="btn bg-yellow waves-effect m-r-20"><i class="material-icons">edit</i></button>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Buku_model->count_all_buku(),
                        "recordsFiltered" => $this->Buku_model->count_filtered_buku(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function tambah_buku()
    {
        // ini_set('upload_max_filesize', '20M');
        $judul = $this->input->post('judul',true);
        $kategori = $this->input->post('kategori',true);
        $penulis = $this->input->post('penulis',true);
        $penerbit = $this->input->post('penerbit',true);
        $thn = $this->input->post('thn',true);
        
        if ($kategori == 'novel') {
            $kode = 'NOV';
        } elseif ($kategori == 'religi') {
            $kode = 'REL';
        } elseif ($kategori == 'kompetensi') {
            $kode = 'KOM';
        } elseif ($kategori == 'sains') {
            $kode = 'SAN';
        } elseif ($kategori == 'sosial') {
            $kode = 'SOS';
        } elseif ($kategori == 'komik') {
            $kode = 'KMK';
        } else {
            $kode = 'JRN';
        }

        $config['upload_path'] = './dist/file/img/';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['file_name'] = $kode.'-'.crc32($judul).'_img';
        $config['max_size'] = 8000;

        $config1['upload_path'] = './dist/file/doc/';
        $config1['allowed_types'] = 'pdf';
        $config1['file_name'] = $kode.'-'.crc32($judul).'_file';
        $config1['max_size'] = 50000;

        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('cover')) 
        {
            $img = $this->upload->data('file_name');
        } 
        else 
        {
            $img = 'Error!';
        }

        $this->upload->initialize($config1);
        if ($this->upload->do_upload('file_buku')) 
        {
            $file = $this->upload->data('file_name');
        } 
        else 
        {
            $file = 'Error!';
        }

        $data = array(
            'id_buku' => $kode.'-'.crc32($judul),
            'judul' => $judul,
            'kategori' => $kategori,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
            'thn_terbit' => $thn,
            'nama_img' => $img,
            'nama_file' => $file,
            'add_date' => date('Y-m-d H:i:s'),
            'update_date' => date('Y-m-d H:i:s'),
        );

        if ($this->Buku_model->add_buku($data,'tbl_buku')) {
            redirect(base_url('form_buku?status=berhasil'));
        }else {
            redirect(base_url('form_buku?status=error'));
        }
        // echo json_encode($data);
    }

// =====================================================================================================================================

    public function list_peminjam()
    {
        $blm = array('status'=>'1');
        $list = $this->Buku_model->get_dt_peminjam($blm);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            if ($user->status == '1') {
                $status = '<i class="material-icons col-red">cancel</i>';
            } else {
                $status = '<i class="material-icons col-teal">check</i>';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $user->nis;
            $row[] = $user->id_buku;
            $row[] = $user->tgl_pinjam;
            $row[] = $status;
            $row[] = $user->status;
            $row[] = '<button class="btn bg-red waves-effect m-r-20" onclick="delete_user('."'".$user->id."'".')"><i class="material-icons">delete</i></button> <button class="btn bg-yellow waves-effect m-r-20"><i class="material-icons">edit</i></button>';

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Buku_model->count_all_peminjam($blm),
                        "recordsFiltered" => $this->Buku_model->count_filtered_peminjam($blm),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function test()
    {
        $StartDate = strtotime('2012-06-06'); //Start date from which we begin count
        $CurDate = date("Y-m-d"); //Current date.
        $NextDate = date("Y-m-d", strtotime("+1 week", strtotime($CurDate))); //Next date = +2 week from start date
        // while ($CurDate > $NextDate ) { 
        // $NextDate = date("Y-m-d", strtotime("+2 week", strtotime($NextDate)));
        // }
        echo json_encode(array(
            'pinjam'=>date("Y-m-d"),
            'kembali'=>date("Y-m-d", strtotime($NextDate)),
        ));
    }
}
