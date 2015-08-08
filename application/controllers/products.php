<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$this->migration->current();

		$products = $this->db->get('products')->result();

		$this->load->view('products/all',[

			'products' => $products
		]);
	}

}

/* End of file products.php */
/* Location: ./application/controllers/products.php */