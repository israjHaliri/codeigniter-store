<?php

class User_model extends CI_Model {

   function __construct()
   {
      parent::__construct();
      $this->load->database();
   }
   function index($perPage, $uri, $search_keyword)
   {

      $this->db->select('*');
      $this->db->from('user');
      $this->db->where("username !='israj'");

      if (!empty($search_keyword)) 
      {
         $this->db->like('username', $search_keyword);
      }
      $this->db->order_by('id_user','asc');
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
   function m_edit($data)
   {
      $this->db->where($data);
      $edit = $this->db->get('user');
      return $edit->result();
   }
   function m_insert_data($data)
   {
      $this->db->insert('user',$data);
   }
   function m_delete_data($data,$id_user)
   {
      $this->db->where('id_user', $id_user);
      $query = $this->db->get('user');
      $count = $this->db->count_all_results();
      foreach ($query->result() as $row){}
         unlink("./assets/image/".$row->image);
      $this->db->delete('user',$data);
   }
   function m_edit_data($data,$id_user)
   {
      $this->db->where('id_user', $id_user);
      $query = $this->db->get('user');
      $count = $this->db->count_all_results();
      if (!empty($this->upload->file_name)) 
      {
         foreach ($query->result() as $row){}
            unlink("./assets/image/".$row->image);
      }  

      $this->db->where('id_user', $id_user);
      $this->db->update('user',$data);
   }

// login
   function m_auth($email,$password)
   {

      $query = $this->db->get_where('user', array(
         'email' => $email,
         'password' => base64_encode($password)
         ));
// echo $this->db->last_query();   
// die();
      if($query->num_rows() == 1)
      {
         return $query->row();
      }

   }
//forgot password
   function m_forgot_password($email,$data)
   {
      $this->db->where('email', $email);
      $this->db->update('user',$data);
   }
   function m_forgot_email($email)
   {
      $query = $this->db->get_where('user', array(
         'email' => $email,
         ));
       if($query->num_rows() == 1)
      {
         return $query->row();
      }
   }

//register
   function m_add_account($data)
   {
      $this->db->insert('user',$data);

      return  mysqli_insert_id($this->db->conn_id);
   }
   function m_rollback_account($data,$id)
   {
      $this->db->where('id_user', $id);
      $this->db->delete('user',$data);
   }
   function m_changeActiveState($key)
   {
      $data = array(
         'active' => 1
         );

      $this->db->where('md5(id_user)', $key);
      $this->db->update('user', $data);

      return true;
   }
   function count_user()
   {
      $this->db->select('*');
      $this->db->from('user');
      $query=$this->db->get();
      return $query->num_rows();
   }
}
// $file_name = $this->db->query("SELECT image FROM user WHERE id_user='".$id_user."'")->row()->image;