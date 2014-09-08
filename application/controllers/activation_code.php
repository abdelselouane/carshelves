<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Activation_code extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		    $info = array();
            $info['error'] = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
            $info['msg']   = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
            $info['email'] = ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '';
            $info['success'] = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '';
            //echo '<pre>'; print_r($info); echo '</pre>';exit;
            $info['title']   = 'Resend Activation Code';
            $info['page']    = 'activation_code';
        
            $this->template->load('template/main', 'pages/activation_code', $info);
	}
    
	
	function activate($user_id, $digits_code){
		
		if( isset($user_id) && isset($digits_code) ){
			
			$userinfo = $this->users->get_users_by_activation_code($digits_code);
			
			if($userinfo->id === $user_id){
				$this->users->activate_user($userinfo->id, $digits_code, FALSE);
			}else{
				$redirect =  site_url("welcome");
				redirect($redirect, 'refresh');
			}
			
			//echo '<pre>'; print_r($userinfo); echo '</pre>'; exit;
		}else{
			$redirect =  site_url("welcome");
			redirect($redirect, 'refresh');
		}
		
	}
	
	
    function resend_code(){
        $error = Array();
        $error['error'] = FALSE;
    
        $post = $this->input->post();
        if(!empty($post) && is_array($post)){
            
            
            if( $post['email'] === ''){
            
                 $error['error'] = TRUE;
                 $error['msg'] = 'The Email is not valid.<br/>Please try again.';
                
            }else if( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) ) {
                
                 $error['error'] = TRUE;
                 $error['msg'] = 'The Email Address: <strong>'.$post['email'].'</strong> is not valid.<br/>Please try again.';

            }else{
                
                $userInfo =  $this->users->get_user_by_email($post['email']);
            
                if(!empty($userInfo) && is_object($userInfo)){
                    
                      $active = $userInfo->activated;
                      if( $active != 1 ){
                      
                            $resetString    =  rand_string(16);
                            $resetCode      =  encryptIt($resetString); 
                    
                            $this->users->resetPasswordCode($userInfo->id, $resetCode, $resetString);
                            
                            /***************************/
                            // Send Email with an activation LInk = base_url().'register/activate/abcd123'
                            $this->email->from('office@carshelves.com', 'Carshelves.com');
                            $this->email->to($post['email']); 
                            //$this->email->cc('another@another-example.com'); 
                            //$this->email->bcc('them@their-example.com'); 

                            $this->email->subject('Password Changed');
                            $this->email->message('<a href="'.base_url().'login">Login Now</a>');	

                            $this->email->send();

                            //echo $this->email->print_debugger();
                            /****************************/
                          
                          
                              $error['success'] = TRUE;
                              $error['msg']   = 'A new <strong>Activation Code</strong> was sent to <strong>'.$post['email'].'</strong>. <br/><a href="'.base_url().'login">Login Now</a>';
                          
                      }else{
                          
                        $error['error'] = TRUE;
                        $error['msg']   = 'This <strong>account</strong> is already activated. <br/><a href="'.base_url().'login">Login Now</a>';
                        
                      }  
                    
                    //echo '<pre>'; print_r($userInfo); echo '</pre>';
                    //exit;
                
                }else{
                    
                    $error['error'] = TRUE;
                    $error['msg']   = 'This email address : <strong>'.$post['email'].'</strong> does not exist.<br/> Please register with us <a href="'.base_url().'register">Register Now</a>';
                
                }
                
               
            }    
            
        }else{
            $error['error'] = TRUE;
            $error['msg']   = 'The <strong>Email Address</strong> is required to send a new Activation Code';
        }
        
        $this->session->set_flashdata($error);
        redirect(base_url().'activation_code');
    
    }
    
}

/* End of file activation_code.php */
/* Location: ./application/controllers/activation_code.php */