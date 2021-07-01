<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function cek($where,$tbl)
	{
		$this->db->where($where);
		$query = $this->db->get($tbl)->row();
		return $query;
	}

    var $table = 'tbl_akun';
    var $column_order = array(null, 'id','id_perpus','nis','email','password','status'); //set column field database for datatable orderable
    var $column_search = array('id','id_perpus','nis','email','password','status'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order

	function _get_datatables_query()
	{
		$this->db->from($this->table);
 
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    
    public function get_dt_user()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered_user()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_user()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function add_user($data,$tbl)
    {
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
    }

    public function delete_user($id,$tbl)
    {
        $this->db->where('id', $id);
        $this->db->delete($tbl);
    }

}
