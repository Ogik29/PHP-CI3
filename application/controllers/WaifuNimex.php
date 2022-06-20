<?php

/* pemanggilan database berada di folder config dan file autoload.php pada bagian $autoload['libraries']
sedangkan konfigurasi database ada di folder config dan file database.php */
class WaifuNimex extends CI_Controller
{
    // di masukkan ke constructor berfungsi agar seluruh method di class WaifuGenshin bisa mengload model tanpa harus mengload ulang modelnya di dalam method lain
    public function __construct()
    {
        // memanggil contructor yang ada di class parentnya (CI_Controller) terlebih dahulu
        parent::__construct();
        // di CI jika ingin menggunakan sesuatu harus di load terlebih dahulu
        $this->load->model('Waifu2_model');
        $this->load->library('form_validation'); // syarat agar bisa memakai 'form_validation'
    }

    public function index()
    {
        // searching
        if (isset($_POST['submit'])) { // ('submit') didapat dari name yang ada di button bukan type
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword2', $data['keyword']);
            // simpan $data['keyword'] di session set_userdata('keyword') (karena session dapat diakses di halaman manapun)
        } elseif ($this->session->userdata('keyword2')) {
            $data['keyword'] = $this->session->userdata('keyword2'); // agar saat ganti halaman session masih berjalan
        } else {
            $data['keyword'] = '';
        }

        // unset session keyword
        if (isset($_POST['refresh'])) {
            $this->session->unset_userdata('keyword2');
            redirect('WaifuNimex');
        }

        // pagination (sudah di load pada folder config file autoload.php bagian libraries)
        // config
        $config['base_url'] = 'http://localhost/ci-app/WaifuNimex/index';

        $this->db->like('nama', $data['keyword']);
        $this->db->from('WaifuNimex');
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
        $data['judul'] = "Waifu Nimex";
        $data['start'] = $this->uri->segment(3); // mengambil data dari segment ke 3 pada url
        $data['waifu'] = $this->Waifu2_model->getWaifus($config['per_page'], $data['start'], $data['keyword']); // limit data = getNpcs($limit, $start)

        $this->load->view('templates/header', $data);
        $this->load->view('WaifuNimex/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = "Waifu Detail";
        $data['waifu'] = $this->Waifu2_model->getWaifu($id);

        $this->load->view('templates/header', $data);
        $this->load->view('WaifuNimex/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = "Add Waifu";
        $data['single'] = ['Unknown', 'Yes', 'No'];

        /* memberi rules terlebih dahulu 
        ada 3 parameter di set_rules('name dari sebuah elemen yg ada di form', 'nama alias untuk pesan error', 'rulesnya ingin apa') */
        $this->form_validation->set_rules('nama', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('anime', 'Anime', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('WaifuNimex/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Waifu2_model->addWaifu($this->uploadIMG());
            // sebelum menggunakan session, sessionnya harus di autoload dulu di folder config dan file autoload.php pada bagian $autoload['libraries']
            $this->session->set_flashdata('flashAdd', 'to added'); // memiliki 2 parameter set_flashdata('nama session', 'pesan');
            redirect('WaifuNimex');
        }
    }

    public function update($id)
    {
        $data['judul'] = "Update Waifu";
        $data['waifu'] = $this->Waifu2_model->getWaifu($id);
        $data['single'] = ['Unknown', 'Yes', 'No'];

        $this->form_validation->set_rules('nama', 'Name', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('anime', 'Anime', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('WaifuNimex/update', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Waifu2_model->updateWaifu($this->uploadIMG());
            $this->session->set_flashdata('flashAdd', 'to updated');
            redirect('WaifuNimex');
        }
    }

    public function delete($id)
    {
        $this->Waifu2_model->deleteWaifu($id);
        $this->session->set_flashdata('flashDelete', 'to deleted');
        redirect('WaifuNimex');
    }

    public function gacha()
    {
        $data['judul'] = "Gacha Waifu";

        if (isset($_POST['tombolGacha'])) {
            $data['waifu'] = $this->Waifu2_model->gachaWaifu();
        } else {
            $data['waifu'] = ['nama' => '<p class="text-primary">Press Gacha Button First!</p>'];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('WaifuNimex/gacha', $data);
        $this->load->view('templates/footer');
    }


    // fungsi untuk upload gambar 
    public function uploadIMG()
    { // dalam kasus ini adalah upload gambar
        $fileName = $_FILES['img']['name'];
        $fileSize = $_FILES['img']['size'];
        $tmpName = $_FILES['img']['tmp_name'];
        $error = $_FILES['img']['error'];
        // 'name' 'size' 'error' 'tmp_name' adalah array multidimensi milik variabel superglobal $_FILES

        // cek apakah ada gambar yang diupload atau tidak (wajib ada gambar yg harus diupload)
        if ($error === 4) { // arti dari angka "4" berarti tidak ada gambar yang diupload
            return false;
        }

        // cek apakah yang diupload adalah gambar atau bukan
        $validPictureExtension = ['jpg', 'jpeg', 'png'];
        $pictureExtension = explode('.', $fileName);
        $pictureExtension = strtolower(end($pictureExtension));

        if (!in_array($pictureExtension, $validPictureExtension)) { // fungsi "in_array(needle, haystack)" adalah untuk mencari string didalam sebuah array 
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ($fileSize > 4000000) {
            return false;
        }

        // jika lolos pengecekan, gambar siap diupload
        /* generate nama gambar baru menggunakan "uniqid()" (agar jika ada user yg memasukkan file yg berbeda dengan nama file yg sama dengan user sebelumnya,
        maka gambar user yg sebelumnya tidak akan ditimpa oleh gambar user yg baru) */
        $newFileName = uniqid();
        $newFileName .= '.';
        $newFileName .= $pictureExtension;

        move_uploaded_file($tmpName, 'assets/img/' . $newFileName);
        // move_uploaded_file(filename, destination) berfungsi untuk memindahkan file ke suatu folder
        return $newFileName;
    }
}
