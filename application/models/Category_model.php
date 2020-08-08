<?php

class Category_model extends CI_Model
{
    public function getCategory($where = false, $limit = false)
    {
        if ($where) {
            return $this->db->get_where('categories', [$where => $limit])->row();
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

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('categories', $data);
    }
}
