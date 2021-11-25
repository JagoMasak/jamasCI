<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mitra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Model_mitra');
		$this->load->helper('url');
	}

	public function index()
	{
		$isi['content']		= 'admin/mitra/content_mitra';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data mitra';
		$isi['data'] 		= $this->db->get('tbl_mitra');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/mitra/tambah_mitra';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data mitra';
		$isi['kt']			= $this->Model_mitra->get_ktgori();
		$this->load->view('admin/index',$isi);
	}

	public function update($id)
	{
		$isi['content']		= 'admin/mitra/update_mitra';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data mitra';
		$where 				= array('id' => $id);
		$isi['kt']			= $this->Model_mitra->get_ktgori();
		$isi['mitra']	= $this->Model_mitra->edit_data($where,'tbl_mitra')->result();
		$this->load->view('admin/index',$isi);
	}


	public function simpan()
	{
		$id						= $this->input->post('id');
		$nama					= $this->input->post('nama');
		$email					= $this->input->post('email');
		$alamat					= $this->input->post('alamat');
		$telepon				= $this->input->post('telepon');
		$ktp					= $this->input->post('ktp');
		$status					= $this->input->post('status');
		$created_at				= $this->input->post('created_at');
		$updated_at				= $this->input->post('updated_at');

		$slug = url_title($nama, 'dash', true);

		$data = array(
					'id'					=> $id,
					'nama'					=> $nama,
					'slug'					=> $slug,
					'email'					=> $email,
					'alamat'				=> $alamat,
					'telepon'				=> $telepon,
					'ktp'					=> $ktp,
					'status'				=> $status,

					'created_at'			=> $created_at,
					'updated_at'			=> $updated_at,
			);
		$this->Model_mitra->input_data($data,'tbl_mitra');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data mitra berhasil."); window.location.href="<?php echo base_url();?>admin/mitra"</script> <?php
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->Model_mitra->hapus_data($where,'tbl_mitra');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data mitra berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/mitra"</script> <?php
	}

	public function edit()
	{
		$id						= $this->input->post('id');
		$nama					= $this->input->post('nama');
		$email					= $this->input->post('email');
		$alamat					= $this->input->post('alamat');
		$telepon				= $this->input->post('telepon');
		$ktp					= $this->input->post('ktp');
		$status					= $this->input->post('status');
		$created_at				= $this->input->post('created_at');
		$updated_at				= $this->input->post('updated_at');

		$slug = url_title($nama, 'dash', true);

		$data = array(
					'id'					=> $id,
					'nama'					=> $nama,
					'slug'					=> $slug,
					'email'					=> $email,
					'alamat'				=> $alamat,
					'telepon'				=> $telepon,
					'ktp'					=> $ktp,
					'status'				=> $status,
					'created_at'			=> $created_at,
					'updated_at'			=> $updated_at,
			);
		
		$where = array(
			'id' => $id
		);

	$this->Model_mitra->update_data($where,$data,'tbl_mitra');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data mitra berhasil."); window.location.href="<?php echo base_url();?>/admin/mitra"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */