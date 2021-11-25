<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mitra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Mitra_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$isi['content']		= 'admin/mitra/content_mitra';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data mitra';
		$isi['data'] 		= $this->Mitra_model->getmitra();
		$this->load->view('admin/index', $isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/mitra/tambah_mitra';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data mitra';
		$this->load->view('admin/index', $isi);
	}

    public function simpan()
    {
        $id                     = $this->input->post('id');
        $nama                   = $this->input->post('nama');
        $slug                   = url_title($nama, 'dash', true);
        $email                  = $this->input->post('email');
        $alamat                 = $this->input->post('alamat');
        $telepon                = $this->input->post('telepon');
        $ktp                    = $this->input->post('ktp');
        $status                 = $this->input->post('status');
        $created_at             = $this->input->post('created_at');
        $updated_at             = $this->input->post('updated_at');

        $data = array(
           'id_mitra'           => $id,
           'nama_mitra'         => $nama,
           'slug'               => $slug,
           'email'              => $email,
           'alamat'             => $alamat,
           'telepon'            => $telepon,
           'ktp'                => $ktp,
           'status'             => $status,
           'created_at'         => $created_at,
           'updated_at'         => $updated_at,
        );

        $this->Mitra_model->createmitra($data);
        ?> <script type="text/javascript">alert("Tambah data mitra berhasil."); window.location.href="<?php echo base_url();?>admin/Mitra"</script> <?php
    }

	public function update($id)
	{
		$isi['content']		= 'admin/mitra/update_mitra';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data mitra';
		$isi['mitra']	    = $this->Mitra_model->getmitra($id);
		$this->load->view('admin/index', $isi);
	}

	public function edit()
	{
		$id						= $this->input->post('id');
		$nama					= $this->input->post('nama');
		$slug                   = url_title($nama, 'dash', true);
		$email					= $this->input->post('email');
		$alamat					= $this->input->post('alamat');
		$telepon				= $this->input->post('telepon');
		$ktp					= $this->input->post('ktp');
		$status					= $this->input->post('status');
		$updated_at				= $this->input->post('updated_at');

		$data = array(
            'id_mitra'			    => $id,
            'nama_mitra'			=> $nama,
            'slug'					=> $slug,
            'email'					=> $email,
            'alamat'				=> $alamat,
            'telepon'				=> $telepon,
            'ktp'					=> $ktp,
            'status'				=> $status,
            'updated_at'			=> $updated_at,
        );

        $this->Mitra_model->updatemitra($data, $id);
        ?> <script type="text/javascript">alert("Update data mitra berhasil."); window.location.href="<?php echo base_url();?>admin/Mitra"</script> <?php
    }

    public function hapus($id)
    {
        $this->Mitra_model->deletemitra($id);
        ?> <script type="text/javascript">alert("hapus data mitra berhasil."); window.location.href="<?php echo base_url();?>admin/Mitra"</script> <?php
    }
}