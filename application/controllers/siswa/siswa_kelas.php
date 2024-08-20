<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model');
		$this->load->model('kelas_model');
		$this->load->model('wali_model');
		// Pastikan pengguna terautentikasi dan memiliki akses 'siswa'
		if (!$this->session->userdata('hak_akses') || $this->session->userdata('hak_akses') != 'siswa') {
			redirect('login'); // Redirect ke halaman login jika tidak berwenang
		}
	}

	public function index()
	{
		$idu = $this->session->userdata('idu'); // Ambil ID dari session
		$getKelas = $this->siswa_model->get_by_id($idu);

		$getWali = $this->wali_model->get_wali_detail($getKelas->id_kelas);
		$getSiswa = $this->siswa_model->getKelasSiswa($getKelas->id_kelas)->result_array();
		// var_dump($get_wali);die;
		$data = [
			'siswa' => $getSiswa,
			'walikelas' => $getWali,
		];
		// Ambil data kelas dan siswa berdasarkan ID pengguna
		// $data = $this->siswa_model->get_kelas_by_id_siswa($idu);

		// var_dump($data);die;

		// Tampilkan data ke view
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('siswa/siswa_kelas', $data);
		$this->load->view('templates_administrator/footer');
	}
}
