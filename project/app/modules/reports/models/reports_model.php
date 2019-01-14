<?php

/*
 * @author globtier
 */
class Reports_model extends CI_Model {
    
   	private $queryString;
    
    private $whereOrAnd;
    
    private $where;
    function __construct() {
        parent::__construct();
    }
	
	
	
	public function set_where_name($name=false, $start=false, $end=false , $type=false) {
		$this->queryString = ''; 
        if ($name) {
            $this->whereOrAnd = " WHERE ";
            $this->where = " last_name LIKE '%" . $name . "%' ";
			 $this->queryString .= $this->whereOrAnd . $this->where;
		}
		
		 
		
		if($start){
			$start = date('Y-m-d',strtotime($start));
			 if($name)
				 $this->whereOrAnd = " AND ";
			 else
				 $this->whereOrAnd = " WHERE ";
            $this->where = " datetime  >='" . $start . "' ";
			 $this->queryString .= $this->whereOrAnd . $this->where;
		}
      
		
		if($end){
			$end = date('Y-m-d',strtotime($end));
			if($start)
				 $this->whereOrAnd = " AND ";
			 else
				 $this->whereOrAnd = " WHERE ";
			$this->whereOrAnd = " AND ";
            $this->where = " datetime  <='" . $end . "' ";
			 $this->queryString .= $this->whereOrAnd . $this->where;
		}
      
		
		
		 
        $response = new stdClass();
        $response->query_string = $this->queryString;
        $response->title = $name;
		
        return $response;
    }
	    public function get_list() {
        $postData = $this->get_post_data();
        /*
         * Count All results
         */
		$whereobj =	$this->set_where_name($postData->name,$postData->startdate, $postData->enddate, $postData->type );
		
        $queryCount = "SELECT count(*) as num_records FROM " . $this->tbl_name;
        $queryCountRun = $this->db->query($queryCount . $whereobj->query_string);
        $queryCountResult = $queryCountRun->row();

        /*
         * Get All records
         */
        $query = "SELECT id, datetime, last_name, action, type FROM " . $this->tbl_name;
        $orderObj = set_order($postData->sort, $postData->order);
        $limitObj = set_limit($postData->page, $postData->limit);
        $queryString = $query . $whereobj->query_string . $orderObj->query_string . $limitObj->query_string;
		
        $queryRun = $this->db->query($queryString);
        $queryResult = $queryRun->result();

        $params = request_params($queryCountResult->num_records, $orderObj->sort, $orderObj->order, $limitObj->limit, $limitObj->page, $limitObj->start, $postData->field);

        $response = new stdClass();
        $response->params = $params;
        $response->result = $queryResult;
		
        return $response;
    }
	
	public function active_member_report(){
		$this->db->select('member_id,full_name,email,role_id,dept_id,member_country,member_phone');
		$this->db->where('member_status','1');
		$query = $this->db->get('member_table')->result_array();
		//dump($query);
		return $query;
		
	}
	
	public function available_item_report(){
		$this->db->select('item_id,item_name,category_id ,item_cost_price,item_vendor_id,item_quantity');
		$this->db->where('item_status','1');
		$query = $this->db->get('item_table')->result_array();
		//dump($query);
		return $query;
		
	}
	
	public function unavailable_item_report(){
		$this->db->select('item_id,item_name,category_id ,item_cost_price,item_vendor_id');
		$this->db->where('item_quantity','0');
		$query = $this->db->get('item_table')->result_array();
		//dump($query);
		return $query;
		
	}
	
	public function item_records($id){
		$this->db->select('item_id,item_name,category_id ,item_cost_price,item_vendor_id');
		$this->db->where('item_id',$id);
		$query = $this->db->get('item_table')->row_array();
		//dump($query);
		return $query;
		
	}
	public function outdated_item_report(){
		$this->db->query('SELECT item_id,item_name,category_id ,item_cost_price,item_vendor_id,item_quantity  FROM item_table WHERE (FLOOR(DATEDIFF(`item_table`.`item_purchase_date`,CURDATE())/365.25)+1)>=-7 ');

		$query = $this->db->get('item_table')->result_array();
		//dump($query);
		return $query;
		
	}
	
	public function active_vendor_report(){
		$this->db->select('vendor_id,vendor_name,vendor_address,vendor_contact');
		$this->db->where('vendor_status','1');
		$query = $this->db->get('vendor_table')->result_array();
		//dump($query);
		return $query;
		
	}
	
	public function item_allocation_report($member_id){
		$this->db->select('items');
		$this->db->where('member_id',$member_id);
		$query = $this->db->get('allocation_table')->result_array();
		//dump($query);
		return $query;
		
	}
	public function all_item_allocation_report(){
		$this->db->select('items');
		$query = $this->db->get('allocation_table')->result_array();
		//dump($query);
		return $query;
		
	}
	
}
