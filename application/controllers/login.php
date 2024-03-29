<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
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
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'welcome');
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

/* End of file login.php */
/* Location: ./application/controllers/login.php */
