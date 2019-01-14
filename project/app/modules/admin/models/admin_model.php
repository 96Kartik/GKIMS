<?php
/**
 * Description of admin_model
 *
 * @author wiesoftware26
 */
class Admin_model extends CI_Model {
    
    protected $tableName;
    
    protected $operationColumn;

    protected $selectedValue = array();

    protected $action;
    
    function __construct() {
        parent::__construct();
    }

    public function setTableName($tableName) {
	$this->tableName = $tableName;
	return $this;
    }
    
    public function getTableName() {
	return $this->tableName;
    }
	
    public function setOperationColumn($operationColumn) {
	$this->operationColumn = $operationColumn;
	return $this;
    }

    public function getOperationColumn() {
	return $this->operationColumn;
    }

    public function setSelectedValue($selectedValue) {
	$this->selectedValue = $selectedValue;
	return $this;
    }

    public function getSelectedValue() {
	return $this->selectedValue;
    }

    public function setAction($action) {
	$this->action = $action;
	return $this;
    }

    public function getAction() {
	return $this->action;
    }
		
    public function perform_operation() {
	$performed = false;
	if($this->getAction() == 'delete_all') {
	    $performed = $this->delete_all();
	}
	if($performed) {
	   return true;	
	} else {
	   return false;
	}
    }

    protected function delete_all() {
		$operationColumn = $this->getOperationColumn();
		$selectedValue = $this->getSelectedValue();
		$tableName = $this->getTableName();
		$this->db->where_in($operationColumn, $selectedValue);
		return $this->db->delete($tableName);
    }

    public function update_username(){
    	$update = array(
    		'user_name'=> $this->input->post('username'),
    		);
    	$this->db->where('user_id',$this->session->userdata('gobaba_user_id'));	
    	return $this->db->update('tbl_users',$update);
     }
    public function get_all_setting(){
      
        return $this->db->get('tbl_settings')->result();

    }
    public function get_all_media(){
         return $this->db->get('tbl_socialmedia')->result();

    }
    public function setting($id){
         $this->db->where('id',$id); 
         return $this->db->get('tbl_settings')->row();
    }
    
    public function get_media($id){
          $this->db->where('id',$id); 
         return $this->db->get('tbl_socialmedia')->row();

    }
    public function update_email(){
    	$update = array(
    		'email'=> $this->input->post('email'),
    		);
    	$this->db->where('user_id',$this->session->userdata('gobaba_user_id'));	
    	return $this->db->update('tbl_users',$update);


    }
    public function get_city(){
      $this->db->where('country_id',$this->input->post('id'));
      return $this->db->get('tbl_city')->result();
    }
    public function get_all_country(){
        return $this->db->get('tbl_country')->result();
    }
    public function delete_country(){
          $this->db->where('id',$this->input->post('id'));
          return  $this->db->delete('tbl_country');
    }
     public function delete_city(){
          $this->db->where('id',$this->input->post('id'));
          return  $this->db->delete('tbl_city');
    }
    
    public function add_country(){
       $data['name'] = $this->input->post('country');
      if($this->input->post('id')){
        $this->db->where('id',$this->input->post('id')); 
        return $this->db->update('tbl_country',$data);

      }else{
     
      return $this->db->insert('tbl_country',$data);
      }
    }
    public function add_city(){
       $data['name'] = $this->input->post('city');
       
         if($this->input->post('id')){
        $this->db->where('id',$this->input->post('id')); 
        return $this->db->update('tbl_city',$data);

      }else{
      $data['country_id'] = $this->input->post('country_id');
      return $this->db->insert('tbl_city',$data);
      }
     

    }
    public function update_setting($id){
         $update = array(
            'description'=> $this->input->post('new'),
            );
        $this->db->where('id',$this->input->post('setting')); 
        return $this->db->update('tbl_settings',$update);

    }
   
   
    public function update_media(){
        $update = array(
            'link'=> $this->input->post('new'),
            );
        $this->db->where('id',$this->input->post('id')); 
        return $this->db->update('tbl_socialmedia',$update);


    }
     public function update_password(){
    	$update = array(
    		'password'=> md5($this->input->post('new_password')),
    		);
    	$this->db->where('user_id',$this->session->userdata('gobaba_user_id'));	
    	return $this->db->update('tbl_users',$update);


    }
  	public function check_password()
  	{

		$old_password = md5($this->input->get('old_password'));
		$this->db->where('user_id',$this->session->userdata('gobaba_user_id'));
		$query = $this->db->get('tbl_users')->row();
		if($query->password == $old_password){
		 	return true;
		}else{
			return false;
		}
   
  	}
	
	public function update_logo_image($id, $data){
		
		$post_data = array(
					'image' => $data['file_name']
						);
						//print"<pre>"; print_r($post_data); die;
		$this->db->where('id', $id);
		return $this->db->update('tbl_settings', $post_data);
	}
	
	public function get_all_city(){
		$this->db->select('*');
        return $this->db->get('tbl_city')->result();
    }
	
	public function get_area(){
      $this->db->where('city_id', $this->input->post('id'));
	  $this->db->order_by('id', 'desc');
      return $this->db->get('tbl_area')->result();
    }
	
	public function add_area(){
       $data['name'] = $this->input->post('area');
       
         if($this->input->post('id')){
		//echo $this->input->post('id'); die; 
        $this->db->where('id',$this->input->post('id')); 
        return $this->db->update('tbl_area',$data);
		  }else{
		  $data['city_id'] = $this->input->post('city_id');
		  return $this->db->insert('tbl_area',$data);
		  }
    }
	
	public function deletedArea(){
          $this->db->where('id',$this->input->post('id'));
          return  $this->db->delete('tbl_area');
    }
    
    /* get country , shop and no. of users 7 nov*/
    
    public function getAllShop(){
	$this->db->select('id,name');
	$result = $this->db->get('tbl_city')->result();
	$allshopsCount  = array();
		if(!empty($result)){
			foreach($result as $city){ 
				if($city->id){				
					$this->db->select('id, name, city_id');
					$this->db->where('city_id', $city->id);
					$shops_data = $this->db->get('tbl_shop')->result();
					$total_shopped_users =0;
					$total_shop_users = 0;
					$all_shopes_ids = array();
					if(!empty($shops_data)){
						foreach($shops_data as $shop_detail_data){
							  $all_shopes_ids[] = $shop_detail_data->id;
					    }
					  $total_shop_users= $this->get_shop_users($all_shopes_ids);
					}
					$allshopsCount[$city->id]['city_name'] = $city->name;
					$allshopsCount[$city->id]['shop_count'] = count($shops_data);
					$allshopsCount[$city->id]['total_users_shopped'] = $total_shop_users;

				}				
			else{			
				return false;
			}
		    }
		    return $allshopsCount;
		}
				
		else{
			return false;
		}
        }
    
	public function get_shop_users($all_shop_ids){
		if(!empty($all_shop_ids) && is_array($all_shop_ids)){
			$this->db->select('id, user_id');
			$this->db->where_in('shop_id', $all_shop_ids);
			$this->db->group_by('user_id');
			$result = $this->db->get('tbl_order')->result();
			return count($result);	    
		}
	}
	/* close get country , shop and no. of users 7 nov*/

}
