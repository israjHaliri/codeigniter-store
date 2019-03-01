<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us_controller extends CI_Controller {

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
	}
	public function index()
	{
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/contact-us');
		$this->load->view('layout/frontend/footer');
	}
	public function submit(){

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$pwd = $this->input->post('password');
		$message = $this->input->post('msg');
		$subject = $this->input->post('subject');
		$type_gmail = $this->input->post('type_email');
		$user_email = $email.$type_gmail;
		
		$smptppass='yourmailapppassword';

		$this->load->library('email');
		$config = array();
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://smtp.gmail.com";
		$config['smtp_port']= "465";
		$config['smtp_timeout']= "400";
		$config['smtp_user']= 'yourmail';
		$config['smtp_pass']= 'yourmailpass';
		$config['crlf']="\r\n"; 
		$config['newline']="\r\n"; 
		$config['wordwrap'] = TRUE;


		$this->email->initialize($config);
		$this->email->from($user_email);
		$this->email->to($config['smtp_user']);
		$this->email->subject($subject);
		$this->email->message($message);

		// error_reporting(0);

		if($this->email->send())
		{
			echo "<div class='col-md-12 margin50' align='center'><div class='alert alert-success' role='alert'>Message Successfully Send,</div></div>";
			echo "<div class='col-md-12' align='center'><div class='alert alert-success' role='alert'><a href='".site_url("home_controller/index")."'>Back to home page</a></div></div>";			

		}else
		{
			echo "<div class='col-md-12 margin50' align='center'><div class='alert alert-warning' role='alert'>Failed for sending email,Make sure email is valid or check your internet connection </div>";
			echo "<div class='col-md-12' align='center'><div class='alert alert-success' role='alert'><a href='".site_url("contact_us_controller/index")."'>Back to contact us page</a></div></div>";
			
			// echo $this->email->print_debugger(); 
		}
	}
}
