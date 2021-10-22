<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class jenis extends REST_Controller 
{
	public function __construct()
		{
			parent::__construct();
			$this->load->model('Jenis_model');
		}
	public function index_get()
		{
			$id_jenis = $this->get('id_jenis');
			if ($id_jenis === null) {
				$jenis = $this->Jenis_model->getjenis();
			} else {
				$jenis = $this->Jenis_model->getjenis($id_jenis);
			}
			
			if($jenis) {
					$this->response([
			            'status' 	=> TRUE,
			            'data' 		=> $jenis
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
		$id_jenis = $this->delete('id_jenis');

		if( $id_jenis === null) {
				$this->response([
		            'status' 	=> FALSE,
		            'messege' 	=> 'provide an id!'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if( $this->Jenis_model->deletejenis($id_jenis) > 0 ) {
				// ok
				$this->response([
		            'status' 	=> TRUE,
		            'id_jenis' 	=> $id_jenis,
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
			'jenis_produk' 	=> $this->post('jenis_produki')

		];

		if( $this->Jenis_model->createjenis($data) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'id_jenis' 	=> $data,
		           'messege' 	=> 'Data jenis telah di buat.'
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
		$id 	= $this->put('id_jenis');
		$data 	= [
			'jenis_produk' 	=> $this->put('jenis_produk')

		];

		if( $this->Jenis_model->updatejenis($data, $id) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'messege' 	=> 'Data jenis telah di ubah.'
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