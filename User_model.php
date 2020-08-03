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
            return $this->db->get_where('users', [$where => $limit])->row_array();
        }

        return $this->db->get('users');
    }
    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('roles', 'roles.id = users.role_id');
        $this->db->where('users.role_id', 2);
        return $this->db->get()->result();
    }
    public function getAllAdmin()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('roles', 'roles.id = users.role_id');
        $this->db->where('users.role_id', 1);
        return $this->db->get()->result();
    }
   
    public function getWhere($name = false)
    {
        if ($name) {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('roles', 'roles.id = users.role_id', 'left');
            $this->db->where('users.name', $name);
            return $this->db->get()->row();
        }
        $this->db->select('*, users.id');
        $this->db->join('roles', 'roles.id = users.role_id', 'left');
        $this->db->from('users');
        return $this->db->get()->result();
    }
    public function delete($name)
    {
        $this->db->delete('users', ['name' => $name]);
    }
     public function replace($data)
    {
        $this->db->replace('users', $data);
    }
}
