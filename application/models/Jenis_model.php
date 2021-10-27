<?php

class Jenis_model extends CI_Model
{
	public function getjenis($id_jenis = null)
	{
		if ( $id_jenis === null) {
			return $this->db->get('tbl_jenis')->result_array();
		} else {
			return $this->db->get_where('tbl_jenis',['id_jenis' => $id_jenis])->result_array();
		}
	}

	public function deletejenis($id_jenis)
	{
		$this->db->delete('tbl_jenis', ['id_jenis' => $id_jenis]);
		return $this->db->affected_rows();
	}

	public function createjenis($data)
	{
		$this->db->insert('tbl_jenis', $data);
		return $this->db->affected_rows();
	}

	public function updatejenis($data, $id)
	{
		$this->db->update('tbl_jenis', $data, ['id_jenis' => $id]);
		return $this->db->affected_rows();
	}
}