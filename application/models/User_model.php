<?php

class User_model extends CI_Model
{
	public function getuser($id_user = null)
	{
		if ( $id_user === null) {
			return $this->db->get('tbl_user')->result_array();
		} else {
			return $this->db->get_where('tbl_user',['id_user' => $id_user])->result_array();
		}
		
	}

	public function deleteUser($id_user)
	{
		$this->db->delete('tbl_user', ['id_user' => $id_user]);
		return $this->db->affected_rows();
	}

	public function createUser($data)
	{
		$this->db->insert('tbl_user', $data);
		return $this->db->affected_rows();
	}

	public function updateUser($data, $id)
	{
		$this->db->update('tbl_user', $data, ['id_user' => $id]);
		return $this->db->affected_rows();
	}
}