<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	private $AppToken = 'qJB0rGtIn5UB1xG03efyCp10xP3wqM01';
	
	public function index()
	{
		
		$error['error'] = TRUE;
        $error['msg'] = 'Sorry, you need to specify what function you are looking for to get an answer back.';
		
		$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
		print_r($result);  exit;
	}
	
	function registerUser($AppToken){
		
        $post = $this->input->post();
        
		if( isset($AppToken) && !empty($AppToken) ){
			if($AppToken !== $this->AppToken){
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
                         $error['msg'] = 'The Username provided: <strong>'.$post['username'].'</strong> already exist.<br/>Please try again.';
						 
						 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						 print_r($result);  exit;
                        
                    }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['username'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Username provided: <strong>'.$post['username'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
Letters, numbers, underscore only<br/>';
						
						$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						print_r($result);  exit;
                    }
                    
                    if($email_available !== 0){
                    
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Email Address: <strong>'.$post['email'].'</strong> already exist.<br/>Please try again.';
						 
						 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						 print_r($result);  exit;
                         
                        
                    }else if( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) ) {
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Email Address: <strong>'.$post['email'].'</strong> is not valid.<br/>Please try again.';
						 
						 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
						 print_r($result);  exit;
                        
                    }
                    
                    if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['password'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Password provided: <strong>'.$post['password'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
Letters, numbers, underscore only<br/>';
						
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
				
                $user_id = $this->users->create_user($post, FALSE);
                
                $data_user =  $this->users->get_user_by_id($user_id['user_id'],FALSE);
                
                if(is_object($data_user) && !empty($data_user)){
                    
                    
                    $userInfo = $this->users->get_user_by_email($post['email']);
                
                   // echo '<pre>'; print_r($userInfo); echo '</pre>';
                    
                    $resetString    =  rand_string(16);
                    $resetCode      =  encryptIt($resetString); 
                    
                    $this->users->resetPasswordCode($userInfo->id, $resetCode, $resetString);
                
                   $userInfo = $this->users->get_user_by_email($post['email']);
                
                 // echo '<pre>'; print_r($userInfo); echo '</pre>';
                // exit;
                    
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
					//echo $message;
                    $this->email->message($message);	

                    $this->email->send();

                    //echo $this->email->print_debugger();exit;
                    $error['success'] = TRUE;
                    $error['msg']   = '<strong>Activation Link:</strong><br/> was sent to your email address.';
                   // echo '<pre>'; print_r($error); echo '<pre/>'; exit;
                    $this->session->set_flashdata($error);    
                    redirect(base_url().'login');
                }
                
                $error['success'] = TRUE;
                $error['msg'] = ' Welcome to <strong>CarShelves.com</strong> <br/> Your account has been set. <br/> You will be receiving an <strong>Activation Email</strong> soon. <br/> Please check your Email box for a direct link to the <strong>Account Activation</strong>.';
                
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
                
            }
            
        }
    
    }
	
}