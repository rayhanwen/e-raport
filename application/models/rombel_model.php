<?php
class Rombel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_kelas_asal($id_tahun) {
        // Mengambil id_kelas dan nama_kelas dari tabel wali_kelas sesuai dengan tahun ajaran aktif
        $this->db->select('wali_kelas.id_kelas, kelas.nama_kelas');
        $this->db->from('wali_kelas');
        $this->db->join('kelas', 'kelas.id_kelas = wali_kelas.id_kelas');
        $this->db->where('wali_kelas.id_tahun', $id_tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_active_year() {
        // Mendapatkan tahun ajaran aktif dari tabel tahun_ajaran
        $this->db->select('*');
        $this->db->from('tahun_ajaran');
        $this->db->where('status', 'aktif');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_siswa_by_kelas($id_kelas, $id_tahun) {
        $this->db->select('siswa.nis, siswa.nama_siswa');
        $this->db->from('siswa');
        $this->db->join('rombel', 'rombel.nis = siswa.nis');
        $this->db->where('rombel.id_kelas', $id_kelas);
        $this->db->where('rombel.id_tahun', $id_tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_siswa_by_nis($nis, $data){
        $this->db->where('nis', $nis);
        $this->db->update('rombel', $data);
    }

    public function tambah_siswa($data){
            return $this->db->insert('rombel', $data);
    }

    public function hapus_siswa($nis){
        $this->db->where('nis', $nis);
        $this->db->delete('rombel');
    }

    public function get_siswa_by_kelas_tahun_aktif($id_kelas, $id_tahun) {
        $this->db->select('siswa.nis, siswa.nama_siswa, siswa.jenis_kelamin, siswa.alamat');
        $this->db->from('siswa');
        $this->db->join('rombel', "rombel.nis = siswa.nis");
        $this->db->where('rombel.id_kelas', $id_kelas);
        $this->db->where('rombel.id_tahun', $id_tahun);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_jumlah_siswa($id_kelas, $id_tahun){
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('id_tahun', $id_tahun);
        $result = $this->db->get('rombel');
        return $result->num_rows();
    }
}
?>
