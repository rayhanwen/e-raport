<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mengajar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tahun_ajaran_aktif() {
        $this->db->where('status', 'aktif');
        $query = $this->db->get('tahun_ajaran');
        return $query->num_rows() > 0 ? $query->row() : null;
    }

    public function get_kelas_by_id($id_kelas) {
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get('kelas');
        return $query->num_rows() > 0 ? $query->row() : null;
    }

    public function tambah_mengajar($data) {
        if (!empty($data['id_kelas']) && !empty($data['nik']) && !empty($data['id_tahun']) && !empty($data['id_mapel'])) {
            $this->db->insert('mengajar', $data);
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function baca_mengajar($id_kelas, $id_tahun) {
        $this->db->select('mengajar.*, mapel.nama_mapel, guru.nama_guru');
        $this->db->from('mengajar');
        $this->db->join('mapel', 'mengajar.id_mapel = mapel.id_mapel');
        $this->db->join('guru', 'mengajar.nik = guru.nik');
        $this->db->where('mengajar.id_kelas', $id_kelas);
        $this->db->where('mengajar.id_tahun', $id_tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tahun_ajaran_by_id($id_tahun) {
        $this->db->where('id_tahun', $id_tahun);
        $query = $this->db->get('tahun_ajaran');
        return $query->row();
    }

    public function get_mapel_dropdown() {
        $this->db->select('id_mapel, nama_mapel');
        $query = $this->db->get('mapel');
        $result = $query->result();
        $dropdown = array();

        foreach ($result as $row) {
            $dropdown[$row->id_mapel] = $row->nama_mapel;
        }

        return $dropdown;
    }

    public function get_guru_dropdown() {
        $this->db->select('nik, nama_guru');
        $query = $this->db->get('guru');
        $result = $query->result();
        $dropdown = array();

        foreach ($result as $row) {
            $dropdown[$row->nik] = $row->nama_guru;
        }

        return $dropdown;
    }

    public function delete_mengajar($id_mengajar) {
        $this->db->where('id_mengajar', $id_mengajar);
        $this->db->delete('mengajar');
    }

    public function get_mengajar_by_id($id_mengajar) {
        $this->db->where('id_mengajar', $id_mengajar);
        $query = $this->db->get('mengajar');
        return $query->row();
    }

    public function update_mengajar($id_mengajar, $data) {
        $this->db->where('id_mengajar', $id_mengajar);
        $this->db->update('mengajar', $data);
    }

    public function get_all_mapel() {
        $query = $this->db->get('mapel');
        return $query->result();
    }

    public function get_all_guru() {
        $query = $this->db->get('guru');
        return $query->result();
    }

    public function get_tahun_akademik_by_id($id_tahun_akademik) {
        $this->db->where('id_tahun', $id_tahun_akademik);
        return $this->db->get('tahun_ajaran')->row();
    }

    public function cek_duplikat_pengajar_guru($nik, $id_kelas, $id_tahun, $id_mapel, $semester) {
        // Checks for duplicate teacher entries based on the provided parameters
        $this->db->where('nik', $nik);
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('id_tahun', $id_tahun);
        $this->db->where('id_mapel', $id_mapel);
        $this->db->where('semester', $semester);
        $query = $this->db->get('mengajar');
        return $query->num_rows() > 0;
    }

    public function cek_duplikat_pengajar_mapel_semester($id_mapel, $semester){
        $this->db->where('id_mapel', $id_mapel);
        $this->db->where('semester', $semester);
        $this->db->from('mengajar');
        $result = $this->db->get();

        return $result->num_rows() > 0;
    }

    public function get_mapel_by_nik($nik){
        $this->db->select('kelas.*, mapel.nama_mapel, mengajar.id_mengajar');
        $this->db->from('kelas');
        $this->db->join('mengajar', 'kelas.id_kelas = mengajar.id_kelas');
        $this->db->join('mapel', 'mengajar.id_mapel = mapel.id_mapel');
        $this->db->where('mengajar.nik', $nik);
        $query = $this->db->get();
        return $query->result();
    }
}
?>
