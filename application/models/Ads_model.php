<?php

class Ads_model extends CI_Model
{
    public function getAds()
    {
        return $this->db->get('ads')->result();
    }
}
