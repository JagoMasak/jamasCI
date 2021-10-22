<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class User extends REST_Controller 
{
	public function __construct()
		{
			parent::__construct();
			$this->load->model('User_model');
		}
	public function index_get()
		{
			$id_user = $this->get('id_user');
			if ($id_user === null) {
				$user = $this->User_model->getUser();
			} else {
				$user = $this->User_model->getUser($id_user);
			}
			
			if($user) {
					$this->response([
			            'status' 	=> TRUE,
			            'data' 		=> $user
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
		$id_user = $this->delete('id_user');

		if( $id_user === null) {
				$this->response([
		            'status' 	=> FALSE,
		            'messege' 	=> 'provide an id!'
	        ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if( $this->User_model->deleteUser($id_user) > 0 ) {
				// ok
				$this->response([
		            'status' 	=> TRUE,
		            'id_user' 	=> $id_user,
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
			'nama_user' 	=> $this->post('nama_user'),
			'email' 		=> $this->post('email'),
			'password'		=> $this->post('password'),
			'nohp' 			=> $this->post('nohp'),
			'alamat_user' 	=> $this->post('alamat_user')
		];

		if( $this->User_model->createUser($data) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'id_user' 	=> $data,
		           'messege' 	=> 'Data User telah di buat.'
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
		$id 	= $this->put('id_user');
		$data 	= [
			'nama_user' 	=> $this->put('nama_user'),
			'email' 		=> $this->put('email'),
			'password'		=> $this->put('password'),
			'nohp' 			=> $this->put('nohp'),
			'alamat_user' 	=> $this->put('alamat_user')
		];

		if( $this->User_model->updateUser($data, $id) > 0) {
			$this->response([
		           'status' 	=> TRUE,
		           'messege' 	=> 'Data User telah di ubah.'
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