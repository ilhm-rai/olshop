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
}
