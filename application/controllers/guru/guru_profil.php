<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Guru_model');
	}

	public function index()
	{
		$data['detail'] = $this->Guru_model->get_detail_by_username($this->session->userdata('username'));

		$this->load->view('templates_administrator/header');
		$this->load->view('templates_administrator/sidebar');
		$this->load->view('guru/guru_profil', $data);
		$this->load->view('templates_administrator/footer');
	}
}
