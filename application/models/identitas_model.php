<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Identitas_model extends CI_Model {

    public $table = 'identitas';
    public $id = 'id_identitas';

    public function tampil_data($table) {
        return $this->db->get($table)->result();
    }

    public function edit_data($where, $table) {
        return $this->db->get_where($table, $where)->row();
    }

    public function update_data($where, $data, $table) {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }
}
?>
