<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('nilai_model');
    }

    public function index(){
        $this->load->model('tahun_model');
        $this->load->model('wali_model');
        $data = array(
            'kelas' => $this->wali_model->get_kelas_by_nik($this->session->userdata['nik']),  // Mendapatkan data kelas
            'tahun_ajaran' => $this->tahun_model->tampil_data(),  // Mendapatkan data tahun ajaran
            'tahun_ajaran_aktif' => $this->nilai_model->get_tahun_ajaran_aktif()
        );

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('guru/raport_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function get_siswa_by_kelas(){
        $this->load->model('siswa_model');
        $id_kelas = $this->input->post('id_kelas');
        $data['siswa'] = $this->siswa_model->get_by_id_kelas($id_kelas);
        $this->load->view('guru/partials/form_cetak/ajax_siswa', $data);
    }

    public function cetak_raport(){
        $this->load->model('kelas_model');
        $this->load->model('wali_model');
        $this->load->model('guru_model');
        $this->load->model('siswa_model');
        $this->load->model('tahun_model');

        $tahun_ajaran = $this->input->post('tahun');
        $kelas = $this->input->post('kelas');
        $semester = $this->input->post('semester');
        $nis = $this->input->post('siswa');
        $nik_wali = $this->wali_model->get_wali_by_id_kelas($kelas);

        $data['tahun_ajaran'] = $this->tahun_model->ambil_data_id($tahun_ajaran);
        $data['kelas'] = $this->kelas_model->get_by_id($kelas);
        $data['semester'] = $semester;
        $data['kepsek'] = $this->input->post('kepala_sekolah');
        $data['wali'] = $this->guru_model->get_by_id($nik_wali->nik);
        $data['siswa'] = $this->siswa_model->get_by_id($nis);
        $data['nilai'] = $this->nilai_model->get_nilai_cetak_raport($nis, $kelas);
        $data['sikap'] = $this->nilai_model->get_sikap_by_nis($nis);
        $this->load->view('guru/partials/cetak_raport', $data);
    }
}
?>