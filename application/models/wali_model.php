<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali_model extends CI_Model {

   public function tampil_data_by_tahun_ajaran_aktif() {
    // Dapatkan data wali kelas berdasarkan tahun ajaran aktif
    $tahun_ajaran_aktif = $this->get_tahun_ajaran_aktif();
    if ($tahun_ajaran_aktif) {
        $this->db->select('wali_kelas.id_kelas, guru.nama_guru, kelas.nama_kelas, COUNT(wali_kelas.nis) as jumlah_siswa');
        $this->db->from('wali_kelas');
        $this->db->join('guru', 'wali_kelas.nik = guru.nik');
        $this->db->join('kelas', 'wali_kelas.id_kelas = kelas.id_kelas');
        $this->db->where('wali_kelas.id_tahun', $tahun_ajaran_aktif->id_tahun);
        $this->db->group_by('wali_kelas.id_kelas, guru.nama_guru, kelas.nama_kelas');
        return $this->db->get()->result();
    } else {
        return [];
    }
}
        public function get_tahun_ajaran() {
    return $this->db->get('tahun_ajaran')->result();
}

    public function get_tahun_ajaran_aktif() {
    $this->db->where('status', 'aktif');
    return $this->db->get('tahun_ajaran')->row();
}


    public function cek_data($nik, $id_kelas, $id_tahun) {
        // Memeriksa apakah data sudah ada di tabel wali_kelas
        $this->db->where('nik', $nik);
        $this->db->where('id_kelas', $id_kelas);
        $this->db->where('id_tahun', $id_tahun);
        $query = $this->db->get('wali_kelas');
        return $query->num_rows() > 0;
    }

    public function cek_wali_duplikat($id_kelas) {
        // Memeriksa apakah data sudah wali_kelas di kelas
        $this->db->where('id_kelas', $id_kelas);
        $query = $this->db->get('wali_kelas');
        return $query->num_rows() > 0;
    }

    public function tambah_data($data) {
        // Menambahkan data ke dalam tabel wali_kelas
        $this->db->insert('wali_kelas', $data);
    }


    public function hapus_data_by_kelas($id_kelas){
        $this->db->where('id_kelas', $id_kelas);
        $this->db->delete('wali_kelas');
    }
    
    public function get_all_guru() {
        return $this->db->get('guru')->result();
    }

    public function get_all_kelas() {
        return $this->db->get('kelas')->result();
    }

    public function get_all_tahun_ajaran() {
        return $this->db->get('tahun_ajaran')->result();
    }
    public function get_wali_by_id($id_kelas) {
        $this->db->where('id_wali', $id_kelas);
        $query = $this->db->get('wali_kelas');
        return $query->row(); // Mengembalikan satu baris hasil query
    }

    public function update_data_by_id_wali($id_wali, $data) {
        // Update data berdasarkan id_wali tertentu
        $this->db->where('id_wali', $id_wali);
        $this->db->update('wali_kelas', $data);
    }
    
    public function update_data_by_id_kelas($id_kelas_lama, $id_kelas_baru, $data) {
        // Update semua data dengan id_kelas yang sama
        $this->db->where('id_kelas', $id_kelas_lama);
        $this->db->update('wali_kelas', $data);
    
        // Update id_kelas dengan nilai baru
        $this->db->where('id_kelas', $id_kelas_lama);
        $this->db->update('wali_kelas', array('id_kelas' => $id_kelas_baru));
    }
    
    public function get_wali_by_id_kelas($id_kelas) {
        $this->db->where('id_kelas', $id_kelas);
        return $this->db->get('wali_kelas')->row();
    }

    public function get_kelas_by_nik($nik){
        $this->db->select('wali_kelas.id_kelas, kelas.nama_kelas');
        $this->db->from('wali_kelas');
        $this->db->join('kelas', 'kelas.id_kelas = wali_kelas.id_kelas');
        $this->db->where('nik', $nik);
        return $this->db->get()->row();
    }
    
    public function get_wali_detail($id_kelas) {

		// var_dump($id_kelas);die;

        $this->db->select('wali_kelas.*, guru.nama_guru, kelas.nama_kelas');
        $this->db->from('wali_kelas');
        $this->db->join('guru', 'guru.nik = wali_kelas.nik');
        $this->db->join('kelas', 'kelas.id_kelas = wali_kelas.id_kelas');
        $this->db->where('wali_kelas.id_kelas', $id_kelas);
        return $this->db->get()->row();
    }

    public function get_siswa_by_id_wali($id_kelas) {
        $this->db->select('siswa.nis, siswa.nama_siswa, siswa.jenis_kelamin');
        $this->db->from('siswa');
        $this->db->join('wali_kelas', 'wali_kelas.nis = siswa.nis');
        $this->db->where('wali_kelas.id_kelas', $id_kelas);
        return $this->db->get()->result();
    }
    

    public function hapus_siswa($nis, $id_wali) {
        // Periksa apakah nis ada di tabel wali_kelas
        $this->db->where('nis', $nis);
        $this->db->where('id_wali', $id_wali);
        $siswa = $this->db->get('wali_kelas')->row();
    
        // Jika siswa ditemukan, hapus data siswa
        if ($siswa) {
            $this->db->where('nis', $nis);
            $this->db->where('id_wali', $id_wali);
            $this->db->delete('wali_kelas');
            return true; // Mengembalikan true jika berhasil menghapus
        } else {
            return false; // Mengembalikan false jika data nis tidak ditemukan
        }
    }
    public function get_wali_by_id_wali($id_wali) {
        return $this->db->get_where('wali_kelas', array('id_wali' => $id_wali))->row();
    }

    public function get_siswa_not_in_wali($id_wali) {
        $subquery = "SELECT nis FROM wali_kelas WHERE id_wali = $id_wali";
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where("nis NOT IN ($subquery)", NULL, FALSE);
        return $this->db->get()->result();
    }

   public function tambah_siswa($id_wali, $nis, $id_kelas, $id_tahun) {
    $data = array(
        'id_wali' => $id_wali,
        'nis' => $nis,
        'id_kelas' => $id_kelas,
        'id_tahun' => $id_tahun
    );

    $this->db->insert('wali_kelas', $data);
    }

    // ---------------------------------------
    // Method ini diakses dari controller guru
    // ---------------------------------------
    public function get_jml_siswa_by_nik_wali($nik){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('wali_kelas', 'wali_kelas.id_kelas = siswa.id_kelas');
        $this->db->where('wali_kelas.nik', $nik);

        return $this->db->count_all_results();
    }

    public function get_siswa_by_nik_wali($nik){
        $this->db->select('siswa.*');
        $this->db->from('siswa');
        $this->db->join('wali_kelas', 'wali_kelas.id_kelas = siswa.id_kelas');
        $this->db->where('wali_kelas.nik', $nik);
        return $this->db->get()->result();
    }

}
?>
