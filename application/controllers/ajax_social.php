<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_social extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
        $info = array();
        
        $loginInfo = $this->session->all_userdata();
      // echo '<pre>'; print_r($loginInfo); echo '</pre>';exit;
		
		/*if( !isset($loginInfo['activated']) || $loginInfo['activated'] === 0){
				
			$msg['error'] = "";
			$msg['msg'] = "Please <strong>Activate Your Account</strong>.<br><a href='".base_url()."activation_code/resend_activation'>Resend Activation Code Link</a>";
			$this->session->set_flashdata($msg);
		}*/
		
        if( isset($loginInfo['user_id']) && empty($loginInfo['user_id'])){
           
			//********************/check if account is active before permission/****************/
            $info['user_id']    = $loginInfo['user_id'];
            $info['username']   = $loginInfo['username'];
            $info['email']      = $loginInfo['email'];
			//$redirect =  site_url("profile");
			//redirect($redirect, 'refresh');	
        }
        
        $info['success'] = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '';
        $info['error'] = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
        $info['msg']   = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
        $info['username_email'] = ($this->session->flashdata('username')) ? $this->session->flashdata('username_email') : '';

        $info['title']   = 'Login';
        $info['page']    = 'login';

        $this->template->load('template/main', 'pages/login', $info);
		
	}

	function fb_login(){
		
		  $post = $this->input->post();
		 // print_r($post['data']); exit;
		//echo '<pre>'; print_r($post); echo '</pre>';exit;
		  
		  if( isset($post['data']) && is_array($post['data']) ){
		  	
			if( isset($post['data']['email']) && $post['data']['email'] != ''){
					
				$userData = $this->users->get_user_by_email($post['data']['email']);
				
				if(is_object($userData) && !empty($userData)){
					
						$arrayInfo['user_id']	= $userData->id;
                      	$arrayInfo['username']	= $userData->username;
                      	$arrayInfo['email']		= $userData->email;
                      	$arrayInfo['activated']	= $userData->activated;
                      
                      	$this->session->set_userdata($arrayInfo);
                      
                      	$loginInfo = $this->session->all_userdata();
                      
                      	$this->users->update_login_info($loginInfo['user_id'], $loginInfo['ip_address'], gmdate("Y-d-m H:i:s", $loginInfo['last_activity']));
					
					  if($userData->activated == 0){
						/***** Account Exist but Not Activated *******/
						$this->users->activate($userData->id);
					  }
					  
					  	$response['error']		= FALSE;
						$response['success']	= TRUE;
                		$response['msg']		= 'Thank you for using <strong>Your Facebook Account</strong> to sign in with us, we will redirect you to your <strong>Account Dashboard </strong>';
						$response['redirect']	= base_url()."profile";
						
						echo json_encode($response); exit;
					
				}else{
				
					/******** New Account create and activate **********/
					
					$userData['email'] = $post['data']['email'];
					$userData['token'] = rand_string(32);
					 
					$result = $this->users->create_user($userData, TRUE);
					
					$userInfo = $this->users->get_user_by_id($result['user_id']);
					
					$arrayInfo['user_id']	= $userInfo->id;
                  	$arrayInfo['username']	= $userInfo->username;
                  	$arrayInfo['email']		= $userInfo->email;
                  	$arrayInfo['activated']	= $userInfo->activated;
                  
                  	$this->session->set_userdata($arrayInfo);
                  
                  	$loginInfo = $this->session->all_userdata();
                  
                  	$this->users->update_login_info($loginInfo['user_id'], $loginInfo['ip_address'], gmdate("Y-d-m H:i:s", $loginInfo['last_activity']));
					
					$response['error']		= FALSE;
					$response['success']	= TRUE;
					$response['msg']		= 'Thank you for using <strong>Your Facebook Account</strong> to sign in with us, we will redirect you to <strong>Complete Account</strong>';
					$response['redirect']	= base_url()."register/completeRegistration/";
					echo json_encode($response); exit;		
				}
			
			}else{
				
				/******** Email needs to be provided **********/
				
				$response['error'] 		= TRUE;
				$response['success'] 	= FALSE;
                $response['msg'] 		= 'The email address is a required information in order to login with a <strong>Facebook account</strong>. Please allow us to use your email address.';
				$response['redirect']	= base_url()."activation_code";
				echo json_encode($response); exit;
				
			}
			
		  }else{
		  	
				/******** Post Data Never Received **********/
			
		  		$response['error'] 	= TRUE;
				$response['success'] 	= FALSE;
                $response['msg'] 		= 'An error occured when fetching your Facebook account information. Please try again.';
				$response['redirect']	= base_url()."activation_code";
				echo json_encode($response); exit;
				
		  }
		
	}
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }
    
    function signin(){
        
        $post = $this->input->post();
        
        if(!empty($post)){
            
           $error['error'] = FALSE;
            
           $subject = $post['username_email'];
           $result =  strrchr($subject,"@");
            
            if( !empty($result) ){
                
                $email_available = $this->users->is_email_available($post['username_email']);
                
                if( !filter_var($post['username_email'], FILTER_VALIDATE_EMAIL) ) {
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: <strong>'.$post['username_email'].'</strong> is not valid.<br/>Please try again.';
                    
                }else if($email_available === 0){
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: <strong>'.$post['username_email'].'</strong> does not exist.<br/>Please try again.';
                }
                
            }else{
                
                $username_available = $this->users->is_username_available($post['username_email']);
                
                if($username_available === 0){
                        
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Username provided: <strong>'.$post['username_email'].'</strong> does not exist.<br/>Please try again.';

                }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['username_email'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$

                    $error['error'] = TRUE;
                    $error['msg'] = 'The Username provided: <strong>'.$post['username_email'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
    Letters, numbers, underscore only<br/>';
                
                }
                
            }
            
            if( $post['password'] === '' ){
                
                $error['error'] = TRUE;
                $error['msg'] = 'Please enter a valid Password';


            }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['password'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$

                $error['error'] = TRUE;
                $error['msg'] = 'The Password provided: <strong>'.$post['password'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
Letters, numbers, underscore only<br/>';

            }else{
                /////
            }
            
            
           if($error['error'] === FALSE){
           
               foreach ($post as $key=>$value) {
                   $post[$key] = mysql_real_escape_string($value);
                }
              
              
              $query_result =  $this->users->check_credentials($post);
             
              if(is_object($query_result) && !empty($query_result)){ 
                 
                  $post['password'] = encryptIt($post['password']);
                  if( $query_result->password === $post['password'] ){
                      
                      $arrayInfo['user_id'] = $query_result->id;
                      $arrayInfo['username'] = $query_result->username;
                      $arrayInfo['email'] = $query_result->email;
                      $arrayInfo['activated'] = $query_result->activated;
                      
                      $this->session->set_userdata($arrayInfo);
                      
                      $loginInfo = $this->session->all_userdata();
                      
                      $this->users->update_login_info($loginInfo['user_id'], $loginInfo['ip_address'], gmdate("Y-d-m H:i:s", $loginInfo['last_activity']));
                      
					 
					  if( isset( $loginInfo['activated'] ) && $loginInfo['activated'] == 0){
					  	
						$error['error'] = TRUE;
                    	$error['msg'] = 'Please check your email box:<br/> An activation link was sent to you via this email address <strong>'.$loginInfo['email'].'</strong > ';
                    	$error['msg'] .= 'provided when the account was created,<br/> OR go to <a href="'.base_url().'activation_code/">Activate My Account Now</a> to resend the link';
						
					  }else{
					  	redirect(base_url().'profile');
					  }
					  //exit;
                      // redirect(base_url().'welcome');
                      
                      
                  } else{
                     
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Password';
                      
                  }
              
              } else {
                
                  $subject = $post['username_email'];
                  $result =  strrchr($subject,"@");
                  
                  if( !empty($result) ){//email
                  
                       $error['error'] = TRUE;
                       $error['msg'] = 'The Email Address: <strong>'.$post['username_email'].'</strong> does not exist.<br/>Please try again.';
                      
                  }else{
                    
                      $error['error'] = TRUE;
                      $error['msg'] = 'The Username provided: <strong>'.$post['username_email'].'</strong> does not exist.<br/>Please try again.';
                  }
              
              }   
               
               if($error !== FALSE){
               
                   $this->session->set_flashdata($error);
                   redirect(base_url().'login');
               
               }
           
           
           }else{
                
                $this->session->set_flashdata($error);
                redirect(base_url().'login');
           
           }
            
            
        }else{
        
            redirect(base_url().'register');
        }
      //  echo '<pre>'; print_r($post); echo '</pre>'; 
    
    }
    
    
}

/* End of file Ajax_social.php */
<<<<<<< HEAD
/* Location: ./application/controllers/Ajax_social.php */
=======
/* Location: ./application/controllers/Ajax_social.php */
>>>>>>> 6b2ba8a060749817280d6185d1d7dda3f0659d2f
