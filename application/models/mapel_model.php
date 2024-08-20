<?php
class mapel_model extends CI_Model
{

	public $table = 'mapel';
	public $id = 'kode_mapel';

	public function get_data_mapel($tahun_ajaran = null)
	{
		if (!empty($tahun_ajaran)) {
			$this->db->where('id_tahun', $tahun_ajaran);
		}

		return $this->db->get('mapel')->result(); 
	}
         
	public function get_by_id($id)
	{
		$this->db->where($this->id, $id);
		return $this->db->get($this->table)->row_array();
	}

	public function tampil_data_guru()
	{
		$query = $this->db->get('guru');
		return $query->result();
	}

	public function tampil_data()
	{
		$query = $this->db->get('mapel');
		return $query->result();
	}

	public function insert_data($data)
	{
		return $this->db->insert('mapel', $data);
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

	public function delete_data($where)
	{
		$this->db->where($where);
		return $this->db->delete('mapel');
	}


	public function detail_mapel($id)
	{
		$this->db->select('*');
		$this->db->from('mapel');
		$this->db->where('id_mapel', $id);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result(); // Return query result
		} else {
			return null; // Return null if no data found
		}
	}
}
