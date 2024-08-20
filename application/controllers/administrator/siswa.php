<?php
class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	public function index()
	{
		$data['siswa'] = $this->siswa_model->tampil_data()->result();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_siswa()
	{
		$this->load->model('kelas_model');
		$data['siswa'] = $this->siswa_model->get_siswa();
		$data['kelas'] = $this->kelas_model->get_all_kelas();
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_form', $data);
		$this->load->view('templates_administrator/footer');
	}

	private function _rules()
	{
		$this->form_validation->set_rules('nis', 'NIS', 'required');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
		// Tambahkan aturan validasi lainnya sesuai kebutuhan Anda
	}

	public function tambah_siswa_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_siswa();
		} else {
			// // Isi idu dengan nilai nis
			// $idu = $nis;

			// // Membuat konfigurasi untuk upload file
			// $config['upload_path']          = './assets/uploads/img/siswa/';
			// $config['allowed_types']        = 'jpg|jpeg';
			// $config['max_size']             = 5024;
			// $config['overwrite']             = TRUE;
			// $config['file_name']             = 'Siswa-' . $nis;
			// // Memuat modul bawaaan ci untuk mengangani upload file
			// $this->load->library('upload', $config);

			// if (!isset($_FILES['foto']) || $_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
			// 	// Jika melakukan tambah data tanpa update foto
			$this->db->trans_begin();

			$siswa = [
				'nis' 						=> htmlspecialchars($this->input->post('nis', true)),
				'nama_siswa' 			=> htmlspecialchars($this->input->post('nama_siswa', true)),
				'jenis_kelamin' 	=> htmlspecialchars($this->input->post('jenis_kelamin', true)),
				'tempat_lahir' 		=> htmlspecialchars($this->input->post('tempat_lahir', true)),
				'tgl_lahir' 			=> htmlspecialchars($this->input->post('tgl_lahir'), true),
				'agama' 					=> htmlspecialchars($this->input->post('agama'), true),
				'alamat' 					=> htmlspecialchars($this->input->post('alamat'), true),
				'no_telp' 				=> htmlspecialchars($this->input->post('no_telp', true)),
				'id_kelas' 				=> htmlspecialchars($this->input->post('id_kelas', true)),
				'nama_ayah' 			=> htmlspecialchars($this->input->post('nama_ayah', true)),
				'pekerjaan_ayah' 	=> htmlspecialchars($this->input->post('pekerjaan_ayah', true)),
				'nama_ibu' 				=> htmlspecialchars($this->input->post('nama_ibu', true)),
				'pekerjaan_ibu' 	=> htmlspecialchars($this->input->post('pekerjaan_ibu', true)),
			];

			$this->db->insert('siswa', $siswa);
			// $idu = $this->db->insert_id();
			$nis = htmlspecialchars($this->input->post('nis', true));
			$password = substr($nis, 10, 16);
			// var_dump($nis, $password);
			// die;
			$pengguna = [
				'idu'	 			=> htmlspecialchars($this->input->post('nis', true)),
				'username' 	=> htmlspecialchars($this->input->post('nis', true)),
				'password' 	=> password_hash($password, PASSWORD_DEFAULT),
				'email' 		=> htmlspecialchars($this->input->post('email', true)),
				'hak_akses' => 'siswa',
			];

			$this->db->insert('pengguna', $pengguna);

			if ($this->db->trans_status() === FALSE) {
				var_dump('error');
				die;
				$this->db->trans_rollback();
			} else {
				// var_dump('success');
				// die;
				$this->db->trans_commit();
				$this->session->set_flashdata('success', "Siswa $nis Berhasil Ditambahkan");
				redirect('administrator/siswa');
			}
		}
	}

	public function update($id)
	{
		$where = array('nis' => $id);
		$data['siswa'] = $this->siswa_model->ambil_kode_siswa($id); // Menggunakan method ambil_kode_siswa dari model
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/siswa_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function update_aksi()
	{
		$id = $this->input->post('nis');
		$nama_siswa = $this->input->post('nama_siswa');
		$alamat = $this->input->post('alamat');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$email = $this->input->post('email');
		$agama = $this->input->post('agama');
		$nama_ayah = $this->input->post('nama_ayah');
		$pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
		$nama_ibu = $this->input->post('nama_ibu');
		$pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
		$foto = $this->input->post('foto');
		$no_telp = $this->input->post('no_telp');
		$old_foto = $this->input->post('old_foto');

		// Membuat konfigurasi untuk upload file
		$config['upload_path']          = './assets/uploads/img/siswa/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 5024;
		$config['overwrite']             = TRUE;
		$config['file_name']             = 'Siswa-' . $id;
		// Memuat modul bawaaan ci untuk mengangani upload file
		$this->load->library('upload', $config);

		if (!isset($_FILES['foto']) || $_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
			$data = array(
				'nama_siswa' => $nama_siswa,
				'alamat' => $alamat,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'email' => $email,
				'agama' => $agama,
				'nama_ayah' => $nama_ayah,
				'pekerjaan_ayah' => $pekerjaan_ayah,
				'nama_ibu' => $nama_ibu,
				'pekerjaan_ibu' => $pekerjaan_ibu,
				'foto' => $old_foto,
				'no_telp' => $no_telp,
			);

			$where = array(
				'nis' => $id
			);

			if ($this->siswa_model->update_data($where, $data, 'siswa')) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data siswa Berhasil diupdate!
                    </div>');
				redirect('administrator/siswa');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal mengupdate data siswa.
                    </div>');
				redirect('administrator/siswa');
			}
		} else {
			unlink('./assets/uploads/img/siswa/' . $old_foto); // hapus foto lama
			// Jika melakukan update data beserta foto
			if ($this->upload->do_upload('foto')) {
				$data_upload['tipe'] = $this->upload->data();
				$nama_file = 'Siswa-' . $id . $data_upload['tipe']['file_ext'];
				$data = array(
					'nama_siswa' => $nama_siswa,
					'alamat' => $alamat,
					'jenis_kelamin' => $jenis_kelamin,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
					'email' => $email,
					'agama' => $agama,
					'nama_ayah' => $nama_ayah,
					'pekerjaan_ayah' => $pekerjaan_ayah,
					'nama_ibu' => $nama_ibu,
					'pekerjaan_ibu' => $pekerjaan_ibu,
					'foto' => $nama_file,
					'no_telp' => $no_telp,
				);

				$where = array(
					'nis' => $id
				);

				if ($this->siswa_model->update_data($where, $data, 'siswa')) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Data siswa Berhasil diupdate!
                        </div>');
					redirect('administrator/siswa');
				} else {
					unlink('./assets/uploads/img/siswa/' . $nama_file); // hapus foto yang baru diupload jika gagal
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal mengupdate data siswa.
                        </div>');
					redirect('administrator/siswa');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal upload foto siswa.
                    </div>');
				redirect('administrator/siswa');
			}
		}
	}

	public function delete($id)
	{
		$where = array('nis' => $id);
		$this->siswa_model->hapus_data($where, 'siswa');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Data siswa Berhasil dihapus!
        </div>');
		redirect('administrator/siswa');
	}

	public function detail_kelas($id)
	{
		$this->load->model('siswa_model');
		$data['detail'] = $this->Kelas_model->detail_kelas($id); // Memanggil method detail_kelas dari model dengan parameter $id
		$data['siswa'] = $this->siswa_model->get_by_id_kelas($id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/kelas_detail', $data); // Menyertakan data detail ke dalam view
		$this->load->view('templates_administrator/footer');
	}

	public function biodata($nis)
	{
		// var_dump($nis);
		// $where = array('nis' => $nis);
		$data = [
			'biodata' => $this->siswa_model->tampil_data($nis)->row_array(),
		];
		// var_dump($data);die;
		// Menggunakan method ambil_kode_siswa dari model
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('siswa/biodata', $data);
		$this->load->view('templates_administrator/footer');
	}
}
