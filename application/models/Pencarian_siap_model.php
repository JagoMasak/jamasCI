<?php

class Pencarian_siap_model extends CI_Model
{

   function get_searched($where = NULL)  
   {  
      if ( ! is_null($where))  
      {  
          $this->db->where($where);  
          $query = $this->db->get('tbl_produk_siap');  

          if ($query->num_rows() > 0)  
          {  
              return $query->result();  
          }  
       }  
       return FALSE;  
    }  

}
