<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('user_model');
		$this->load->model('guru_model');
	}

	public function index()
	{
		$data['data_pengguna'] = $this->user_model->get_all();

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/user', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_guru()
	{
		$data['data_guru'] = $this->guru_model->tampil_data('guru');

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/user_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_guru_aksi()
	{
		$data['idu'] = $this->input->post('guru');
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['email'] = $this->input->post('email');
		$data['hak_akses'] = $this->input->post('hak_akses');
		$data['blokir'] = 'N';

		if ($this->user_model->cek_duplikat_pengguna($data['idu'])) {
			if ($this->user_model->tambah_pengguna($data)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Pengguna Berhasil Ditambahkan! Passwordnya :<b>' . $this->input->post('password') . '</b>.
                </div>');
				redirect('administrator/user');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Pengguna Gagal Ditambahkan!
                </div>');
				redirect('administrator/user/tambah_guru');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data Pengguna Sudah Ada!
                </div>');
			redirect('administrator/user/tambah_guru');
		}
	}

	public function tambah_siswa()
	{
		$data['data_siswa'] = $this->user_model->get_all_siswa(); // Mendapatkan data semua siswa dari model
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/user_form_siswa', $data); // Load view user_form_siswa.php dengan data siswa
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_siswa_aksi()
	{
		$data['idu'] = $this->input->post('siswa');
		$data['username'] = $this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['email'] = $this->input->post('email');
		$data['hak_akses'] = 'siswa';
		$data['blokir'] = 'N';

		log_message('info', 'Data yang diterima: ' . json_encode($data));

		if ($this->user_model->cek_duplikat_user_siswa($data['idu'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Siswa atau Username sudah ada!</div>');
			redirect('administrator/user/tambah_siswa');
		} else {
			if ($this->user_model->tambah_pengguna($data)) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Pengguna Berhasil Ditambahkan! Passwordnya :<b>' . $this->input->post('password') . '</b>.</div>');
				redirect('administrator/user');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Pengguna Gagal Ditambahkan!</div>');
				redirect('administrator/user/tambah_siswa');
			}
		}
	}
	public function delete($id)
	{
		$me = $this->session->userdata['nik'];
		if ($me != $id) {
			$this->user_model->hapus($id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Penguna Berhasil dihapus!
                </div>');
			redirect('administrator/user');
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Tidak bisa menghapus diri sendiri!
                </div>');
			redirect('administrator/user');
		}
	}

	public function update($id)
	{
		$where = array('idu' => $id);
		$data['user'] = $this->user_model->ambil_data_by_id($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/user_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('id');
		$data = $this->user_model->ambil_data_by_id($id);
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$blokir = $this->input->post('blokir');

		// Ambil hak akses dari input
		$hak_akses = $this->input->post('hak_akses');

		$array = [
			'username' => $username,
			'password' => $data->password, // Menggunakan password yang sudah ada
			'email' => $email,
			'hak_akses' => $hak_akses, // Menggunakan hak akses yang diambil dari form
			'blokir' => $blokir
		];

		$this->user_model->update($array, $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Pengguna Berhasil diperbarui!
                </div>');
		redirect('administrator/user');
	}
}
