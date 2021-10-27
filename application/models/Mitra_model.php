<?php

class Mitra_model extends CI_Model
{
	public function getmitra($id_mitra = null)
	{
		if ( $id_mitra === null) {
			return $this->db->get('tbl_mitra')->result_array();
		} else {
			return $this->db->get_where('tbl_mitra',['id_mitra' => $id_mitra])->result_array();
		}
	}

	public function deletemitra($id_mitra)
	{
		$this->db->delete('tbl_mitra', ['id_mitra' => $id_mitra]);
		return $this->db->affected_rows();
	}

	public function createmitra($data)
	{
		$this->db->insert('tbl_mitra', $data);
		return $this->db->affected_rows();
	}

	public function updatemitra($data, $id)
	{
		$this->db->update('tbl_mitra', $data, ['id_mitra' => $id]);
		return $this->db->affected_rows();
	}
}