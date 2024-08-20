<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Ensure the user is logged in
        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index() {
        $hak_akses = $this->session->userdata('hak_akses');

        if ($hak_akses == 'admin') {
            redirect('administrator/admin_profil');
        } elseif ($hak_akses == 'guru') {
            redirect('guru/guru_profil');
        } elseif ($hak_akses == 'siswa') {
            redirect('siswa/siswa_profil');
        } else {
            show_404();
        }
    }
}
?>
