<?php

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('guru_model');
		$this->load->model('siswa_model');
		$this->load->model('kelas_model');
	}

	public function index()
	{

		// $data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			// 'username' => $data->username,
			// 'hak_akses' => $data->hak_akses,
			// 'guru' => $this->guru_model->jumlah_guru(),
			// 'siswa' => $this->siswa_model->jumlah_siswa(),
			// 'kelas' => $this->kelas_model->jumlah_kelas(),
			// 'pengguna' => $this->user_model->jumlah_pengguna()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/dashboard', $data);
		$this->load->view('layouts/footer');
	}
}
