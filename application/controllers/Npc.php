<?php

class Npc extends CI_Controller
{

    public function __construct()
    {
        // memanggil contructor yang ada di class parentnya (CI_Controller) terlebih dahulu
        parent::__construct();
        // di CI jika ingin menggunakan sesuatu harus di load terlebih dahulu
        $this->load->model('Npc_model');
        $this->load->library('form_validation'); // syarat agar bisa memakai 'form_validation'
    }

    public function index()
    {
        // searching
        if (isset($_POST['submit'])) { // ('submit') didapat dari name yang ada di button bukan type
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keywordNPC', $data['keyword']);
            // simpan $data['keyword'] di session set_userdata('keyword') (karena session dapat diakses di halaman manapun)
        } elseif ($this->session->userdata('keywordNPC')) {
            $data['keyword'] = $this->session->userdata('keywordNPC'); // agar saat ganti halaman session masih berjalan
        } else {
            $data['keyword'] = '';
        }

        // unset session keywordNPC
        if (isset($_POST['refresh'])) {
            $this->session->unset_userdata('keywordNPC');
            redirect('Npc');
        }

        // pagination (sudah di load pada folder config file autoload.php bagian libraries)
        // config
        $config['base_url'] = 'http://localhost/ci-app/Npc/index';

        $this->db->like('name', $data['keyword']);
        // $this->db->or_like('region', $data['keyword']);
        $this->db->from('npc');
        $config['total_rows'] = $this->db->count_all_results(); // method untuk menghitung ada berapa baris yang dikembalikan pada query terakhir yg dilakukan

        $config['per_page'] = 6;
        $config['num_links'] = 2; // untuk mengatur jumlah halaman di kiri dan kanan pada link pagination sesuai jumlah yg di inginkan

        // styling pagination (untuk memberi style pada pagination CI memakai bootstrap 4)
        $config['full_tag_open'] = '<nav> <ul class="pagination">';
        $config['full_tag_close'] = '</ul> </nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a class="page-link">';
        $config['cur_tag_close'] = '</a> </li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link'); // untuk memberi class pada tag 'a'

        // initialize
        $this->pagination->initialize($config);

        // jika di codeiginiter setiap key yang disimpan di array ketika dikirim ke viewnya otomatis akan di ekstrak menjadi variabel
        $data['judul'] = "NPC";
        $data['start'] = $this->uri->segment(3); // mengambil data dari segment ke 3 pada url
        $data['npc'] = $this->Npc_model->getNpcs($config['per_page'], $data['start'], $data['keyword']); // limit data = getNpcs($limit, $start)
        $data['total_rows'] = $config['total_rows'];

        $this->load->view('templates/header', $data);
        $this->load->view('Npc/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        // jika di codeiginiter setiap key yang disimpan di array ketika dikirim ke viewnya otomatis akan di ekstrak menjadi variabel
        $data['judul'] = "NPC Detail";
        $data['npc'] = $this->Npc_model->getNpc($id);

        $this->load->view('templates/header', $data);
        $this->load->view('Npc/detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id)
    {
        $this->db->delete('npc', array('id' => $id));
        $this->session->set_flashdata('flashDelete', 'to deleted');
        redirect('npc');
    }

    public function add()
    {
        $data['judul'] = "Add Npc";

        /* memberi rules terlebih dahulu 
        ada 3 parameter di set_rules('name dari sebuah elemen yg ada di form', 'nama alias untuk pesan error', 'rulesnya ingin apa') */
        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('country', 'Country', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('Npc/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Npc_model->addNpc();
            // sebelum menggunakan session, sessionnya harus di autoload dulu di folder config dan file autoload.php pada bagian $autoload['libraries']
            $this->session->set_flashdata('flashAdd', 'to added'); // memiliki 2 parameter set_flashdata('nama session', 'pesan');
            redirect('Npc');
        }
    }

    public function update($id)
    {
        $data['judul'] = "NPC Update";
        $data['npc'] = $this->Npc_model->getNpc($id);

        $this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('country', 'Country', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('Npc/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Npc_model->updateNpc();
            $this->session->set_flashdata('flashAdd', 'to updated');
            redirect('Npc');
        }
    }
}
