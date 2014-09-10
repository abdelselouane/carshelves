<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reset_password extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index($user_id ='', $resetCode = '')
	{
		
		
		 // echo '<pre>'; print_r($post); echo '</pre>'; exit;
		if(( isset($user_id) && $user_id !='' ) && ( isset($resetCode) && $resetCode != '' )){
			$checkCode = $this->checkResetCode($user_id, $resetCode);
		
			if($checkCode){
				
	            $info = array();
	            $info['user_id']    = $user_id; //($this->session->flashdata('user_id')) ? $this->session->flashdata('user_id') : '';
	            $info['error']      = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
	            $info['success']    = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '';
	            $info['msg']        = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
	       
	            $info['title']   = 'Reset Password';
	            $info['page']    = 'reset_password';
	        
	            $this->template->load('template/main', 'pages/reset_password', $info);
			}else{
				
				$msg['error']	= TRUE;
				$msg['msg']		= "There was a missing data from the <strong>Reset Password Link</strong>. Please try again.";
				$this->session->set_flashdata($msg);
				redirect(base_url().'forgot_password');
			}
			
		}else{
			
			$msg['error']	= TRUE;
			$msg['msg']		= "There was a missing data from the <strong>Reset Password Link</strong>. Please try again.";
			$this->session->set_flashdata($msg);
			redirect(base_url().'forgot_password');
			
		}
		
	}
	
	function checkResetCode($user_id ='', $resetCode = ''){
		
		//echo $user_id; echo '<br>'; echo $resetCode;
		
		$userData = $this->users->get_user_by_id($user_id);
		
		
		if( is_object($userData) && !empty($userData) ){
			
			//echo '<pre>'; print_r($userData); echo '</pre>';
			
			if(isset($userData->code_digits) && $userData->code_digits != ''){
				
				if($userData->code_digits == $resetCode){
					$this->users->clearCodeDigits($userData->id);
					
					return TRUE;
					//redirect(base_url().'reset_password/index/'.$userData->id.'/'.$userData->code_digits);
				}else{
					$msg['error']	= TRUE;
					$msg['msg']		= "There was an ERROR on <strong>Reset Password Link</strong>. The reset code provided was incorrect. Please try again.";
					$this->session->set_flashdata($msg);
					redirect(base_url().'forgot_password');
				}
				
				
			}else{
				
				$msg['error']	= TRUE;
				$msg['msg']		= "There was an ERROR on <strong>Reset Password Link</strong>. The User does not have a Reset Code. Please try again.";
				$this->session->set_flashdata($msg);
				redirect(base_url().'forgot_password');
				
			}
		}else{
			
			$msg['error']	= TRUE;
			$msg['msg']		= "There was an ERROR on <strong>Reset Password Link</strong>. The User does not exist. Please try again.";
			$this->session->set_flashdata($msg);
			redirect(base_url().'forgot_password');
			
		}
		exit;
		
	}
    
    function reset(){
    
        $post = $this->input->post();
       // echo '<pre>'; print_r($post); echo '</pre>'; exit;
        
        if(!empty($post) && is_array($post)){
        
                if( $post['password'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Password';
                    
                    
                }else if($post['cpassword'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please confirm your password';
                    
                    
                }else if ($post['password'] !== $post['cpassword']){
                   
                    $error['error'] = TRUE;
                    $error['msg'] = 'The <strong>Password</strong> and <strong>Confirm Password</strong> fields are not matching.<br/>Please try again';
                   
                    
                }else{
                    
                    $new_pass = encryptIt($post['password']);
                    $user_id = $post['user_id'];
                    $this->users->reset_password($user_id, $new_pass);
					
                    $this->email->from('support@carshelves.com', 'Carshelves.com');
                    $this->email->to($post['email']); 
                    //$this->email->cc('another@another-example.com'); 
                    //$this->email->bcc('them@their-example.com'); 

                    $this->email->subject('Your Password has been hanged');
					$message = '<a href="'.base_url().'login">Login Now</a>';
                    $this->email->message($message);	

                    $this->email->send();

                    //echo $this->email->print_debugger();                    
                    $error['success'] = TRUE;
                    $error['msg'] = 'The <strong>Password</strong> has been changed successfully.<br/> <a href="'.base_url().'login">Login Now</a>';
                	
                }
            
            $this->session->set_flashdata($error);
            //echo '<pre>'; print_r($error); echo '</pre>';
            redirect(base_url().'forgot_password');
        
        }
        redirect(base_url().'forgot_password');
    }
    
    
}

/* End of file reset_password.php */
/* Location: ./application/controllers/reset_password.php */