<?php 

class user_model extends CI_Model{
    public function ambil_data($idu)
    {
        $this->db->where('username',$idu);
        return $this->db->get('pengguna')->row();
    }
    public function get_all_siswa() {
        return $this->db->get('siswa')->result();
    }
    public function ambil_data_by_id($idu)
    {
        $this->db->where('idu',$idu);
        return $this->db->get('pengguna')->row();
    }

    public function jumlah_pengguna(){
        return $this->db->count_all('pengguna');
    }

    public function get_all() {
        $this->db->select('pengguna.idu, pengguna.username, pengguna.email, pengguna.hak_akses, 
                           CASE 
                               WHEN pengguna.hak_akses = \'siswa\' THEN siswa.nama_siswa
                               WHEN pengguna.hak_akses = \'guru\' THEN guru.nama_guru
                               ELSE \'Tidak diketahui\'
                           END as nama_lengkap');
        $this->db->from('pengguna');
        $this->db->join('siswa', 'pengguna.idu = siswa.nis', 'left');
        $this->db->join('guru', 'pengguna.idu = guru.nik', 'left');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function cek_duplikat_user_siswa($idu) {
        // Memeriksa apakah ada pengguna dengan idu yang sama
        $this->db->where('idu', $idu);
        $query = $this->db->get('pengguna');

        // Jika ditemukan pengguna dengan idu yang sama, return true
        if ($query->num_rows() > 0) {
            return true;
        }

        return false;
    }

    public function tambah_pengguna($data) {
        // Tambahkan data pengguna ke tabel pengguna
        return $this->db->insert('pengguna', $data);
    }
    public function cek_duplikat_pengguna($idu){
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where('idu', $idu);
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function hapus($id){
        $this->db->where('idu', $id);
        $this->db->delete('pengguna');
    }

    public function update($data, $id){
        $this->db->where('idu', $id);
        $this->db->update('pengguna', $data);
    }
}
?>