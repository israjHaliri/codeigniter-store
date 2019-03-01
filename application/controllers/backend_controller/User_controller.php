<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

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
   }
   public function index()
   {
      if (isset($_POST['search'])) 
      {
         $data['search_keyword'] = $this->input->post('keyword');
         $this->session->set_userdata('sess_search_keyword', $data['search_keyword']);
      }
      else 
      {
         $data['search_keyword'] = $this->session->userdata('sess_search_keyword');
      }


      $this->db->from('user');
      $this->db->like('username', $data['search_keyword']);
      $this->db->where("username !='israj'");

      $pagination['base_url'] = base_url().'backend_controller/user_controller/index/';
      $pagination['total_rows'] = $this->db->count_all_results();

      $pagination['full_tag_open'] = '<ul class="pagination" style="background-color:transparent;">';
      $pagination['full_tag_close'] = '</ul>';
      $pagination['first_link'] = 'First';
      $pagination['last_link'] = 'Last';
      $pagination['first_tag_open'] = '<li>';
      $pagination['first_tag_close'] = '</li>';
      $pagination['prev_link'] = '&laquo';
      $pagination['prev_tag_open'] = '<li class="prev">';
      $pagination['prev_tag_close'] = '</li>';
      $pagination['next_link'] = '&raquo';
      $pagination['next_tag_open'] = '<li>';
      $pagination['next_tag_close'] = '</li>';
      $pagination['last_tag_open'] = '<li>';
      $pagination['last_tag_close'] = '</li>';
      $pagination['cur_tag_open'] = '<li class="active"><a href="#">';
      $pagination['cur_tag_close'] = '</a></li>';
      $pagination['num_tag_open'] = '<li>';
      $pagination['num_tag_close'] = '</li>';

      $pagination['per_page'] = "3";
      $pagination['uri_segment'] = 4;
      $pagination['num_links'] = 5;

      $this->pagination->initialize($pagination);

      $data['list_data'] = $this->user_model->index($pagination['per_page'],$this->uri->segment(4,0),$data['search_keyword']);

      $this->load->view('layout/backend/head_admin');
      $this->load->view('view_backend/user/index',$data);
      $this->load->view('layout/backend/footer');


   }
   function insert()
   {
      $this->load->view('layout/backend/head_admin');
      $this->load->view('view_backend/user/add');
      $this->load->view('layout/backend/footer');
   }
   function edit($slug)
   {
      $data=array(
         'slug'=>$slug,
         );

      $data['data_edit']=$this->user_model->m_edit($data);
      $this->load->view('layout/backend/head_admin');
      $this->load->view('view_backend/user/edit',$data);
      $this->load->view('layout/backend/footer');
   }
   function insert_data()
   {
      if($this->input->post('save')) 
      {
         $this->form_validation->set_rules('firstname', 'Firstname','is_unique[user.firstname]');
         $this->form_validation->set_rules('lastname', 'Lastname','is_unique[user.lastname]');
         $this->form_validation->set_rules('email', 'Email','is_unique[user.email]');
         if ($this->form_validation->run() == true)
         {  
            $config = array(
               'allowed_types' => 'jpg|jpeg|gif|png',
               'max_size' => 2000,
               'file_name' => url_title($this->input->post('file_upload')),
               'upload_path' => './assets/image/'
               );
            $this->load->library('upload',$config);

            $password=$this->input->post('password');
            $encrypted_password = base64_encode($password);
            $data=array(
               'slug' =>str_replace(' ', '-', $this->input->post('firstname')).'-detail',
               'username' => $this->input->post('username'),
               'firstname' => $this->input->post('firstname'),
               'lastname' => $this->input->post('lastname'),
               'password' => $encrypted_password,
               'email' => $this->input->post('email'),
               'active' => $this->input->post('active'),
               'level' => $this->input->post('level'),
               );
            if ($_FILES['userfile']['size'] > 0)
            {
               if($this->upload->do_upload())
               {
                  $file = $this->upload->file_name;
                  $data['image']=$file;
                  $this->user_model->m_insert_data($data); 
                  redirect(base_url().'backend_controller/user_controller/index');
                  $this->load->view('layout/backend/footer');
               }
               else
               {
                  $this->session->set_flashdata('flash_data', $this->upload->display_errors());
                  redirect(base_url().'backend_controller/user_controller/insert');
               }

            }
            else
            {
               $this->user_model->m_insert_data($data); 
               redirect(base_url().'backend_controller/user_controller/index');
            }
         }
         else
         {
            $this->session->set_flashdata('flash_data', 'Data has been exists make sure your firstname,lastname,email never registered');
            redirect(base_url().'backend_controller/user_controller/insert');
         }
      }
      else
      {

         $this->session->set_flashdata('flash_data', 'Make Sure Your file is an image');
         redirect('backend_controller/user_controller/insert');
      }
   }
   function delete_data($id_user)
   {      
      $data=array(
         'id_user' => $id_user
         );
      $this->user_model->m_delete_data($data,$id_user);
      $this->load->view('layout/backend/head_admin');
      redirect(base_url().'backend_controller/user_controller/index');
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
            'upload_path' => './assets/image/'
            );
         $this->load->library('upload',$config);

         $id_user=$this->input->post('id_user');
         $password=$this->input->post('password');
         $encrypted_password = base64_encode($password);
         $data=array(
            'slug' =>str_replace(' ', '-', $this->input->post('firstname')).'-detail',
            'username' => $this->input->post('username'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'password' => $encrypted_password,
            'email' => $this->input->post('email'),
            'active' => $this->input->post('active'),
            'level' => $this->input->post('level'),
            );
         if ($_FILES['userfile']['size'] > 0)
         {
            if($this->upload->do_upload())
            {
               $file = $this->upload->file_name;
               $data['image']=$file;
               $this->user_model->m_edit_data($data,$id_user);
               redirect(base_url().'backend_controller/user_controller/index');
            }
            else
            {
               $this->session->set_flashdata('flash_data', $this->upload->display_errors());
               redirect($this->agent->referrer());
            }

         }
         else
         {
            $this->user_model->m_edit_data($data,$id_user);
            redirect(base_url().'backend_controller/user_controller/index');
         }

      }
      else
      {

         $this->session->set_flashdata('flash_data', 'Make Sure Your file is an image');
         redirect($this->agent->referrer());
      }
   }
}

