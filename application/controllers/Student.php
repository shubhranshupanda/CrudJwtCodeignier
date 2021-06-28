<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('student_model','studentModel');
	}
	function index(){
		$this->load->view('crud/studentlist');
	}

	function student_data(){
		$data=$this->studentModel->student_list();
		echo json_encode($data);
	}

	function get_student(){
		$student_id=$this->input->get('id');
		$data=$this->studentModel->get_student_by_id($student_id);
		echo json_encode($data);
	}

	function create_student(){
		$StudentName=$this->input->post('StudentName');
		$ClassName=$this->input->post('ClassName');
                $Section=$this->input->post('Section');
		$AdmissionNo=$this->input->post('AdmissionNo');
		$RollNo=$this->input->post('RollNo');
                $FathersName=$this->input->post('FathersName');
		$MothersName=$this->input->post('MothersName');
		$Dob=$this->input->post('Dob');
                $MobileNo=$this->input->post('MobileNo');
		$data=$this->studentModel->save_student($StudentName,$ClassName,$Section,$AdmissionNo,$RollNo,$FathersName,$MothersName,$Dob,$MobileNo);
		echo json_encode($data);
	}

	function update_student(){
		$StudentId=$this->input->post('StudentId');
		$StudentName=$this->input->post('StudentName');
		$ClassName=$this->input->post('ClassName');
                $Section=$this->input->post('Section');
		$AdmissionNo=$this->input->post('AdmissionNo');
		$RollNo=$this->input->post('RollNo');
                $FathersName=$this->input->post('FathersName');
		$MothersName=$this->input->post('MothersName');
		$Dob=$this->input->post('Dob');
                $MobileNo=$this->input->post('MobileNo');
		$data=$this->studentModel->update_student($StudentId,$StudentName,$ClassName,$Section,$AdmissionNo,$RollNo,$FathersName,$MothersName,$Dob,$MobileNo);
		echo json_encode($data);
	}

	function delete_student(){
		$student_id=$this->input->post('student_id');
		$data=$this->studentModel->delete_student($student_id);
		echo json_encode($data);
	}
        
        function show_class(){
		$class_name=$this->input->post('classname');
		$data=$this->studentModel->get_students_by_class_name($class_name);
		echo json_encode($data);
	}
        
        function get_classes(){
            $class_name=$this->input->get('classname');
          
             $data=$this->studentModel->get_class_names($class_name);

            echo json_encode($data);
        }
        function get_student_data_by_className(){
            $class_name=$this->input->get('classname');
            if($class_name =='ALL'){
               $data=$this->studentModel->student_list();
            }else{
                $data=$this->studentModel->get_studentData_by_className($class_name);
            }
            
            echo json_encode($data);
        }
        
       
        
    public function validate_bulk_trainee($excel_data) {
        //print_r($excel_data);exit;
        $trainee = array();
        $i = 0;
       
       
      
        foreach ($excel_data as $k => $exceldata) {
            if($i > 0 ){
                $trainee[$i]['StudentName'] = trim($exceldata[1]);
                $trainee[$i]['ClassName'] = trim($exceldata[2]);          
                $trainee[$i]['Section'] = trim($exceldata[3]);
                $trainee[$i]['AdmissionNo'] = trim($exceldata[4]);
                $trainee[$i]['RollNo'] = trim($exceldata[5]);
                $trainee[$i]['FathersName'] = trim($exceldata[6]);
                $trainee[$i]['MothersName'] =  trim($exceldata[7]);
                $trainee[$i]['Dob'] = date('Y-m-d',strtotime(trim($exceldata[8])));
                $trainee[$i]['MobileNo'] = trim($exceldata[9]);
                
                //print_r($trainee);exit;
                $status = $this->studentModel->save_excel_data($trainee[$i]);
                
                if ($status['status'] == FALSE) {
                    $trainee[$i]['rowstatus'] = 'fail';
                    $trainee[$i]['failure_reason'] = 'Insertion Failed';
                    $trainee[1]['db_error'] = 'db_error';
                } else {
                    $trainee[1]['db_error'] = 'no_error';
                    //$this->session->set_flashdata('success', 'Congratulations! File succesfully uploaded');
                }
            }
  
            $i++;
        }

        return $trainee;
    }
    /*
      function for bulk registration : uploading the bulk data excel file
     */
    public function bulk_upload() {
       
        $data['page_title'] = 'Bulk Registration';
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        if ($this->input->post("upload")) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '2048';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
                //print_r($data['error']);exit;
            } else {
                $data = $this->upload->data();
                
                $this->load->library('excel_reader'); 
                $this->excel_reader->setOutputEncoding('CP1251');
                $read_perm = $this->excel_reader->read($data['full_path']);
                if ($read_perm == 'FALSE') {
                    $data['error'] = 'File is not readable.';
                } else {
                    $excel_data = $this->excel_reader->sheets[0]['cells'];
                    if(!empty($excel_data)){////added by shubhranshu to prevent if the sheet is blank
                     
                        $trainee = $this->validate_bulk_trainee($excel_data);
                    }else{
                        $status_msg = '<div class="alert alert-danger">Oops! Excel Sheet is blank!</div>';
                       
                    }
                   

                    if ($trainee[1]['db_error'] == 'db_error') {
                        $this->session->set_flashdata('error_message', 'Oops! Sorry, it looks like something went wrong with some record.Please check!');
                    }elseif($trainee[1]['db_error'] == 'no_error'){
                         $status_msg = '<div class="alert alert-success">Congratulations! File succesfully uploaded!</div>';
                    }
                    
                    
                    unset($trainee[1]['db_error']);
                    if (empty($trainee[1]))
                        unset($trainee[1]);
              
                    unlink('./uploads/' . $data['file_name']);
                   
                }
            }
        }
        //$data['files'] = $files;
        $data['page_title'] = "Bulk Registration";
        $data['trainee_data'] = $trainee;
        $data['status_msg']=$status_msg;
       $this->load->view('upload/upload_excel',$data);
    }
    
  
        

}
