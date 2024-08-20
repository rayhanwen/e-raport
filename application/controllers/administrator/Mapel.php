<?php
class Mapel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('mapel_model');
		$this->load->model('siswa_model');
		$this->load->model('guru_model');
		$this->load->library('form_validation');
	}

	public function index($tahun_ajaran = null)
	{
		$tahun_ajaran = $this->input->get('tahun_ajaran');
		$data = array(
			// 'tahun_ajaran' => $this->mapel_model->get_tahun_ajaran_aktif(),
			// 'get_tahun_ajaran' => $this->mapel_model->ambil_data_tahun_ajaran(),
			'guru' => $this->guru_model->get_data_guru()->result(),
			'mapel' => $this->mapel_model->get_data_mapel()
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/sidebar');
		$this->load->view('administrator/mapel/index', $data);
		$this->load->view('layouts/footer');
	}

	public function _rules($kode_mapel = null,$nama_mapel = null)
	{
		if ($this->input->post('kode_mapel') !=$kode_mapel) {
			$uniqueKode = '|is_unique[mapel.kode_mapel]';
		}else{
			$uniqueKode = '';
		}
		
		if ($this->input->post('nama_mapel') !=$nama_mapel) {
			$uniqueNama = '|is_unique[mapel.nama_mapel]';
		}else{
			$uniqueNama = '';
		}
		
		$this->form_validation->set_rules('kode_mapel', 'Kode_mapel','required|trim|min_length[5]|max_length[8]'.$uniqueKode, [
			'is_unique'   => 'Kode mapel telah terdaftar!',
			'required'    => 'Kode mapel Wajib Diisi!',
			'min_length'  => 'Kode mapel minimal 5 digit!',
			'max_length'  => 'Kode mapel minimal 8 digit!',
		]);
		$this->form_validation->set_rules('nama_mapel', 'Nama_mapel', 'required|trim'.$uniqueNama, [
			'is_unique'   => 'Nama mapel telah terdaftar!',
			'required'    => 'Nama mapel Wajib Diisi!',
		]);
		$this->form_validation->set_rules('kkm', 'kkm', 'required|trim|numeric|min_length[2]|max_length[3]', [
			'required'    => 'KKM Wajib Diisi!',
			'numeric'     => 'KKM Wajib berupa angka!',
			'min_length'  => 'KKM minimal 2 angka!',
			'max_length'  => 'KKM minimal 3 angka!',

		]);
	}
	public function tambah_mapel()
	{
		$this->_rules(); // Validasi form

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(
				[
					'error' => true,
					'kode_mapel_error' => form_error('kode_mapel'),
					'nama_mapel_error' => form_error('nama_mapel'),
					'kkm_error' 	   => form_error('kkm'),
				]
			);
		} else {
			$kode_mapel = $this->input->post('kode_mapel');
			$nama_mapel = $this->input->post('nama_mapel');
			$kkm = $this->input->post('kkm');

			$data = array(
				'kode_mapel' => $kode_mapel,
				'nama_mapel' => $nama_mapel,
				'kkm' => $kkm,
			);

			$insert = $this->mapel_model->insert_data($data);
			if ($insert) {
				$msg = [
					'msg' => [
						$this->session->set_flashdata('success', 'Mapel Berhasil Ditambahkan'),
					]
				];
				echo json_encode($msg);
			}
		}
	}

	public function get_by_id()
	{
		$id = $this->input->post('id');
		$data = $this->mapel_model->get_by_id($id);
		echo json_encode($data);
	}

	public function update()
	{
		$id = $this->input->post('kode_mapel_lama');
		$getData = $this->mapel_model->get_by_id($id);

		$kode_mapel = $this->input->post('kode_mapel');
		$nama_mapel = $this->input->post('nama_mapel');
		$kkm = $this->input->post('kkm');

		$a = $getData;

		$b = array(
			'kode_mapel' => $kode_mapel,
			'nama_mapel' => $nama_mapel,
			'kkm' 		 => $kkm,
		);

		if (($a == $b) == true) {
			echo json_encode(['alert' => 'nothing changes']);
			return false;
		} else {
			$this->_rules($getData['kode_mapel'], $getData['nama_mapel']);
		}

		if ($this->form_validation->run() == FALSE) {
			echo json_encode(
				[
					'error' => true,
					'kode_mapel_error' => form_error('kode_mapel'),
					'nama_mapel_error' => form_error('nama_mapel'),
					'kkm_error' 	   => form_error('kkm'),
				]
			);
		} else {

			$data = array(
				'kode_mapel' => $kode_mapel,
				'nama_mapel' => $nama_mapel,
				'kkm' 		 => $kkm,
			);

			$where = array(
				'kode_mapel' => $id
			);

			$update =	$this->mapel_model->update_data($where, $data, 'mapel');
			if ($update) {
				$msg = [
					'msg' => [
						$this->session->set_flashdata('success', 'Mapel Berhasil Diupdate'),
					]
				];
				echo json_encode($msg);
			}
		}
	}
	public function delete()
	{
		$id = $this->input->post('id');
		$where = array('kode_mapel' => $id);
		$this->mapel_model->delete_data($where);
		$msg = [
			'msg' => 'success',
		];
		echo json_encode($msg);
	}
}
