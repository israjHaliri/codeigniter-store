<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('user_model','login');        

	}
	public function index()
	{
		// print_r($_SESSION);
		// print_r($_COOKIE);
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/login');
		$this->load->view('layout/frontend/footer');

	}
	public function logout() {
		$data =array('id_user', 'email','active','level');
		$this->session->unset_userdata($data);
		setcookie('remember_me_cookie','',time()-3600,'/');
		redirect('login_controller/index');

	} 
	public function auth()
	{
		if($_POST) {
			
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$result = $this->login->m_auth($email,$password);

			if($result) {

				$remember_me=$this->input->post('remember_me_checkbox');
				if ($remember_me) 
				{
					setcookie('remember_me_cookie','remember_checked',time()+3600,'/');

				}
				else
				{
					setcookie('remember_me_cookie','remember_checked',-1,'/');				
				}


				$data=array(
					'id_user' => $result->id_user,
					'email' => $result->email,
					'firstname' => $result->firstname,
					'lastname' => $result->firstname,
					'image' => $result->image,
					);
				$data2=array(					
					'active'=>$result->active,
					'level'=>$result->level,
					'is_login' => true
					);

				$this->session->set_userdata($data2);
				if ($_SESSION['active']=='1') {

					if ($_SESSION['level']=='admin')
					{
						
						$this->session->set_userdata($data);
						redirect('backend_controller/dashboard_controller/');
					}
					else if ($_SESSION['level']=='guest')
					{
						$this->session->set_userdata($data);
						redirect('backend_controller/dashboard_controller/dashboard_user');
					}
				}
				else if($_SESSION['active']=='0'){
					$this->session->set_flashdata('flash_data', 'Your account not activated yet!');
					redirect('login_controller/index');
				}	

			}
			else {
				$this->session->set_flashdata('flash_data', 'email or password is wrong!');
				redirect('Login_controller/index');
			}			
		}

		// if($_POST) {

		// 	$email=$this->input->post('email');
		// 	$password=$this->input->post('password');
		// 	$result = $this->login->m_auth($email,$password);

		// 	if($result) {
		// 		$data=array(
		// 			'id_user' => $result->id_user,
		// 			'email' => $result->email,
		// 			);
		// 		$data2=array(					
		// 			'active'=>$result->active,
		// 			'level'=>$result->level,
		// 			);

		// 		$this->session->set_userdata($data2);
		// 		if ($_SESSION['active']=='1') {

		// 			if ($_SESSION['level']=='admin')
		// 			{

		// 				$this->session->set_userdata($data);
		// 				redirect('backend_controller/dashboard_controller/');
		// 			}
		// 			else if ($_SESSION['level']=='guest')
		// 			{
		// 				$this->session->set_userdata($data);
		// 				redirect('backend_controller/dashboard_controller/dashboard_user');
		// 			}
		// 		}
		// 		else if($_SESSION['active']=='0'){
		// 			$this->session->set_flashdata('flash_data', 'Your account not activated yet!');
		// 			redirect('login_controller/index');
		// 		}	

		// 	}
		// 	else {
		// 		$this->session->set_flashdata('flash_data', 'email or password is wrong!');
		// 		redirect('Login_controller/index');
		// 	}			
		// }
	}
}

