<?php

class Produk_siap_model extends CI_Model
{
	public function getproduk_siap($id_produk_siap = null)
	{
		if ( $id_produk_siap === null) {
			return $this->db->get('tbl_produk_siap')->result_array();
		} else {
			return $this->db->get_where('tbl_produk_siap',['id_produk_siap' => $id_produk_siap])->result_array();
		}
		
	}

	public function deleteproduk_siap($id_produk_siap)
	{
		$this->db->delete('tbl_produk_siap', ['id_produk_siap' => $id_produk_siap]);
		return $this->db->affected_rows();
	}

	public function createproduk_siap($data)
	{
		$this->db->insert('tbl_produk_siap', $data);
		return $this->db->affected_rows();
	}

	public function updateproduk_siap($data, $id)
	{
		$this->db->update('tbl_produk_siap', $data, ['id_produk_siap' => $id]);
		return $this->db->affected_rows();
	}
}