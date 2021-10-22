<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class produk_siap extends REST_Controller 
{
	public function __construct()
		{
			parent::__construct();
			$this->load->model('Produk_siap_model');
		}
	public function index_get()
		{
			$id_produk_siap = $this->get('id_produk_siap');
			if ($id_produk_siap === null) {
				$produk_siap = $this->Produk_siap_model->getproduk_siap();
			} else {
				$produk_siap = $this->Produk_siap_model->getproduk_siap($id_produk_siap);
			}
			
			if($produk_siap) {
					$this->response([
			            'status' 	=> TRUE,
			            'data' 		=> $produk_siap
		        ], REST_Controller::HTTP_OK);
			} else {
					$this->response([
			            'status' 	=> FALSE,
			            'messege' 	=> 'Id Tidak Di Temukan'
		        ], REST_Controller::HTTP_NOT_FOUND);
			}

}
	public function index_delete()
		{
		$id_produk_siap = $this->delete('id_produk_siap');

		if( $id_produk_siap === null) {
				$this->response([
		            'status' 	=> FALSE,
		            'messege' 	=> 'provide an id!'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if( $this->Produk_siap_model->deleteproduk_siap($id_produk_siap) > 0 ) {
				// ok
				$this->response([
		            'status' 	=> TRUE,
		            'id_produk_siap' 	=> $id_produk_siap,
		            'messege' 	=> 'data di hapus'
	        ], REST_Controller::HTTP_NO_CONTENT);
			} else {
				// id not found
				$this->response([
		            'status' 	=> FALSE,
		            'messege' 	=> 'id not found!'
	        ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}

	}

	public function index_post()
	{
		$data = [
			'nama_toko' 		=> $this->post('nama_toko'),
			'nama_produk' 		=> $this->post('nama_produk'),
			'jenis_produk' 		=> $this->post('jenis_produk'),
			'deskripsi' 		=> $this->post('deskripsi'),
			'gambar' 			=> $this->post('gambar'),
			'harga' 			=> $this->post('harga'),
			'stok' 				=> $this->post('stok')


		];

		if( $this->Produk_siap_model->createproduk_siap($data) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'id_produk_siap' 	=> $data,
		           'messege' 	=> 'Data produk_siap telah di buat.'
	        ], REST_Controller::HTTP_CREATED);
		} else {
				// id not found
			$this->response([
		           'status' 	=> FALSE,
		           'messege' 	=> 'Gagal membuat data baru'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		}

	}

	public function index_put()
	{
		$id 	= $this->put('id_produk_siap');
		$data 	= [
			'nama_toko' 		=> $this->put('nama_toko'),
			'nama_produk' 		=> $this->put('nama_produk'),
			'jenis_produk' 		=> $this->put('jenis_produk'),
			'deskripsi' 		=> $this->put('deskripsi'),
			'gambar' 			=> $this->put('gambar'),
			'harga' 			=> $this->put('harga'),
			'stok' 				=> $this->put('stok')

		];

		if( $this->Produk_siap_model->updateproduk_siap($data, $id) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'messege' 	=> 'Data produk_siap telah di ubah.'
	        ], REST_Controller::HTTP_NO_CONTENT);
		} else {
				// id not found
			$this->response([
		           'status' 	=> FALSE,
		           'messege' 	=> 'Gagal mengubah data baru'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		}
	}

}