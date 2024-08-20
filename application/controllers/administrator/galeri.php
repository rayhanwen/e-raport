<?php
class Galeri extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('galeri_model'); // Memuat model galeri_model
        $this->load->library('form_validation'); // Memuat library form_validation
        $this->load->library('upload'); // Memuat library upload untuk mengunggah file
        $this->load->library('image_lib'); // Memuat library image_lib untuk resize gambar
    }
    
    public function index() {
        $data['galeri'] = $this->galeri_model->tampil_data();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/galeri', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_galeri() {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/galeri_form'); // Menampilkan form tambah galeri
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_galeri_aksi() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_galeri();
        } else {
            // Konfigurasi upload file
            $upload_path = FCPATH . 'sisfo_akademikk/assets/uploads/img/galeri/'; // Sesuaikan path dengan struktur folder Anda
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; // 2MB
            $config['file_name'] = 'galeri_' . time(); // Nama file disesuaikan dengan waktu unggah
            
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal mengunggah foto: ' . $error . '</div>');
                redirect('administrator/galeri/tambah_galeri');
            } else {
                // Upload berhasil
                $upload_data = $this->upload->data();
                $foto = $upload_data['file_name'];

                // Resize gambar
                $this->resize_image($upload_data['full_path'], $upload_data['file_name']);

                // Simpan data ke database
                $tanggal_publish = $this->input->post('tanggal_publish');
                $data = array(
                    'foto' => $foto,
                    'tanggal_publish' => $tanggal_publish
                );
                if ($this->galeri_model->insert_data($data, 'galeri')) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Galeri Berhasil Ditambahkan!</div>');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal menambahkan data galeri.</div>');
                }
                redirect('administrator/galeri');
            }
        }
    }

    public function delete($id) {
        $galeri = $this->galeri_model->get_by_id($id);
        if ($galeri) {
            $file_path = FCPATH . 'sisfo_akademikk/assets/uploads/img/galeri/' . $galeri->foto;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            if ($this->galeri_model->delete($id, 'galeri')) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Galeri Berhasil Dihapus!</div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal menghapus data galeri.</div>');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data galeri tidak ditemukan.</div>');
        }
        redirect('administrator/galeri');
    }

    // Fungsi untuk meresize gambar
    private function resize_image($path, $file_name) {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 800; // Ukuran lebar gambar yang diinginkan
        $config['height'] = 600; // Ukuran tinggi gambar yang diinginkan

        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }

    // Fungsi validasi form
    private function _rules() {
        $this->form_validation->set_rules('foto', 'Foto', 'callback_file_selected');
        $this->form_validation->set_rules('tanggal_publish', 'Tanggal Publish', 'required');
    }

    // Callback untuk validasi upload file
    public function file_selected() {
        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_message('file_selected', 'The {field} field is required.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
?>
