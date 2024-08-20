<?php
class Galeri_model extends CI_Model {

    public function tampil_data() {
        return $this->db->get('galeri')->result();
    }

    public function insert_data($data, $table) {
        return $this->db->insert($table, $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('galeri', ['id_galeri' => $id])->row();
    }

    public function delete($id, $table) {
        return $this->db->delete($table, ['id_galeri' => $id]);
    }
}
?>
