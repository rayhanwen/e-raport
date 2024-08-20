<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_model extends CI_Model {

    public function tampil_data() {
        return $this->db->get('tentang_sekolah')->result();
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }
}
?>
