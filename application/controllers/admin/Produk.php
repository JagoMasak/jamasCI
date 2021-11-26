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

        if ($this->Produk_model->createproduk($data)) {
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|bmp|svg';
            $config['overwrite']            = false;
            $this->load->library('upload',$config);
            $jumlah_gambar = count($_FILES['gambar']['name']);
            
            for($i = 0; $i < $jumlah_gambar; $i++) {
                if(!empty($_FILES['gambar']['name'][$i])){
                    $_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                    $_FILES['file']['error']    = $_FILES['gambar']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['gambar']['size'][$i];
           
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $data_gambar['path'] = $uploadData['file_name'];
                        $query  = $this->db->query("SELECT * FROM tbl_produk ORDER BY id_produk DESC LIMIT 1");
                        $result = $query->result_array();
                        $data_gambar['id_produk'] = $result[0]['id_produk'];

                        $this->Produk_model->creategambarproduk($data_gambar);
                    }
                }
            }
        }

        ?> <script type="text/javascript">alert("Tambah data produk berhasil."); window.location.href="<?php echo base_url();?>admin/Produk"</script> <?php
    }

	public function update($id)
	{
		$isi['content']		    = 'admin/produk/update_produk';
		$isi['judul']		    = 'Pengolahan';
		$isi['sub_judul']	    = 'Update data produk';
        $isi['mitra']           = $this->Mitra_model->getmitra();
        $isi['kategori']        = $this->Kategori_model->getkategori();
        $isi['produk']          = $this->Produk_model->getproduk($id);
        $isi['gambarproduk']    = $this->Produk_model->getgambarproduk($id);
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
        $updated_at         = $this->input->post('updated_at');

        $data = array(
            'id_produk'             => $id,
            'id_mitra'              => $penjual,
            'nama_produk'           => $nama,
            'deskripsi'             => $deskripsi,
            'id_kategori'           => $id_kategori,
            'jenis'                 => $jenis,
            'harga'                 => $harga,
            'updated_at'            => $updated_at, 
        );
        
        if ($this->Produk_model->updateproduk($data, $id)) {
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|jpeg|png|bmp|svg';
            $config['overwrite']            = false;
            $this->load->library('upload',$config);
            $jumlah_gambar = count($_FILES['gambar']['name']);
            
            for($i = 0; $i < $jumlah_gambar; $i++) {
                if(!empty($_FILES['gambar']['name'][$i])){
                    $_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
                    $_FILES['file']['error']    = $_FILES['gambar']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['gambar']['size'][$i];
           
                    if($this->upload->do_upload('file')){
                        $uploadData = $this->upload->data();
                        $data_gambar['path'] = $uploadData['file_name'];
                        $data_gambar['id_produk'] = $id;

                        $this->Produk_model->creategambarproduk($data_gambar);
                    }
                }
            }
        }

        ?> <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>admin/Produk"</script> <?php 
    }

	public function hapus($id)
	{
        $getgambarproduk = $this->Produk_model->getgambarproduk($id);
        foreach($getgambarproduk as $gambarproduk) {
            $path = './assets/img/'.$gambarproduk['path'];
            unlink($path);
            $this->Produk_model->deletegambarproduk($gambarproduk['id']);
        }
		
        $this->Produk_model->deleteproduk($id);
		?> <script type="text/javascript">alert("hapus data produk berhasil."); window.location.href="<?php echo base_url();?>admin/Produk"</script> <?php
	}

    public function hapusgambar($id)
    {
        $query  = $this->db->query("SELECT * FROM tbl_gambar_produk WHERE id=$id");
        $result = $query->result_array();
        $path = './assets/img/'.$result[0]['path'];
        unlink($path);
        $this->Produk_model->deletegambarproduk($id);

        ?> <script type="text/javascript">alert("hapus gambar produk berhasil."); window.location.href="<?php echo base_url();?>admin/Produk"</script> <?php
    }
}