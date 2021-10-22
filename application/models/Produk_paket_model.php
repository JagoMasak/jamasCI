<?php

class Produk_paket_model extends CI_Model
{
	public function getproduk_paket($id_produk_paket = null)
	{
		if ( $id_produk_paket === null) {
			return $this->db->get('tbl_produk_paket')->result_array();
		} else {
			return $this->db->get_where('tbl_produk_paket',['id_produk_paket' => $id_produk_paket])->result_array();
		}
		
	}

	public function deleteproduk_paket($id_produk_paket)
	{
		$this->db->delete('tbl_produk_paket', ['id_produk_paket' => $id_produk_paket]);
		return $this->db->affected_rows();
	}

	public function createproduk_paket($data)
	{
		$this->db->insert('tbl_produk_paket', $data);
		return $this->db->affected_rows();
	}

	public function updateproduk_paket($data, $id)
	{
		$this->db->update('tbl_produk_paket', $data, ['id_produk_paket' => $id]);
		return $this->db->affected_rows();
	}
}