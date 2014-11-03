<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		/*if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {*/
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
           
            $info = array();
            $info['error'] = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
            $info['msg']   = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
            $info['email'] = ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '';
            $info['success'] = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '';
            //echo '<pre>'; print_r($info); echo '</pre>';exit;
            $info['title']   = 'Forgot Password';
            $info['page']    = 'forgot_password';
        
            $this->template->load('template/main', 'pages/forgot_password', $info);
		//}
	}
    
    function forgot(){
    
        $post = $this->input->post();
        
        if(is_array($post) && !empty($post)){
            $error['error'] = FALSE;
            
            $email_available = $this->users->is_email_available($post['email']);
                
                if($post['email'] === ''){
                     $error['error'] = TRUE;
                     $error['msg'] = 'Please enter an <strong>Email A`ddress</strong>';
            
                }else if( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) ) {
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: <strong>'.$post['email'].'</strong> is not valid.<br/>Please try again.';
                    
                }else if($email_available === 0){
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: <strong>'.$post['email'].'</strong> does not exist.<br/>Please try again.';
                }
            
            if($error['error'] === FALSE){
                    
                    $userInfo = $this->users->get_user_by_email($post['email']);
                
                   // echo '<pre>'; print_r($userInfo); echo '</pre>';
                    
                    $resetString    =  rand_string(16);
                   // $resetCode      =  encryptIt($resetString); 
                    
                    $this->users->resetPasswordCode($userInfo->id, $resetString);
                    
                   // exit;
                
                    $this->email->from('support@carshelves.com', 'Carshelves.com');
                    $this->email->to($post['email']); 
                    //$this->email->cc('another@another-example.com'); 
                    //$this->email->bcc('them@their-example.com'); 

                    $this->email->subject('Reset Your Password Link');
					$message = '<a href="'.base_url().'reset_password/index/'.$userInfo->id.'/'.$resetString.'">Reset Password</a>';
                    $this->email->message($message);	

                    $this->email->send();

                    //echo $this->email->print_debugger();
                
                    $error['success'] = TRUE;
                    $error['msg'] = 'An email was sent to <strong>'.$post['email'].'</strong> with a <strong>Reset Password Link</strong>';
                    $error['email'] = $post['email'];
                    $this->session->set_flashdata($error);
                    redirect(base_url().'forgot_password');
            }else{
                
                $error['email'] = $post['email'];
                $this->session->set_flashdata($error);
                redirect(base_url().'forgot_password');
            
            }
            
           // echo '<pre>'; print_r($error); echo '</pre>'; exit;
        }
    
    }
    
    function reset($reset_code = ''){
        
        if(isset($reset_code) && !empty($reset_code)){
         
            $userInfo = $this->users->get_user_by_reset_code($reset_code);
            // echo '<pre>'; print_r($userInfo); echo '</pre>';
               //exit;
            if(!empty($userInfo) && is_object($userInfo)){
                
               // echo '<pre>'; print_r($userInfo); echo '</pre>';
               //exit;
                $error['error'] = FALSE;
                $error['msg']   = '';
                $error['user_id'] = $userInfo->id;
               // echo '<pre>'; print_r($error); echo '</pre>';exit;
                $this->session->set_flashdata($error);
                redirect(base_url().'reset_password');
            }else{
                $error['error'] = TRUE;
                $error['msg']   = '<strong>Activation Error:</strong><br/>The <strong>Activation Code</strong> is not valid.';
                $this->session->set_flashdata($error);
                redirect(base_url().'forgot_password');
            }
                    
        }else{
            redirect(base_url().'forgot_password');
        }
           
    }
    
    
}

/* End of file forgot_password.php */
/* Location: ./application/controllers/forgot_password.php */
