<?php

if (!defined('BASEPATH')) {
    exit('No Direct Script access allowed');
}

class Auth_model extends CI_Model {

    private $tbl_name = 'user_table';
    
    private $user_name;
    
    private $password;
    
    private $email;
    
    function __construct() {
        parent::__construct();
    }
	public function getId(){
	return $this->user_id;
    }
    
    public function setId($id) {
        $this->user_id = $id;
    }
    public function setFirstName($first_name) {
        $this->first_name =    $first_name; 
    }
	  public function getFirstName() {
        return $this->first_name;
    }
	public function setLastName($last_name) {
        $this->last_name =    $last_name; 
    }
	  public function getLastName() {
        return $this->last_name;
    }
	public function setUserName($user_name) {
        $this->user_name =    $user_name; 
    }
	  public function getUserName() {
        return $this->user_name;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }
  
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }
	public function update_data() {
        $post_data = $this->get_post_values();
		//dump($post_data);
        $id = $this->getId();
        $this->db->where('user_id', $id);
        return $this->db->update($this->tbl_name, $post_data);
    }
	
	 public function insert_data(){
        $post_data = $this->get_post_values();
		//dump($post_data);
		$this->db->insert($this->tbl_name, $post_data);
		$last_id = $this->db->insert_id();
		foreach($default as $pr){
			$data = array('user_id'=>$last_id);
			unset($data);
		}
		return $last_id;
		
    }
    public function validate_user() {
        $username = $this->getUsername();
        $password = $this->getPassword();
		
        $this->db->select('*');
        $this->db->where('user_name', $username);
        $this->db->where('password', md5($password));
		
        return $this->db->get($this->tbl_name)->row();
		
    }
	  
    public function checkUserEmail(){
        $email = $this->getEmail();
        $this->db->select('*');
        $this->db->where('email', $email);
        return $this->db->get($this->tbl_name)->row();
    }
    public function password_validate(){
    
		$password = $this->getPassword();
        $this->db->select('*');
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->where('password', md5($password));
        return $this->db->get($this->tbl_name)->row();
    }
    public function update_password() {
        
		$password = $this->getPassword();
	//	dump($password);
        $this->db->where('user_id', $this->session->userdata('kart_user_id'));
        return $this->db->update($this->tbl_name, array('password' => md5($password)));
    }
	
	public function forgot_password($email) {
       
		$password = rand(100000,99999999);
	//	dump($password);
        $this->db->where('email', $email);
        $this->db->update($this->tbl_name, array('password' => md5($password)));
		return $password;
    }
	
	public function register(){
		$data = $this->get_post_values();
		$this->db->insert($this->tbl_name,$data);
		return $this->db->insert_id();
	}
	public function get_post_values(){
		$data = array(
		'first_name'=>trim($this->input->post('first_name')),
		'last_name'=>trim($this->input->post('last_name')),
		'user_name'=>trim($this->input->post('user_name')),
		'password'=>md5($this->input->post('r_password')),
		'email'=>trim($this->input->post('email')),
		
		);
		return $data;
	} 
	public function validate_user_id($id) {
        
        $this->db->select('*');
        $this->db->where('user_id', $id);
        return $this->db->get($this->tbl_name)->row();
    }
	public function validate_user_by_email($email){
		$this->db->select('*');
        $this->db->where('email', $email);
        return $this->db->get($this->tbl_name)->row();
		
		
	}

    public function set_img_path($tmp_name,$path)
					{
					  $this->dp_path = $path.$tmp_name; 	
					}
					
	public function get_img_path()
					{
					  return $this->dp_path;
					}
	 public function update_profile_image($image) {
		$this->db->where('user_id', $image['user_id']);
		return  $this->db->update($this->tbl_name, array('dp_path' => $image['image_name']));
    }
      public function get_row() {
		$id = $this->getId();
        $this->db->where('user_id', $id);
        $row = $this->db->get($this->tbl_name)->row();
		//dump($row);
        if($row) {
            $this->setId($row->user_id);
            $this->setUserName($row->user_name);
            $this->setEmail($row->email);
			$this->setFirstName($row->first_name);
			$this->setLastName($row->last_name);
           
            
            return $this;
        }else{
            return false;
        }
    }  
}