<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller
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

        if(!isset($loginInfo['user_id']) && !empty($loginInfo['user_id'])){

            $info['user_id']    = $loginInfo['user_id'];
            $info['username']   = $loginInfo['username'];
            $info['email']      = $loginInfo['email'];

        }
             
         $info['success'] = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '' ;
         $info['error'] = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
         $info['msg']   = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
         $info['username'] = ($this->session->flashdata('username')) ? $this->session->flashdata('username') : '';
         $info['email']   = ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '';

         $info['title']   = 'User Registration';
         $info['page']    = 'register'; 

         $this->template->load('template/main', 'pages/register', $info);
        
	}
	
	function completeRegistration(){
		
		 $info = array();
        
        $loginInfo = $this->session->all_userdata();
        //echo '<pre>'; print_r($loginInfo); echo '</pre>';exit;

        if(isset($loginInfo['user_id']) && !empty($loginInfo['user_id'])){

            $info['user_id']    = $loginInfo['user_id'];
            $info['username']   = $loginInfo['username'];
            $info['email']      = $loginInfo['email'];

        }
		
		 $info['success'] = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '' ;
         $info['error'] = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
         $info['msg']   = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
         $info['username'] = ($this->session->flashdata('username')) ? $this->session->flashdata('username') : '';
         $info['email']   = ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '';
		
		 $info['title']   = 'Complete Registration';
         $info['page']    = 'complete_registration'; 

         $this->template->load('template/main', 'pages/complete_registration', $info);
	}

	function completeRegisterUser(){
		
		 $post = $this->input->post();
		if(is_array($post) && !empty($post)){
            
            $error = Array();
            $error['error'] = FALSE;
            
            if(isset($post['terms']) && $post['terms'] === 'on'){
                
                if( $post['username'] === '' ){
                    
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Username';
                    
                }else if( $post['password'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Password';
                    
                    
                }else if($post['cpassword'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please confirm your password';
                    
                    
                }else if ($post['password'] !== $post['cpassword']){
                   
                    $error['error'] = TRUE;
                    $error['msg'] = 'The <strong>Password</strong> and <strong>Confirm Password</strong> fields are not matching.<br/>Please try again';
                   
                    
                }else{
                   
                   $username_available = $this->users->is_username_available($post['username']);
                    
                   
                    if($username_available !== 0){
                        
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Username provided: <strong>'.$post['username'].'</strong> already exist.<br/>Please try again.';
                        
                    }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['username'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Username provided: <strong>'.$post['username'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
Letters, numbers, underscore only<br/>';
                    }
                    
                    if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['password'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Password provided: <strong>'.$post['password'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
Letters, numbers, underscore only<br/>';
                    }
                    
                }
                
            }else{
                
               $error['error'] = TRUE;
               $error['msg'] = 'Please accept our Terms & Conditions to complete your registration';
               
                
            }
              
            if($error['error'] === FALSE){                
                 
                 unset($post['cpassword']);
                 unset($post['terms']);
                
                foreach ($post as $key=>$value) {
                   $post[$key] = mysql_real_escape_string($value);
                }
                
                $post['password'] = encryptIt( $post['password'] );
				
				/********Already Created Token *********/
				// $post['token']	=  rand_string(32);
                // $post['token'] =  encryptIt($tokenString); 
				/********				*******/
				$info = $this->session->all_userdata();
                //$user_id = $this->users->create_user($post, FALSE);
                $this->users->updateUserInfo($info['user_id'], $post);
				//exit;
                $userInfo =  $this->users->get_user_by_id($user_id, FALSE);
				
				
				$this->email->from('support@carshelves.com', 'Carshelves.com');
                $this->email->to($userInfo->email); 
                //$this->email->cc('another@another-example.com'); 
                //$this->email->bcc('them@their-example.com'); 

                $this->email->subject('Welcome to Carshelves.com');
				
				/***************************/
				$message = "";
				$message .= "Welcome to Carshelves,<br> Please click on this link to activate your account <a href='".base_url()."login' >Login To Your Account</a>.<br/>";
				$message .= "Best Regards,<br> Carshelves.com Team";
				/***************************/
				//echo $message;
                $this->email->message($message);	

                $this->email->send();

                //echo $this->email->print_debugger();exit;
                $error['success'] = TRUE;
                $error['msg']   = '<strong>Welcoming Email:</strong><br/> was sent to your email address. Please Login and start using your account.';
               // echo '<pre>'; print_r($error); echo '<pre/>'; exit;
                $this->session->set_flashdata($error);    
                redirect(base_url().'login');
				
               
                
            }
				$this->session->set_flashdata($error);
             	redirect(base_url().'register/completeRegistration');
				            
             
    }else{
    			$error['error'] = TRUE;
                $error['msg']   = 'All field are required, please try again.';
    			$this->session->set_flashdata($error);
             	redirect(base_url().'completeRegistration');
    }
}
     
    
    function registerUser(){
        
        
        $post = $this->input->post();
            
        if(is_array($post) && !empty($post)){
            
            $error = Array();
            $error['error'] = FALSE;
            
            if(isset($post['terms']) && $post['terms'] === 'on'){
                
                if( $post['username'] === '' ){
                    
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Username';
                    
                }else if( $post['email'] === '' ){
                    
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Email';
                    
                }else if( $post['password'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Password';
                    
                    
                }else if($post['cpassword'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please confirm your password';
                    
                    
                }else if ($post['password'] !== $post['cpassword']){
                   
                    $error['error'] = TRUE;
                    $error['msg'] = 'The <strong>Password</strong> and <strong>Confirm Password</strong> fields are not matching.<br/>Please try again';
                   
                    
                }else{
                   
                   $username_available = $this->users->is_username_available($post['username']);
                   $email_available = $this->users->is_email_available($post['email']);
                    
                   
                    if($username_available !== 0){
                        
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Username provided: <strong>'.$post['username'].'</strong> already exist.<br/>Please try again.';
                        
                    }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['username'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Username provided: <strong>'.$post['username'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
Letters, numbers, underscore only<br/>';
                    }
                    
                    if($email_available !== 0){
                    
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Email Address: <strong>'.$post['email'].'</strong> already exist.<br/>Please try again.';
                         
                        
                    }else if( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) ) {
                         $error['error'] = TRUE;
                         $error['msg'] = 'The Email Address: <strong>'.$post['email'].'</strong> is not valid.<br/>Please try again.';
                        
                    }
                    
                    if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['password'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                        $error['error'] = TRUE;
                        $error['msg'] = 'The Password provided: <strong>'.$post['password'].'</strong> not valid.<br/>Please try again.<br/> Must start with letter<br/>6-32 characters<br/>
Letters, numbers, underscore only<br/>';
                    }
                    
                }
                
            }else{
                
               $error['error'] = TRUE;
               $error['msg'] = 'Please accept our Terms & Conditions to create a new account';
               
                
            }
            
            if($error['error'] === FALSE){
            
                $error['success'] = TRUE;
                $error['msg'] = ' Welcome to <strong>CarShelves.com</strong> <br/> Your account has been set. <br/> You will be receiving an <strong>Activation Email</strong> soon. <br/> Please check your Email box for a direct link to the <strong>Account Activation</strong>.';
                
                 
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
                
                
                
            }
            
            $error['username'] = $post['username'];
            $error['email'] = $post['email'];    
            
             $this->session->set_flashdata($error);
             redirect(base_url().'register');
        
        }else{
          redirect(base_url().'register');
        }
        
    
    }
    
    function activate($activation_code = ''){
       $error = Array();
       $error['error'] = FALSE;
       // $post = $this->input->post();
       // echo '<pre>'; print_r($post); echo '</pre>'; exit;
        
         if(!empty($activation_code) && isset($activation_code)){
                //echo $activation_code;exit;
             
             
                $activate = encryptIt($activation_code);
               // echo $activate.'<br/>';
                $userInfo = $this->users->get_users_by_activation_code($activation_code);
                //echo '<pre>'; print_r($userInfo); echo '</pre>'; exit;
             
             
                if(!empty($userInfo) && is_object($userInfo)){
                    if( $activate === $userInfo->new_password_key ){
                        
                      $user_id = $userInfo->id;
                      $this->users->activate($user_id);
                     
                        $this->email->from('support@carshelves.com', 'Carshelves.com');
                        $this->email->to($post['email']); 
                        //$this->email->cc('another@another-example.com'); 
                        //$this->email->bcc('them@their-example.com'); 

                        $this->email->subject('Password Changed');
                        $this->email->message(' Your account is activated, <a href="'.base_url().'login">Login Now</a>');	

                        $this->email->send();

                        //echo $this->email->print_debugger();
                        
                        $error['success'] = TRUE;
                        $error['msg'] = 'The <strong>Congratulations your Account is already activated</strong><br/> <a href="'.base_url().'login">Login Now</a>';
                         //redirect(base_url().'register');
                    
                    }else{
                        // activation code not valid
                        $error['error'] = TRUE;
                        $error['msg'] = 'The <strong>Activation Code</strong> is not valid.<br/> <a href="'.base_url().'activation_code">Resend a <strong>NEW</strong> Activation Code</a>';
                        //redirect(base_url().'register');
                    }
                }else{
                    // activation code not valid
                     $error['error'] = TRUE;
                     $error['msg'] = 'The <strong>Activation Code</strong> is not valid.<br/> <a href="'.base_url().'activation_code">Resend a <strong>NEW</strong> Activation Code</a>';
                    //redirect(base_url().'register');
                }
                        
            }else{

                // activation code not valid
                $error['error'] = TRUE;
                $error['msg'] = 'The URL with an <strong>Activation Code</strong> is required.<br/>Please check your email box and try again.<br/> <a href="'.base_url().'activation_code">Resend a <strong>NEW</strong> Activation Code</a>';
                //redirect(base_url().'register');
            }
                       
                    
            $this->session->set_flashdata($error);        
            redirect(base_url().'register');  
        
    }
    
}

/* End of file register.php */
/* Location: ./application/controllers/register.php */
