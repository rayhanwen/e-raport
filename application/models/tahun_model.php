<?php
class Tahun_model extends CI_Model {

    public function tampil_data() {
        return $this->db->get('tahun_ajaran')->result();
    }

    public function tambah_data($data) {
        $this->db->insert('tahun_ajaran', $data);
    }

    public function ambil_data_id($id) {
        $this->db->where('id_tahun', $id);
        return $this->db->get('tahun_ajaran')->row();
    }

    public function update_data($id, $data) {
        $this->db->where('id_tahun', $id);
        $this->db->update('tahun_ajaran', $data);
    }

    public function nonaktifkan_semua() {
        $this->db->set('status', 'Tidak Aktif');
        $this->db->where('status', 'Aktif');
        $this->db->update('tahun_ajaran');
    }

    public function hapus_data($id_tahun) {
        $this->db->where('id_tahun', $id_tahun);
        $this->db->delete('tahun_ajaran');
    }
    public $table = 'tahun_ajaran';
    public $id = 'id_tahun';
    public function get_by_id($id_tahun) {
        $query = $this->db->get_where('tahun_ajaran', array('id_tahun' => $id_tahun));
        return $query->row();
    }
}
?>
