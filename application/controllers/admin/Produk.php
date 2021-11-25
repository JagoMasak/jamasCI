<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->model('Model_produk');
	}

	public function index()
	{
		$isi['content']		= 'admin/produk/content_produk';
		$isi['judul']		= 'Manajemen data';
		$isi['sub_judul']	= 'Data produk';
		$isi['data'] 		= $this->db->query('SELECT * FROM tbl_produk');
		$this->load->view('admin/index',$isi);
	}

	public function tambah()
	{
		$isi['content']		= 'admin/produk/tambah_produk';
		$isi['judul']		= 'Pengolahan';
		$isi['sub_judul']	= 'Tambah Data produk';
		$isi['mitra']		= $this->Model_produk->get_mitra();
		$isi['kategori']		= $this->Model_produk->get_kategori();
		$this->load->view('admin/index',$isi);
	}

	public function update($id)
	{
		$isi['content']		= 'admin/produk/update_produk';
		$isi['judul']		= 'Pengolahan';
		$isi['sub_judul']	= 'Update data produk';
		$where 				= array('id' => $id);
		$isi['mitra']		= $this->Model_produk->get_mitra();
		$isi['kategori']	= $this->Model_produk->get_kategori();
		$isi['produk']		= $this->Model_produk->edit_data($where,'tbl_produk')->result();
		$this->load->view('admin/index',$isi);
	}

	// 	function do_upload(){

	// 	$config['upload_path'] = './assets/img/';
	// 	$config['allowed_types'] = 'gif|jpg|png';

	// 	$this->load->library('upload',$config);

	// 	if ($this->upload->do_upload('gambar')) {
	// 		return $this->upload->data("file_name");
	// 	}
	// }

	public function simpan()
	{
		$penjual			= $this->input->post('penjual');
		$nama				= $this->input->post('nama');
		$deskripsi			= $this->input->post('deskripsi');
		$id_kategori		= $this->input->post('id_kategori');
		$jenis 				= $this->input->post('jenis');
		$harga   			= $this->input->post('harga');
		$created_at			= $this->input->post('created_at');
		$updated_at			= $this->input->post('updated_at');

		$data = array(
					'penjual'				=> $penjual,
					'nama_produk'			=> $nama,
					'deskripsi'				=> $deskripsi,
					'id_kategori'			=> $id_kategori,
					'jenis' 				=> $jenis,
					'harga'					=> $harga,
					'created_at'			=> $created_at,
					'updated_at'			=> $updated_at,

			);
		$this->Model_produk->input_data($data,'tbl_produk');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Tambah data produk berhasil."); window.location.href="<?php echo base_url();?>admin/produk"</script> <?php
	}

	public function hapus($id)
	{
		$where = array('id' => $id);
		$this->Model_produk->hapus_data($where,'tbl_produk');
		?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("hapus data barang berhasil."); window.location.href="<?php echo base_url();?>index.php/admin/produk"</script> <?php
	}

	public function edit()
	{
		$id					= $this->input->post('id');
		$penjual			= $this->input->post('penjual');
		$nama				= $this->input->post('nama');
		$deskripsi			= $this->input->post('deskripsi');
		$id_kategori		= $this->input->post('id_kategori');
		$jenis 				= $this->input->post('jenis');
		$harga   			= $this->input->post('harga');
		$created_at			= $this->input->post('created_at');
		$updated_at			= $this->input->post('updated_at');

		$data = array(
					'id'					=> $id,
					'penjual'				=> $penjual,
					'nama'					=> $nama,
					'deskripsi'				=> $deskripsi,
					'id_kategori'			=> $id_kategori,
					'jenis' 				=> $jenis,
					'harga'					=> $harga,
					'created_at'			=> $created_at,
					'updated_at'			=> $updated_at,

			);
	$where = array(
		'id' => $id
	);

	$this->Model_produk->update_data($where,$data,'tbl_produk');
	?>
			<!-- muncul peringatan kalau login gagal dan langsung kembali ke halaman login.php-->
          <script type="text/javascript">alert("Update data barang berhasil."); window.location.href="<?php echo base_url();?>/admin/produk"</script> <?php
}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */