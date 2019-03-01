<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_controller extends CI_Controller {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('product_model');        

	}
	public function index()
	{
		if (isset($_POST['search'])) 
		{
			$data['search_keyword'] = array(
				'keyword'=>$this->input->post('search_keyword'),
				'min'=>$this->input->post('min-price'),
				'max'=>$this->input->post('max-price'),
				'type'=>$this->input->post('category'),
				);
			$this->session->set_userdata('sess_search_keyword_product', $data['search_keyword']);
		}
		else 
		{
			$data['search_keyword'] = $this->session->userdata('sess_search_keyword_product');
		}


		$category=$data['search_keyword']['type'];
		// print_r($category);die();
		switch ($category) 
		{
			case "all":
			$this->db->like('title_product', $data['search_keyword']['keyword']);
			$this->db->where('price_product >=',  $data['search_keyword']['min']);  
			$this->db->where('price_product <=',  $data['search_keyword']['max']);
			$this->db->from('product');
			break;

			case "shirt":
			$this->db->like('title_product', $data['search_keyword']['keyword']);
			$this->db->where('price_product >=',  $data['search_keyword']['min']);  
			$this->db->where('price_product <=',  $data['search_keyword']['max']);
			$this->db->from('product');
			$this->db->join('shirt', 'product.shirt_id = shirt.id_shirt');
			break;

			case "pant":
			$this->db->like('title_product', $data['search_keyword']['keyword']);
			$this->db->where('price_product >=',  $data['search_keyword']['min']);  
			$this->db->where('price_product <=',  $data['search_keyword']['max']);
			$this->db->from('product');
			$this->db->join('pant', 'product.pant_id = pant.id_pant');
			break;

			case "merchand":
			$this->db->like('title_product', $data['search_keyword']['keyword']);
			$this->db->where('price_product >=',  $data['search_keyword']['min']);  
			$this->db->where('price_product <=',  $data['search_keyword']['max']);
			$this->db->from('product');
			$this->db->join('merchand', 'product.merchand_id = merchand.id_merchand');
			break;
			case '':
			$this->db->like('title_product', $data['search_keyword']['keyword']);
			$this->db->from('product');
			break;
			
		}



		$pagination['base_url'] = base_url().'search_controller/index/';
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

		$pagination['per_page'] = "8";
		$pagination['uri_segment'] = 3;
		$pagination['num_links'] = 3;

		$this->pagination->initialize($pagination);

		$data['list_product'] = $this->product_model->search($pagination['per_page'],$this->uri->segment(3,0),$data['search_keyword']);
		
		$this->load->vars($data);
		$this->load->view('layout/frontend/head');
		$this->load->view('view_frontend/search',$data);
		$this->load->view('layout/frontend/footer');

	}
}

