<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activation extends CI_Controller {

	private $AppToken = '';
    
   function __construct(){
        parent::__construct();
        
        $token = $this->token->getTokenByApp('MobileIosAppToken');
        $this->AppToken =  $token->token;
    }
    
	public function index(){
        $data['AppToken'] = $this->AppToken;
		$this->load->view('API_VIEW/activation', $data);
	}
	
	function activate(){
        
        $post = $this->input->post();
        
        
       // echo '<pre>'; print_r($token); echo '</pre>';exit;
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
        
		//echo '<pre>'; print_r($post); echo '</pre>';exit;
		if( isset($post) && !empty($post) ){
            
            $error['error'] = FALSE;
            
            
            if($post['digit_code'] == ''){
            
                $error['error'] = TRUE;
	            $error['msg'] = 'Please provide the Activation Code received in your email.';
				
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
            
            }
			
			$user_info = $this->users->get_user_by_codeDigits($post['digit_code']);
			//echo '<pre>'; print_r($user_info); echo '</pre>';exit;
			
			if( is_object($user_info) && !empty($user_info)){
					
				if(!empty($user_info->code_digits)){
						
					if($user_info->code_digits == $post['digit_code']){
                        
						$this->users->activateUser($user_info->id);
                        
                        /* Create Profile For an active account */
                        
                        $this->profile_model->create_profile($user_info->id);
                        
                        /****************************************/
						
						$error['success'] = TRUE;
                    	$error['msg']   = 'Your account has been activated';
						
						$result = json_encode(array("status"=>1, "message"=>'action succeed', "data"=>$error));
				   		print_r($result);  exit;
						
					}
				
				}else{
					$error['error'] = TRUE;
                	$error['msg']   = 'This account was already activated';
					
					$result = json_encode(array("status"=>0, "message"=>'action failed', "data"=>$error));
			   		print_r($result);  exit;
				}
				
			}else{
				
				$error['error'] = TRUE;
            	$error['msg']   = 'This user account does not exist or was already activated. Please try again';
				
				$result = json_encode(array("status"=>0, "message"=>'action failed', "data"=>$error));
		   		print_r($result);  exit;
			}
			
		}
	}
}
