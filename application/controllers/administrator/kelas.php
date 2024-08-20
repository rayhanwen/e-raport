<?php
class Kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Kelas_model');
		$this->load->model('siswa_model');
		$this->load->model('guru_model');
		$this->load->library('form_validation');
	}

	public function index($tahun_ajaran = null)
	{
		$tahun_ajaran = $this->input->get('tahun_ajaran');
		$data = array(
			// 'tahun_ajaran' => $this->Kelas_model->get_tahun_ajaran_aktif(),
			// 'get_tahun_ajaran' => $this->Kelas_model->ambil_data_tahun_ajaran(),
			'guru' => $this->guru_model->get_data_guru()->result(),
			'kelas' => $this->Kelas_model->get_data_kelas()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/kelas/index', $data);
		$this->load->view('layouts/footer');
	}

	public function _rules($id = null)
	{
		$this->form_validation->set_rules('kode_kelas', 'Kode_Kelas', 'required|trim|is_unique[kelas.kode_kelas]', [
			'is_unique'   => 'Kode kelas telah terdaftar!',
			'required'    => 'Kode kelas Wajib Diisi!',
		]);
		$this->form_validation->set_rules('nama_kelas', 'Nama_Kelas', 'required|trim|is_unique[kelas.nama_kelas]', [
			'is_unique'   => 'Nama kelas telah terdaftar!',
			'required'    => 'Nama Kelas Wajib Diisi!',
		]);
		$this->form_validation->set_rules('wali_kelas', 'Wali_Kelas', 'required', [
			'is_unique'   => 'Nama kelas telah terdaftar!',
			'required'    => 'Nama Kelas Wajib Diisi!',
		]);
	}
	public function tambah_kelas()
	{
		$this->_rules(); // Validasi form

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(
				[
					'error' => true,
					'kode_kelas_error' => form_error('kode_kelas'),
					'nama_kelas_error' => form_error('nama_kelas'),
				]
			);
		} else {
			$kode_kelas = $this->input->post('kode_kelas');
			$nama_kelas = $this->input->post('nama_kelas');
			$wali_kelas = $this->input->post('wali_kelas');

			$data = array(
				'kode_kelas' => $kode_kelas,
				'nama_kelas' => $nama_kelas,
				'wali_kelas' => $wali_kelas,
			);

			$insert = $this->Kelas_model->insert_data($data);
			if ($insert) {
				$msg = [
					'msg' => [
						$this->session->set_flashdata('success', 'Kelas Berhasil Ditambahkan'),
					]
				];
				echo json_encode($msg);
			}
		}
	}

	public function get_by_id()
	{
		$id = $this->input->post('id');
		$data = $this->kelas_model->get_by_id($id);
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post('kode_kelas');
		$getData = $this->kelas_model->get_by_id($id);
		$a = $getData;
		$b = array(
			'kode_kelas' => $this->input->post('kode_kelas'),
			'nama_kelas' => $this->input->post('nama_kelas'),
			'wali_kelas' => $this->input->post('wali_kelas'),
		);

		if (($a == $b) == true) {
			echo json_encode(['alert' => 'nothing changes']);
			return false;
		} else {
			$this->_rules($id);
		}

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(
				[
					'error' => true,
					'kode_kelas_error' => form_error('kode_kelas'),
					'nama_kelas_error' => form_error('nama_kelas'),
				]
			);
		} else {

			$id = $this->input->post('kode_kelas_lama');
			$kode_kelas = $this->input->post('kode_kelas');
			$nama_kelas = $this->input->post('nama_kelas');
			$wali_kelas = $this->input->post('wali_kelas');

			$data = array(
				'kode_kelas' => $kode_kelas,
				'nama_kelas' => $nama_kelas,
				'wali_kelas' => $wali_kelas,
			);

			$where = array(
				'kode_kelas' => $id
			);

			$update =	$this->Kelas_model->update_data($where, $data, 'kelas');
			if ($update) {
				$msg = [
					'msg' => [
						$this->session->set_flashdata('success', 'Kelas Berhasil Diupdate'),
					]
				];
				echo json_encode($msg);
			}
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$where = array('kode_kelas' => $id);
		$this->Kelas_model->delete_data($where);
		$msg = [
			'msg' => 'success',
		];
		echo json_encode($msg);
	}
}
