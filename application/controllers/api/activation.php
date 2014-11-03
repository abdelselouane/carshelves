<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activation extends CI_Controller {

	private $AppToken = 'qJB0rGtIn5UB1xG03efyCp10xP3wqM01';
	//private Appoken = array()
    
   // function __construct(){
       // parent::__construct();
        
       
       // $this->AppToken =  $this->token->getTokenByApp('MobileIosAppToken');
    //}
    
	public function index(){
		$this->load->view('API_VIEW/activation');
		
        
        
		/*$error['error'] = TRUE;
        $error['msg'] = 'Sorry, you need to specify what function you are looking for to get an answer back.';
		
		$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
		print_r($result);  exit;*/
	}
	
	function activate(){
        
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
                        
						$this->users->activate_user($user_info->id, $post['digit_code'], FALSE);
						
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
