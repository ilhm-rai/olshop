<?php

class Shipper_model extends CI_Model
{
    public function getShipper($id = false)
    {
        if ($id) {
            $result = $this->db->get_where('shippers', ['id' => $id])->row();
            return $result;
        }
        $result = $this->db->get('shippers')->result();
        return $result;
    }

    public function insert($data)
    {
        $this->db->insert('shippers', $data);
    }

    public function delete($id)
    {
        $this->db->delete('shippers', ['id' => $id]);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('shippers', $data);
    }
}
