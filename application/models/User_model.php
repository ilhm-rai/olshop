<?php

class User_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db;
    }

    public function getUser($where = false, $limit = false)
    {
        if ($where) {
            $result = $this->db->get_where('users', [$where => $limit])->row();
            return $result;
        }

        $this->db->select('*, users.id');
        $this->db->join('roles', 'roles.id = users.role_id', 'left');
        $this->db->from('users');
        $result = $this->db->get()->result();
        return $result;
    }

    public function getRole()
    {
        $result = $this->db->get('roles')->result();
        return $result;
    }

    public function delete($id)
    {
        $this->db->delete('users', ['id' => $id]);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
    }
}
