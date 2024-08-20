<?php
class Guru extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$this->load->model('guru_model'); // Memuat model guru_model
		$data['guru'] = $this->guru_model->tampil_data('guru'); // Memanggil metode tampil_data dari model guru_model
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/guru', $data);
		$this->load->view('layouts/footer');
	}
	public function detail($id)
	{
		$where = array('nik' => $id);
		$data['detail'] = $this->guru_model->ambil_kode_guru($id); // Perbaikan parameter yang dilewatkan ke edit_data
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/guru_detail', $data); // Mengganti view yang dipanggil
		$this->load->view('layouts/footer');
	}
	public function tambah_guru()
	{
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/guru_form');
		$this->load->view('layouts/footer');
	}

	public function tambah_guru_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_guru();
		} else {
			$nik = $this->input->post('nik');
			$nama_guru = $this->input->post('nama_guru');
			$alamat = $this->input->post('alamat');
			$jenis_kelamin = $this->input->post('jenis_kelamin');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$email = $this->input->post('email');
			$agama = $this->input->post('agama');
			$no_telp = $this->input->post('no_telp');
			$foto = $this->input->post('foto');
			// Set idu sama dengan nik
			$idu = $nik;

			// Membuat konfigurasi untuk upload file
			$config['upload_path']          = './assets/uploads/img/guru/';
			$config['allowed_types']        = 'jpg|jpeg';
			$config['max_size']             = 5024;
			$config['overwrite']             = TRUE;
			$config['file_name']             = 'Guru-' . $nik;
			// Memuat modul bawaaan ci untuk mengangani uploadd file
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$data_upload['tipe'] = $this->upload->data();
				$nama_file = 'Guru-' . $nik . $data_upload['tipe']['file_ext'];
				$data = array(
					'nik' => $nik,
					'nama_guru' => $nama_guru,
					'alamat' => $alamat,
					'jenis_kelamin' => $jenis_kelamin,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
					'email' => $email,
					'agama' => $agama,
					'no_telp' => $no_telp,
					'foto' => $nama_file, // buat nama filenya pakai nik
					'idu' => $idu // Attribut idu diisi dengan nilai dari nik
				);

				if ($this->guru_model->insert_data($data)) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Data guru Berhasil Ditambahkan!
                        </div>');
					redirect('administrator/guru'); // Redirect kembali ke halaman tabel guru setelah data terupload & terinput
				} else {
					// hapus foto yang baru diupload jika berhasil upload tapi gagal menambah data
					unlink('./assets/uploads/img/guru/' . $nama_file);
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal menambah data guru.
                        </div>');
					redirect('administrator/guru/tambah_guru'); // Jika berhasil upload tapi gagal tambah data, tetap di halaman tambah guru
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal upload foto guru.
                    </div>');
				redirect('administrator/guru'); // Jika gagal upload, tetap di halaman tambah guru
			}
		}
	}


	public function _rules()
	{
		$this->form_validation->set_rules('nik', 'Nomor Induk Guru', 'required');
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Harus di isi!']);
		$this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Harus di isi!']);
	}
	public function update($id)
	{
		$where = array('nik' => $id);
		$data['guru'] = $this->guru_model->ambil_kode_guru($id); // Menggunakan method ambil_kode_guru dari model
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/guru_update', $data);
		$this->load->view('layouts/footer');
	}

	public function update_aksi()
	{
		$nik = $this->input->post('nik');
		$nama_guru = $this->input->post('nama_guru');
		$alamat = $this->input->post('alamat');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$email = $this->input->post('email');
		$agama = $this->input->post('agama');
		$no_telp = $this->input->post('no_telp');
		$old_foto = $this->input->post('old_foto');
		// Set idu sama dengan nik
		$idu = $nik;

		// Membuat konfigurasi untuk upload file
		$config['upload_path']          = './assets/uploads/img/guru/';
		$config['allowed_types']        = 'jpg|jpeg';
		$config['max_size']             = 5024;
		$config['overwrite']             = TRUE;
		$config['file_name']             = 'Guru-' . $nik;
		// Memuat modul bawaaan ci untuk mengangani upload file
		$this->load->library('upload', $config);

		if (!isset($_FILES['foto']) || $_FILES['foto']['error'] == UPLOAD_ERR_NO_FILE) {
			// Jika melakukan update data tanpa update foto
			$data = array(
				'nik' => $nik,
				'nama_guru' => $nama_guru,
				'alamat' => $alamat,
				'jenis_kelamin' => $jenis_kelamin,
				'tempat_lahir' => $tempat_lahir,
				'tgl_lahir' => $tgl_lahir,
				'email' => $email,
				'agama' => $agama,
				'no_telp' => $no_telp,
				'foto' => $old_foto,
				'idu' => $idu // Attribut idu diisi dengan nilai dari nik
			);

			$where = array(
				'nik' => $nik
			);

			if ($this->guru_model->update_data($where, $data, 'guru')) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Data guru Berhasil diupdate!
                    </div>');
				redirect('administrator/guru');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Gagal mengupdate data guru.
                    </div>');
				redirect('administrator/guru');
			}
		} else {
			unlink('./assets/uploads/img/guru/' . $old_foto); // hapus foto lama
			// Jika melakukan update data beserta foto
			if ($this->upload->do_upload('foto')) {
				$data_upload['tipe'] = $this->upload->data();
				$nama_file = 'Guru-' . $nik . $data_upload['tipe']['file_ext'];
				$data = array(
					'nik' => $nik,
					'nama_guru' => $nama_guru,
					'alamat' => $alamat,
					'jenis_kelamin' => $jenis_kelamin,
					'tempat_lahir' => $tempat_lahir,
					'tgl_lahir' => $tgl_lahir,
					'email' => $email,
					'agama' => $agama,
					'no_telp' => $no_telp,
					'foto' => $nama_file, // buat nama filenya pakai nik
					'idu' => $idu // Attribut idu diisi dengan nilai dari nik
				);

				$where = array(
					'nik' => $nik
				);

				if ($this->guru_model->update_data($where, $data, 'guru')) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Data guru Berhasil diupdate!
                        </div>');
					redirect('administrator/guru');
				} else {
					unlink('./assets/uploads/img/guru/' . $nama_file); // hapus foto yang baru diupload jika gagal
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal mengupdate data guru.
                        </div>');
					redirect('administrator/guru');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Gagal upload foto guru.
                        </div>');
				redirect('administrator/guru'); // Jika gagal upload, tetap di halaman update guru
			}
		}
	}



	public function delete($id)
	{
		$where = array('nik' => $id);
		$this->guru_model->hapus_data($where, 'guru');
		//$data['detail'] = $this->guru_model->ambil_kode_guru($id); // Masih jadi issue (data terhapus tapi file tdk)
		//unlink('./assets/uploads/img/guru/'.$data['detail'][0]->foto); // hapus foto
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Data guru Berhasil dihapus!
                </div>');
		redirect('administrator/guru');
	}

	public function biodata($nip)
	{
		// var_dump($nis);
		// $where = array('nis' => $nis);
		$data = [
			'biodata' => $this->guru_model->biodata($nip)->row_array(),
		];
		// var_dump($data);die;
		// Menggunakan method ambil_kode_siswa dari model
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('guru/biodata', $data);
		$this->load->view('layouts/footer');
	}
}
