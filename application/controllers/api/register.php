<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	private $AppToken = 'qJB0rGtIn5UB1xG03efyCp10xP3wqM01';
	
	public function index()
	{
		
		/*$error['error'] = TRUE;
        $error['msg'] = 'Sorry, you need to specify what function you are looking for to get an answer back.';
		
		$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
		print_r($result);  exit;*/
		
		$this->load->view('API_VIEW/register');
	}
	
	function registerUser(){
		
        $post = $this->input->post();
        
		//echo '<pre>'; print_r($post); echo '</pre>';
		//exit;
		
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
		    
        if(is_array($post) && !empty($post)){
            
            $error = Array();
            $error['error'] = FALSE;
            
            if(isset($post['terms']) && $post['terms'] === 'on'){
                
                if( $post['username'] === '' ){
                    
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Username';
					
					$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					print_r($result);  exit;
                    
                }else if( $post['email'] === '' ){
                    
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Email';
					
					$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					print_r($result);  exit;
                    
                }else if( $post['password'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Password';
					
					$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					print_r($result);  exit;
                    
                    
                }else if($post['cpassword'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please confirm your password';
					
					$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					print_r($result);  exit;
                    
                    
                }else if ($post['password'] !== $post['cpassword']){
                   
                    $error['error'] = TRUE;
                    $error['msg'] = 'The Password and Confirm Password fields are not matching. Please try again';
					
					$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					print_r($result);  exit;
                   
                    
                }else{
                   
                   $username_available = $this->users->is_username_available($post['username']);
                   $email_available = $this->users->is_email_available($post['email']);
                    
                   
                    if($username_available !== 0){
                        
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Username provided: '.$post['username'].' already exist. Please try again.';
						 
						 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						 print_r($result);  exit;
                        
                    }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['username'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Username provided: '.$post['username'].' not valid. Please try again. Must start with letter 6-32 characters
Letters, numbers, underscore only';
						
						$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						print_r($result);  exit;
                    }
                    
                    if($email_available !== 0){
                    
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Email Address: '.$post['email'].' already exist. Please try again.';
						 
						 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						 print_r($result);  exit;
                         
                        
                    }else if( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) ) {
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Email Address: '.$post['email'].' is not valid. Please try again.';
						 
						 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						 print_r($result);  exit;
                        
                    }
                    
                    if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['password'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Password provided: '.$post['password'].' not valid. Please try again. Must start with letter 6-32 characters
Letters, numbers, underscore only';
						
						$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						print_r($result);  exit;
                    }
                    
                }
                
            }else{
                
               $error['error'] = TRUE;
               $error['msg'] = 'Please accept our Terms & Conditions to create a new account';
			   
			   $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
			   print_r($result);  exit;
               
                
            }
            
            if($error['error'] === FALSE){
            
                
                 unset($post['AppToken']);
                 unset($post['cpassword']);
                 unset($post['terms']);
                
                foreach ($post as $key=>$value) {
                   $post[$key] = mysql_real_escape_string($value);
                }
                
				
				
                $post['password'] = encryptIt( $post['password'] );
				
				/******** Create Token *********/
				 $post['token']	=  rand_string(32);
                // $post['token'] =  encryptIt($tokenString); 
				/********				*******/
				
				//echo '<pre>'; print_r($post); echo '</pre>';
				//exit;
				
                $user_id = $this->users->create_user($post, FALSE);
                
                $data_user =  $this->users->get_user_by_id($user_id['user_id'],FALSE);
                
                if(is_object($data_user) && !empty($data_user)){
                    
                    
                    $userInfo = $this->users->get_user_by_email($post['email']);
                
                   // echo '<pre>'; print_r($userInfo); echo '</pre>';
                    
                    $resetString    =  rand_string(16);
                    $resetCode      =  url_encrypt($resetString); 
                    
                    $this->users->resetPasswordCode($userInfo->id, $resetCode);
                
                    $userInfo = $this->users->get_user_by_email($post['email']);
                
                    $this->email->from('support@carshelves.com', 'Carshelves.com');
                    $this->email->to($data_user->email); 
                    //$this->email->cc('another@another-example.com'); 
                    //$this->email->bcc('them@their-example.com'); 

                    $this->email->subject('Account Activation - Carshelves.com');
					
					/***************************/
					$message = "";
					$message .= "Welcome to Carshelves,<br> Please click on this link to activate your account <a href='".base_url()."activation_code/activate/".$userInfo->id."/".$userInfo->code_digits."'>Activate Your Account</a>.<br/>";
					$message .= "Best Regards,<br> Carshelves.com Team";
					/***************************/
					
                    $this->email->message($message);
                    $this->email->send();
					
                    $error['success'] = TRUE;
                    $error['msg']   = 'Activation Link: was sent to your email address. Please confirm it';
					
	                $result = json_encode(array("status"=>1, "message"=>"action successful", "data"=>$error));
				   	print_r($result);  exit;
                }
                
                $error['success'] = TRUE;
                $error['msg'] = ' Welcome to CarShelves.com Your account has been set. You will be receiving an Activation Email soon.  Please check your Email box for a direct link to the Account Activation.';
                
				$result = json_encode(array("status"=>1, "message"=>"action sucessful", "data"=>$error));
				print_r($result);  exit;
                
            }
            
        }
    
    }
	
}