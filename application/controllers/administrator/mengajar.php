<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mengajar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Mengajar_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array(
			'id_kelas' => set_value('id_kelas'),
			'tahun_ajaran_aktif' => $this->Mengajar_model->get_tahun_ajaran_aktif()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/masuk_mengajar', $data);
		$this->load->view('layouts/footer');
	}

	public function mengajar_aksi()
	{
		$this->rulesmengajar();

		if ($this->form_validation->run() == FALSE) {
			$this->index();
		} else {
			$tahun_ajaran_aktif = $this->Mengajar_model->get_tahun_ajaran_aktif();
			$id_tahun = $tahun_ajaran_aktif ? $tahun_ajaran_aktif->id_tahun : null;
			$id_kelas = $this->input->post('id_kelas', TRUE);

			$kelas = $this->Mengajar_model->get_kelas_by_id($id_kelas);
			if ($kelas == null) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kelas yang anda input belum terdaftar!</div>');
				redirect('administrator/mengajar');
			} else {
				$datamengajar = array(
					'mengajar_data' => $this->Mengajar_model->baca_mengajar($id_kelas, $id_tahun),
					'id_tahun' => $id_tahun,
					'id_kelas' => $id_kelas,
					'tahun_ajaran' => $this->Mengajar_model->get_tahun_ajaran_by_id($id_tahun)->tahun_ajaran,
					'nama_kelas' => $kelas->nama_kelas
				);

				$this->load->view('layouts/header');
				$this->load->view('layouts/sidebar');
				$this->load->view('administrator/mengajar_list', $datamengajar);
				$this->load->view('layouts/footer');
			}
		}
	}
	public function tambah_mengajar($id_kelas, $id_tahun)
	{
		$tahun_ajaran = $this->Mengajar_model->get_tahun_ajaran_by_id($id_tahun);
		if (!$tahun_ajaran) {
			show_error('Tahun ajaran tidak ditemukan.'); // Menampilkan error jika tahun ajaran tidak ditemukan
		}

		$nama_tahun = isset($tahun_ajaran->nama_tahun) ? $tahun_ajaran->nama_tahun : 'Tidak ada nama tahun'; // Mengambil nama tahun jika ada, jika tidak, berikan default 'Tidak ada nama tahun'
		$nama_kelas = $this->Mengajar_model->get_kelas_by_id($id_kelas)->nama_kelas;

		$data = array(
			'tahun_ajaran' => $nama_tahun,
			'nama_kelas' => $nama_kelas,
			'id_kelas' => $id_kelas,
			'id_tahun' => $id_tahun,
			'mapelDropdown' => $this->Mengajar_model->get_mapel_dropdown(),
			'guruDropdown' => $this->Mengajar_model->get_guru_dropdown(),
			'mengajar_data' => $this->Mengajar_model->baca_mengajar($id_kelas, $id_tahun)
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/mengajar_form', $data);
		$this->load->view('layouts/footer');
	}


	public function tambah_mengajar_aksi()
	{
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('nik', 'Guru Pengajar', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('kkm', 'KKM', 'required');

		if ($this->form_validation->run() == FALSE) {
			$id_kelas = $this->input->post('id_kelas', TRUE);
			$id_tahun = $this->input->post('id_tahun', TRUE);
			$this->tambah_mengajar($id_kelas, $id_tahun); // Tampilkan kembali form jika validasi gagal
		} else {
			$data = array(
				'id_kelas' => $this->input->post('id_kelas', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'id_tahun' => $this->input->post('id_tahun', TRUE),
				'id_mapel' => $this->input->post('id_mapel', TRUE),
				'semester' => $this->input->post('semester', TRUE),
				'kkm' => $this->input->post('kkm', TRUE)
			);

			if ($this->Mengajar_model->cek_duplikat_pengajar_guru($data['nik'], $data['id_kelas'], $data['id_tahun'], $data['id_mapel'], $data['semester'])) {
				// Jika duplikasi berdasarkan guru, kelas, tahun, mata pelajaran, dan semester
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal menambahkan data. Guru mata pelajaran di kelas yang sama dan semester yang sama sudah ada!</div>');
				redirect('administrator/mengajar/tambah_mengajar/' . $data['id_kelas'] . '/' . $data['id_tahun']);
			} elseif ($this->Mengajar_model->cek_duplikat_pengajar_mapel_semester($data['id_mapel'], $data['semester'])) {
				// Jika duplikasi berdasarkan mata pelajaran dan semester saja
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal menambahkan data. Mata pelajaran di semester yang sama sudah ada!</div>');
				redirect('administrator/mengajar/tambah_mengajar/' . $data['id_kelas'] . '/' . $data['id_tahun']);
			} else {
				// Jika tidak ada duplikasi, tambahkan data
				if ($this->Mengajar_model->tambah_mengajar($data)) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data mata pelajaran berhasil ditambahkan!</div>');
					redirect('administrator/mengajar/mengajar_aksi');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal menambahkan data mata pelajaran. Pastikan semua field terisi dengan benar!</div>');
					redirect('administrator/mengajar/tambah_mengajar/' . $data['id_kelas'] . '/' . $data['id_tahun']);
				}
			}
		}
	}

	private function get_mapel_dropdown()
	{
		$query = $this->db->query('SELECT id_mapel, nama_mapel FROM mapel');
		$mapel = $query->result();
		$mapelDropdown = array();

		foreach ($mapel as $mapel_item) {
			$mapelDropdown[$mapel_item->id_mapel] = $mapel_item->nama_mapel;
		}

		return $mapelDropdown;
	}

	private function get_guru_dropdown()
	{
		$query = $this->db->query('SELECT nik, nama_guru FROM guru');
		$guru = $query->result();
		$guruDropdown = array();

		foreach ($guru as $guru_item) {
			$guruDropdown[$guru_item->nik] = $guru_item->nama_guru;
		}

		return $guruDropdown;
	}

	private function rulesmengajar()
	{
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
	}
	public function delete($id_mengajar)
	{
		$this->Mengajar_model->delete_mengajar($id_mengajar);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data mata pelajaran berhasil dihapus!</div>');
		redirect('administrator/mengajar/mengajar_aksi');
	}
	public function update_mengajar_aksi()
	{
		// Validasi form
		$this->form_validation->set_rules('id_mengajar', 'ID Mengajar', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
		$this->form_validation->set_rules('nik', 'Guru Pengajar', 'required');
		$this->form_validation->set_rules('semester', 'Semester', 'required');
		$this->form_validation->set_rules('kkm', 'KKM', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Validasi gagal, log error
			log_message('error', 'Validasi form gagal');
			// Kembali ke halaman edit
			$this->update_mengajar($this->input->post('id_mengajar', TRUE));
		} else {
			// Validasi berhasil, update data
			$id_mengajar = $this->input->post('id_mengajar', TRUE);
			$id_kelas = $this->input->post('id_kelas', TRUE);
			$id_tahun = $this->input->post('id_tahun', TRUE); // Make sure this input is included in the form

			$data = array(
				'id_kelas' => $id_kelas,
				'nik' => $this->input->post('nik', TRUE),
				'id_mapel' => $this->input->post('id_mapel', TRUE),
				'semester' => $this->input->post('semester', TRUE),
				'kkm' => $this->input->post('kkm', TRUE)
			);
			if ($this->Mengajar_model->cek_duplikat_pengajar_guru($data['nik'], $data['id_kelas'], $data['id_tahun'], $data['id_mapel'], $data['semester'])) {
				// Jika duplikasi berdasarkan guru, kelas, tahun, mata pelajaran, dan semester
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal memperbarui data. Guru mata pelajaran di kelas yang sama dan semester yang sama sudah ada!</div>');
				redirect('administrator/mengajar/update_mengajar/' . $id_mengajar);
			} elseif ($this->Mengajar_model->cek_duplikat_pengajar_mapel_semester($data['id_mapel'], $data['semester'])) {
				// Jika duplikasi berdasarkan mata pelajaran dan semester saja
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal memperbarui data. Mata pelajaran di semester yang sama sudah ada!</div>');
				redirect('administrator/mengajar/update_mengajar/' . $id_mengajar);
			} else {
				// Jika tidak ada duplikasi, perbarui data
				if ($this->Mengajar_model->update_mengajar($id_mengajar, $data)) {
					// Log success
					log_message('info', 'Data mengajar berhasil diupdate');
					// Set flash data before redirect
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data mata pelajaran berhasil diupdate!</div>');
					// Redirect to mengajar_aksi with appropriate parameters
					redirect('administrator/mengajar/mengajar_aksi/' . $id_tahun);
				} else {
					// Log failure
					log_message('error', 'Gagal update data mengajar');
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal update data mata pelajaran. Silakan coba lagi!</div>');
					redirect('administrator/mengajar/update_mengajar/' . $id_mengajar);
				}
			}
		}
	}

	public function update_mengajar($id_mengajar)
	{
		// Fetch data yang diperlukan untuk form
		$data['mengajar'] = $this->Mengajar_model->get_mengajar_by_id($id_mengajar);
		if (!$data['mengajar']) {
			show_404();
		}

		// Fetch tahun akademik dan kelas data
		$data['tahun_ajaran'] = $this->Mengajar_model->get_tahun_akademik_by_id($data['mengajar']->id_tahun);
		$data['kelas'] = $this->Mengajar_model->get_kelas_by_id($data['mengajar']->id_kelas);

		// Fetch dropdown data
		$data['mapelDropdown'] = $this->Mengajar_model->get_all_mapel();
		$data['guruDropdown'] = $this->Mengajar_model->get_all_guru();

		// Load view
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/mengajar_update', $data); // Mengirim $data ke view
		$this->load->view('layouts/footer');
	}
}
