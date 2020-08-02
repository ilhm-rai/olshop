<?php

class Category_model extends CI_Model
{
    public function getCategory($id = false)
    {
        if ($id) {
            return $this->db->get_where('categories', ['id' => $id])->row();
        }
        return $this->db->get('categories')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('categories', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('categories', ['id' => $id]);
    }

    public function replace($data)
    {
        $this->db->replace('categories', $data);
    }
}
