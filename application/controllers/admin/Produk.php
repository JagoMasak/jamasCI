<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Produk_model');
        $this->load->model('Mitra_model');
        $this->load->model('Kategori_model');
	}

	public function index()
	{
		$isi['content']		= 'admin/produk/content_produk';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data produk';
		$isi['data'] 		= $this->Produk_model->getproduk();
		$this->load->view('admin/index', $isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/produk/tambah_produk';
		$isi['judul']		= 'Pengolahan';
		$isi['sub_judul']	= 'Tambah Data produk';
		$isi['mitra']		= $this->Mitra_model->getmitra();
		$isi['kategori']	= $this->Kategori_model->getkategori();
		$this->load->view('admin/index', $isi);
	}

    public function simpan()
    {
        $penjual            = $this->input->post('penjual');
        $nama               = $this->input->post('nama');
        $deskripsi          = $this->input->post('deskripsi');
        $id_kategori        = $this->input->post('id_kategori');
        $jenis              = $this->input->post('jenis');
        $harga              = $this->input->post('harga');
        $created_at         = $this->input->post('created_at');
        $updated_at         = $this->input->post('updated_at');

        $data = array(
            'id_mitra'              => $penjual,
            'nama_produk'           => $nama,
            'deskripsi'             => $deskripsi,
            'id_kategori'           => $id_kategori,
            'jenis'                 => $jenis,
            'harga'                 => $harga,
            'created_at'            => $created_at,
            'updated_at'            => $updated_at,
        );

        $this->Produk_model->createproduk($data);
        ?> <script type="text/javascript">alert("Tambah data produk berhasil."); window.location.href="<?php echo base_url();?>admin/Produk"</script> <?php
    }

	public function update($id)
	{
		$isi['content']		= 'admin/produk/update_produk';
		$isi['judul']		= 'Pengolahan';
		$isi['sub_judul']	= 'Update data produk';
        $isi['mitra']       = $this->Mitra_model->getmitra();
        $isi['kategori']    = $this->Kategori_model->getkategori();
        $isi['produk']      = $this->Produk_model->getproduk($id);
		$this->load->view('admin/index', $isi);
	}

    public function edit()
    {
        $id                 = $this->input->post('id_produk');
        $penjual            = $this->input->post('penjual');
        $nama               = $this->input->post('nama');
        $deskripsi          = $this->input->post('deskripsi');
        $id_kategori        = $this->input->post('id_kategori');
        $jenis              = $this->input->post('jenis');
        $harga              = $this->input->post('harga');
        $created_at         = $this->input->post('created_at');
        $updated_at         = $this->input->post('updated_at');

        $data = array(
            'id_produk'             => $id,
            'id_mitra'              => $penjual,
            'nama_produk'           => $nama,
            'deskripsi'             => $deskripsi,
            'id_kategori'           => $id_kategori,
            'jenis'                 => $jenis,
            'harga'                 => $harga,
            'created_at'            => $created_at,
            'updated_at'            => $updated_at, 
        );
        
        $this->Produk_model->updateproduk($data, $id); 
        ?> <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>admin/Produk"</script> <?php 
    }

	public function hapus($id)
	{
		$this->Produk_model->deleteproduk($id);
		?> <script type="text/javascript">alert("hapus data barang berhasil."); window.location.href="<?php echo base_url();?>admin/Produk"</script> <?php
	}
}