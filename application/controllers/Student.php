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
        

}
