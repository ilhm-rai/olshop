<?php

class Product_model extends CI_Model
{
    public function getProduct($where = false, $limit = false)
    {
        if ($where) {
            $this->db->select('*, products.id, products.picture');
            $this->db->from('products');
            $this->db->join('categories', 'categories.id = products.category_id', 'left');
            $this->db->where('products.' . $where, $limit);
            return $this->db->get()->row();
        }
        $this->db->select('*, products.id, products.picture');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        $this->db->from('products');
        return $this->db->get()->result();
    }

    public function insert($data)
    {
        $this->db->insert('products', $data);
    }

    public function delete($id)
    {
        $this->db->delete('products', ['id' => $id]);
    }

    public function replace($data)
    {
        $this->db->replace('products', $data);
    }
}
