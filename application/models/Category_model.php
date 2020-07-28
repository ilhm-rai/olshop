<?php

class Category_model extends CI_Model
{
    public function getCategory()
    {
        return $this->db->get('categories')->result();
    }
}
