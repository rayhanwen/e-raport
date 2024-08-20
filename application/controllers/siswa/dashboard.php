    <?php

    class Dashboard extends CI_Controller{

        function __construct(){
            parent::__construct();

            // Mengecek otentikasi pengguna
            if(!isset($this->session->userdata['username'])){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda belum login!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('administrator/auth');
            }
            
            // Mengecek hak akses
            if($this->session->userdata('hak_akses') != 'siswa'){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda tidak memiliki akses ke halaman ini!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
                redirect('administrator/auth');
            }
        }
        
        public function index()
        {
            // Load model yang diperlukan
            $this->load->model('siswa_model');
            
            // Ambil data sesuai dengan username yang sedang login
            $data = $this->user_model->ambil_data($this->session->userdata('username'));
            
            // Data untuk dikirim ke view
            $data = array(
                'username' => $data->username,
                'hak_akses' => $data->hak_akses,
                'id' => $data->idu,
            );
            
            // Load view
            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('siswa/dashboard', $data); // Sesuaikan dengan nama view dan struktur data yang Anda miliki
            $this->load->view('templates_administrator/footer');
        }
        
        public function logout()
        {
            // Hapus semua data sesi
            $this->session->sess_destroy();
            redirect('administrator/auth');
        }
        
    }
