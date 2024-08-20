<?php

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// Mengecek otomatis autorisasi
		is_logged_in();
	}

	public function index()
	{
		$this->load->model('wali_model');
		$this->load->model('mengajar_model');
		$data = $this->user_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'username' => $data->username,
			'hak_akses' => $data->hak_akses,
			'id' => $data->idu,
			'siswa_wali' => $this->wali_model->get_jml_siswa_by_nik_wali($data->idu),
			//'mengajar' => $this->user_model->jumlah_pengguna()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('guru/dashboard', $data);
		$this->load->view('layouts/footer');
	}
}
