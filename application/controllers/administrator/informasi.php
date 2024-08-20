<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// is_logged_in();
		$this->load->model('informasi_model');
		$this->load->library('upload');  // Load the upload library
	}

	public $table = 'informasi';
	public $id = 'id_informasi';

	public function index()
	{
		$data['informasi'] = $this->informasi_model->tampil_data($this->table);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/informasi', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_informasi()
	{
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/informasi_form');
		$this->load->view('templates_administrator/footer');
	}

	public function tambah_informasi_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_informasi();
		} else {
			$config['upload_path'] = 'sisfo_akademikk/assets/uploads/img/informasi/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '2048';  // 2MB
			$config['file_name'] = time() . '_' . $_FILES['foto']['name'];

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				$this->tambah_informasi();
			} else {
				$uploadData = $this->upload->data();
				$foto = $uploadData['file_name'];

				$data = array(
					'foto' => $foto,
					'judul_informasi' => $this->input->post('judul_informasi'),
					'isi_informasi' => $this->input->post('isi_informasi')
				);

				$this->informasi_model->insert_data($data, $this->table);
				$this->session->set_flashdata('success', 'Informasi berhasil ditambahkan');
				redirect('administrator/informasi');
			}
		}
	}

	public function edit($id)
	{
		$data['informasi'] = $this->informasi_model->get_by_id($this->table, $this->id, $id);
		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/informasi_update', $data);
		$this->load->view('templates_administrator/footer');
	}

	public function edit_aksi()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->edit($this->input->post('id_informasi'));
		} else {
			$id = $this->input->post('id_informasi');

			$config['upload_path'] = 'sisfo_akademikk/assets/uploads/img/informasi/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '2048';  // 2MB
			$config['file_name'] = time() . '_' . $_FILES['foto']['name'];

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$foto = $this->input->post('foto_old');
			} else {
				$uploadData = $this->upload->data();
				$foto = $uploadData['file_name'];
			}

			$data = array(
				'foto' => $foto,
				'judul_informasi' => $this->input->post('judul_informasi'),
				'isi_informasi' => $this->input->post('isi_informasi')
			);

			$this->informasi_model->update_data($this->table, $this->id, $id, $data);
			$this->session->set_flashdata('success', 'Informasi berhasil diperbarui');
			redirect('administrator/informasi');
		}
	}

	public function hapus($id)
	{
		$this->informasi_model->delete_data($this->table, $this->id, $id);
		$this->session->set_flashdata('success', 'Informasi berhasil dihapus');
		redirect('administrator/informasi');
	}

	public function _rules()
	{
		// Remove foto from rules since it's not required on update
		$this->form_validation->set_rules('judul_informasi', 'Judul Informasi', 'required');
		$this->form_validation->set_rules('isi_informasi', 'Isi Informasi', 'required');
	}
}
