<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cms_model
 *
 * @author wiesoftware20
 */
class Home_model extends CI_Model {
    
   
    private $tbl_product = 'tbl_products';
    private $tbl_category = 'tbl_category';
    private $tbl_product_images = 'tbl_product_images';
    
    function __construct() {
        parent::__construct();
    }
    
	public function get_all_products(){
		$this->db->select('*');
		$this->db->from('tbl_products');
		$this->db->join('tbl_product_images', 'tbl_product_images.product_id = tbl_products.product_id', 'left');
		$query = $this->db->get()->result();
		return $query;
		
	}
	public function get_itemqty_chart(){
		//echo 'dasda';die;
	$query = 	$this->db->query('SELECT sum(item_quantity) as total_qty,category_id FROM item_table GROUP BY category_id');
		 $result = $query->result();
		 return $result;
	}
	
	public function get_mmbrqty_chart(){
		//echo 'dasda';die;
	$query = 	$this->db->query('SELECT sum(member_status) as total_mmbr,dept_id FROM `member_table` GROUP BY dept_id');
		 $result = $query->result();
		 return $result;
	}
	
	
	
  

}
