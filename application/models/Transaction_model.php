<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

// listing all transaction
public function listing()
{
	$this->db->select('*');
	$this->db->from('transaction');
	$this->db->order_by('transaction_id','desc');
	$query = $this->db->get();
    return $query->result();

}

// listing all berdasarkan header nya
public function transaction_code($transaction_code)
{
	$this->db->select('transaction.*,
					 product.product_name,
					 product.images');
	$this->db->from('transaction');
	$this->db->join('product', 'product.product_id = transaction.product_id', 'left');
	$this->db->where('transaction_code', $transaction_code);
	$this->db->order_by('transaction_id','desc');
	$query = $this->db->get();
    return $query->result();

}
  
// Detail transaction
public function detail($transaction_id)
{
	$this->db->select('*');
	$this->db->from('transaction');
	$this->db->where('transaction_id', $transaction_id);
	$this->db->order_by('transaction_id','desc');
	$query = $this->db->get();
    return $query->row();

}

// Detail transaction
public function read($slug_transaction)
{
	$this->db->select('*');
	$this->db->from('transaction');
	$this->db->where('slug_transaction', $slug_transaction);
	$this->db->order_by('transaction_id','desc');
	$query = $this->db->get();
    return $query->row();

}



public function add($data)
{
	$this->db->insert('transaction', $data);
}


// Edit
public function update($data)
{
	$this->db->where('transaction_id', $data['transaction_id']);
	$this->db->update('transaction',$data);
}

// Delete
public function delete($data)
{
	$this->db->where('transaction_id', $data['transaction_id']);
	$this->db->delete('transaction',$data);
}
	

}

/* End of file Transaction_model.php */
/* Location: ./application/models/Transaction_model.php */