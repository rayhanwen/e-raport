<?php
class Siswa extends CI_Controller {
    public function index() {
        $this->load->model('wali_model');
		// var_dump($this->session->userdata());
		// die;
        $data['siswa'] = $this->wali_model->get_siswa_by_nik_wali($this->session->userdata('id_u'));
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/siswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id) {
        $where = array('nis' => $id);
        $data['detail'] = $this->siswa_model->ambil_kode_siswa($id); // Menggunakan method ambil_kode_siswa dari model
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/siswa_detail', $data);
        $this->load->view('templates_administrator/footer');
    }
}
?>
