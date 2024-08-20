<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahun_ajaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Tahun_model');
		$this->load->model('Siswa_model');
		$this->load->model('Kelas_model');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['tahun_ajaran'] = $this->Tahun_model->tampil_data();
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/tahun_ajaran', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah()
	{
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Akademik', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('administrator/tahun_ajaran_form');
			$this->load->view('layouts/footer');
		} else {
			$tahun_ajaran = $this->input->post('tahun_ajaran');
			$status = $this->input->post('status');

			if ($status == 'Aktif') {
				$this->nonaktifkan_semua_tahun_ajaran();
			}

			$data = array(
				'tahun_ajaran' => $tahun_ajaran,
				'status' => $status
			);

			$this->Tahun_model->tambah_data($data);

			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Tahun ajaran berhasil ditambahkan!
            </div>');

			redirect('administrator/tahun_ajaran');
		}
	}

	public function edit($id_tahun)
	{
		$data['tahun_ajaran'] = $this->Tahun_model->ambil_data_id($id_tahun);

		if ($data['tahun_ajaran']) {
			$this->load->view('layouts/header');
			$this->load->view('layouts/sidebar');
			$this->load->view('administrator/tahun_update', $data);
			$this->load->view('layouts/footer');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data tahun ajaran tidak ditemukan!
            </div>');
			redirect('administrator/tahun_ajaran');
		}
	}

	public function update()
	{
		$id_tahun = $this->input->post('id_tahun');
		$tahun_ajaran = $this->input->post('tahun_ajaran');
		$status = $this->input->post('status');

		if ($status == 'Aktif') {
			$this->nonaktifkan_semua_tahun_ajaran();
		}

		$data = array(
			'tahun_ajaran' => $tahun_ajaran,
			'status' => $status
		);

		$this->Tahun_model->update_data($id_tahun, $data);

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Tahun ajaran berhasil diperbarui!
        </div>');

		redirect('administrator/tahun_ajaran');
	}

	public function delete($id_tahun)
	{
		// Retrieve data of students associated with the given $id_tahun
		$siswa_data = $this->Siswa_model->ambil_data_berdasarkan_tahun($id_tahun);

		// Loop through each student data and delete associated records in the 'kelas' table
		foreach ($siswa_data as $siswa) {
			$this->Kelas_model->hapus_data_berdasarkan_nis($siswa->nis);
		}

		// After deleting associated 'kelas' records, delete the corresponding 'siswa' records
		$this->Siswa_model->hapus_data_berdasarkan_tahun($id_tahun);

		// Now, it's safe to delete the record from the 'tahun_ajaran' table
		$this->Tahun_model->hapus_data($id_tahun);

		// Set flashdata for success message
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Tahun ajaran berhasil dihapus!
        </div>');

		// Redirect back to administrator/tahun_ajaran view
		redirect('administrator/tahun_ajaran');
	}

	private function nonaktifkan_semua_tahun_ajaran()
	{
		$this->Tahun_model->nonaktifkan_semua();
	}

	public function nonaktifkan_semua()
	{
		$this->Tahun_model->nonaktifkan_semua();
		redirect('administrator/tahun_ajaran');
	}
}
