<?php

class Produk_model extends CI_Model
{
	public function getproduk($id_produk = null)
	{
		if ( $id_produk === null) {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_jenis b', 'b.id_jenis = a.id_jenis');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
			return $this->db->get()->result_array();
		} else {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_jenis b', 'b.id_jenis = a.id_jenis');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->where('id_produk', $id_produk);
			return $this->db->get()->result_array();
		}
	}

    public function getjenisproduk($id_jenis = null)
    {
        if ( $id_jenis === null) {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_jenis b', 'b.id_jenis = a.id_jenis');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_jenis b', 'b.id_jenis = a.id_jenis');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->where('a.id_jenis', $id_jenis);
            return $this->db->get()->result_array();
        }
    }

    public function getcariproduk($keyword = null)
    {
        if ( $keyword === null) {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_jenis b', 'b.id_jenis = a.id_jenis');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_jenis b', 'b.id_jenis = a.id_jenis');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->like('nama_produk', $keyword);
            return $this->db->get()->result_array();
        }
    }

	public function deleteproduk($id_produk)
	{
		$this->db->delete('tbl_produk', ['id_produk' => $id_produk]);
		return $this->db->affected_rows();
	}

	public function createproduk($data)
	{
		$this->db->insert('tbl_produk', $data);
		return $this->db->affected_rows();
	}

	public function updateproduk($data, $id)
	{
		$this->db->update('tbl_produk', $data, ['id_produk' => $id]);
		return $this->db->affected_rows();
	}
}