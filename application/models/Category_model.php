<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

// listing all category
public function listing()
{
	$this->db->select('*');
	$this->db->from('category');
	$this->db->order_by('category_id','desc');
	$query = $this->db->get();
    return $query->result();

}
  
// Detail category
public function detail($category_id)
{
	$this->db->select('*');
	$this->db->from('category');
	$this->db->where('category_id', $category_id);
	$this->db->order_by('category_id','desc');
	$query = $this->db->get();
    return $query->row();

}

// Detail category
public function read($slug_category)
{
	$this->db->select('*');
	$this->db->from('category');
	$this->db->where('slug_category', $slug_category);
	$this->db->order_by('category_id','desc');
	$query = $this->db->get();
    return $query->row();

}
// Login category
public function auth($categoryname,$password)
{
	$this->db->select('*');
	$this->db->from('category');
	$this->db->where(array('categoryname' => $categoryname,
							'password'=> SHA1($password)));
	$this->db->order_by('category_id','desc');
	$query = $this->db->get();
    return $query->row();

}


public function add($data)
{
	$this->db->insert('category', $data);
}


// Edit
public function update($data)
{
	$this->db->where('category_id', $data['category_id']);
	$this->db->update('category',$data);
}

// Delete
public function delete($data)
{
	$this->db->where('category_id', $data['category_id']);
	$this->db->delete('category',$data);
}
	

}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */