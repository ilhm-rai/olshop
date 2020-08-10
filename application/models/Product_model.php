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
            switch ($where) {
                case 'id':
                case 'slug':
                    $result = $this->db->get()->row();
                    return $result;
                    break;

                default:
                    $result = $this->db->get()->result();
                    return $result;
                    break;
            }
        }
        $this->db->select('*, products.id, products.picture');
        $this->db->join('categories', 'categories.id = products.category_id', 'left');
        $this->db->from('products');
        $result = $this->db->get()->result();
        return $result;
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
