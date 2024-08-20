<?php

class Siswa_model extends CI_Model
{
	public function tampil_data($nis = null)
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('pengguna', 'pengguna.idu = siswa.nis');
		$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');;

		if (!empty($nis)) {
			$this->db->where('siswa.nis', $nis);
		}

		$result = $this->db->get();

		return $result;
	}

	// public function biodata($id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('siswa');
	// 	$this->db->join('kelas', 'kelas.id_kelas = siswa.id_kelas');
	// 	$this->db->where('nis', $id);
	// 	return $this->db->get();
	// }


	public function get_nama_ayah_by_nis($nis)
	{
		$this->db->select('nama_ayah');
		$this->db->where('nis', $nis);
		$query = $this->db->get('siswa');
		return $query->row();
	}
	public function ambil_kode_siswa($kode)
	{
		$result = $this->db->where('nis', $kode)->get('siswa');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function insert_data($data)
	{
		return $this->db->insert('siswa', $data);
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// public function get_siswa()
	// {
	// 	return $this->db->get('siswa')->result();
	// }

	public $table = 'siswa';
	public $id = 'nis';

	public function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}


	public function get_by_id_kelas($id_kelas)
	{
		$this->db->where("id_kelas", $id_kelas);
		return $this->db->get($this->table)->result();
	}

	public function jumlah_siswa()
	{
		return $this->db->count_all('siswa');
	}
	public function get_kelas_by_nis($nis)
	{
		$this->db->select('kelas.*'); // Sesuaikan dengan kolom yang dibutuhkan dari tabel kelas
		$this->db->from('kelas');
		$this->db->join('siswa', 'kelas.id_kelas = siswa.id_kelas');
		$this->db->where('siswa.nis', $nis);
		$query = $this->db->get();
		return $query->result();
	}

	//siswa   
	// Mengambil data siswa berdasarkan ID pengguna
	public function get_siswa_by_idu($idu)
	{
		$this->db->where('idu', $idu);
		$query = $this->db->get('siswa');
		return $query->row(); // Mengembalikan hasil sebagai objek
	}
	public function get_detail_by_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('siswa')->result();
	}

	// Mengambil data kelas berdasarkan ID siswa
	public function get_kelas_by_id_siswa($idu)
	{
		// Langkah 1: Ambil ID kelas dari tabel siswa berdasarkan ID pengguna
		$this->db->select('id_kelas');
		$this->db->from('siswa');
		$this->db->where('idu', $idu);
		$query = $this->db->get();

		$result = $query->row(); // Ambil hasil sebagai baris tunggal

		if (empty($result)) {
			return [
				'kelas' => null,
				'siswa' => []
			]; // Jika tidak ditemukan kelas untuk siswa
		}

		$id_kelas = $result->id_kelas;

		// Langkah 2: Ambil data kelas berdasarkan ID kelas
		$this->db->select('kelas.*');
		$this->db->from('kelas');
		$this->db->where('kelas.id_kelas', $id_kelas);
		$query = $this->db->get();

		$kelas_data = $query->row(); // Ambil data kelas

		// Langkah 3: Ambil semua data siswa berdasarkan ID kelas yang sama
		$this->db->select('siswa.*');
		$this->db->from('siswa');
		$this->db->where('siswa.id_kelas', $id_kelas);
		$query = $this->db->get();

		$siswa_data = $query->result(); // Ambil semua data siswa dalam kelas

		return [
			'kelas' => $kelas_data,
			'siswa' => $siswa_data
		];
	}

	public function getKelasSiswa($id_kelas)
	{
		// var_dump($id_kelas);
		// die;
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
		$this->db->where('siswa.id_kelas', $id_kelas);
		$query = $this->db->get();

		return $query;
	}
}
