<?php
class Ekstra extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('ekstra_model');
		$this->load->model('siswa_model');
		$this->load->model('guru_model');
		$this->load->library('form_validation');
	}

	public function index($tahun_ajaran = null)
	{
		$tahun_ajaran = $this->input->get('tahun_ajaran');
		$data = array(
			// 'tahun_ajaran' => $this->ekstra_model->get_tahun_ajaran_aktif(),
			// 'get_tahun_ajaran' => $this->ekstra_model->ambil_data_tahun_ajaran(),
			'guru' => $this->guru_model->get_data_guru()->result(),
			'ekstra' => $this->ekstra_model->get_data_ekstra()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/ekstra/index', $data);
		$this->load->view('layouts/footer');
	}

	public function _rules($kode_ekstra = null,$nama_ekstra = null)
	{
		if ($this->input->post('kode_ekstra') !=$kode_ekstra) {
			$uniqueKode = '|is_unique[ekstra.kode_ekstra]';
		}else{
			$uniqueKode = '';
		}
		
		if ($this->input->post('nama_ekstra') !=$nama_ekstra) {
			$uniqueNama = '|is_unique[ekstra.nama_ekstra]';
		}else{
			$uniqueNama = '';
		}
		
		$this->form_validation->set_rules('kode_ekstra', 'Kode_ekstra','required|trim|min_length[5]|max_length[8]'.$uniqueKode, [
			'is_unique'   => 'Kode esktrakulikuler telah terdaftar!',
			'required'    => 'Kode esktrakulikuler Wajib Diisi!',
		]);
		$this->form_validation->set_rules('nama_ekstra', 'Nama_ekstra', 'required|trim'.$uniqueNama, [
			'is_unique'   => 'Nama ekstrakulikuler telah terdaftar!',
			'required'    => 'Nama ekstrakulikuler Wajib Diisi!',
		]);
	}
	public function tambah_ekstra()
	{
		$this->_rules(); // Validasi form

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(
				[
					'error' => true,
					'kode_ekstra_error' => form_error('kode_ekstra'),
					'nama_ekstra_error' => form_error('nama_ekstra'),
				]
			);
		} else {
			$kode_ekstra = $this->input->post('kode_ekstra');
			$nama_ekstra = $this->input->post('nama_ekstra');

			$data = array(
				'kode_ekstra' => $kode_ekstra,
				'nama_ekstra' => $nama_ekstra,
			);

			$insert = $this->ekstra_model->insert_data($data);
			if ($insert) {
				$msg = [
					'msg' => [
						$this->session->set_flashdata('success', 'ekstra Berhasil Ditambahkan'),
					]
				];
				echo json_encode($msg);
			}
		}
	}

	public function get_by_id()
	{
		$id = $this->input->post('id');
		$data = $this->ekstra_model->get_by_id($id);
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post('kode_ekstra_lama');
		$getData = $this->ekstra_model->get_by_id($id);

		$kode_ekstra = $this->input->post('kode_ekstra');
		$nama_ekstra = $this->input->post('nama_ekstra');

		$a = $getData;

		$b = array(
			'kode_ekstra' => $kode_ekstra,
			'nama_ekstra' => $nama_ekstra,
		);

		if (($a == $b) == true) {
			echo json_encode(['alert' => 'nothing changes']);
			return false;
		} else {
			$this->_rules($getData['kode_ekstra'], $getData['nama_ekstra']);
		}

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(
				[
					'error' => true,
					'kode_ekstra_error' => form_error('kode_ekstra'),
					'nama_ekstra_error' => form_error('nama_ekstra'),
				]
			);
		} else {

			$data = array(
				'kode_ekstra' => $kode_ekstra,
				'nama_ekstra' => $nama_ekstra,
			);

			$where = array(
				'kode_ekstra' => $id
			);

			$update =	$this->ekstra_model->update_data($where, $data, 'ekstra');
			if ($update) {
				$msg = [
					'msg' => [
						$this->session->set_flashdata('success', 'ekstra Berhasil Diupdate'),
					]
				];
				echo json_encode($msg);
			}
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$where = array('kode_ekstra' => $id);
		$this->ekstra_model->delete_data($where);
		$msg = [
			'msg' => 'success',
		];
		echo json_encode($msg);
	}
}
