<?php  

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pencarian_siap extends REST_Controller 

{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pencarian_siap_model');
	}
		
	public function index_get()  
			{  
			    $where = '';  

			    if ($this->get('id_produk_siap')) 
			    {              
			        $where .= 'id_produk_siap = '.$this->get('id_produk_siap');  
			    }  
			    if ($this->get('nama_produk'))        
			    {  
			        $where .= (empty($where)? '' : ' or ')."nama_produk like '%".$this->get('nama_produk')."%'";  
			    }  
			    if ($this->get('nama_toko'))  
			    {  
			        $where .= (empty($where)? '' : ' or ')."nama_toko like '%".$this->get('nama_toko')."%'";  
			    }  

			   if ( ! empty($where))  
			   {  
			       $data = $this->Pencarian_siap_model->get_searched($where);  

			       if ($data)  
			       {  
			           $this->response($data, 200);  
			       }  
			       else  
			       {  
			           $this->response(NULL, 404);  
			       }  
			    }  
			    else  
			    {  
			        $this->response(NULL, 404);  
			     }  
			}
}

?>

