<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $AppToken = '';
    
   function __construct(){
        parent::__construct();
        
        $token = $this->token->getTokenByApp('MobileIosAppToken');
        $this->AppToken =  $token->token;
    }
	
	public function index()
	{
        $post = $this->input->post();
        echo '<pre>'; print_r(); echo '</pre>';exit;
        $this->load->view('API_VIEW/login');
		
		/*$error['error'] = TRUE;
        $error['msg'] = 'Sorry, you need to specify what function you are looking for to get an answer back.';
		
		$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
		print_r($result);  exit;*/
	}
	
	
    function signin(){
        
        $post = $this->input->post();
        
        if( isset($post['AppToken']) && !empty($post['AppToken']) ){
			if($post['AppToken'] !== $this->AppToken){
				$error['error'] = TRUE;
	            $error['msg'] = 'The App Token is not correct. Please try again.';
				
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
			}
		}else{
				$error['error'] = TRUE;
	            $error['msg'] = 'The App Token is missing. Please try again.';
				
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
		}   
        
        
        if(!empty($post)){
            
           $error['error'] = FALSE;
            
           $subject = $post['username_email'];
           $result =  strrchr($subject,"@");
            
            if( $post['username_email'] === '' ){
                
                $error['error'] = TRUE;
                $error['msg'] = 'Please enter a Username, it is a required field';
                
                $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;


            }
            
            if( !empty($result) ){
                
                $email_available = $this->users->is_email_available($post['username_email']);
                
                if( !filter_var($post['username_email'], FILTER_VALIDATE_EMAIL) ) {
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: '.$post['username_email'].' is not valid. Please try again.';
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
                    
                }else if($email_available === 0){
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: <strong>'.$post['username_email'].'</strong> does not exist.<br/>Please try again.';
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
                }
                
            }else{
                
                $username_available = $this->users->is_username_available($post['username_email']);
                
                if($username_available === 0){
                        
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Username provided: '.$post['username_email'].' does not exist. Please try again.';
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;

                }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['username_email'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$

                    $error['error'] = TRUE;
                    $error['msg'] = 'The Username provided: '.$post['username'].' not valid. Please try again. 
                        Must start with letter.
                        Between 6 to 32 characters.
                        Letters, numbers, underscore are allowed.
                        Numbers and underscore are not required.';
                    
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
                
                }
                
            }
            
            if( $post['password'] === '' ){
                
                $error['error'] = TRUE;
                $error['msg'] = 'Please enter a valid Password';
                
                $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;


            }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['password'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$

                $error['error'] = TRUE;
                $error['msg'] = 'The Password provided is not valid, Please try again.
                        Must be different than Username.
                        Must start with letter.
                        Between 6 to 32 characters.
                        Letters, numbers, underscore are allowed.
                        Nunmbers and underscore are not required';
                
                $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;

            }
            
            
           if($error['error'] === FALSE){
           
               foreach ($post as $key=>$value) {
                   $post[$key] = mysql_real_escape_string($value);
                }
               
                unset($post['AppToken']);
               
                $post['password'] = encryptIt($post['password']);
               
                $userInfo =  $this->users->check_credentials($post);
             
               // echo '<pre>'; print_r($userInfo); echo '</pre>';
               
              if(is_object($userInfo) && !empty($userInfo)){ 
					 
					  if( isset( $userInfo->activated ) && $userInfo->activated == 0){
					  	
						$resetCode    =  rand_string(16);
						  
		                $this->users->setCodeDigits($userInfo->id, $resetCode);
                
                    	$userInfo = $this->users->get_user_by_id($userInfo->id, FALSE);

                        $this->email->from('support@carshelves.com', 'Carshelves.com');
                        $this->email->to($userInfo->email); 
                        //$this->email->cc('another@another-example.com'); 
                        //$this->email->bcc('them@their-example.com'); 

                        $this->email->subject('Account Activation - Carshelves.com');

                        /***************************/
                        $message =  " Activation Code:".$userInfo->code_digits;
                        /***************************/

                        $this->email->message($message);
                        $this->email->send();

                        $error['success'] = TRUE;
                        $error['msg']   = 'Activation Link: was sent to your email address. Please confirm it';


                        $result = json_encode(array("status"=>1, "message"=>"action successful", "data"=>$error));
                        print_r($result);  exit;
                          
                      }else{
                        
                        $error['success'] = TRUE;
                        $error['msg']   = 'Login information is correct, Please create SESSION and give user access to the APP';

                        $result = json_encode(array("status"=>1, "message"=>"action successful", "data"=>$error));
                        print_r($result);  exit;  
                      
                      }
              
              } else {
                
                $error['error'] = TRUE;
                $error['msg']   = 'We can not find any account with this credentials, please try again.';

                $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
                print_r($result);  exit;
                  
              } 
           
           }
        }
    }
	
}

