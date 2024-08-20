<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
	}

	public function index($nisn)
	{
		$data = [
			'biodata' => $this->siswa_model->tampil_data($nisn)->row_array(),
		];
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('siswa/biodata', $data);
		$this->load->view('layouts/footer');
	}
}
