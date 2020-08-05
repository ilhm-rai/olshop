<?php

class User_model extends CI_Model
{
    public function insert($data)
    {
        $this->db->insert('users', $data);
    }

    public function getUser($where = false, $limit = false)
    {
        if ($where) {
            return $this->db->get_where('users', [$where => $limit])->row();
        }

        $this->db->select('*, users.id');
        $this->db->join('roles', 'roles.id = users.role_id', 'left');
        $this->db->from('users');
        return $this->db->get()->result();
    }

    public function getRole()
    {
        return $this->db->get('roles')->result();
    }

    public function delete($id)
    {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function update($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('users', $data);
    }
}
