<?php

class Waifu_model extends CI_Model
{
    public function getAllWaifu()
    {
        $query = $this->db->order_by('id', 'desc')->get('waifugenshin'); // memanggil data dalam table
        return $query->result_array(); // menampilkan data seluruh row (berupa array)
    }

    public function jumlahData()
    {
        return $this->db->get('waifugenshin')->num_rows();
    }

    public function getWaifus($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('vision', $keyword);
        }

        return $this->db->order_by('id', 'desc')->get('waifugenshin', $limit, $start)->result_array();
    }

    public function getWaifu($id)
    {
        $query = $this->db->get_where('waifugenshin', array('id' => $id));
        return $query->row_array(); // menampilkan data single row (berupa array)
    }

    public function addWaifu($upload)
    {
        $img = $upload;
        if (!$img) {
            return false;
        }

        $data = [
            'nama' => $this->input->post('nama', true),
            'vision' => $this->input->post('vision', true),
            'region' => $this->input->post('region', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'img' => $img
        ];

        $this->db->insert('waifugenshin', $data);
    }

    public function deleteWaifu($id)
    {
        $this->db->delete('waifugenshin', array('id' => $id));
    }

    public function gachaWaifu()
    {
        $query = $this->db->get('waifugenshin')->result_array();
        $lastData = count($query) - 1;
        $randomWaifu = rand(0, $lastData);
        return $query[$randomWaifu];
    }

    public function updateWaifu($upload)
    {
        if (!$upload) {
            $img = $this->input->post('oldimg');
        } else {
            $img = $upload;
        }

        $data = [
            'nama' => $this->input->post('nama', true),
            'vision' => $this->input->post('vision', true),
            'region' => $this->input->post('region', true),
            'deskripsi' => $this->input->post('deskripsi', true),
            'img' => $img
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('waifugenshin', $data);
    }
}
