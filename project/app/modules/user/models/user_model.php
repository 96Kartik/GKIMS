<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Department_model
 *
 * @author globtier
 */
class User_model extends CI_Model {
    
   
    private $ehs_departments = 'ehs_departments';
	
	private $tbl_name = 'ehs_users';
	
	
	private $queryString;
    
    private $whereOrAnd;
    
    private $where;
    function __construct() {
        parent::__construct();
    }
	
	
	public function getId(){
        return $this->user_id;
    }
    
    public function setId($id) {
        $this->user_id = $id;
    }

    public function setUserName($username){
        $this->username = $username;
    }
    
    public function getUserName(){
        return $this->username;
    }
    
    public function getFirstName(){
        return $this->first_name;
    }
    
    public function setFirstName($first_name) {
        $this->first_name = $first_name;
    }
	
	 public function getLastName(){
        return $this->last_name;
    }
    
    public function setLastName($last_name) {
        $this->last_name = $last_name;
    }
	
	public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
	
	public function getPassword(){
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = md5($password);
    }
	
	public function getPhone(){
        return $this->phone_no;
    }
    
    public function setPhone($phone_no) {
        $this->phone_no = $phone_no;
    }
	
	public function getDeptID(){
        return $this->dept_id;
    }
    
    public function setDeptID($dept_id){
        $this->dept_id = $dept_id;
    }
	
	public function getUserRole(){
        return $this->user_role;
    }
    
    public function setUserRole($user_role){
        $this->user_role = $user_role;
    }
	
	 public function setStatus($status) {
        $this->status = $status;
    }
    
    public function getStatus() {
        return $this->status;
    }
	
	 public function setCreatedOn() {
        $this->created_on = date('Y-m-d');
    }
    
    public function getCreatedOn() {
        return $this->created_on;
    }
	
	public function setUserType($user_type) {
        $this->user_type = $user_type;
    }
    
    public function getUserType() {
        return $this->user_type;
    }
	
	public function setAllowVacatios($allowed_vacations) {
        $this->allowed_vacations = $allowed_vacations;
    }
    
    public function getAllowVacatios() {
        return $this->allowed_vacations;
    }
	
	public function setAllowHours($allowed_hours) {
        $this->allowed_hours = $allowed_hours;
    }
    
    public function getAllowHours() {
        return $this->allowed_hours;
    }
	public function getTimeRequired(){
			return $this->is_time_attachment_req;
		}
    
		public function setTimeRequired($is_time_attachment_req) {
			$this->is_time_attachment_req = $is_time_attachment_req;
		}
	
	 public function insert_data(){
        $post_data = $this->get_post_values();
        $post_data->created_on = $this->getCreatedOn();
		$default  = $this->get_default_assign_projects();
		$this->db->insert($this->tbl_name, $post_data);
		$last_id = $this->db->insert_id();
		foreach($default as $pr){
			$data = array('user_id'=>$last_id,'project_id'=>$pr->id);
			$this->db->insert('ehs_user_assign_projects', $data);
			unset($data);
		}
		return $last_id;
		
    }
	
	public function update_data() {
        $post_data = $this->get_post_values();
        $id = $this->getId();
        $this->db->where('user_id', $id);
        return $this->db->update($this->tbl_name, $post_data);
    }
    
    public function get_row() {
		$id = $this->getId();
        $this->db->where('user_id', $id);
        $row = $this->db->get($this->tbl_name)->row();
		
        if($row) {
            $this->setId($row->user_id);
            $this->setUserName($row->username);
            $this->setFirstName($row->first_name);
            $this->setLastName($row->last_name);
            $this->setEmail($row->email);
            $this->setPassword($row->password);
            $this->setPhone($row->phone_no);
            $this->setDeptID($row->dept_id);
            $this->setUserRole($row->user_role);
            $this->setUserType($row->user_type);
            $this->setAllowVacatios($row->allowed_vacations);
            $this->setAllowHours($row->allowed_hours);
			$this->setTimeRequired($row->is_time_attachment_req);
            return $this;
        }else{
            return false;
        }
    }
	
	 private function get_post_values() {
        $post_data = new stdClass();
        $post_data->username = $this->getUserName();
        $post_data->first_name = $this->getFirstName();
        $post_data->last_name = $this->getLastName();
        $post_data->email = $this->getEmail();
		if($this->input->post('con_password') && $this->input->post('password')){
			$post_data->password = $this->getPassword();
		}
        $post_data->phone_no = $this->getPhone();
        $post_data->dept_id = $this->getDeptID();
        $post_data->user_role = $this->getUserRole();
        
		$post_data->user_type = $this->getUserType();
        $post_data->allowed_vacations = $this->getAllowVacatios();
        $post_data->allowed_hours = $this->getAllowHours();
        $post_data->is_time_attachment_req = $this->getTimeRequired();
				
        $post_data->status = $this->getStatus();
        return $post_data;
    }
	
	  public function delete_data() {
		  
        $id = $this->getId();
		$this->delete_timesheet_data($id);
		$this->delete_assign_pro($id);
		
        return $this->db->query('Delete From ehs_users Where user_id="'.$id.'"');
      }
	
	 public function update_status(){
		 
        $id = $this->getId();
        $post_data = new stdClass();
        $post_data->status = $this->getStatus();
        $this->db->where('user_id', $id);
        return $this->db->update($this->tbl_name, $post_data);
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
            $this->where = " first_name LIKE '%" . $name . "%' ";
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
        $queryCount = "SELECT count(*) as num_records FROM " . $this->tbl_name;
        $queryCountRun = $this->db->query($queryCount . $this->whereOrAnd . $this->where);
        $queryCountResult = $queryCountRun->row();
        
		/*
         * Get All records
         */
		 
        $query = "SELECT user_id, username, first_name, last_name, email, dept_id, user_role, status FROM " . $this->tbl_name;
        $orderObj = set_order($postData->sort, $postData->order, 'user_id');
        $limitObj = set_limit($postData->page, $postData->limit);
        $queryString = $query . $this->whereOrAnd . $this->where . $orderObj->query_string . $limitObj->query_string;
        $queryRun = $this->db->query($queryString);
        $queryResult = $queryRun->result();

        $params = request_params($queryCountResult->num_records, $orderObj->sort, $orderObj->order, $limitObj->limit, $limitObj->page, $limitObj->start, $postData->field);

        $response = new stdClass();
        $response->params = $params;
        $response->result = $queryResult;
        return $response;
    }
	
	public function get_default_assign_projects(){
		
		$this->db->select('id');
		$this->db->where('is_constant',1);
		return $this->db->get('ehs_projects')->result();
		
	} 
	
	public function delete_assign_pro($id){
		
		return $this->db->query('Delete From ehs_user_assign_projects Where user_id="'.$id.'"');
		
	}
	public function delete_timesheet_data($id){
		
		$this->db->select('id');
		$this->db->where('user_id',$id);
		$times = $this->db->get('ehs_project_timesheet')->result_array();
		foreach($times as $time){
			$this->db->where('timesheet_id',$time[id]);
			$this->db->delete('ehs_timesheet_weekhours');
			$this->db->where('timesheet_id',$time[id]);
			$this->db->delete('ehs_timesheet_notes');
		}
		return $this->db->query('Delete From ehs_project_timesheet Where user_id="'.$id.'"');
		
	}
  

}
