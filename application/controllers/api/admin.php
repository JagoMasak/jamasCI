<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class admin extends REST_Controller 
{
	public function __construct()
		{
			parent::__construct();
			$this->load->model('Admin_model');
		}
	public function index_get()
		{
			$id_admin = $this->get('id_admin');
			if ($id_admin === null) {
				$admin = $this->Admin_model->getadmin();
			} else {
				$admin = $this->Admin_model->getadmin($id_admin);
			}
			
			if($admin) {
					$this->response([
			            'status' 	=> TRUE,
			            'data' 		=> $admin
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
		$id_admin = $this->delete('id_admin');

		if( $id_admin === null) {
				$this->response([
		            'status' 	=> FALSE,
		            'messege' 	=> 'provide an id!'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if( $this->Admin_model->deleteadmin($id_admin) > 0 ) {
				// ok
				$this->response([
		            'status' 	=> TRUE,
		            'id_admin' 	=> $id_admin,
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
			'nama_admin' 	=> $this->post('nama_admin'),
			'no_hp' 		=> $this->post('no_hp'),
			'email' 		=> $this->post('email'),
			'password'		=> $this->post('password')

		];

		if( $this->Admin_model->createadmin($data) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'id_admin' 	=> $data,
		           'messege' 	=> 'Data admin telah di buat.'
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
		$id 	= $this->put('id_admin');
		$data 	= [
			'nama_admin' 	=> $this->put('nama_admin'),
			'no_hp' 		=> $this->put('no_hp'),
			'email' 		=> $this->put('email'),
			'password'		=> $this->put('password')
		];

		if( $this->Admin_model->updateadmin($data, $id) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'messege' 	=> 'Data admin telah di ubah.'
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