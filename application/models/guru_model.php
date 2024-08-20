<?php
class Guru_model extends CI_Model
{

	public function get_data_guru()
	{
		$this->db->select('*');
		$this->db->from('guru');
		$result =	$this->db->get();
		return $result;
	}

	public function tampil_data($table)
	{
		return $this->db->get($table)->result(); // Tambahkan tanda semicolon (;) di akhir return statement
	}

	public function ambil_kode_guru($id)
	{
		$result = $this->db->where('nik', $id)->get('guru');
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return false;
		}
	}

	public function get_nama_by_nik($nik)
	{
		$this->db->select('nama_guru');
		$this->db->from('guru');
		$this->db->where('nik', $nik);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row()->nama_guru;
		} else {
			return null; // Jika tidak ada data ditemukan, bisa dikembalikan null atau pesan error sesuai kebutuhan
		}
	}



	public function insert_data($data)
	{
		return $this->db->insert('guru', $data);
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
	public $table = 'guru';
	public $id = 'nik';

	public function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row();
	}

	public function jumlah_guru()
	{
		return $this->db->count_all('guru');
	}

	//profil guru dan admin
	public function get_detail_by_username($username)
	{
		$this->db->where('username', $username);
		return $this->db->get('guru')->result();
	}

	public function biodata($id)
	{
		$this->db->select('*');
		$this->db->from('guru');
		// $this->db->join('kelas', 'kelas.id_kelas = guru.id_kelas');
		$this->db->where('nik', $id);
		return $this->db->get();
	}
}
