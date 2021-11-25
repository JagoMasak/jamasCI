<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Kategori_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$isi['content']		= 'admin/kategori/content_kategori';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data kategori';
		$isi['data'] 		= $this->Kategori_model->getkategori();
		$this->load->view('admin/index', $isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/kategori/tambah_kategori';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data kategori';
		$this->load->view('admin/index', $isi);
	}

    public function simpan()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[tbl_kategori.nama_kategori]');

        if ($this->form_validation->run() == false ) {
            $isi['content']     = 'admin/kategori/tambah_kategori';
            $isi['judul']       = 'Manajemen data';
            $isi['sub_judul']   = 'Tambah data kategori';
            $this->load->view('admin/index',$isi);
        } else {
            $nama                   = $this->input->post('nama');
            $slug                   = url_title($nama, 'dash', true);
            $created_at             = $this->input->post('created_at');
            $update_at              = $this->input->post('update_at');
        
            $data = array(
                'nama_kategori'         => $nama,
                'slug'                  => $slug,
                'created_at'            => $created_at,
                'update_at'             => $update_at,
            );
            
            $this->Kategori_model->createkategori($data);
            ?> <script type="text/javascript">alert("Tambah data kategori berhasil."); window.location.href="<?php echo base_url();?>admin/Kategori"</script> <?php
        }
    }

	public function update($id)
	{
		$isi['content']		= 'admin/kategori/update_kategori';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data kategori';
		$isi['kategori']	= $this->Kategori_model->getkategori($id);
		$this->load->view('admin/index', $isi);
	}

    public function edit()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[tbl_kategori.nama_kategori]');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == false ) {
            $isi['content']     = 'admin/kategori/update_kategori';
            $isi['judul']       = 'Manajemen data';
            $isi['sub_judul']   = 'Update data kategori';
            $isi['kategori']    = $this->Kategori_model->getkategori($id);
            $this->load->view('admin/index', $isi);
        } else {
            $nama                   = $this->input->post('nama');
            $slug                   = url_title($nama, 'dash', true);
            $update_at              = $this->input->post('update_at');

            $data = array(
                'id_kategori'           => $id,
                'nama_kategori'         => $nama,
                'slug'                  => $slug,
                'update_at'             => $update_at,
            );

            $this->Kategori_model->updatekategori($data, $id);
            ?> <script type="text/javascript">alert("Update data kategori berhasil."); window.location.href="<?php echo base_url();?>admin/Kategori"</script> <?php
        }
    }

	public function hapus($id)
	{
		$this->Kategori_model->deletekategori($id);
		?> <script type="text/javascript">alert("hapus data kategori berhasil."); window.location.href="<?php echo base_url();?>admin/Kategori"</script> <?php
	}
}