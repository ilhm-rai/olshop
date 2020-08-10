<?php

class Category_model extends CI_Model
{
    public function getCategory($where = false, $limit = false)
    {
        if ($where) {
            $result = $this->db->get_where('categories', [$where => $limit])->row();
            return $result;
        }
        $result = $this->db->get('categories')->result();
        return $result;
    }

    public function insert($data)
    {
        $this->db->insert('categories', $data);
    }

    public function delete($id)
    {
        $this->db->delete('categories', ['id' => $id]);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('categories', $data);
    }
}
