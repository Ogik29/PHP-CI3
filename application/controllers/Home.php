<?php

// controller ini adalah controller default (sudah di atur di folder config di file routes.php)
class Home extends CI_Controller
{
    public function index($nama = 'Someone')
    {
        // jika di codeiginiter setiap key yang disimpan di array ketika dikirim ke viewnya otomatis akan di ekstrak menjadi variabel
        $data['judul'] = "Home";
        $data['name'] = $nama;

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}
