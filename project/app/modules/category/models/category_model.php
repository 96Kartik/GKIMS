<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cms_model
 *
 * @author Kartikeya
 */
class Category_model extends CI_Model {
    
   
    private $table = 'category_table';
    
	private $queryString;
    
    private $whereOrAnd;
    
    private $where;
	
    function __construct() {
        parent::__construct();
    }
    
		public function getId(){
        return $this->category_id;
    }
    
    public function setId($id) {
        $this->category_id = $id;
    }

    public function setCategoryName($category_name){
        $this->category_name = $category_name;
    }
    
    public function getCategoryName(){
        return $this->category_name;
    }
    
    public function getCategoryDescription(){
        return $this->category_description;
    }
    
    public function setCategoryDescription($category_description) {
        $this->category_description = $category_description;
    }
	
	 public function getCategoryCode(){
        return $this->category_code;
    }
    
    public function setCategoryCode($category_code) {
        $this->category_code = $category_code;
    }
	
	public function getNoOfItems(){
        return $this->no_of_items;
    }
    
    public function setNoOfItems($no_of_items) {
        $this->no_of_items = $no_of_items;
    }
	
	
	
	 public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getStatus() {
        return $this->status;
    }
	

	
	 public function insert_data(){
        $post_data = $this->get_post_values();
		//dump($post_data);
		$this->db->insert($this->table, $post_data);
		$last_id = $this->db->insert_id();
		foreach($default as $pr){
			$data = array('category_id'=>$last_id);
			unset($data);
		}
		return $last_id;
		
    }
	
	public function update_data() {
        $post_data = $this->get_post_values();
        $id = $this->getId();
        $this->db->where('category_id', $id);
        return $this->db->update($this->table, $post_data);
    }
    
    public function get_row() {
		$id = $this->getId();
        $this->db->where('category_id', $id);
        $row = $this->db->get($this->table)->row();
		
        if($row) {
            $this->setId($row->category_id);
            $this->setCategoryName($row->category_name);
            $this->setCategoryDescription($row->category_description);
            $this->setCategoryCode($row->category_code);
            $this->setNoOfItems($row->no_of_items);
            
            return $this;
        }else{
            return false;
        }
    }
	
	 private function get_post_values() {
        $post_data = new stdClass();
        $post_data->category_name = $this->getCategoryName();
        $post_data->category_description = $this->getCategoryDescription();
        $post_data->category_code = $this->getCategoryCode();
        $post_data->no_of_items = $this->getNoOfItems();
		
       // $post_data->status = $this->getStatus();
        return $post_data;
    }
	
	 public function update_status(){
		 
        $id = $this->getId();
        $post_data = new stdClass();
        $post_data->category_status = $this->getStatus();
        $this->db->where('category_id', $id);
        return $this->db->update($this->table, $post_data);
    }
	
	 public function delete_data() {
		  
        $id = $this->getId();
		//dump($id);
		$this->db->where('category_id',$id);
        return $this->db->delete($this->table);
      }
	
	
	
	
     public function get_post_data() {
        $postData = new stdClass();
        $postData->sort = $this->input->post('sort');
        $postData->order = $this->input->post('order');
        $postData->page = $this->input->post('page');
        $postData->limit = $this->input->post('limit');
        $postData->name = $this->input->post('name');
        $postData->field = $this->input->post('type');
        $postData->section = $this->input->post('section');
        return $postData;
    }
	
	public function set_where_name($name=false) {
        if ($name) {
            $this->whereOrAnd = " WHERE ";
            $this->where = " category_name LIKE '%" . $name . "%' ";
        }
        $this->queryString = $this->whereOrAnd . $this->where;

        $response = new stdClass();
        $response->query_string = $this->queryString;
        $response->title = $name;

        return $response;
    }
	
	public function get_list(){
		 
        $postData = $this->get_post_data();
        /*
         * Count All results
         */
        $this->set_where_name($postData->name);
        $queryCount = "SELECT count(*) as num_records FROM " . $this->table;
        $queryCountRun = $this->db->query($queryCount . $this->whereOrAnd . $this->where);
        $queryCountResult = $queryCountRun->row();
        
		/*
         * Get All records
         */
		 
        $query = "SELECT category_id,category_name,category_description,category_code,category_status,no_of_items FROM " . $this->table;
        $orderObj = set_order($postData->sort, $postData->order, 'category_id');
        $limitObj = set_limit($postData->page, $postData->limit);
        $queryString = $query . $this->whereOrAnd . $this->where . $orderObj->query_string . $limitObj->query_string;
        $queryRun = $this->db->query($queryString);
        $queryResult = $queryRun->result();

        $params = request_params($queryCountResult->num_records, $orderObj->sort, $orderObj->order, $limitObj->limit, $limitObj->page, $limitObj->start, $postData->field);

        $response = new stdClass();
        $response->params = $params;
        $response->result = $queryResult;
		//dump($response);
        return $response;
    }
	
	
  

}
