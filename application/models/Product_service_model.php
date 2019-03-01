<?php

class Product_service_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
   }

   function m_get_product()
   {
      $this->db->select('id_product,title_product,price_product,date_publish,product_type');    
      $this->db->from('product');
      $query = $this->db->get();
      return $query->result_array();
   } 
}