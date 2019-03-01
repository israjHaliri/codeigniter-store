<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();	
		$this->load->model('Product_model');
		$this->load->library('cart'); 
		$email=$this->session->userdata('email');
		if (!isset($email))
		{
			redirect('login_controller/index');
		}
	}
	function list_cart_admin()
	{
		$level=$level=$this->session->userdata('level')=='admin';
		if(isset($_COOKIE['remember_me_cookie'])) 
		{
			if ($level)
			{
				$content['cart_content']=$this->cart->contents();
				$this->load->view('layout/backend/head_admin');
				$this->load->view('view_backend/dashboard/cart',$content);
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
	function list_cart_user()
	{
		// $level=$level=$this->session->userdata('level')=='guest';
		// if(isset($_COOKIE['remember_me_cookie'])) 
		// {
		// 	if ($level)
		// 	{
		// 		$email_user = 'd09bf41544a3365a46c9077ebb5e35c3' ;
		// 		$cartItems = $this->cart->contents();

		// 		if( isset($cartItems[$email_user]) ) 
		// 		{
		// 			$content['cart_content'] = $cartItems[$email_user];
		// 			print_r($content);die();
		// 		} 
		// 		else 
		// 		{
		// 			return null;
		// 		}
		// 		// $content['cart_content']=$this->cart->contents();
		// 		$this->load->view('layout/backend/head_guest');
		// 		$this->load->view('view_backend/dashboard_user/cart',$content);
		// 		$this->load->view('layout/backend/footer');

		// 	}
		// 	else
		// 	{
		// 		$this->session->set_flashdata('flash_data', 'You dont have acces!');
		// 		redirect('login_controller/index');  
		// 	}
		// }
		// else
		// {
		// 	session_destroy();
		// 	redirect('login_controller/index');
		// }  

		$level=$level=$this->session->userdata('level')=='guest';
		if(isset($_COOKIE['remember_me_cookie'])) 
		{
			if ($level)
			{
				$content['cart_content']=$this->cart->contents();
				$this->load->view('layout/backend/head_guest');
				$this->load->view('view_backend/dashboard/cart',$content);
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
		}  		
	}
	function add() {    

		$data = array(  
			'id' => $this->input->post('id_product'),  
			'qty' => 1,  
			'price' => $this->input->post('price_product'),  
			'name' => $this->input->post('title_product'),  
			'barcode' => $this->input->post('barcode_product'),
			'firstname'  =>$this->session->userdata('firstname'),
			'lastname'  =>$this->session->userdata('lastname'),
			'email'  =>$this->session->userdata('email'),
			);  
		if ($this->cart->insert($data)) {
			echo "<script>alert('Added');</script>";
			echo "<script>window.history.back();</script>";
		}
		else
		{
			echo "<div class='col-md-12 margin50' align='center'><div class='alert alert-warning' role='alert'>Failed Add to Cart, Make Sure Youve Registered</div></div>";
			echo "<div class='col-md-12' align='center'><div class='alert alert-success' role='alert'><a href='".site_url("home_controller/index")."'>Back to Home</a></div></div>";			
		}
	}  

	function update() {  
		$cart_info=$_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$qty = $cart['qty'];
			$rowid = $cart['rowid'];

			$data= array(  
				'rowid' =>  $rowid,  
				'qty' => $qty,  
				); 
			echo $data;
			$this->cart->update($data); 
		}
		echo "<script>window.history.back();</script>";

	} 
	function remove($rowid) {  

		$this->cart->update(array(  
			'rowid' => $rowid,  
			'qty' => 0  
			));  
		echo "<script>window.history.back();</script>";

	} 
}
