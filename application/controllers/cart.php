<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		
		echo "Start";

		dump($this->cart->contents());

	}

	private function _add($data = null)
	{
		if(isset($this->session->userdata)) {

			if ($this->cart->contents()) {
			 	
				foreach ($this->cart->contents() as $item){
            		
            		if ($item['id']== $data['id']) {
                		
                		$data = array(
                			'rowid'	=> $item['rowid'],
                    		'qty'	=> ++$item['qty']
                    	);
                		$process = $this->cart->update($data);
            		
            		} else {

                		$process = $this->cart->insert($data);
            		}

        		} //endforeach

			} else {

                $process = $this->cart->insert($data);
    		}

			redirect('products');

		} else {

			echo "no session";


		}
	}

	public function add_item()
	{	

		if (!$this->input->post('id')) {

			print "falta id";
			
			return false;
		}

		$id = $this->input->post('id');

		$qty = ($this->input->post('qty')) ? $this->input->post('qty') : 1;

		$this->db->where('id', $id);
		$item = $this->db->get('products')->row_array();

		$item['qty'] = $qty;

		$this->_add($item);
	
	}

	public function cart_clear()
	{
		$this->cart->destroy();

		redirect('products');
	}

}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */