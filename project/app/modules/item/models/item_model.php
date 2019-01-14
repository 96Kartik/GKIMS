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
class Item_model extends CI_Model {
    
   
    private $table = 'item_table';
    
	private $queryString;
    
    private $whereOrAnd;
    
    private $where;
	
    function __construct() {
        parent::__construct();
    }
    
		public function getId(){
        return $this->item_id;
    }
    
    public function setId($id) {
        $this->item_id = $id;
    }

    public function setItemName($item_name){
        $this->item_name = $item_name;
    }
    
    public function getItemName(){
        return $this->item_name;
    }
    
    public function setItemModelNumber($item_model_number){
        $this->item_model_number = $item_model_number;
    }
    
    public function getItemModelNumber(){
        return $this->item_model_number;
    }
    
    public function setCategoryId($category_id){
        $this->category_id = $category_id;
    }
    
    public function getCategoryId(){
        return $this->category_id;
    }
    
    public function setItemIdentificationKey($item_identification_key){
        $this->item_identification_key = $item_identification_key;
    }
    
    public function getItemIdentificationKey(){
        return $this->item_identification_key;
    }
    
    public function getItemDescription(){
        return $this->item_description;
    }
    
    public function setItemDescription($item_description) {
        $this->item_description = $item_description;
    }
	
	 public function getItemCostPrice(){
        return $this->item_cost_price;
    }
    
    public function setItemCostPrice($item_cost_price) {
        $this->item_cost_price = $item_cost_price;
    }
		
	 public function getItemVendorId(){
        return $this->item_vendor_id;
    }
    
    public function setItemVendorId($item_vendor_id) {
        $this->item_vendor_id = $item_vendor_id;
    }
		
	 public function getItemPurchaseDate(){
        return $this->item_purchase_date;
    }
    
    public function setItemPurchaseDate($item_purchase_date) {
        $this->item_purchase_date = $item_purchase_date;
    }
		
	 public function getItemLocation(){
        return $this->item_location;
    }
    
    public function setItemLocation($item_location) {
        $this->item_location = $item_location;
    }
	
	public function getItemQuantity(){
        return $this->item_quantity;
    }
    
    public function setItemQuantity($item_quantity) {
        $this->item_quantity = $item_quantity;
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
			$data = array('item_id'=>$last_id);
			unset($data);
		}
		return $last_id;
		
    }
	
	public function update_data() {
        $post_data = $this->get_post_values();
        $id = $this->getId();
        $this->db->where('item_id', $id);
        return $this->db->update($this->table, $post_data);
    }
    
    public function get_row() {
		$id = $this->getId();
        $this->db->where('item_id', $id);
        $row = $this->db->get($this->table)->row();
		
        if($row) {
            $this->setId($row->item_id);
            $this->setItemName($row->item_name);
            $this->setItemModelNumber($row->item_model_number);
            $this->setCategoryId($row->category_id);
            $this->setItemIdentificationKey($row->item_identification_key);
            $this->setItemDescription($row->item_description);
            $this->setItemCostPrice($row->item_cost_price);
            $this->setItemVendorId($row->item_vendor_id);
            $this->setItemPurchaseDate($row->item_purchase_date);
            $this->setItemLocation($row->item_location);
            $this->setItemQuantity($row->item_quantity);
            
            return $this;
        }else{
            return false;
        }
    }
	
	 private function get_post_values() {
        $post_data = new stdClass();
        $post_data->item_name = $this->getItemName();
        $post_data->item_model_number = $this->getItemModelNumber();
        $post_data->category_id = $this->getCategoryId();
        $post_data->item_identification_key = $this->getItemIdentificationKey();
        $post_data->item_description = $this->getItemDescription();
        $post_data->item_cost_price = $this->ItemCostPrice();
        $post_data->item_vendor_id = $this->getItemVendorId();
        $post_data->item_purchase_date = $this->getItemPurchaseDate();
        $post_data->item_location = $this->getItemLocation();
        $post_data->item_quantity = $this->getItemQuantity();
		
       // $post_data->status = $this->getStatus();
        return $post_data;
    }
	
	 public function update_status(){
		 
        $id = $this->getId();
        $post_data = new stdClass();
        $post_data->item_status = $this->getStatus();
        $this->db->where('item_id', $id);
        return $this->db->update($this->table, $post_data);
    }
	
	 public function delete_data() {
		  
        $id = $this->getId();
		//dump($id);
		$this->db->where('item_id',$id);
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
            $this->where = " item_name LIKE '%" . $name . "%' ";
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
		 
        $query = "SELECT item_id,item_name,item_model_number,category_id,item_identification_key,item_description,item_cost_price,item_vendor_id,item_purchase_date,item_location,item_quantity,item_status FROM " . $this->table;
        $orderObj = set_order($postData->sort, $postData->order, 'item_id');
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
