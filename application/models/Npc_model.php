<?php

class Npc_model extends CI_Model
{
    public function getAllNpc()
    {
        $query = $this->db->order_by('id', 'desc')->get('npc'); // memanggil data dalam table
        return $query->result_array(); // menampilkan data seluruh row (berupa array)
    }

    public function jumlahData()
    {
        return $this->db->get('npc')->num_rows(); // hanya untuk menghitung jumlah baris data (tidak menampilkan array)
    }

    // pagination
    public function getNpcs($limit, $start)
    {
        return $this->db->order_by('id', 'desc')->get('npc', $limit, $start)->result_array();
    }

    public function getNpc($id)
    {
        $query = $this->db->get_where('npc', array('id' => $id));
        return $query->row_array(); // menampilkan data single row (berupa array)
    }

    public function addNpc()
    {
        $data = array(
            'name'  => $this->input->post('name', true),
            'country'  => $this->input->post('country', true)
        );

        $this->db->insert('npc', $data);
    }

    public function updateNpc()
    {
        $data = array(
            'name'  => $this->input->post('name', true),
            'country'  => $this->input->post('country', true)
        );

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('npc', $data);
    }
}
