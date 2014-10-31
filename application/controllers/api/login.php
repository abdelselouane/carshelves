<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	private $AppToken = 'qJB0rGtIn5UB1xG03efyCp10xP3wqM01';
	
	public function index()
	{
		
		$error['error'] = TRUE;
        $error['msg'] = 'Sorry, you need to specify what function you are looking for to get an answer back.';
		
		$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
		print_r($result);  exit;
	}
	
	
    function signin($AppToken, $username_email, $password){
    	
		//App Token: qJB0rGtIn5UB1xG03efyCp10xP3wqM01
		
    	//email: abdelselouane@gmail.com
		//user name: abdelselouane
		//password: abdel123
		
        //encrypted email: QzlQb2RRVXJnT1BnS0RsM1RDVXlGNDU0d1VhRmFPUW1nejRYRC9oZEJaVT0E0u01s
        //encrypted user name: ZW9xT0wxMUUwWE1GS1lpTTRNZGE4Zz09
		//encrypted pass: MXZnL0xvcThoai9hYVpQa1dwRGxJQT09
		
        $error['error'] = FALSE;  
		//echo encrypt_decrypt('encrypt', 'abdelselouane@gmail.com');   exit;
		//echo $username_email.'<br>'; echo $password.'<br>';
		//echo $this->AppToken.'<br>'; 
	
		//echo $username_email = encrypt_decrypt('decrypt', $username_email); exit;
		
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
		
		
		if( empty($username_email) ){
				
			$error['error'] = TRUE;
            $error['msg'] = 'The Username or Email Address is a required field. Please try again.';
			
			$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
			print_r($result);  exit;
			
		}else{
			$username_email = encrypt_decrypt('decrypt', $username_email);
		}
		
		if( empty($password) ){
				
			$error['error'] = TRUE;
            $error['msg'] = 'The Password is a required field. Please try again.';
			
			$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
			print_r($result);  exit;
			
		}else{
			$password = encrypt_decrypt('decrypt', $password);
		}
		
		
		
        if( !empty($username_email) && !empty($password) ){
        	
           $result =  strrchr($username_email,"@");
            
            if( !empty($result) ){
				
                $email_available = $this->users->is_email_available($username_email);
				
				
                if( !filter_var($username_email, FILTER_VALIDATE_EMAIL) ) {
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: '.$username_email.' is not valid. Please try again.';
					 
					 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					 print_r($error);  exit;
                    
                }else if($email_available === 0){
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: '.$username_email.' does not exist. Please try again.';
					 
					 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					 print_r($result);  exit;
                }
                
            }else{
               
                $username_available = $this->users->is_username_available(serialize($username_email));
				
                if($username_available === 0){
                        
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Username provided: '.$username_email.' does not exist. Please try again.';
					 
					 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					 print_r($result);  exit;

                }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $username_email)){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$

                    $error['error'] = TRUE;
                    $error['msg'] = 'The Username provided: '.$username_email.' is not valid. Please try again.<br/> Must start with letter 6-32 characters 
				    Letters, numbers, underscore only';
					
					 $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					 print_r($result);  exit;
                
                }
                
            }
            
            if( $password === '' ){
                
                $error['error'] = TRUE;
                $error['msg'] = 'Please enter a valid Password';
				
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
			    print_r($result);  exit;


            }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $password)){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$

                $error['error'] = TRUE;
                $error['msg'] = 'The Password provided: '.$password.' not valid. Please try again.<br/> Must start with letter 6-32 characters
Letters, numbers, underscore only';

				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;

            }
            
			
            
           if($error['error'] === FALSE){
           
              /* foreach ($post as $key=>$value) {
                   $post[$key] = mysql_real_escape_string($value);
                }
              */
              
              $post['username_email'] 	= $username_email;
			  $post['password']			= encryptIt($password);
			  
			  //echo '<pre>'; print_r($post); echo '</pre>'; exit;
			  
              $query_result =  $this->users->check_credentials($post);
              
			 	//echo '<pre>'; print_r($query_result); echo '</pre>'; exit;
			  
              if(is_object($query_result) && !empty($query_result)){ 
                 
				
                 
                  if( $query_result->password === $post['password'] ){
                      	
                      
                      $arrayInfo['user_id']		= $query_result->id;
                      $arrayInfo['username']	= $query_result->username;
                      $arrayInfo['email']		= $query_result->email;
                      $arrayInfo['activated']	= $query_result->activated;
                      
					  
                     // $this->session->set_userdata($arrayInfo);
                      
                      //$loginInfo = $this->session->all_userdata();
                      
                     // $this->users->update_login_info($loginInfo['user_id'], $loginInfo['ip_address'], gmdate("Y-d-m H:i:s", $loginInfo['last_activity']));
                      
					 
					  if( isset( $loginInfo['activated'] ) && $loginInfo['activated'] == 0){
					  	
						//$error['error'] = TRUE;
                    	//$error['msg'] = 'Please check your email box:<br/> An activation link was sent to you via this email address <strong>'.$loginInfo['email'].'</strong > ';
                    	//$error['msg'] .= 'provided when the account was created,<br/> OR go to <a href="'.base_url().'activation_code/">Activate My Account Now</a> to resend the link';
						
					  }
                      
					  $result = json_encode(array("status"=>1, "message"=>"action succeed", "data"=>$arrayInfo));
					  print_r($result);  exit;
                      
                  } else {
                     
                    $error['error'] = TRUE;
                    $error['msg'] = 'The Password provided is not valid, please try again.';
					
					$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					print_r($result);  exit;
                      
                  }
              
              } else {
                
                  $subject = $post['username_email'];
                  $result =  strrchr($subject,"@");
                  
                  if( !empty($result) ){//email
                  
                       $error['error'] = TRUE;
                       $error['msg'] = 'The Email Address: '.$post['username_email'].' does not exist. Please try again.';
					   
					   $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					   print_r($result);  exit;
                      
                  }else{
                    
                      $error['error'] = TRUE;
                      $error['msg'] = 'The Username provided: '.$post['username_email'].' does not exist. Please try again.';
					  
					  $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
					  print_r($result);  exit;
                  }
              
              }   
               
           }
            
        }
    
    }
	
}

