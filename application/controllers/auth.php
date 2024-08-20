<?php
class Auth extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'Login | Pages';
		$this->form_validation->set_rules('username', 'username', 'required', [
			'required'    => 'Masukan Username Anda!',
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required'    => 'Masukan Password Anda!',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/layouts/header', $data);
			$this->load->view('auth/login');
			$this->load->view('auth/layouts/footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$user     = $this->db->get_where('user', ['username' => $username])->row_array();

		// jika usernya ada
		if ($user) {

			// jika status usernya aktif
			if ($user['status'] == 1) {

				// cek password
				if (password_verify($password, $user['password'])) {

					if ($user['hak_akses'] == 'Guru') {
						$guru = $this->db->get_where('guru', ['idu' => $user['idu']])->row_array();
					}

					if ($user['hak_akses'] == 'Siswa') {
						$siswa = $this->db->get_where('siswa', ['idu' => $user['idu']])->row_array();
					}

					$data = [
						'username'	 => $user['username'],
						'idu'     	 => $guru['nip'] ?? $siswa['nisn'] ?? $user['idu'],
						'hak_akses'  => $user['hak_akses'],
					];

					$this->session->set_userdata($data);
					if ($data['hak_akses'] == 'Admin') {
						redirect('administrator/dashboard');
					} elseif ($data['hak_akses'] == 'Guru') {
						redirect('guru/dashboard');
					} elseif ($data['hak_akses'] == 'Siswa') {
						redirect('siswa/dashboard'); 
					}
				} else {
					$this->session->set_flashdata('error', 'Username Atau Password Salah!');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('error', 'Username ini belum aktif!');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('error', 'Username Atau Pssword Salah!');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('hak_akses');
		$this->session->unset_userdata('idu');
		$this->session->sess_destroy();
		redirect('/');
	}
}
