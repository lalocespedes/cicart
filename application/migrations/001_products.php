<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Products extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		
		$CI =& get_instance();            

        $this->dbforge->add_field('id');
        $this->dbforge->add_field(array(
            'price' => array(
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ),
            'name' => array(
                'type' =>'VARCHAR',
                'constraint' => '255',
            ),
        ));

        $this->dbforge->create_table('products');

		$CI->db->insert('products', array('id'=>1,'name'=> 'mercedes', 'price' => 160000.00));
		$CI->db->insert('products', array('id'=>2,'name'=> 'shoes work', 'price' => 600.00));
		$CI->db->insert('products', array('id'=>3,'name'=> 'red lipstick', 'price' => 100.00));

	}

	public function down() {
		
	}

}

/* End of file 001_products.php */
/* Location: ./application/migrations/001_products.php */