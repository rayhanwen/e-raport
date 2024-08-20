<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Raport extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		 Anda Belum Login!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('administrator/auth');
		}
		$this->load->model('nilai_model');
		$this->load->model('guru_model'); // Load model guru untuk dropdown kepala sekolah
	}

	public function index()
	{
		$this->load->model('tahun_model');
		$data = array(
			'kelas' => $this->nilai_model->get_all_kelas(),  // Mendapatkan semua data kelas
			'tahun_ajaran' => $this->tahun_model->tampil_data(),  // Mendapatkan data tahun ajaran
			'tahun_ajaran_aktif' => $this->nilai_model->get_tahun_ajaran_aktif(),
			'guruDropdown' => $this->guru_model->get_all_guru()  // Mendapatkan data guru untuk dropdown kepala sekolah
		);

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/raport_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function get_siswa_by_kelas()
	{
		$this->load->model('siswa_model');
		$id_kelas = $this->input->post('id_kelas');
		$data['siswa'] = $this->siswa_model->get_by_id_kelas($id_kelas);
		$this->load->view('administrator/partials/form_cetak/ajax_siswa', $data);
	}

	public function cetak_raport()
	{
		$this->load->model('kelas_model');
		$this->load->model('wali_model');
		$this->load->model('guru_model');
		$this->load->model('siswa_model');
		$this->load->model('tahun_model');
		$this->load->model('nilai_model');

		// Ambil data dari form
		$tahun_ajaran_id = $this->input->post('tahun');
		$kelas_id = $this->input->post('kelas');
		$semester = $this->input->post('semester');
		$nis = $this->input->post('siswa');
		$guru_kepsek_nik = $this->input->post('kepala_sekolah'); // Ambil NIK Kepsek dari dropdown

		// Ambil data dari model sesuai dengan id atau nik yang diberikan
		$data['tahun_ajaran'] = $this->tahun_model->ambil_data_id($tahun_ajaran_id);
		$data['kelas'] = $this->kelas_model->get_by_id($kelas_id);
		$data['semester'] = $semester;
		$data['siswa'] = $this->siswa_model->get_by_id($nis);
		$data['nilai'] = $this->nilai_model->get_nilai_cetak_raport($nis, $kelas_id);
		$data['sikap'] = $this->nilai_model->get_sikap_by_nis($nis);
		$data['wali'] = $this->guru_model->get_by_id($this->wali_model->get_wali_by_id_kelas($kelas_id)->nik);

		// Ambil nama dan nip kepala sekolah
		$kepsek_data = $this->guru_model->get_by_id($guru_kepsek_nik);
		$data['kepsek'] = $kepsek_data->nama_guru; // Ambil nama Kepsek dari model guru
		$data['nik_kepsek'] = $kepsek_data->nik; // Ambil nip Kepsek dari model guru

		// Load view dengan data yang sudah diambil
		$this->load->view('administrator/partials/cetak_raport', $data);
	}
}
