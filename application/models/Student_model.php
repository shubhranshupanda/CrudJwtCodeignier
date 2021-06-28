<?php
class Student_Model extends CI_Model{

	function student_list(){
		$data=$this->db->query("SELECT * FROM studentdata");
		return $data->result();
	}

	function save_student($StudentName,$ClassName,$Section,$AdmissionNo,$RollNo,$FathersName,$MothersName,$Dob,$MobileNo){
		$status=$this->db->query("INSERT INTO studentdata (StudentName,ClassName,Section,AdmissionNo,RollNo,FathersName,MothersName,Dob,MobileNo)VALUES('$StudentName','$ClassName','$Section','$AdmissionNo','$RollNo','$FathersName','$MothersName','$Dob','$MobileNo')");
                return $status;
	}

	function get_student_by_id($student_id){
		$query=$this->db->query("SELECT * FROM studentdata WHERE StudentId='$student_id'");
		if($query->num_rows()>0){
			foreach ($query->result() as $data) {
				$student_array=array(
					'StudentId' => $data->StudentId,
					'StudentName' => $data->StudentName,
					'ClassName' => $data->ClassName,
                                        'Section' => $data->Section,
					'AdmissionNo' => $data->AdmissionNo,
					'RollNo' => $data->RollNo,
                                        'FathersName' => $data->FathersName,
					'MothersName' => $data->MothersName,
					'Dob' => $data->Dob,
                                        'MobileNo' => $data->MobileNo,
					);
			}
		}
		return $student_array;
	}

	function update_student($StudentId,$StudentName,$ClassName,$Section,$AdmissionNo,$RollNo,$FathersName,$MothersName,$Dob,$MobileNo){
		$status=$this->db->query("UPDATE studentdata SET StudentName='$StudentName',ClassName='$ClassName',Section='$Section',AdmissionNo='$AdmissionNo',RollNo='$RollNo',FathersName='$FathersName',MothersName='$MothersName',Dob='$Dob',MobileNo='$MobileNo' WHERE StudentId='$StudentId'");
		return $status;
	}

	function delete_student($student_id){
		$status=$this->db->query("DELETE FROM studentdata WHERE StudentId='$student_id'");
		return $status;
	}
        
        function get_students_by_class_name($class_name){
            $res=$this->db->query("SELECT ClassName,count(StudentId) as total FROM studentdata WHERE ClassName='$class_name' group by ClassName")->result();
            return $res[0];
        }
        
        function get_class_names($class_name){
            $res=$this->db->query("SELECT ClassName FROM studentdata group by ClassName")->result();
            return $res;
        }
        
        function get_studentData_by_className($class_name){
            $data=$this->db->query("SELECT * FROM studentdata where ClassName='$class_name'");
            return $data->result();
        }
        
        function save_excel_data($data){
            $this->db->trans_start();
            $this->db->insert('studentdata',$data);
            $this->db->trans_complete();
            if( $this->db->trans_status() == FALSE){
                $status['status'] = FALSE;
                return $status;
            }
            $status['status'] = TRUE;
            //print_r( $data);exit;
            return $status;
        }
	
}