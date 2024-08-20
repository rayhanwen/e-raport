<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wali extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$this->load->model('wali_model');
		$data['wali_kelas'] = $this->wali_model->tampil_data_by_tahun_ajaran_aktif();
		$data['tahun_ajaran_aktif'] = $this->wali_model->get_tahun_ajaran_aktif(); // Fetch active academic year
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/wali', $data);
		$this->load->view('templates_administrator/footer');
	}
	public function detail($id_kelas)
	{
		$this->load->model('wali_model');
		$data['wali'] = $this->wali_model->get_wali_detail($id_kelas);
		$data['tahun_ajaran'] = $this->wali_model->get_tahun_ajaran_aktif(); // Tambahkan ini untuk mendapatkan tahun ajaran
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/wali_detail', $data);
		$this->load->view('templates_administrator/footer');
	}
	public function tambah_wali()
	{
		$this->load->model('wali_model');
		$data['guru_list'] = $this->wali_model->get_all_guru();
		$data['kelas_list'] = $this->wali_model->get_all_kelas();
		$data['tahun_ajaran_list'] = $this->wali_model->get_all_tahun_ajaran();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/wali_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_wali_aksi()
	{
		$nik = $this->input->post('nik');
		$id_kelas = $this->input->post('id_kelas');
		$id_tahun = $this->input->post('id_tahun');

		// Memuat model wali_model
		$this->load->model('wali_model');

		// Memeriksa apakah data sudah ada
		if ($this->wali_model->cek_data($nik, $id_kelas, $id_tahun)) {
			// Data sudah ada, set flash data
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Data yang Anda input telah ada, jadi tidak bisa diinput lagi.
            </div>');
		} else {
			// Data belum ada, masukkan ke dalam database
			if ($this->wali_model->cek_wali_duplikat($id_kelas)) {

				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data yang Anda input telah ada, jadi tidak bisa diinput lagi.
                </div>');
			} else {

				$data = array(
					'nik' => $nik,
					'id_kelas' => $id_kelas,
					'id_tahun' => $id_tahun
				);
				$this->wali_model->tambah_data($data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data berhasil ditambahkan.
                </div>');
			}
		}

		// Redirect ke halaman administrator/wali
		redirect('administrator/wali');
	}

	public function hapus($id_kelas)
	{
		// Memanggil model untuk menghapus data
		$this->wali_model->hapus_data_by_kelas($id_kelas);

		// Set flash data
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus.
        </div>');

		// Redirect ke halaman administrator/wali
		redirect('administrator/wali');
	}


	public function update($id_kelas)
	{
		$this->load->model('wali_model');

		// Ambil data guru, kelas, dan tahun ajaran
		$data['guru_list'] = $this->wali_model->get_all_guru();
		$data['kelas_list'] = $this->wali_model->get_all_kelas();
		$data['tahun_ajaran_list'] = $this->wali_model->get_all_tahun_ajaran();

		// Mengambil data wali berdasarkan $id_kelas
		$data['wali'] = $this->wali_model->get_wali_by_id_kelas($id_kelas);

		if (!$data['wali']) {
			// Handle jika data wali tidak ditemukan, misalnya redirect atau flash pesan
			redirect('administrator/wali'); // Contoh redirect ke halaman utama wali jika data tidak ditemukan
		}

		// Load view untuk halaman update
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/wali_update', $data);
		$this->load->view('templates_administrator/footer');
	}



	public function update_aksi()
	{
		$id_wali = $this->input->post('id_wali');
		$nik = $this->input->post('nik');
		$id_kelas = $this->input->post('id_kelas');
		$id_tahun = $this->input->post('id_tahun');

		// Data baru untuk diupdate, kecuali id_wali
		$data = array(
			'nik' => $nik,
			'id_kelas' => $id_kelas,
			'id_tahun' => $id_tahun
		);

		$this->load->model('wali_model');

		// Periksa apakah id_kelas berubah
		$wali = $this->wali_model->get_wali_by_id($id_wali); // Fungsi ini harus mengambil data berdasarkan id_wali

		if ($wali->id_kelas != $id_kelas) {
			// Jika id_kelas berubah, panggil metode update_data_by_id_kelas
			$this->wali_model->update_data_by_id_kelas($wali->id_kelas, $id_kelas, $data);
		}

		// Panggil metode update_data_by_id_wali untuk update data lainnya
		$this->wali_model->update_data_by_id_wali($id_wali, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data berhasil diupdate.
        </div>');

		// Redirect ke halaman administrator/wali
		redirect('administrator/wali');
	}


	public function hapus_siswa($nis = null, $id_wali = null)
	{
		// Check if both arguments are provided
		if ($nis !== null && $id_wali !== null) {
			$this->load->model('wali_model');

			// Call the model function to delete the student
			$hapus_siswa = $this->wali_model->hapus_siswa($nis, $id_wali);

			if ($hapus_siswa) {
				// If successfully deleted, redirect to the wali detail page
				redirect('administrator/wali/detail/' . $id_wali);
			} else {
				// If the student data is not found, display a pesan
				echo "Tidak ada siswa di kelas ini.";
			}
		} else {
			// If arguments are missing, show an error pesan
			echo "Gagal menghapus siswa. Parameter tidak lengkap.";
		}
	}

	public function wali_tambah_siswa($id_wali)
	{
		$this->load->model('wali_model');
		$data['wali'] = $this->wali_model->get_wali_by_id_wali($id_wali);
		$data['siswa'] = $this->wali_model->get_siswa_not_in_wali($id_wali); // Mendapatkan daftar siswa yang belum terdaftar di wali kelas ini

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/wali_tambah_siswa', $data); // Kirim data siswa yang belum terdaftar ke view
		$this->load->view('templates_administrator/footer');
	}


	public function tambah_siswa_aksi()
	{
		$id_wali = $this->input->post('id_wali');
		$id_kelas = $this->input->post('id_kelas');
		$id_tahun = $this->input->post('id_tahun');
		$nis_array = $this->input->post('nis');

		// Load model untuk mengakses database
		$this->load->model('wali_model');

		// Panggil fungsi tambah_siswa pada model dengan data yang sudah disiapkan
		foreach ($nis_array as $nis) {
			$this->wali_model->tambah_siswa($id_wali, $nis, $id_kelas, $id_tahun);
		}

		// Redirect kembali ke halaman detail wali kelas setelah proses berhasil
		redirect('administrator/wali/detail/' . $id_wali);
	}
}
