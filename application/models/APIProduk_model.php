<?php

class APIProduk_model extends CI_Model
{
	public function getproduk($id_produk = null)
	{
		if ( $id_produk === null) {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
			return $this->db->get()->result_array();
		} else {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
            $this->db->where('a.id_produk', $id_produk);
			return $this->db->get()->result_array();
		}
	}

    public function getjenisproduk($jenis = null)
    {
        if ( $jenis === null) {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
            $this->db->where('a.jenis', $jenis);
            return $this->db->get()->result_array();
        }
    }

    public function getkategoriproduk($id_kategori = null)
    {
        if ( $id_kategori === null) {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
            $this->db->where('a.id_kategori', $id_kategori);
            return $this->db->get()->result_array();
        }
    }

    public function getcariproduk($keyword = null)
    {
        if ( $keyword === null) {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
            return $this->db->get()->result_array();
        } else {
            $this->db->select('a.id_produk, a.nama_produk, a.deskripsi, a.jenis, a.harga, a.created_at, b.nama_kategori, c.nama_mitra, group_concat(d.path) as images');
            $this->db->from('tbl_produk a');
            $this->db->join('tbl_kategori b', 'b.id_kategori = a.id_kategori');
            $this->db->join('tbl_mitra c', 'c.id_mitra = a.id_mitra');
            $this->db->join('tbl_gambar_produk d', 'd.id_produk = a.id_produk');
            $this->db->like('nama_produk', $keyword);
            return $this->db->get()->result_array();
        }
    }
}