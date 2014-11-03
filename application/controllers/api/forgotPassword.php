<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{

    private $AppToken = 'qJB0rGtIn5UB1xG03efyCp10xP3wqM01';
    
	function index()
	{
        $this->load->view('API_VIEW/forgotPassword');
    }
    
    function checkEmail(){
    
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
        
        if(is_array($post) && !empty($post)){
            
            $error['error'] = FALSE;
                
                if($post['email'] === ''){
                     $error['error'] = TRUE;
                     $error['msg'] = 'Please enter an Email Address';
                    
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
            
                }else if( !filter_var($post['email'], FILTER_VALIDATE_EMAIL) ) {
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: '.$post['email'].' is not valid. Please try again.';
                    
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
                    
                }
            
                $email_available = $this->users->is_email_available($post['email']);
            
                if($email_available === 0){
                    
                     $error['error'] = TRUE;
                     $error['msg'] = 'The Email Address: '.$post['email'].' does not exist.<br/>Please try again.';
                    
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
                }
           
            if($error['error'] === FALSE){
                    
                    $userInfo = $this->users->get_user_by_email($post['email']);
                
                   // echo '<pre>'; print_r($userInfo); echo '</pre>';
                   // exit;
                    $resetString    =  rand_string(16);
                    $this->users->resetPasswordCode($userInfo->id, $resetString);
                    
                  // exit;
                
                    $this->email->from('support@carshelves.com', 'Carshelves.com');
                    $this->email->to($post['email']); 
                    //$this->email->cc('another@another-example.com'); 
                    //$this->email->bcc('them@their-example.com'); 

                    $this->email->subject('Reset Your Password Link');
					$message = 'Here is your temporary reset code : '.$userInfo->new_password_key;
                    $this->email->message($message);	

                    $this->email->send();

                    //echo $this->email->print_debugger();
                
                    $error['success'] = TRUE;
                    $error['msg'] = 'An email was sent to '.$post['email'].' with a Reset Code';
                
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
                  
            }
        }
    
    }
    
    function resetCode(){
        
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
        
        if(is_array($post) && !empty($post)){
         
            $error['error'] = FALSE;
                
                if($post['resetCode'] === ''){
                     $error['error'] = TRUE;
                     $error['msg'] = 'Please enter the Reset Code received in your Address';
                    
                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				    print_r($result);  exit;
            
                }
            
                $resetFlag = $this->users->checkResetCode($post['resetCode']);
            
                if(!$resetFlag){
                    $error['error'] = TRUE;
                    $error['msg'] = 'The Reset Code: '.$post['resetCode'].' is not valid. Please try again.';

                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
                    print_r($result);  exit;
                }
            
                if( $post['password'] === '' ){
                
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
                   
                    
                }else if(!preg_match('/^[A-Za-z][A-Za-z0-9_]{6,30}$/', $post['password'])){//^[a-zA-Z0-9][a-zA-Z0-9_]{2,29}$
                         
                    $error['error'] = TRUE;
                    $error['msg'] = 'The Password provided: '.$post['password'].' not valid. Please try again. Must start with letter 6-32 characters
Letters, numbers, underscore only';

                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
                    print_r($result);  exit;
                    
                }
            
                echo 'exit';
                exit;
            
            if($error['error'] === FALSE){
                
                
                
                
                $userInfo = $this->users->get_user_by_reset_code($post['reset_code']);
            }
        }
        
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
