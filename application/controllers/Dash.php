<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dash extends CI_Controller {

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

}
