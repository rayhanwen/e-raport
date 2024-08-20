
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class kontak_model extends CI_Model {
        public $table = 'kontak';
        public $id = 'id_kontak';
        public $order = 'DESC';
        public function tampil_data($table) {
            return $this->db->get($table)->result();
        }
    
        public function insert_data($data, $table) {
            $this->db->insert($table, $data);
        }
    
        public function get_by_id($table, $id, $value) {
            $this->db->where($id, $value);
            return $this->db->get($table)->row();
        }
    
        public function update_data($table, $id, $value, $data) {
            $this->db->where($id, $value);
            $this->db->update($table, $data);
        }
    
        public function delete_data($table, $id, $value) {
            $this->db->where($id, $value);
            $this->db->delete($table);
        }
    }
    ?>
    