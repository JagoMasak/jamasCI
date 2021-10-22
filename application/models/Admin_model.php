<?php

class Admin_model extends CI_Model
{
	public function getadmin($id_admin = null)
	{
		if ( $id_admin === null) {
			return $this->db->get('tbl_admin')->result_array();
		} else {
			return $this->db->get_where('tbl_admin',['id_admin' => $id_admin])->result_array();
		}
		
	}

	public function deleteadmin($id_admin)
	{
		$this->db->delete('tbl_admin', ['id_admin' => $id_admin]);
		return $this->db->affected_rows();
	}

	public function createadmin($data)
	{
		$this->db->insert('tbl_admin', $data);
		return $this->db->affected_rows();
	}

	public function updateadmin($data, $id)
	{
		$this->db->update('tbl_admin', $data, ['id_admin' => $id]);
		return $this->db->affected_rows();
	}
}