<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gambar_produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Model_gambar_produk');
		$this->load->helper('url');

	}


	public function index()
	{
		$isi['content']		= 'admin/gambar_produk/content_gambar_produk';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data gambar_produk';
		$isi['data'] 		= $this->db->get('tbl_gambar_produk');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/gambar_produk/tambah_gambar_produk';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Tambah data gambar_produk';
		$isi['produk']		= $this->Model_gambar_produk->get_produk();
		$this->load->view('admin/index',$isi);
	}

	public function update($id)
	{
		$isi['content']		= 'admin/gambar_produk/update_gambar_produk';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Update data gambar_produk';
		$where 				= array('id' => $id);
		$isi['produk']		= $this->Model_gambar_produk->get_produk();
		$isi['gambar_produk']	= $this->Model_gambar_produk->edit_data($where,'tbl_gambar_produk')->result();
		$this->load->view('admin/index',$isi);
	}

		function do_upload(){

		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';

		$this->load->library('upload',$config);

		$_FILES = array() {
			foreach($_FILES as $path => $file) {
				foreach($file as $property => $keys) {

					foreach($keys as $key => $value) {
						$_FILES[$path][$key][$property] = $value;
					}
				}
			}

			return $_FILES

			}
		}
	}

	public function simpan()
	{
		$id						= $this->input->post('id');
		$id_produk				= $this->input->post('id_produk');
		$path					= $this->do_upload();

		$data = array(
					'id'					=> $id,
					'id_produk'				=> $id_produk,
					'path'					=> $path,

			);
		$this->Model_gambar_produk->input_data($data,'tbl_gambar_produk');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data gambar produk berhasil."); window.location.href="<?php echo base_url();?>admin/gambar_produk"</script> <?php
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->Model_gambar_produk->hapus_data($where,'tbl_gambar_produk');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data gambar produk berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/gambar_produk"</script> <?php
	}

	public function edit()
	{
		$id						= $this->input->post('id');
		$id_produk				= $this->input->post('id_produk');
		$path					= $this->input->post('path');




		$data = array(
					'id'					=> $id,
					'id_produk'				=> $id_produk,
					'path'					=> $path,
			);
	$where = array(
		'id' => $id
	);

	$this->Model_gambar_produk->update_data($where,$data,'tbl_gambar_produk');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data gambar_produk berhasil."); window.location.href="<?php echo base_url();?>/admin/gambar_produk"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */