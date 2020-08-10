<?php

class Ads_model extends CI_Model
{
    public function getAds()
    {
        $result = $this->db->get('ads')->result();
        return $result;
    }
}
