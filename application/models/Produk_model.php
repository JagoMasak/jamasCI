<?php

class Produk_model extends CI_Model
{
	public function getproduk($id_produk = null)
	{
		if ( $id_produk === null) {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
			return $this->db->get()->result_array();
		} else {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->where('a.id_produk', $id_produk);
			return $this->db->get()->result_array();
		}
	}

    public function getjenisproduk($jenis = null)
    {
        if ( $id_jenis === null) {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->where('a.jenis', $jenis);
            return $this->db->get()->result_array();
        }
    }

    public function getcariproduk($keyword = null)
    {
        if ( $keyword === null) {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('*');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->like('nama_produk', $keyword);
            return $this->db->get()->result_array();
        }
    }

	public function createproduk($data)
	{
		$this->db->insert('tbl_produk', $data);
		return $this->db->affected_rows();
	}

	public function updateproduk($data, $id_produk)
	{
		$this->db->update('tbl_produk', $data, ['id_produk' => $id_produk]);
		return $this->db->affected_rows();
	}

    public function deleteproduk($id_produk)
    {
        $this->db->delete('tbl_produk', ['id_produk' => $id_produk]);
        return $this->db->affected_rows();
    }
}