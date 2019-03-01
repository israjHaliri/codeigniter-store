<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

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
		$this->load->model('product_model');
	}
	public function index()
	{
		$data['list_product_hot_limit'] = $this->product_model->list_product_hot_limit();
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/home',$data);
		$this->load->view('layout/frontend/footer');
	}
	public function aboutus()
	{
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/about-us');
		$this->load->view('layout/frontend/footer');
	}
	public function all_shirt()
	{
		$this->db->from('shirt');

		$pagination['base_url'] = base_url().'home_controller/all_shirt/';
		$pagination['total_rows'] = $this->db->count_all_results();

		$pagination['full_tag_open'] = '<ul class="pagination" style="color: black !important;background-color:transparent;">';
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

		$pagination['per_page'] = "8";
		$pagination['uri_segment'] = 3;
		$pagination['num_links'] = 3;

		$this->pagination->initialize($pagination);

		$data['list_data_shirt'] = $this->product_model->list_shirt($pagination['per_page'],$this->uri->segment(3,0));

		$this->load->vars($data);
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/all_shirt');
		$this->load->view('layout/frontend/footer');


	}
	public function all_pant()
	{
		$this->db->from('pant');

		$pagination['base_url'] = base_url().'home_controller/all_pant/';
		$pagination['total_rows'] = $this->db->count_all_results();

		$pagination['full_tag_open'] = '<ul class="pagination" style="color: black !important;background-color:transparent;">';
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

		$pagination['per_page'] = "8";
		$pagination['uri_segment'] = 3;
		$pagination['num_links'] = 3;

		$this->pagination->initialize($pagination);

		$data['list_data_pant'] = $this->product_model->list_pant($pagination['per_page'],$this->uri->segment(3,0));

		$this->load->vars($data);
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/all_pant');
		$this->load->view('layout/frontend/footer');


	}
	public function all_merchand()
	{
		$this->db->from('merchand');

		$pagination['base_url'] = base_url().'home_controller/all_merchand/';
		$pagination['total_rows'] = $this->db->count_all_results();

		$pagination['full_tag_open'] = '<ul class="pagination" style="color: black !important;background-color:transparent;">';
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

		$pagination['per_page'] = "8";
		$pagination['uri_segment'] = 3;
		$pagination['num_links'] = 3;

		$this->pagination->initialize($pagination);

		$data['list_data_merchand'] = $this->product_model->list_merchand($pagination['per_page'],$this->uri->segment(3,0));

		$this->load->vars($data);
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/all_merchand');
		$this->load->view('layout/frontend/footer');


	}
	public function detail_product($slug)
	{
		$data=array(
			'slug'=>$slug,
			);
		$data['data_detail']=$this->product_model->m_detail_product($data,$slug);

		$this->load->vars($data);
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/detail_product');
		$this->load->view('layout/frontend/footer');


	}	
}
