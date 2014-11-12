<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ResetCode extends CI_Controller
{

    private $AppToken = '';
    
   function __construct(){
        parent::__construct();
        
        $token = $this->token->getTokenByApp('MobileIosAppToken');
        $this->AppToken =  $token->token;
    }
    
	function index()
	{
        $data['AppToken'] = $this->AppToken;
        $this->load->view('API_VIEW/resetCode', $data);
    }
    
    function resetPassword(){
        
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
                     $error['msg'] = 'Please enter the Reset Code received in your EMAIL address';
                    
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
                    $error['msg'] = 'The Password provided is not valid. Please try again. Must start with letter 6-32 characters
Letters, numbers, underscore only';

                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
                    print_r($result);  exit;
                    
                }
            
                
            if($error['error'] === FALSE){
                
                $userInfo = $this->users->get_user_by_reset_code($post['resetCode']);
                
                if(is_object($userInfo) && !empty($userInfo)){
                    
                    $post['password'] = encryptIt( $post['password'] );
                    
                    $this->users->reset_password($userInfo->id, $post['password']);
                    
                    $this->email->from('support@carshelves.com', 'Carshelves.com');
                    $this->email->to($userInfo->email); 
                    //$this->email->cc('another@another-example.com'); 
                    //$this->email->bcc('them@their-example.com'); 

                    $this->email->subject('Account Activation - Carshelves.com');

                    /***************************/
                    $message = "Your password has been reset successfully";
                    /***************************/

                    $this->email->message($message);
                    $this->email->send();
                    
                    $error['success'] = TRUE;
                    $error['msg'] = 'Your password has been reset successfully.';

                    $result = json_encode(array("status"=>1, "message"=>"action success", "data"=>$error));
                    print_r($result);  exit;
                
                }else{
                    $error['error'] = TRUE;
                    $error['msg'] = 'The Reset Code provided is not attached to any account. Please try again.';

                    $result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
                    print_r($result);  exit;
                }
                
                
                
               // echo '<pre>'; print_r($userInfo); echo '</pre>'; exit;
            }
        }
        
        
           
    }
    
    
}

/* End of file forgot_password.php */
/* Location: ./application/controllers/forgot_password.php */
