<?php

class Product_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
   }

// shirt
   function m_get_shirt()
   {
      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
      $query = $this->db->get();
      return $query->result();
   } 
   function m_insert_shirt($data,$data2)
   {
      $this->db->insert('shirt',$data);
      $id_shirt=$this->db->insert_id();
      print_r($id_shirt);
      $data2['shirt_id']=$id_shirt;
      $this->db->insert('product',$data2);
   }
   function m_edit_shirt($data)
   {
      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
      $this->db->where($data);
      $query = $this->db->get();
      return $query->result();

   }
   function m_edit_shirt_data($data,$data2,$id_shirt)
   {
      $this->db->where('id_shirt', $id_shirt);
      $query = $this->db->get('shirt');
      $count = $this->db->count_all_results();
      if (!empty($this->upload->file_name)) 
      {
         foreach ($query->result() as $row){}
            unlink("./assets/image/product/".$row->image_shirt);
      }  

      $this->db->where('id_shirt', $id_shirt);
      $this->db->update('shirt',$data);
      $this->db->where('shirt_id', $id_shirt);
      $this->db->update('product',$data2);
   }
   function m_delete_shirt_data($data,$id_shirt)
   {
      $this->db->where('id_shirt', $id_shirt);
      $query = $this->db->get('shirt');
      $count = $this->db->count_all_results();
      foreach ($query->result() as $row){}
         unlink("./assets/image/product/".$row->image_shirt);
      $this->db->delete('shirt',$data);
   }

// pant
   function m_get_pant()
   {
      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('pant', 'product.pant_id = pant.id_pant');
      $query = $this->db->get();
      return $query->result();
   } 
   function m_insert_pant($data,$data2)
   {
      $this->db->insert('pant',$data);
      $id_pant=$this->db->insert_id();
      print_r($id_pant);
      $data2['pant_id']=$id_pant;
      $this->db->insert('product',$data2);
   }
   function m_edit_pant($data)
   {
      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('pant', 'product.pant_id = pant.id_pant');
      $this->db->where($data);
      $query = $this->db->get();
      return $query->result();

   }
   function m_edit_pant_data($data,$data2,$id_pant)
   {
      $this->db->where('id_pant', $id_pant);
      $query = $this->db->get('pant');
      $count = $this->db->count_all_results();
      if (!empty($this->upload->file_name)) 
      {
         foreach ($query->result() as $row){}
            unlink("./assets/image/product/".$row->image_pant);
      }  

      $this->db->where('id_pant', $id_pant);
      $this->db->update('pant',$data);
      $this->db->where('pant_id', $id_pant);
      $this->db->update('product',$data2);
   }
   function m_delete_pant_data($data,$id_pant)
   {
      $this->db->where('id_pant', $id_pant);
      $query = $this->db->get('pant');
      $count = $this->db->count_all_results();
      foreach ($query->result() as $row){}
         unlink("./assets/image/product/".$row->image_pant);
      $this->db->delete('pant',$data);
   }

// merchand
   function m_get_merchand()
   {
      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
      $query = $this->db->get();
      return $query->result();
   } 
   function m_insert_merchand($data,$data2)
   {
      $this->db->insert('merchand',$data);
      $id_merchand=$this->db->insert_id();
      print_r($id_merchand);
      $data2['merchand_id']=$id_merchand;
      $this->db->insert('product',$data2);
   }
   function m_edit_merchand($data)
   {
      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
      $this->db->where($data);
      $query = $this->db->get();
      return $query->result();

   }
   function m_edit_merchand_data($data,$data2,$id_merchand)
   {
      $this->db->where('id_merchand', $id_merchand);
      $query = $this->db->get('merchand');
      $count = $this->db->count_all_results();
      if (!empty($this->upload->file_name)) 
      {
         foreach ($query->result() as $row){}
            unlink("./assets/image/product/".$row->image_merchand);
      }  

      $this->db->where('id_merchand', $id_merchand);
      $this->db->update('merchand',$data);
      $this->db->where('merchand_id', $id_merchand);
      $this->db->update('product',$data2);
   }
   function m_delete_merchand_data($data,$id_merchand)
   {
      $this->db->where('id_merchand', $id_merchand);
      $query = $this->db->get('merchand');
      $count = $this->db->count_all_results();
      foreach ($query->result() as $row){}
         unlink("./assets/image/product/".$row->image_merchand);
      $this->db->delete('merchand',$data);
   }

