<?php

class About extends CI_Controller
{
    public function index($nama = "Ogik", $umur = "17", $role = "MC")
    {
        $data['judul'] = "About";
        $data['nama'] = $nama;
        $data['umur'] = $umur;
        $data['role'] = $role;

        $this->load->view('templates/header', $data);
        $this->load->view('about/index', $data);
        $this->load->view('templates/footer');
    }
}
