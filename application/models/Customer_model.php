 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

// listing all customer
public function listing()
{
	$this->db->select('*');
	$this->db->from('customers');
	$this->db->order_by('customer_id','desc'); 
	$query = $this->db->get();
    return $query->result();

}

// login customer
public function login($email,$password)
{
	$this->db->select('*');
	$this->db->from('customers');
	$this->db->where(array(	'email'		=> $email,
				  	 	 	'password'	=> SHA1($password)
				  	));
	$this->db->order_by('customer_id','desc');
	$query = $this->db->get();
    return $query->row();

}
  
// Detail customer
public function detail($customer_id)
{
	$this->db->select('*');
	$this->db->from('customers');
	$this->db->where('customer_id', $customer_id);
	$this->db->order_by('customer_id','desc');
	$query = $this->db->get();
    return $query->row();

}

//Customer sudah login
public function already_login($email,$customer_name)
{
	$this->db->select('*');
	$this->db->from('customers');
	$this->db->where(array('email' 			=> $email,
							'customer_name'	=> $customer_name
							));
	$this->db->order_by('customer_id','desc');
	$query = $this->db->get();
    return $query->row();

}	

public function add($data)
{
	$this->db->insert('customers', $data);
}

// Edit
public function update($data)
{
	$this->db->where('customer_id', $data['customer_id']);
	$this->db->update('customers',$data);
}

// Delete
public function delete($data)
{
	$this->db->where('customer_id', $data['customer_id']);
	$this->db->delete('customers',$data);
}
	

}

/* End of file Customer_model.php */
/* Location: ./application/models/Customer_model.php */