//front
   function list_shirt($perPage, $uri)
   {

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');

      $this->db->order_by('id_shirt','asc');
      $getData = $this->db->get('', $perPage, $uri);

      if ($getData->num_rows() > 0)
      {
         return $getData->result_array();
      }
      else
      {
         return null;
      }
   }
   function list_pant($perPage, $uri)
   {

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('pant', 'product.pant_id = pant.id_pant');

      $this->db->order_by('id_pant','asc');
      $getData = $this->db->get('', $perPage, $uri);

      if ($getData->num_rows() > 0)
      {
         return $getData->result_array();
      }
      else
      {
         return null;
      }
   }
   function list_merchand($perPage, $uri)
   {

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');

      $this->db->order_by('id_merchand','asc');
      $getData = $this->db->get('', $perPage, $uri);
// echo $this->db->last_query();die();

      if ($getData->num_rows() > 0)
      {
         return $getData->result_array();
      }
      else
      {
         return null;
      }
   }
   function list_product_hot_limit()
   {

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
      $this->db->get(); 
      $query1 = $this->db->last_query();

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('pant', 'product.pant_id = pant.id_pant');
      $this->db->get(); 
      $query2 = $this->db->last_query();

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
      $this->db->order_by('count','desc');  
      $this->db->get(); 
      $query3 = $this->db->last_query();


      $query = $this->db->query(($query1)." UNION ALL ".($query2)." UNION ALL ".($query3.' limit 8  '));
// echo $this->db->last_query();die();
      return $query->result_array();
   }
   function m_detail_product($data,$slug)
   {

      $this->db->set('count', '`count`+1', FALSE);
      $this->db->where('slug', $slug);
      $this->db->update('product');

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
      $this->db->where('slug', $slug);
      $this->db->get(); 
      $query1 = $this->db->last_query();

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('pant', 'product.pant_id = pant.id_pant');
      $this->db->where('slug', $slug);
      $this->db->get(); 
      $query2 = $this->db->last_query();

      $this->db->select('*');    
      $this->db->from('product');
      $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
      $this->db->where('slug', $slug);
      $this->db->get(); 
      $query3 = $this->db->last_query();


// echo $this->db->last_query();die();
      $query = $this->db->query(($query1)." UNION ALL ".($query2)." UNION ALL ".($query3));
      return $query->result_array();
   }
   function search($perPage, $uri,$search_keyword)
   {
      if (!isset($search_keyword)) {
         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->get();
         $query1 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('pant', 'product.pant_id = pant.id_pant');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->get();
         $query2 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->get('', $perPage, $uri);
         $query3 = $this->db->last_query();

         $query = $this->db->query(($query1)." UNION ALL ".($query2)." UNION ALL ".($query3));
         if ($query->num_rows() > 0)
         {
            return $query->result_array();
         }
         else
         {
            return null;
         }
      }


      $category=$search_keyword['type'];
      switch ($category)  
      {
         case "all":
         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query1 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('pant', 'product.pant_id = pant.id_pant');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query2 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get('', $perPage, $uri);
         $query3 = $this->db->last_query();

         $query = $this->db->query(($query1)." UNION ALL ".($query2)." UNION ALL ".($query3));

// echo $this->db->last_query();die();
         if ($query->num_rows() > 0)
         {
            return $query->result_array();
         }
         else
         {
            return null;
         }
         break;

         case "shirt":
         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','shirt');  
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query1 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('pant', 'product.pant_id = pant.id_pant');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','shirt');  
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query2 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','shirt');  
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get('', $perPage, $uri);
         $query3 = $this->db->last_query();

         $query = $this->db->query(($query1)." UNION ALL ".($query2)." UNION ALL ".($query3));

         if ($query->num_rows() > 0)
         {
            return $query->result_array();
         }
         else
         {
            return null;
         }
         break;

         case "pant":
         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','pant');  
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query1 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('pant', 'product.pant_id = pant.id_pant');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','pant');  
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query2 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','pant');  
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get('', $perPage, $uri);
         $query3 = $this->db->last_query();

         $query = $this->db->query(($query1)." UNION ALL ".($query2)." UNION ALL ".($query3));

         if ($query->num_rows() > 0)
         {
            return $query->result_array();
         }
         else
         {
            return null;
         }
         break;

         case "merchand":
         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','merchand');  
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query1 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('pant', 'product.pant_id = pant.id_pant');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','merchand');   
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get();
         $query2 = $this->db->last_query();

         $this->db->select('*');    
         $this->db->from('product');
         $this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
         $this->db->like('title_product', $search_keyword['keyword']);
         $this->db->where('product_type','merchand');    
         $this->db->where('price_product >=', $search_keyword['min']);  
         $this->db->where('price_product <=', $search_keyword['max']);
         $this->db->get('', $perPage, $uri);
         $query3 = $this->db->last_query();

         $query = $this->db->query(($query1)." UNION ALL ".($query2)." UNION ALL ".($query3));
         // echo $this->db->last_query();die();
         if ($query->num_rows() > 0)
         {
            return $query->result_array();
         }
         else
         {
            return null;
         }
         break;
      }
   }
   function count_shirt()
   {
      $this->db->select('*');
      $this->db->from('shirt');
      $query = $this->db->get();
      return $query->num_rows();
   }
   function count_pant()
   {
      $this->db->select('*');
      $this->db->from('pant');
      $query = $this->db->get();
      return $query->num_rows();
   }
   function count_merchand()
   {
      $this->db->select('*');
      $this->db->from('merchand');
      $query = $this->db->get();
      return $query->num_rows();
   }
   function count_show_shirt()
   {
      $this->db->select('sum(count) as total');
      $this->db->from('product');
      $this->db->where('product_type','shirt');    
      $query = $this->db->get();
      return $query->result();
   }
   function count_show_pant()
   {
      $this->db->select('sum(count) as total');
      $this->db->from('product');
      $this->db->where('product_type','pant');    
      $query = $this->db->get();
      return $query->result();
   }
   function count_show_merchand()
   {
      $this->db->select('sum(count) as total');
      $this->db->from('product');
      $this->db->where('product_type','merchand');    
      $query = $this->db->get();
      return $query->result();
   }
}