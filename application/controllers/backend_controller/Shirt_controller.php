<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shirt_controller extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      if(!isset($_COOKIE['remember_me_cookie'])) 
      {
         session_destroy();
         redirect('login_controller/index');
      }
      else
      {
         $level=$level=$this->session->userdata('level')=='admin';
         if (!$level)
         {
            $this->session->set_flashdata('flash_data', 'You dont have acces!');
            redirect('login_controller/index');  
         }
      }
      $this->load->model('product_model');
   }

   public function index()
   {
      $this->load->view('layout/backend/head_admin');
      $data['list_data'] = $this->product_model->m_get_shirt();
      $this->load->view('view_backend/shirt/index',$data);
      $this->load->view('layout/backend/footer');
   }
   function insert()
   {
      $this->load->view('layout/backend/head_admin');
      $this->load->view('view_backend/shirt/add');
      $this->load->view('layout/backend/footer');
   }
   function edit($slug)
   {
      $data=array(
         'slug'=>$slug,
         );

      $data['data_edit']=$this->product_model->m_edit_shirt($data);
      $this->load->view('layout/backend/head_admin');
      $this->load->view('view_backend/shirt/edit',$data);
      $this->load->view('layout/backend/footer');
   }
   function insert_data()
   {
      if($this->input->post('save')) 
      {
         $this->form_validation->set_rules('barcode_shirt', 'Barcode_shirt','is_unique[shirt.barcode_shirt]');
         $this->form_validation->set_rules('title_product', 'Title_product','is_unique[product.title_product]');
         if ($this->form_validation->run() == true)
         {  
            $config = array(
               'allowed_types' => 'jpg|jpeg|gif|png',
               'max_size' => 2000,
               'file_name' => url_title($this->input->post('file_upload')),
               'upload_path' => './assets/image/product/'
               );
            $this->load->library('upload',$config);

            $data=array(
               'barcode_shirt' => $this->input->post('barcode_shirt'),
               'brand_shirt' => $this->input->post('brand_shirt'),
               'size_shirt' => $this->input->post('size_shirt'),
               'describe_shirt' => $this->input->post('describe_shirt'),
               );
            $data2=array(
               'title_product' => $this->input->post('title_product'),
               'price_product' => $this->input->post('price_product'),
               'date_publish' => $this->input->post('date_publish'),
               'product_type' => 'shirt',
               'slug' =>str_replace(' ', '-', $this->input->post('barcode_shirt')).'-detail',
               );
            if ($_FILES['userfile']['size'] > 0)
            {
               if($this->upload->do_upload())
               {
                  $file = $this->upload->file_name;
                  $data['image_shirt']=$file;
                  $this->product_model->m_insert_shirt($data,$data2); 
                  redirect(base_url().'backend_controller/shirt_controller/index');
               }
               else
               {
                  $this->session->set_flashdata('flash_data', $this->upload->display_errors());
                  redirect(base_url().'backend_controller/shirt_controller/insert');
               }

            }
            else
            {
               $this->product_model->m_insert_shirt($data,$data2);
               redirect(base_url().'backend_controller/shirt_controller/index');
            }
         }
         else
         {
            $this->session->set_flashdata('flash_data', 'Data has been exists');
            redirect(base_url().'backend_controller/shirt_controller/insert');
         }
      }
      else
      {

         $this->session->set_flashdata('flash_data', 'Make Sure Your file is an image');
         redirect('backend_controller/shirt_controller/insert');
      }
   }
   function delete_data($id_shirt)
   {      
      $data=array(
         'id_shirt' => $id_shirt
         );
      $this->product_model->m_delete_shirt_data($data,$id_shirt);
      $this->load->view('layout/backend/head_admin');
      redirect(base_url().'backend_controller/shirt_controller/index');
      $this->load->view('layout/backend/footer');
   }
   function edit_data()
   {
      if($this->input->post('save')) 
      {

        $config = array(
         'allowed_types' => 'jpg|jpeg|gif|png',
         'max_size' => 2000,
         'file_name' => url_title($this->input->post('file_upload')),
         'upload_path' => './assets/image/product/'
         );
        $this->load->library('upload',$config);

        $id_shirt=$this->input->post('id_shirt');
        $data=array(
         'barcode_shirt' => $this->input->post('barcode_shirt'),
         'brand_shirt' => $this->input->post('brand_shirt'),
         'size_shirt' => $this->input->post('size_shirt'),
         'describe_shirt' => $this->input->post('describe_shirt'),
         );
        $data2=array(
         'title_product' => $this->input->post('title_product'),
         'price_product' => $this->input->post('price_product'),
         'date_publish' => $this->input->post('date_publish'),
         'product_type' => 'shirt',
         'slug' =>str_replace(' ', '-', $this->input->post('barcode_shirt')).'-detail',
         );
        if ($_FILES['userfile']['size'] > 0)
        {
         if($this->upload->do_upload())
         {
            $file = $this->upload->file_name;
            $data['image_shirt']=$file;
            $this->product_model->m_edit_shirt_data($data,$data2,$id_shirt); 
            redirect(base_url().'backend_controller/shirt_controller/index');
         }
         else
         {
            $this->session->set_flashdata('flash_data', $this->upload->display_errors());
            redirect(base_url().'backend_controller/shirt_controller/insert');
         }

      }
      else
      {
         $this->product_model->m_edit_shirt_data($data,$data2,$id_shirt); 
         redirect(base_url().'backend_controller/shirt_controller/index');
      }

   }
   else
   {

      $this->session->set_flashdata('flash_data', 'Make Sure Your file is an image');
      redirect($this->agent->referrer());
   }
}
}