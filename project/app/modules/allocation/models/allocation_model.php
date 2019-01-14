<?php
// error_reporting(0);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of assignment_model
 *
 * @author globtier
 */
class Allocation_model extends CI_Model {
    
   
   
	
	private $tbl_name = 'allocation_table';
	
	
	private $queryString;
    
    private $whereOrAnd;
    
    private $where;
    function __construct() {
        parent::__construct();
    }
	
	
	public function getId(){
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function allocate_item($member_id,$item) {
		$serialItem = serialize($item);
		//dump($serialItem);
			$this->delete_item($member_id);
  
			$data =array('member_id'=>$member_id,'items'=>$serialItem);
			$this->db->insert($this->tbl_name,$data);
			
       
        return true;
    }
	public function delete_item($member_name){
		
		$this->db->where('member_id',$member_name);
		$this->db->delete($this->tbl_name);
	}
    public function check_item($member_name,$item_id){
		
		$this->db->select('*');
		$this->db->where('member_id',$member_name);
		$this->db->where('item_id',$pro_id);
		return $this->db->get($this->tbl_name)->row();
	}
   
	public function get_allocate_item($member_name){
		
		$this->db->select('items');
		$this->db->where('member_id',$member_name);
		$pro = $this->db->get($this->tbl_name)->row();
		if($pro){
		$data = unserialize($pro->items);
		
					return $data;
					
		}else{
			return array();
		}
		
	}
	
//	public function get_allocate_item

}
