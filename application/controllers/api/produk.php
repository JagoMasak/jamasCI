<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class produk extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model');
    }
    
    public function index_get()
    {
        $id_produk = $this->get('id_produk');
        if ($id_produk === null) {
            $produk = $this->Produk_model->getproduk();
        } else {
            $produk = $this->Produk_model->getproduk($id_produk);
        }

        if($produk) {
            $this->response([
                'status' 	=> TRUE,
                'data' 		=> $produk
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' 	=> FALSE,
                'messege' 	=> 'Tidak Di Temukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function jenis_get()
    {
        $id_jenis = $this->get('id_jenis');
        if ($id_jenis === null) {
            $produk = $this->Produk_model->getjenisproduk();
        } else {
            $produk = $this->Produk_model->getjenisproduk($id_jenis);
        }

        if($produk) {
            $this->response([
                'status'    => TRUE,
                'data'      => $produk
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'messege'   => 'Tidak Di Temukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function cari_get()
    {
        $keyword = $this->get('keyword');
        if ($keyword === null) {
            $produk = $this->Produk_model->getcariproduk();
        } else {
            $produk = $this->Produk_model->getcariproduk($keyword);
        }

        if($produk) {
            $this->response([
                'status'    => TRUE,
                'data'      => $produk
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status'    => FALSE,
                'messege'   => 'Tidak Di Temukan'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id_produk = $this->delete('id_produk');

        if( $id_produk === null) {
            $this->response([
                'status' 	=> FALSE,
                'messege' 	=> 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if( $this->Produk_model->deleteproduk($id_produk) > 0 ) {
            // ok
                $this->response([
                    'status' 	          => TRUE,
                    'id_produk' 	  => $id_produk,
                    'messege' 	          => 'data di hapus'
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

        if( $this->Produk_model->createproduk($data) > 0) {
        // ok
            $this->response([
                'status' 	=> TRUE,
                'id_produk' 	=> $data,
                'messege' 	=> 'Data produk telah di buat.'
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
        $id 	= $this->put('id_produk');
        $data 	= [
            'nama_toko' 		=> $this->put('nama_toko'),
            'nama_produk' 		=> $this->put('nama_produk'),
            'jenis_produk' 		=> $this->put('jenis_produk'),
            'harga' 			=> $this->put('harga'),
            'stok' 				=> $this->put('stok')

        ];

        if( $this->Produk_model->updateproduk($data, $id) > 0) {
            $this->response([
                'status' 	=> TRUE,
                'messege' 	=> 'Data produk telah di ubah.'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
        // id not found
            $this->response([
                'status' 	=> FALSE,
                'messege' 	=> 'Gagal mengubah data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

}