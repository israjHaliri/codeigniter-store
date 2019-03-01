<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

   public function __construct()
   {
      parent::__construct();
      $this->load->model('user_model');
      $this->load->model('product_model');
   }
   public function index()
   {
      $level=$level=$this->session->userdata('level')=='admin';
      if(isset($_COOKIE['remember_me_cookie'])) 
      {
         if ($level)
         {
            $data['count_user']=$this->user_model->count_user();
            $data['count_shirt']=$this->product_model->count_shirt();
            $data['count_pant']=$this->product_model->count_pant();
            $data['count_merchand']=$this->product_model->count_merchand();
            $data['count_show_shirt']=$this->product_model->count_show_shirt();
            $data['count_show_pant']=$this->product_model->count_show_pant();
            $data['count_show_merchand']=$this->product_model->count_show_merchand();
            $this->load->view('layout/backend/head_admin');
            $this->load->view('view_backend/dashboard/index',$data);  
            $this->load->view('layout/backend/footer');
            
         }
         else
         {
            $this->session->set_flashdata('flash_data', 'You dont have acces!');
            redirect('login_controller/index');  
         }

      }
      else
      {
         session_destroy();
         redirect('login_controller/index');
      }
   }
   public function dashboard_user()
   {
      $level=$level=$this->session->userdata('level')=='guest';
      if(isset($_COOKIE['remember_me_cookie'])) 
      {
         if ($level)
         {
            $this->load->view('layout/backend/head_guest');
            $this->load->view('view_backend/dashboard_user/index');
            $this->load->view('layout/backend/footer');
         }
         else
         {
            $this->session->set_flashdata('flash_data', 'You dont have acces!');
            redirect('login_controller/index');  
         }
      }
      else
      {
         session_destroy();
         redirect('login_controller/index');
      }    
   }
   function gauges()
   {

   }
}
