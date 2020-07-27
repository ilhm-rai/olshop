<?php

class Product_model extends CI_Model
{
    public function getProduct($slug = false)
    {
        if ($slug) {
            $this->db->select('*');
            $this->db->from('products');
            $this->db->join('categories', 'categories.id = products.category_id');
            $this->db->where('products.slug', $slug);
            return $this->db->get()->row();
        }
        $this->db->select('*');
        $this->db->from('products');
        $this->db->join('categories', 'categories.id = products.category_id');
        return $this->db->get()->result();
    }
}
