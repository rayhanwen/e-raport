<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iklan_model extends CI_Model {

    public function tampil_data() {
        return $this->db->get('iklan')->result();
    }

    public function insert_data($data) {
        return $this->db->insert('iklan', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('iklan', ['id_iklan' => $id])->row();
    }

    public function delete($id) {
        return $this->db->delete('iklan', ['id_iklan' => $id]);
    }
}
?>
