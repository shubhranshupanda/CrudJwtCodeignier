<?php
class Service_Model extends CI_Model{
    
    
    public function __construct()
    {
        parent::__construct();	
    }

    public function create_user($data){
        $data =array(
            'UserName' => $data['UserName'],
            'UserEmail' => $data['UserEmail'],
            'UserPassword' => $data['UserPassword'],
            'UserRole' => $data['UserRole'],
            'UserDob' => $data['UserDob']
        );
        
        $this->db->trans_start();
        $this->db->insert('user',$data);
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            return FALSE;
        }
        
        return TRUE;
    }
    
    public function check_user($data){
        $this->db->select('UserId');
        $this->db->from('user');
        $this->db->where('UserName',$data['UserName']);
        $this->db->where('UserPassword',$data['UserPassword']);
        $result = $this->db->get()->num_rows();
        return $result;
    }
    
    public function get_attempts($username){
        $this->db->select('UserAttempts');
        $this->db->from('user');
        $this->db->where('UserName',$username->UserName);
        $result = $this->db->get()->row();
        
        return $result;
    }
    
    
    public function update_user($attempt,$bal,$username){
        $data =array(
            'UserAttempts' => $attempt,
            'UserBalUnbal' => $bal
        );
        
        $this->db->trans_start();
        $this->db->where('UserName',$username);
        $this->db->update('user',$data);
        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE){
            return FALSE;
        }
        
        return TRUE;
    }
    
    public function get_all_users(){
        $this->db->select('*');
        $this->db->from('user');
        $result = $this->db->get()->result();
        
        return $result;
    }
    
    public function delete_user($username){
     
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('UserName',$username);
        $found = $this->db->get()->result();
        if(!empty($found)){
             $status = $this->db->delete('user',array('UserName'=>$username));
             return true;
        }else{
            return false;
        }
 
    }
    
    public function get_userrole($data){
        $this->db->select('UserRole');
        $this->db->from('user');
        $this->db->where('UserName',$data['data']->UserName);
        $result = $this->db->get()->row();
        return $result;
    }
        
        
}