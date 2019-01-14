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
class Member_model extends CI_Model {
    
   
    private $table = 'member_table';
    
	private $queryString;
    
    private $whereOrAnd;
    
    private $where;
	
    function __construct() {
        parent::__construct();
    }
    
		public function getId(){
        return $this->member_id;
    }
    
    public function setId($id) {
        $this->member_id = $id;
    }

    public function setFullName($full_name){
        $this->full_name = $full_name;
    }
    
    public function getFullName(){
        return $this->full_name;
    }
    
    public function setLastName($last_name){
        $this->last_name = $last_name;
    }
    
    public function getLastName(){
        return $this->last_name;
    }
    
    public function setEmailId($email){
        $this->email = $email;
    }
    
    public function getEmailId(){
        return $this->email;
    }
        
    public function setRoleId($role_id){
        $this->role_id = $role_id;
    }
    
    public function getRoleId(){
        return $this->role_id;
    }
    
    public function setMemberIdentificationCode($member_identification_code){
        $this->member_identification_code = $member_identification_code;
    }
    
    public function getMemberIdentificationCode(){
        return $this->member_identification_code;
    }
    
    public function getMemberDescription(){
        return $this->member_description;
    }
    
    public function setMemberDescription($member_description) {
        $this->member_description = $member_description;
    }
		
	 public function getDeptId(){
        return $this->dept_id;
    }
    
    public function setDeptId($dept_id) {
        $this->dept_id = $dept_id;
    }
		
	 public function getDisplayPicturePath(){
        return $this->display_picture_path;
    }
    
    public function setDisplayPicturePath($display_picture_path) {
        $this->display_picture_path = $display_picture_path;
    }
		
	 public function getMemberAddress(){
        return $this->member_address;
    }
    
    public function setMemberAddress($member_address) {
        $this->member_address = $member_address;
    }
	
	public function getMemberCity(){
        return $this->member_city;
    }
    
    public function setMemberCity($member_city) {
        $this->member_city = $member_city;
    }
	
	
	public function getMemberState(){
        return $this->member_state;
    }
    
    public function setMemberState($member_state) {
        $this->member_state = $member_state;
    }
	
	
	public function getMemberZipCode(){
        return $this->member_zip_code;
    }
    
    public function setMemberZipCode($member_zip_code) {
        $this->member_zip_code = $member_zip_code;
    }
	
	
	public function getMemberCountry(){
        return $this->member_country;
    }
    
    public function setMemberCountry($member_country) {
        $this->member_country = $member_country;
    }
	
	
	public function getMemberPhone(){
        return $this->member_phone;
    }
    
    public function setMemberPhone($member_phone) {
        $this->member_phone = $member_phone;
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
			$data = array('member_id'=>$last_id);
			unset($data);
		}
		return $last_id;
		
    }
	
	public function update_data() {
        $post_data = $this->get_post_values();
        $id = $this->getId();
        $this->db->where('member_id', $id);
        return $this->db->update($this->table, $post_data);
    }
    
    public function get_row() {
		$id = $this->getId();
        $this->db->where('member_id', $id);
        $row = $this->db->get($this->table)->row();
		//dump($row);
        if($row) {
            $this->setId($row->member_id);
            $this->setFullName($row->full_name);
            $this->setLastName($row->last_name);
            $this->setemailId($row->email);
            $this->setRoleId($row->role_id);
            $this->setMemberIdentificationCode($row->member_identification_code);
            $this->setMemberDescription($row->member_description);
            $this->setDeptId($row->dept_id);
            $this->setDisplayPicturePath($row->display_picture_path);
            $this->setMemberAddress($row->member_address);
            $this->setMemberCity($row->member_city);
            $this->setMemberState($row->member_state);
            $this->setMemberZipCode($row->member_zip_code);
            $this->setMemberCountry($row->member_country);
            $this->setMemberPhone($row->member_phone);
            
            return $this;
        }else{
            return false;
        }
    }
	
	 private function get_post_values() {
        $post_data = new stdClass();
        $post_data->full_name = $this->getFullName();
        $post_data->last_name = $this->getLastName();
        $post_data->email = $this->getEmailId();
        $post_data->role_id = $this->getRoleId();
        $post_data->member_identification_code = $this->getMemberIdentificationCode();
        $post_data->member_description = $this->getMemberDescription();
        $post_data->dept_id = $this->getDeptId();
        $post_data->display_picture_path = $this->getDisplayPicturePath();
        $post_data->member_address = $this->getMemberAddress();
        $post_data->member_city = $this->getMemberCity();
        $post_data->member_state = $this->getMemberState();
        $post_data->member_zip_code = $this->getMemberZipCode();
        $post_data->member_country = $this->getMemberCountry();
        $post_data->member_phone = $this->getMemberPhone();
		
       // $post_data->status = $this->getStatus();
        return $post_data;
    }
	
	 public function update_status(){
		 
        $id = $this->getId();
        $post_data = new stdClass();
        $post_data->member_status = $this->getStatus();
        $this->db->where('member_id', $id);
        return $this->db->update($this->table, $post_data);
    }
	
	 public function delete_data() {
		  
        $id = $this->getId();
		//dump($id);
		$this->db->where('member_id',$id);
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
            $this->where = " member_name LIKE '%" . $name . "%' ";
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
		 
        $query = "SELECT member_id,full_name,last_name,email,role_id,member_description,member_identification_code,dept_id,display_picture_path,member_address,member_city,member_state,member_zip_code,member_country,member_phone,member_status FROM " . $this->table;
        $orderObj = set_order($postData->sort, $postData->order, 'member_id');
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
