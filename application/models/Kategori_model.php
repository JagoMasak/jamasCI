<?php

class Kategori_model extends CI_Model
{
	public function getkategori($id_kategori = null)
	{
		if ( $id_kategori === null) {
			return $this->db->get('tbl_kategori')->result_array();
		} else {
			return $this->db->get_where('tbl_kategori', ['id_kategori' => $id_kategori])->result_array();
		}
	}

	public function createkategori($data)
	{
		$this->db->insert('tbl_kategori', $data);
		return $this->db->affected_rows();
	}

	public function updatekategori($data, $id_kategori)
	{
		$this->db->update('tbl_kategori', $data, ['id_kategori' => $id_kategori]);
		return $this->db->affected_rows();
	}

    public function deletekategori($id_kategori)
    {
        $this->db->delete('tbl_kategori', ['id_kategori' => $id_kategori]);
        return $this->db->affected_rows();
    }
}