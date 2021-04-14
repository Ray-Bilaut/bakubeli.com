<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

public function __construct()
{
	parent::__construct();
	$this->load->database();
}

// listing all product
public function listing()
{
	$this->db->select('product.*,
					  users.name,
					  category.category_name,
					  category.slug_category,
					COUNT(images.images_id) AS total_images');
	$this->db->from('product');
	// DB JOIN
	$this->db->join('users', 'users.user_id = product.user_id', 'left');
	$this->db->join('category', 'category.category_id = product.category_id', 'left');
	$this->db->join('images', 'images.product_id = product.product_id', 'left');
	// END JOIN
	$this->db->group_by('product.product_id');
	$this->db->order_by('product_id','desc');
	$query = $this->db->get();
    return $query->result();

}

// home
public function home()
{
	$this->db->select('product.*,
					  users.name,
					  category.category_name,
					  category.slug_category,
					COUNT(images.images_id) AS total_images');
	$this->db->from('product');
	// DB JOIN
	$this->db->join('users', 'users.user_id = product.user_id', 'left');
	$this->db->join('category', 'category.category_id = product.category_id', 'left');
	$this->db->join('images', 'images.product_id = product.product_id', 'left');
	// END JOIN
	$this->db->where('product.product_status', 'Publish');
	$this->db->group_by('product.product_id');
	$this->db->order_by('product_id','desc');
	$this->db->limit(12);
	$query = $this->db->get();
    return $query->result();

}
// Read product
public function read($slug_product)
{
	$this->db->select('product.*,
					  users.name,
					  category.category_name,
					  category.slug_category,
					COUNT(images.images_id) AS total_images');
	$this->db->from('product');
	// DB JOIN
	$this->db->join('users', 'users.user_id = product.user_id', 'left');
	$this->db->join('category', 'category.category_id = product.category_id', 'left');
	$this->db->join('images', 'images.product_id = product.product_id', 'left');
	// END JOIN
	$this->db->where('product.product_status', 'Publish');
	$this->db->where('product.slug_product', $slug_product);
	$this->db->group_by('product.product_id');
	$this->db->order_by('product_id','desc');
	$query = $this->db->get();
    return $query->row();

}

// Listing kategori
public function listing_cat()
{
	$this->db->select('product.*,
					  users.name,
					  category.category_name,
					  category.slug_category,
					COUNT(images.images_id) AS total_images');
				
	$this->db->from('product');
	// DB JOIN
	$this->db->join('users', 'users.user_id = product.user_id', 'left');
	$this->db->join('category', 'category.category_id = product.category_id', 'left');
	$this->db->join('images', 'images.product_id = product.product_id', 'left');
	// END JOIN
	$this->db->group_by('product.category_id');
	$this->db->order_by('category.position','ASC');
	$query = $this->db->get();
    return $query->result();

}

//data produk
public function product($limit,$start)
{
	$this->db->select('product.*,
					  users.name,
					  category.category_name,
					  category.slug_category,
					COUNT(images.images_id) AS total_images');
	$this->db->from('product');
	// DB JOIN
	$this->db->join('users', 'users.user_id = product.user_id', 'left');
	$this->db->join('category', 'category.category_id = product.category_id', 'left');
	$this->db->join('images', 'images.product_id = product.product_id', 'left');
	// END JOIN
	$this->db->where('product.product_status', 'Publish');
	$this->db->group_by('product.product_id');
	$this->db->order_by('product_id','desc');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
    return $query->result();

}

//Total produk
public function total_product()
{
	$this->db->select('COUNT(*) AS total');
	$this->db->from('product');
	$this->db->where('product_status','Publish');
	$query = $this->db->get();
	return $query->row();
}

//category produk
public function category($category_id, $limit,$start)
{
	$this->db->select('product.*,
					  users.name,
					  category.category_name,
					  category.slug_category,
					COUNT(images.images_id) AS total_images');
	$this->db->from('product');
	// DB JOIN
	$this->db->join('users', 'users.user_id = product.user_id', 'left');
	$this->db->join('category', 'category.category_id = product.category_id', 'left');
	$this->db->join('images', 'images.product_id = product.product_id', 'left');
	// END JOIN
	$this->db->where('product.product_status', 'Publish');
	$this->db->where('product.category_id', $category_id);
	$this->db->group_by('product.product_id');
	$this->db->order_by('product_id','desc');
	$this->db->limit($limit,$start);
	$query = $this->db->get();
    return $query->result();

}

//Total produk
public function total_category($category_id)
{
	$this->db->select('COUNT(*) AS total');
	$this->db->from('product');
	$this->db->where('product_status','Publish');
	$this->db->where('category_id', $category_id );
	$query = $this->db->get();
	return $query->row();
}
  
// Detail product
public function details($product_id)
{
	$this->db->select('*');
	$this->db->from('product');
	$this->db->where('product_id', $product_id);
	$this->db->order_by('product_id','desc');
	$query = $this->db->get();
    return $query->row();

}

public function img_details($images_id)
{
	$this->db->select('*');
	$this->db->from('images');
	$this->db->where('images_id', $images_id);
	$this->db->order_by('images_id','desc');
	$query = $this->db->get();
    return $query->row();

}

public function images($product_id)
{
	$this->db->select('*');
	$this->db->from('images');
	$this->db->where('product_id', $product_id);
	$this->db->order_by('images_id','desc');
	$query = $this->db->get();
    return $query->result();
}

public function addimage($data)
{
	$this->db->insert('images', $data);
}


public function add($data)
{
	$this->db->insert('product', $data);
}


// Edit
public function update($data)
{
	$this->db->where('product_id', $data['product_id']);
	$this->db->update('product',$data);
}

// Delete
public function delete($data)
{
	$this->db->where('product_id', $data['product_id']);
	$this->db->delete('product',$data);
}

// Delete
public function delete_img($data)
{
	$this->db->where('images_id', $data['images_id']);
	$this->db->delete('images',$data);
}
	

}

/* End of file Product_model.php */
/* Location: ./application/models/Product_model.php */