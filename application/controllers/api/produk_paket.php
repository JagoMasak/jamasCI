<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class produk_paket extends REST_Controller 
{
	public function __construct()
		{
			parent::__construct();
			$this->load->model('Produk_paket_model');
		}
	public function index_get()
		{
			$id_produk_paket = $this->get('id_produk_paket');
			if ($id_produk_paket === null) {
				$produk_paket = $this->Produk_paket_model->getproduk_paket();
			} else {
				$produk_paket = $this->Produk_paket_model->getproduk_paket($id_produk_paket);
			}
			
			if($produk_paket) {
					$this->response([
			            'status' 	=> TRUE,
			            'data' 		=> $produk_paket
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
		$id_produk_paket = $this->delete('id_produk_paket');

		if( $id_produk_paket === null) {
				$this->response([
		            'status' 	=> FALSE,
		            'messege' 	=> 'provide an id!'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if( $this->Produk_paket_model->deleteproduk_paket($id_produk_paket) > 0 ) {
				// ok
				$this->response([
		            'status' 	=> TRUE,
		            'id_produk_paket' 	=> $id_produk_paket,
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
			'harga' 			=> $this->post('harga'),
			'stok' 				=> $this->post('stok')


		];

		if( $this->Produk_paket_model->createproduk_paket($data) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'id_produk_paket' 	=> $data,
		           'messege' 	=> 'Data produk_paket telah di buat.'
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
		$id 	= $this->put('id_produk_paket');
		$data 	= [
			'nama_toko' 		=> $this->put('nama_toko'),
			'nama_produk' 		=> $this->put('nama_produk'),
			'jenis_produk' 		=> $this->put('jenis_produk'),
			'harga' 			=> $this->put('harga'),
			'stok' 				=> $this->put('stok')

		];

		if( $this->Produk_paket_model->updateproduk_paket($data, $id) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'messege' 	=> 'Data produk_paket telah di ubah.'
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