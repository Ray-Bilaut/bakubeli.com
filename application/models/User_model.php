<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

// listing all user
public function listing()
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->order_by('user_id','desc');
	$query = $this->db->get();
    return $query->result();

}
  
// Detail user
public function detail($user_id)
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where('user_id', $user_id);
	$this->db->order_by('user_id','desc');
	$query = $this->db->get();
    return $query->row();

}

// Login user
public function auth($username,$password)
{
	$this->db->select('*');
	$this->db->from('users');
	$this->db->where(array('username' => $username,
							'password'=> SHA1($password)));
	$this->db->order_by('user_id','desc');
	$query = $this->db->get();
    return $query->row();

}


public function add($data)
{
	$this->db->insert('users', $data);
}


// Edit
public function update($data)
{
	$this->db->where('user_id', $data['user_id']);
	$this->db->update('users',$data);
}

// Delete
public function delete($data)
{
	$this->db->where('user_id', $data['user_id']);
	$this->db->delete('users',$data);
}
	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */