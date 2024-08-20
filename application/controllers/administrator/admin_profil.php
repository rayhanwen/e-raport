<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!isset($this->session->userdata['username'])) {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		 Anda Belum Login!
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>');
			redirect('administrator/auth');
		}
		$this->load->model('Guru_model'); // Assuming you use Guru_model for admin
	}

	public function index()
	{
		$data['detail'] = $this->Guru_model->get_detail_by_username($this->session->userdata('username'));

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('administrator/admin_profil', $data);
		$this->load->view('templates_administrator/footer');
	}
}
