<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_trans_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
} 

// listing all customer
public function listing()
{
	$this->db->select('trans_header.*,
						customers.customer_name,
						SUM(transaction.value)AS total_item');
	$this->db->from('trans_header');
	//JOIN TABEL
	$this->db->join('transaction','transaction.transaction_code = trans_header.transaction_code', 'left');
	$this->db->join('customers','customers.customer_id = trans_header.customer_id', 'left');
	//END JOIN
	$this->db->group_by('trans_header.trans_header_id');
	$this->db->order_by('trans_header_id','desc');
	$query = $this->db->get();
    return $query->result();

}

public function customer($customer_id)
{
	$this->db->select('trans_header.*,
		SUM(transaction.value)AS total_item');
	$this->db->from('trans_header');
	$this->db->where('trans_header.customer_id', $customer_id);
	//JOIN TABEL
	$this->db->join('transaction','transaction.transaction_code = trans_header.transaction_code', 'left');
	//END JOIN
	$this->db->group_by('trans_header.trans_header_id');
	$this->db->order_by('trans_header_id','desc');
	$query = $this->db->get();
    return $query->result();

}

// header transaksi customer
public function transaction_code($transaction_code)
{
	$this->db->select('trans_header.*,
					   customers.customer_name,
					   rekening.bank_name AS bank,
					   rekening.pemilik_rek,
					   rekening.rek_number,
					   SUM(transaction.value)AS total_item');
	$this->db->from('trans_header');
	//JOIN TABEL
	$this->db->join('transaction','	transaction.transaction_code 	= trans_header.transaction_code', 'left');
	$this->db->join('customers','	customers.customer_id 			= trans_header.customer_id', 'left');
	$this->db->join('rekening', '	rekening.id_rekening 			= trans_header.id_rekening', 'left');
	//END JOIN
	$this->db->group_by('trans_header.trans_header_id');
	$this->db->where('transaction.transaction_code', $transaction_code);
	$this->db->order_by('trans_header_id','desc');
	$query = $this->db->get();
    return $query->row();

}
  
// Detail transaksi customer
public function detail($trans_header_id)
{
	$this->db->select('*');
	$this->db->from('trans_header');
	$this->db->where('trans_header_id', $trans_header_id);
	$this->db->order_by('trans_header_id','desc');
	$query = $this->db->get();
    return $query->row();

}




public function add($data)
{
	$this->db->insert('trans_header', $data);
}


// Edit
public function update($data)
{
	$this->db->where('trans_header_id', $data['trans_header_id']);
	$this->db->update('trans_header',$data);
}

// Delete
public function delete($data)
{
	$this->db->where('trans_header_id', $data['trans_header_id']);
	$this->db->delete('trans_header',$data);
}
	

}

/* End of file Header_trans_model.php */
/* Location: ./application/models/Header_trans_model.php */