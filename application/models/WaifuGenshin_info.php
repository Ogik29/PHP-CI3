<?php

class WaifuGenshin_info extends CI_Model
{
    public function getAllVision()
    {
        $query = $this->db->get('waifuvision'); // memanggil data dalam table
        return $query->result_array(); // menampilkan data seluruh row (berupa array)
    }

    public function getAllRegion()
    {
        $query = $this->db->get('waifuregion');
        return $query->result_array();
    }
}
