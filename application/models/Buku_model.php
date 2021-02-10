<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    public function load_buku($kategori,$search)
    {
        $this->db->where($kategori);
        if ($search != null) {
            $this->db->like('judul',$search);
            $this->db->or_like('id_buku',$search);
        }
        $query = $this->db->get('tbl_buku');
        return $query->result();
    }

    public function load_buku2($search)
    {
        if ($search == null) {
            $this->db->where('kategori',$search);
        }else {
            $this->db->like('judul',$search);
            $this->db->or_like('id_buku',$search);
            $this->db->or_like('thn_terbit',$search);
            $this->db->or_like('penulis',$search);
            $this->db->or_like('penerbit',$search);
            $this->db->or_like('kategori',$search);
        }
        $query = $this->db->get('tbl_buku');
        return $query->result();
    }

    public function load_buku_by_id($id)
    {
        $this->db->where('id_buku',$id);
        $query = $this->db->get('tbl_buku');
        return $query->row_array();
    }

    public function add_buku($data,$tbl)
    {
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
    }

// =====================================================================================================================================

    var $table = 'tbl_buku';
    var $column_order = array(null, 'id','id_buku','judul','kategori','thn_terbit'); //set column field database for datatable orderable
    var $column_search = array('id','id_buku','judul','kategori','thn_terbit'); //set column field database for datatable searchable 
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
    
    public function get_dt_buku()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered_buku()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all_buku()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

// =====================================================================================================================================
    
    var $table2 = 'tbl_peminjaman';
    var $column_order2 = array(null, 'id','nis','id_buku','tgl_pinjam','tgl_kembali','status'); //set column field database for datatable orderable
    var $column_search2 = array('id','nis','id_buku','tgl_pinjam','tgl_kembali','status'); //set column field database for datatable searchable 
    var $order2 = array('id' => 'asc'); // default order

    function _get_datatables_query2()
    {
        $this->db->from($this->table2);

        $i = 0;
    
        foreach ($this->column_search2 as $item) // loop column 
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

                if(count($this->column_search2) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order2))
        {
            $order = $this->order2;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_dt_peminjam($where)
    {
        $this->_get_datatables_query2();
        $this->db->where($where);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_peminjam($where)
    {
        $this->_get_datatables_query2();
        $this->db->where($where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_peminjam($where)
    {
        $this->db->from($this->table2);
        $this->db->where($where);
        return $this->db->count_all_results();
    }
}
