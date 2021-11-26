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
        $this->load->model('APIProduk_model');
    }
    
    public function index_get()
    {
        $id_produk = $this->get('id_produk');
        if ($id_produk === null) {
            $produk = $this->APIProduk_model->getproduk();
        } else {
            $produk = $this->APIProduk_model->getproduk($id_produk);
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
        $jenis = $this->get('jenis');
        if ($jenis === null) {
            $produk = $this->APIProduk_model->getjenisproduk();
        } else {
            $produk = $this->APIProduk_model->getjenisproduk($jenis);
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

    public function kategori_get()
    {
        $id_kategori = $this->get('id_kategori');
        if ($id_kategori === null) {
            $produk = $this->APIProduk_model->getkategoriproduk();
        } else {
            $produk = $this->APIProduk_model->getkategoriproduk($id_kategori);
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
            $produk = $this->APIProduk_model->getcariproduk();
        } else {
            $produk = $this->APIProduk_model->getcariproduk($keyword);
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

}