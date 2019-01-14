<?php

	/**
	
	 * Author : Globtier Infotech Pvt Ltd.
	 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
error_reporting(-1);

class Reports extends CI_Controller {

    
    function __construct() {
        parent:: __construct();
       	$this->load->model('reports_model');
       $this->lang->load('reports');
       $this->lang->load('common');
		check_logged_user();
    }

    public function index() {
		
        $options = new stdClass();
		 $this->data['module_assets'] = 'reports/module_assets';
		$this->data['view'] = 'main';
		$this->load->view('theme/admin/layout', $this->data);
    }
	
	

	public function availableItems(){
		
		
		$options = new stdClass();
		$availableItemReport = $this->reports_model->available_item_report();
		$this->load->library('table');
		$this->table->set_heading('S.No.','Item ID', 'Name', 'Category','Cost','Vendor','Quantity');
		$count = 1;
		foreach($availableItemReport as $row){
				
		$this->table->add_row($count, $row['item_id'],$row['item_name'], get_category_name($row['category_id']) , $row['item_cost_price'], get_vendor_name($row['item_vendor_id']), $row['item_quantity']);
				$count++;
				
					
		
		}
		$tmpl = array (
                    'table_open'          => '<table id="example1" class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$table = $this->table->generate();
		//dump($table);
		$this->data['table'] = $table;
		
		$this->data['module_assets'] = 'reports/module_assets';
		$this->data['view'] = 'available_item';
		$this->load->view('theme/admin/layout', $this->data);
		
	}
	
	public function unavailableItems(){
		
		
		$options = new stdClass();
		$unavailableItemReport = $this->reports_model->unavailable_item_report();
		$this->load->library('table');
		$this->table->set_heading('S.No.','Item ID', 'Name', 'Category','Cost','Vendor');
		$count = 1;
		foreach($unavailableItemReport as $row){
				
		$this->table->add_row($count, $row['item_id'],$row['item_name'], get_category_name($row['category_id']) , $row['item_cost_price'], get_vendor_name($row['item_vendor_id']));
				$count++;
				
					
		
		}
		$tmpl = array (
                    'table_open'          => '<table id="example1" class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$table = $this->table->generate();
		//dump($table);
		$this->data['table'] = $table;
		
		$this->data['module_assets'] = 'reports/module_assets';
		$this->data['view'] = 'unavailable_item';
		$this->load->view('theme/admin/layout', $this->data);
		
	}
	
	public function outdatedItems(){
		
		
		$options = new stdClass();
		$outdatedItemReport = $this->reports_model->outdated_item_report();
		$this->load->library('table');
		$this->table->set_heading('S.No.','Item ID', 'Name', 'Category','Cost','Vendor','Quantity');
		$count = 1;
		foreach($outdatedItemReport as $row){
				
		$this->table->add_row($count, $row['item_id'],$row['item_name'], get_category_name($row['category_id']) , $row['item_cost_price'], get_vendor_name($row['item_vendor_id']), $row['item_quantity']);
				$count++;
				
					
		
		}
		$tmpl = array (
                    'table_open'          => '<table id="example1" class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$table = $this->table->generate();
		//dump($table);
		$this->data['table'] = $table;
		
		$this->data['module_assets'] = 'reports/module_assets';
		$this->data['view'] = 'outdated_item';
		$this->load->view('theme/admin/layout', $this->data);
		
	}
	
	public function activeVendors(){
		
		
		$options = new stdClass();
		$activeVendorReport = $this->reports_model->active_vendor_report();
		//dump($activeVendorReport);
		$this->load->library('table');
		$this->table->set_heading('S.No.','Vendor ID', 'Name', 'Address','Contact');
		$count = 1;
		foreach($activeVendorReport as $row){
				
				$this->table->add_row($count, $row['vendor_id'],$row['vendor_name'], $row['vendor_address'] , $row['vendor_contact']);
				$count++;
				
					
		
		}
		$tmpl = array (
                    'table_open'          => '<table id="example1" class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$table = $this->table->generate();
		//dump($table);
		$this->data['table'] = $table;
		
		$this->data['module_assets'] = 'reports/module_assets';
		$this->data['view'] = 'active_vendor';
		$this->load->view('theme/admin/layout', $this->data);
		
	}
	
	public function itemAllocation(){
		
		
		$options = new stdClass();
		$member_id=$this->input->post('member_id');
		$itemAllocationReport = $this->reports_model->item_allocation_report($member_id);
		//dump($itemAllotmentReport);
	
		$this->load->library('table');
		$this->table->set_heading('S.No.','Item ID','Name','Category', 'Cost','Vendor');
		$count = 1;
		$item_ids='';
			$forCsv = array();
		if($itemAllocationReport){
		foreach($itemAllocationReport as $row){
			//dump($row);
				$item_ids=unserialize($row['items']);
				
				//dump($item_ids);
				
				
				//$this->table->add_row($count, $row['member_id'],get_member_name($row['member_id']));
				//$count++;
				}
			
		foreach($item_ids as $row){
					$itemReport = $this->reports_model->item_records($row);
					$forCsv[] = $itemReport; 
					//dump($itemReport);
			$this->table->add_row($count,$itemReport['item_id'],$itemReport['item_name'],get_category_name($itemReport['category_id']),$itemReport['item_cost_price'],get_vendor_name($itemReport['item_vendor_id']));
		$count++;
		}
		}
		
		$userdata['reportAllo'] = $forCsv;
		$userdata['member'] = $member_id;
		$this->session->set_userdata($userdata);

		unset($forCsv);
			 $this->session->set_userdata($itemAllocationReport);
		$tmpl = array (
                    'table_open'          => '<table id="example1" class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$table = $this->table->generate();
		//dump($table);
		$this->data['table'] = $table;
		
		if(!$this->input->post('member_id')){
		
		$this->data['module_assets'] = 'reports/module_assets';
		$this->data['view'] = 'item_allocation';
		$this->load->view('theme/admin/layout', $this->data);
		}else{
			echo  $table;die;
		}if($this->input->post('*')){
			
			$itemAllocationReport = $this->reports_model->all_item_allocation_report();
		//dump($itemAllotmentReport);
	
		$this->load->library('table');
		$this->table->set_heading('S.No.','Item ID','Name','Category', 'Cost','Vendor');
		$count = 1;
		$item_ids='';
			$forCsv = array();
		if($itemAllocationReport){
		foreach($itemAllocationReport as $row){
			//dump($row);
				$item_ids=unserialize($row['items']);
				
				//dump($item_ids);
				
				
				//$this->table->add_row($count, $row['member_id'],get_member_name($row['member_id']));
				//$count++;
				}
			
		foreach($item_ids as $row){
					$itemReport = $this->reports_model->item_records($row);
					$forCsv[] = $itemReport; 
					//dump($itemReport);
			$this->table->add_row($count,$itemReport['item_id'],$itemReport['item_name'],get_category_name($itemReport['category_id']),$itemReport['item_cost_price'],get_vendor_name($itemReport['item_vendor_id']));
		$count++;
		}
		}
		
		$userdata['reportAllo'] = $forCsv;
		$userdata['member'] = $member_id;
		$this->session->set_userdata($userdata);

		unset($forCsv);
			 $this->session->set_userdata($itemAllocationReport);
		$tmpl = array (
                    'table_open'          => '<table id="example1" class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$table = $this->table->generate();
		//dump($table);
		$this->data['table'] = $table;
		echo $table;die;
		}
		
		
	}
	
	public function activeMembers(){
		
		
		$options = new stdClass();
		$activeMemberReport = $this->reports_model->active_member_report();
		//dump($activeMemberReport);
		$this->load->library('table');
		$this->table->set_heading('S.No.','Member ID', 'Member Name', 'Email','Role','Department','Country','Phone');
		$count = 1;
		foreach($activeMemberReport as $row){
				
				$this->table->add_row($count, $row['member_id'],$row['full_name'], $row['email'] , get_role_name($row['role_id']), get_dept_name($row['dept_id']), $row['member_country'], $row['member_phone']);
				$count++;
				
					
		
		}
		$tmpl = array (
                    'table_open'          => '<table id="example1" class="table table-bordered table-striped" border="0" cellpadding="4" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );
		$this->table->set_template($tmpl);
		$table = $this->table->generate();
		//dump($table);
		$this->data['table'] = $table;
		
		$this->data['module_assets'] = 'reports/module_assets';
		$this->data['view'] = 'active_member';
		$this->load->view('theme/admin/layout', $this->data);
		
	}
	
	
	public function activeMember_csv(){
		$Report = $this->reports_model->active_member_report();
		//dump($Report);
	
		$header = array('Member ID','Name', 'Email','Role', 'Department','Country','Phone');
		$this->load->helper('file');
        $this->load->helper('download');
		 $filename = 'active_member_Report';
		$data = $this->get_csv($header,$Report,$filename);
	}
	
	public function itemAllocation_csv(){
		//echo 'sas';die;
		
		$Report = $this->session->userdata('reportAllo');

		$header = array('Item ID','Name', 'Category','Cost','Vendor');
		$this->load->helper('file');
        $this->load->helper('download');
		 $filename = 'item_allocation_Report';
		$data = $this->get_csv($header,$Report,$filename);
	}
	
	public function availableItems_csv(){
		//echo 'sas';die;
		$Report = $this->reports_model->available_item_report();
		//dump($Report);
	
		$header = array('Item ID', 'Name', 'Category','Cost','Vendor','Quantity');
		$this->load->helper('file');
        $this->load->helper('download');
		 $filename = 'available_item_Report';
		$data = $this->get_csv($header,$Report,$filename);
	}
	
	public function unavailableItems_csv(){
		//echo 'sas';die;
		$Report = $this->reports_model->unavailable_item_report();
		//dump($Report);
	
		$header = array('Item ID', 'Name', 'Category','Cost','Vendor');
		$this->load->helper('file');
        $this->load->helper('download');
		 $filename = 'unavailable_item_Report';
		$data = $this->get_csv($header,$Report,$filename);
	}
	
	public function outdatedItems_csv(){
		//echo 'sas';die;
		$Report = $this->reports_model->outdated_item_report();
		//dump($Report);
	
		$header = array('Item ID', 'Name', 'Category','Cost','Vendor','Quantity');
		$this->load->helper('file');
        $this->load->helper('download');
		 $filename = 'outdated_item_Report';
		$data = $this->get_csv($header,$Report,$filename);
	}
	
	public function activeVendor_csv(){
		//echo 'sas';die;
		$Report = $this->reports_model->active_vendor_report();
		//dump($Report);
	
		$header = array('Vendor ID','Name', 'Address','Contact');
		$this->load->helper('file');
        $this->load->helper('download');
		 $filename = 'active_vendor_Report';
		$data = $this->get_csv($header,$Report,$filename);
	}
	
	
	
	public function get_csv($header,$report,$filename){
		
		$array_lan = count($report)+5;
		
		$this->load->library('PHPExcel');
		require_once getcwd().'/'.APPPATH.'libraries/PHPExcel/IOFactory.php';
		require_once getcwd().'/'.APPPATH.'libraries/PHPExcel/Worksheet/MemoryDrawing.php';
		
		$excel = new PHPExcel();
		$column = 'A'; 

	//dump($array_lan);
		for($c=0;$c<count($header);$c++)
        {
            $excel->getActiveSheet()->setCellValue($column.'5',$header[$c]); // Add column heading data
            if($c==count($header)-1)
            {
                break;// Need to terminate the loop when coumn letter reachs max
            }
            $column++;
        }
		$excel->getActiveSheet()->getStyle('A5:G5')->getFont()->setBold(true);
		  $styleArray = array(
				'borders' => array(
				'outline' => array(
				'style' => PHPExcel_Style_Border::BORDER_THICK,
				'color' => array('argb' => '00000000'),
				),),);
		$excel->getActiveSheet()->getStyle('A5:G5')->applyFromArray($styleArray);
		$excel->getActiveSheet()->getStyle('A6:G'.$array_lan)->applyFromArray($styleArray);
		$excel->getActiveSheet()->getStyle('A5:G5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('000000FF');
		$excel->getActiveSheet()->getStyle("A5:G5")->getFont()->setBold(true)
                                ->setName('Verdana')
                                ->setSize(10)
                                ->getColor()->setRGB('FFFFFF');
								
		if($filename == 'usertime_report'){
			$head = 'User Timing Report';
		}else if($filename == 'User_Report'){
			$head = 'User Report';
		}else if($filename == 'Project_Report'){
			$head = 'Project Report';
			
		}else if($filename == 'active_member_Report'){
			$head = 'Active Member Report';
		}else if($filename == 'active_vendor_Report'){
			$head = 'Active Vendor Report';
		}else if($filename == 'available_item_Report'){
			$head = 'Available Item Report';
		}else if($filename == 'unavailable_item_Report'){
			$head = 'Unavailable Item Report';
		}else if($filename == 'outdated_item_Report'){
			$head = 'Outdated Item Report';
		}else if($filename == 'item_allocation_Report'){
			$head = '  Item Allocation Report ';
			$name='Member Name: '.get_member_name( $this->session->userdata('member'));
			$id= 'Member ID: '.$this->session->userdata('member');
			$excel->getActiveSheet()->setCellValue('F3',$name);
			$excel->getActiveSheet()->setCellValue('F4',$id);
		}	 
		$excel->getActiveSheet()->setCellValue('F1',$head);
		//$logo = get_user_logo();
		$path =  getcwd().'\assets\admin\img\logo.png';
		//echo $path;die;
		$gdImage = imagecreatefrompng($path);
		$objDrawing = new PHPExcel_Worksheet_MemoryDrawing();
		$objDrawing->setName('Sample image');
		$objDrawing->setDescription('Sample image');
		$objDrawing->setImageResource($gdImage);
		$objDrawing->setRenderingFunction(PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
		$objDrawing->setMimeType(PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
		$objDrawing->setHeight(60);
		$objDrawing->setCoordinates('A1');
		$objDrawing->setWorksheet($excel->getActiveSheet());
	
		$excel->getActiveSheet()->fromArray($report, null, 'A6');
	   // Set AutoSize for name and email fields
		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

		header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="'.$filename.'.csv"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $objWriter->save('php://output');
		
	}
}
