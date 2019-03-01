<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pant_controller extends CI_Controller {

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
      $data['list_data'] = $this->product_model->m_get_pant();
      $this->load->view('view_backend/pant/index',$data);
      $this->load->view('layout/backend/footer');
   }
   function insert()
   {
      $this->load->view('layout/backend/head_admin');
      $this->load->view('view_backend/pant/add');
      $this->load->view('layout/backend/footer');
   }
   function edit($slug)
   {
      $data=array(
         'slug'=>$slug,
         );

      $data['data_edit']=$this->product_model->m_edit_pant($data);
      $this->load->view('layout/backend/head_admin');
      $this->load->view('view_backend/pant/edit',$data);
      $this->load->view('layout/backend/footer');
   }
   function insert_data()
   {
      if($this->input->post('save')) 
      {
         $this->form_validation->set_rules('barcode_pant', 'Barcode_pant','is_unique[pant.barcode_pant]');
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
               'barcode_pant' => $this->input->post('barcode_pant'),
               'brand_pant' => $this->input->post('brand_pant'),
               'size_pant' => $this->input->post('size_pant'),
               'describe_pant' => $this->input->post('describe_pant'),
               );
            $data2=array(
               'title_product' => $this->input->post('title_product'),
               'price_product' => $this->input->post('price_product'),
               'date_publish' => $this->input->post('date_publish'),
               'product_type' => 'pant',
               'slug' =>str_replace(' ', '-', $this->input->post('barcode_pant')).'-detail',
               );
            if ($_FILES['userfile']['size'] > 0)
            {
               if($this->upload->do_upload())
               {
                  $file = $this->upload->file_name;
                  $data['image_pant']=$file;
                  $this->product_model->m_insert_pant($data,$data2); 
                  redirect(base_url().'backend_controller/pant_controller/index');
               }
               else
               {
                  $this->session->set_flashdata('flash_data', $this->upload->display_errors());
                  redirect(base_url().'backend_controller/pant_controller/insert');
               }

            }
            else
            {
               $this->product_model->m_insert_pant($data,$data2);
               redirect(base_url().'backend_controller/pant_controller/index');
            }
         }
         else
         {
            $this->session->set_flashdata('flash_data', 'Data has been exists');
            redirect(base_url().'backend_controller/pant_controller/insert');
         }
      }
      else
      {

         $this->session->set_flashdata('flash_data', 'Make Sure Your file is an image');
         redirect('backend_controller/pant_controller/insert');
      }
   }
   function delete_data($id_pant)
   {      
      $data=array(
         'id_pant' => $id_pant
         );
      $this->product_model->m_delete_pant_data($data,$id_pant);
      $this->load->view('layout/backend/head_admin');
      redirect(base_url().'backend_controller/pant_controller/index');
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

         $id_pant=$this->input->post('id_pant');
         $data=array(
            'barcode_pant' => $this->input->post('barcode_pant'),
            'brand_pant' => $this->input->post('brand_pant'),
            'size_pant' => $this->input->post('size_pant'),
            'describe_pant' => $this->input->post('describe_pant'),
            );
         $data2=array(
            'title_product' => $this->input->post('title_product'),
            'price_product' => $this->input->post('price_product'),
            'date_publish' => $this->input->post('date_publish'),
            'product_type' => 'pant',
            'slug' =>str_replace(' ', '-', $this->input->post('barcode_pant')).'-detail',
            );
         if ($_FILES['userfile']['size'] > 0)
         {
            if($this->upload->do_upload())
            {
               $file = $this->upload->file_name;
               $data['image_pant']=$file;
               $this->product_model->m_edit_pant_data($data,$data2,$id_pant); 
               redirect(base_url().'backend_controller/pant_controller/index');
            }
            else
            {
               $this->session->set_flashdata('flash_data', $this->upload->display_errors());
               redirect(base_url().'backend_controller/pant_controller/insert');
            }

         }
         else
         {
            $this->product_model->m_edit_pant_data($data,$data2,$id_pant); 
            redirect(base_url().'backend_controller/pant_controller/index');
         }

      }
      else
      {

         $this->session->set_flashdata('flash_data', 'Make Sure Your file is an image');
         redirect($this->agent->referrer());
      }
   }
}