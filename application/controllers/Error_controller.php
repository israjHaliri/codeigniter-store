<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Error_controller extends CI_Controller { 

	public function __construct() { 
		parent::__construct(); 
	}

	public function index() {
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/error404');
		$this->load->view('layout/frontend/footer');
	}
}
?>