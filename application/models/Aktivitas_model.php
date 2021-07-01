<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas_model extends CI_Model {
    
    public function data_reward()
    {
        $this->db->select('id_user, SUM(point) AS jmlh, nis');
        $this->db->from('tbl_activity');
        $this->db->where('tbl_activity.status','visitor');
        $this->db->join('tbl_akun','tbl_activity.id_user = tbl_akun.id_perpus');
        $this->db->group_by('id_user');
        $this->db->order_by('jmlh','desc');
        return $this->db->get()->result();
    }

    public function visitor_off()
    {
    	$this->db->select('count(*) AS jmlh');
        $this->db->from('tbl_activity');
        $this->db->where('date(waktu)',date('Y-m-d'));
        $this->db->where('activity','visit offline');
        $this->db->where('status','visitor');
        return $this->db->get()->result();
    }

    public function visitor_on()
    {
    	$this->db->select('count(*) AS jmlh');
        $this->db->from('tbl_activity');
        $this->db->where('date(waktu)',date('Y-m-d'));
        $this->db->where('activity','visit online');
        $this->db->where('status','visitor');
        return $this->db->get()->result();
    }

    public function get_data($tbl,$where)
    {
    	if (!empty($where)) {
        	$this->db->where($where);
    	}
        return $this->db->get($tbl)->result();
    }
}