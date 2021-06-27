<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 
 * Author: Shubhranshu
 * Created no of Service Api to validate crud operations
 * Date: 27.06.2021
 * 
 */



require(APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;
class Service extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();	
		$this->load->library('Authorization_Token');	
                $this->load->library('form_validation');
                $this->load->model('Service_model','serviceModel');
         
	}

	
	public function register_post()
	{   
           
            //$headers = $this->input->request_headers();
            //$post = json_decode($this->security->xss_clean($this->input->raw_input_stream));
             //print_r($post);print_r($headers);exit;     
            
            $validation = $this->validate_data();
            if($validation['status'] === TRUE){
                $status = $this->serviceModel->create_user($validation['resp']);
                $tokenData=array();
                if($status){
                    $tokenData = $this->authorization_token->generateToken($validation['resp']);
                    $success =array('');
                    $message='Congratulation! You Have Registered Successfully';
                    $this->success_handler($message,$tokenData,'200');
                }
            }else{
                $err_msg='Data Validation Error';
                $this->handle_error('',$validation['resp'],'SCHOOLCOM-400',$err_msg,'400');
            }
             
	}
        /// to handle error msg
        private function handle_error($data,$error,$error_id,$err_msg,$err_code){
            $response=[
                "data"=> $data,
                "errors"=> [
                  [
                    "details"=> $error,
                    "errorId"=> $error_id,
                    "message"=> $err_msg
                  ]
                ],
                "status"=> $err_code
              ];
            
            $this->set_response($response,$err_code); 
       
        }
        // to handle success
        private function success_handler($message,$token,$err_code){
            $response=[
                "data"=> [
                    'message' => $message,
                    'token'  => $token,
                    'status' => 'Success'
                ],
                "errors"=> [],
                "status"=> $err_code
              ];
            
            $this->set_response($response,$err_code); 
        }

        /// to validate register data
        private function validate_data(){
            $config = [
                        [
                            'field' => 'UserName',
                            'label' => 'Username',
                            'rules' => 'required|min_length[3]|alpha_dash|is_unique[user.UserName]',
                            'errors' => [
                                    'required' => 'UserName Field Is Mandatory',
                                    'min_length' => 'Minimum Username length is 3 characters',
                                    'alpha_dash' => 'You can only use a-z 0-9 _ . – characters for input',
                                    'is_unique' => 'User already Exist With this UserName'
                            ],
                        ],
                        [
                            'field' => 'UserPassword',
                            'label' => 'UserPassword',
                            'rules' => 'required|min_length[6]',
                            'errors' => [
                                    'required' => 'You must provide a Password.',
                                    'min_length' => 'Minimum Password length is 6 characters',
                            ],
                        ],
                        [
                            'field' => 'UserEmail',
                            'label' => 'UserEmail',
                            'rules' => 'required|valid_email|is_unique[user.UserEmail]',
                            'errors' => [
                                    'required' => 'You must provide a Valid Email.',
                                    'valid_email' => 'You Must Provide a valid Email',
                                    'is_unique' => 'User already Exist With this Email ID'
                            ],
                        ],
                        [
                            'field' => 'UserDob',
                            'label' => 'UserDob',
                            'rules' => 'required',
                            'errors' => [
                                    'required' => 'You must provide a DOB.'
                                  
                            ],
                        ],
                        [
                            'field' => 'UserRole',
                            'label' => 'UserRole',
                            'rules' => 'required|alpha',
                            'errors' => [
                                    'required' => 'You must provide the UserRole either admin or user .',
                                    'alpha' => 'Role Alphabatic Only',
                            ],
                        ],
                    ];
            
            
                $data = $this->input->get();
                $this->form_validation->set_data($data);
                $this->form_validation->set_rules($config);
                
           
            if($this->form_validation->run()==FALSE){
                $resp['resp'] =$this->form_validation->error_array();
                $resp['status'] = false;

            }else{
                $token_data['UserName']=$UserName = $this->input->get('UserName');
                $token_data['UserEmail']=$UserEmail = $this->input->get('UserEmail');
                $token_data['UserRole']=$UserRole = $this->input->get('UserRole');
                $token_data['UserPassword']=$UserPassword = md5($this->input->get('UserPassword'));
                $token_data['UserDob']=$UserDob = $this->input->get('UserDob');
                $resp['status'] = true;
                $resp['resp'] =$token_data;
            }
            
            return $resp;
        }
        /// check hether authorize header
        private function authorize(){
            $headers = $this->input->request_headers();
            if(isset($headers['Authorization'])){
                if(empty($headers['Authorization'])){
                    $array  = array('status'=>'500','Error'=>'You Are Not Authorized! Pass Authorization Header');
                    $this->response($array); 
                }else{
                    $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
                    return $decodedToken;
                }
                
            }else{
                $array  = array('status'=>'500','Error'=>'You Are Not Authorized! Pass Authorization Header');
		$this->response($array); 
            }
       
        }
        /// API to test login Authentication
        public function login_post(){
            $return = $this->authorize();
            if($return['status'] == 1){////validation successful for token
                $validation = $this->validate_login_data($return);
                if($validation['status'] === TRUE){
                    $status = $this->serviceModel->check_user($validation['resp']);
                    $tokenData=array();
                    if($status > 0){
                        $tokenData = $this->authorization_token->generateToken($validation['resp']);
                        $success =array('');
                        $message='Congratulation! You Have Logged In Successfully';
                        $this->success_handler($message,$tokenData,'200');
                    }
                }else{
                    $err_msg='Data Validation Error';
                    $this->handle_error('',$validation['resp'],'SCHOOLCOM-400',$err_msg,'400');
                }
            }
        }
        
        //// to validate login data
        private function validate_login_data($return){
            $config = [
                        [
                            'field' => 'UserName',
                            'label' => 'Username',
                            'rules' => 'required|min_length[3]|alpha_dash',
                            'errors' => [
                                    'required' => 'Username is Mandatory',
                                    'min_length' => 'Minimum Username length is 3 characters',
                                    'alpha_dash' => 'You can only use a-z 0-9 _ . – characters for input',
                            ],
                        ],
                        [
                            'field' => 'UserPassword',
                            'label' => 'UserPassword',
                            'rules' => 'required|min_length[6]',
                            'errors' => [
                                    'required' => 'You must provide a Password.',
                                    'min_length' => 'Minimum Password length is 6 characters',
                            ],
                        ],
                        
                       
                    ];
            
            
                $data = $this->input->get();
                $this->form_validation->set_data($data);
                $this->form_validation->set_rules($config);
                
           
            if($this->form_validation->run()==FALSE){
                $resp['resp'] =$this->form_validation->error_array();
                $resp['status'] = false;

            }else{
                $token_data['UserName']=$UserName = $this->input->get('UserName');
                $token_data['UserPassword'] = $pass = md5($this->input->get('UserPassword'));
              
                if(($return['data']->UserName == $UserName) && ($return['data']->UserPassword == $pass)){
                    $resp['status'] = true;
                    $resp['resp'] =$token_data;
                }else{
                    $resp['status'] = false;
                    $resp['resp'] =array('UserName/UserPassword','Data mismatched with authorization header!');
                }

            }
            
            return $resp;
        }


        // to verify authorizaton
        public function verify_post()
	{  
            $headers = $this->input->request_headers(); 
            $decodedToken = $this->authorization_token->validateToken($headers['Authorization']);

            $this->response($decodedToken);  
	}
        
        ////API to check parenthesis balanced
        public function balanced_post(){
            $input = $this->input->get('paranthesis'); 
            $validation = $this->Validate_Balanced();
            if($validation['status'] === TRUE){
                $return = $this->authorize();
                if($return['status'] == 1){////validation successful for token
                    if($this->Parenthesis($input)){
                        $bal ='Balanced';
                        $msg='Success';
                    }else{  
                        $bal ='Unbalanced';
                        $msg='Fail'; 
                    }

                    $attempts = $this->serviceModel->get_attempts($return['data']);
                    $attempt =$attempts->UserAttempts + 1;
                    $username = $return['data']->UserName;
                        //print_r($attempts);exit;
                    $status = $this->serviceModel->update_user($attempt,$bal,$return['data']->UserName);
                    $this->show_msg($username,$msg,$attempt);
                }
            }else{
                $err_msg='Data Validation Error';
                $this->handle_error('',$validation['resp'],'SCHOOLCOM-400',$err_msg,'400');
            }
        }
        /// to check paranthesis balanced or not
        function Parenthesis($string) {
            $opening = array('}' => '{', ']' => '[', ')' => '(');
            $parens = array();
            foreach (str_split($string) as $char) {
                switch ($char) {
                    case '{':
                    case '[':
                    case '(':
                        $parens[] = $char;
                        break;
                    case '}':
                    case ']':
                    case ')':
                        if (!count($parens) || array_pop($parens) != $opening[$char]) return false;
                        break;
                    default:
                        break;
                }
            }
            return count($parens) === 0;
        }
        
        
        function show_msg($username,$msg,$attempts){
            $array  = array('UserName'=>$username,'Message'=>$msg,'Attempts' => $attempts);
            $this->response($array); 
        }
        
        //// API o list all the users
        public function get_users_get(){
            $headers = $this->input->request_headers();
            $return = $this->authorize();
            //$user = $this->serviceModel->get_userrole($return);
            if(($return['status'] == 1) && ($return['data']->UserRole == 'admin')){////validation successful for token
                $results = $this->serviceModel->get_all_users();
                
                $this->display_msg(json_encode($results),$headers['Authorization'],'200');
            }else{
                $this->display_err_msg('',$headers['Authorization'],'403','Invalid UserRole/Token');     
            }
        }
        /// display sucess msg
        private function display_msg($data,$token,$err_code){
            $response=[
                "data"=> $data,
                "errors"=> [],
                "status"=> $err_code,
                "token" => $token
              ];
            
            $this->set_response($response,$err_code); 
        }
        //// display error
        private function display_err_msg($data,$token,$err_code,$err=''){
            $response=[
                "data"=> [],
                "errors"=> [
                    "message" => $err
                ],
                "status"=> $err_code,
                "token" => $token
              ];
            
            $this->set_response($response,$err_code); 
        }
        ////to validate the balanced input
        private function Validate_Balanced(){
            $input = $this->input->get('paranthesis'); 
            $config = [
                        [
                            'field' => 'paranthesis',
                            'label' => 'paranthesis',
                            'rules' => 'required|trim',
                            'errors' => [
                                    'required' => 'paranthesis field is required to check'
                            ],
                        ],

                    ];

                $data = $this->input->get();
                $this->form_validation->set_data($data);
                $this->form_validation->set_rules($config);
                
           
            if($this->form_validation->run()==FALSE){
                
                $resp['resp'] =$this->form_validation->error_array();
                $resp['status'] = false;

            }else{
                if(ctype_alnum($input)){
                    $resp['status'] = false;
                    $resp['resp'] =array('paranthesis'=>'This Can Not Be An Alphanumeric');
                } else {
                    $token_data['paranthesis'] = $this->input->get('paranthesis');
                    $resp['status'] = true;
                    $resp['resp'] =$token_data;
                }
                
            }
            
            return $resp;
        }
       ////API to delete the user
        public function delete_user_post(){
            $headers = $this->input->request_headers();
            $username = $this->input->get('UserName');
            $validation = $this->Validate_Username();
            if($validation['status'] === TRUE){
                $return = $this->authorize();
                if(($return['status'] == 1) && ($return['data']->UserRole == 'admin')){////validation successful for token
                    $status = $this->serviceModel->delete_user($username);
                    if($status > 0){
                        $message='User Deleted Successfully!';
                        $this->success_handler($message,$headers['Authorization'],'200');
                    }else{
                        $this->display_err_msg('',$headers['Authorization'],'402','User Not Found');  
                    }
                    
                }else{
                    $this->display_err_msg('',$headers['Authorization'],'403','Invalid UserRole/Token');     
                }
               
            }else{
                $err_msg='Data Validation Error';
                $this->handle_error('',$validation['resp'],'SCHOOLCOM-400',$err_msg,'400');
            }
            
        }
        //to validate username
         private function Validate_Username(){
            $config = [
                        [
                            'field' => 'UserName',
                            'label' => 'Username',
                            'rules' => 'required|min_length[3]|alpha_dash',
                            'errors' => [
                                    'required' => 'Username is Mandatory To Delete A Record',
                                    'min_length' => 'Minimum Username length is 3 characters',
                                    'alpha_dash' => 'You can only use a-z 0-9 _ . – characters for input',
                            ],
                        ],

                    ];
            
            
                $data = $this->input->get();
                $this->form_validation->set_data($data);
                $this->form_validation->set_rules($config);
                
           
            if($this->form_validation->run()==FALSE){
                $resp['resp'] =$this->form_validation->error_array();
                $resp['status'] = false;

            }else{
                $token_data['UserName'] = $this->input->get('UserName');
   
                $resp['status'] = true;
                $resp['resp'] =$token_data;
            }
            
            return $resp;
        }
        //// to generate token for testing purpose
        function generate_token_post(){
            $token_data['UserName']=$UserName = $this->input->get('UserName');
            $token_data['UserRole']=$UserRole = $this->input->get('UserRole');
            $token_data['UserPassword']=$UserPassword = md5($this->input->get('UserPassword'));
            $tokenDataResp = $this->authorization_token->generateToken($token_data);
            
            $this->response($tokenDataResp,'200');
        }

 
}

