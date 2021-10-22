<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Mitra extends REST_Controller 
{
	public function __construct()
		{
			parent::__construct();
			$this->load->model('Mitra_model');
		}
	public function index_get()
		{
			$id_mitra = $this->get('id_mitra');
			if ($id_mitra === null) {
				$mitra = $this->Mitra_model->getmitra();
			} else {
				$mitra = $this->Mitra_model->getmitra($id_mitra);
			}
			
			if($mitra) {
					$this->response([
			            'status' 	=> TRUE,
			            'data' 		=> $mitra
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
		$id_mitra = $this->delete('id_mitra');

		if( $id_mitra === null) {
				$this->response([
		            'status' 	=> FALSE,
		            'messege' 	=> 'provide an id!'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if( $this->Mitra_model->deletemitra($id_mitra) > 0 ) {
				// ok
				$this->response([
		            'status' 	=> TRUE,
		            'id_mitra' 	=> $id_mitra,
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
			'nama_mitra' 	=> $this->post('nama_mitra'),
			'nama_toko' 	=> $this->post('nama_toko'),
			'alamat_toko' 	=> $this->post('alamat_toko'),
			'nohp' 			=> $this->post('nohp'),
			'email' 		=> $this->post('email'),
			'password'		=> $this->post('password')

		];

		if( $this->Mitra_model->createmitra($data) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'id_mitra' 	=> $data,
		           'messege' 	=> 'Data mitra telah di buat.'
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
		$id 	= $this->put('id_mitra');
		$data 	= [
			'nama_mitra' 	=> $this->put('nama_mitra'),
			'nama_toko' 	=> $this->put('nama_toko'),
			'alamat_toko' 	=> $this->put('alamat_toko'),
			'nohp' 			=> $this->put('nohp'),
			'email' 		=> $this->put('email'),
			'password'		=> $this->put('password')
		];

		if( $this->Mitra_model->updatemitra($data, $id) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'messege' 	=> 'Data mitra telah di ubah.'
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