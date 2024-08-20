<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rombel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Rombel_model');
	}

	public function index()
	{
		$data['tahun_ajaran_aktif'] = $this->Rombel_model->get_active_year();
		$data['kelas_asal'] = $this->Rombel_model->get_kelas_asal($data['tahun_ajaran_aktif']->id_tahun);
		$data['tahun_ajaran'] = $this->tahun_model->tampil_data();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/rombel', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function get_siswa_by_kelas()
	{
		$id_kelas = $this->input->post('id_kelas');
		$id_tahun = $this->input->post('id_tahun');
		$cek_asal = $this->input->post('asal'); // hasilkan true jika dari kelas asal
		$tahun_ajaran = $this->Rombel_model->get_active_year();

		if ($id_kelas && $id_tahun) {
			//$data['siswa_kelas'] = $this->Rombel_model->get_siswa_by_kelas($id_kelas, $tahun_ajaran->id_tahun);
			$data['siswa_kelas'] = $this->Rombel_model->get_siswa_by_kelas($id_kelas, $id_tahun);
			if ($cek_asal == 'true') {
				$this->load->view('administrator/partials/ajax_siswa', $data);
			} else {
				$this->load->view('administrator/partials/ajax_siswa_tujuan', $data);
			}
		} else {
			echo '<tr><td colspan="5" class="text-center">Pilih kelas asal terlebih dahulu</td></tr>';
		}
	}

	public function transfer_siswa_terpilih()
	{
		// Method untuk menangani transfer siswa terpilih
		// Lakukan proses transfer sesuai kebutuhan aplikasi Anda
		$id_kelas = $this->input->post('id_kelas'); // id kelas tujuan
		$id_tahun = $this->input->post('id_tahun'); // id kelas tujuan
		$siswa = $this->input->post('sw'); // ambil kumpulan data siswa terpilih

		foreach ($siswa as $key => $sw) {
			$nis = $sw['value']; // dapatkan nis siswa yang mau dipindahkan
			$data['id_kelas'] = $id_kelas;
			$data['id_tahun'] = $id_tahun;
			if ($sw['value'] != 1) {
				$this->Rombel_model->update_siswa_by_nis($nis, $data);
			}
		}
	}
}
