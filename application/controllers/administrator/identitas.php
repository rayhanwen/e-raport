<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('identitas_model');
    }

    public $table = 'identitas';
    public $id = 'id_identitas';

    public function index() {
        $data['identitas'] = $this->identitas_model->tampil_data($this->table);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/identitas', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function edit($id_identitas) {
        $where = array($this->id => $id_identitas);
        $data['identitas'] = $this->identitas_model->edit_data($where, $this->table);
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/identitas_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi() {
        $id_identitas = $this->input->post('id_identitas');
        $data = array(
            'nama_website' => $this->input->post('nama_website'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'npsn' => $this->input->post('npsn')
        );

        $where = array($this->id => $id_identitas);

        if ($this->identitas_model->update_data($where, $data, $this->table)) {
            $this->session->set_flashdata('success', 'Data identitas berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Data identitas gagal diperbarui.');
        }

        redirect('administrator/identitas');
    }
}
?>
