<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_controller extends CI_Controller {

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
      $this->load->model('user_model');
      $this->load->model('product_model');
   }

   public function shirt_report_xls()
   {
      $data['list_data']=$this->product_model->m_get_shirt();
      $this->load->view('view_backend/dashboard/shirt_report_xls',$data);
   }
    public function pant_report_xls()
   {
      $data['list_data']=$this->product_model->m_get_pant();
      $this->load->view('view_backend/dashboard/pant_report_xls',$data);
   } 
   public function merchand_report_xls()
   {
      $data['list_data']=$this->product_model->m_get_merchand();
      $this->load->view('view_backend/dashboard/merchand_report_xls',$data);
   }
}