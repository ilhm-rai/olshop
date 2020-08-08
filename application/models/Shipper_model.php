<?php

class Shipper_model extends CI_Model
{
    public function getShipper($id = false)
    {
        if ($id) {
            return $this->db->get_where('shippers', ['id' => $id])->row();
        }
        return $this->db->get('shippers')->result();
    }

    public function insert($data)
    {
        return $this->db->insert('shippers', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('shippers', ['id' => $id]);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('shippers', $data);
    }
}
