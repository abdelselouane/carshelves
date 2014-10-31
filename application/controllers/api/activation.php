<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activation extends CI_Controller {

	private $AppToken = 'qJB0rGtIn5UB1xG03efyCp10xP3wqM01';
	
	public function index(){
		$this->load->view('API_VIEW/activation');
		
		/*$error['error'] = TRUE;
        $error['msg'] = 'Sorry, you need to specify what function you are looking for to get an answer back.';
		
		$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
		print_r($result);  exit;*/
	}
	
	function activate($userId, $digit_code){
		
		if( isset($userId) && !empty($userId) ){
			
			$user_info = $this->users->get_user_by_id($userId);
			//echo '<pre>'; print_r($user_info); echo '</pre>';exit;
			
			if( is_object($user_info) && !empty($user_info)){
					
				if(!empty($user_info->code_digits)){
						
					if($user_info->code_digits == $digit_code){
						$this->users->activate_user($userId, $digit_code, FALSE);
						
						$error['success'] = TRUE;
                    	$error['msg']   = 'Your account has been activated';
						
						$result = json_encode(array("status"=>1, "message"=>'action succeed', "data"=>$error));
				   		print_r($result);  exit;
						
					}
				
				}else{
					$error['success'] = FALSE;
                	$error['msg']   = 'This account was already activated';
					
					$result = json_encode(array("status"=>0, "message"=>'action failed', "data"=>$error));
			   		print_r($result);  exit;
				}
				
			}else{
				
				$error['success'] = FALSE;
            	$error['msg']   = 'This user account does not exist. Please try again';
				
				$result = json_encode(array("status"=>0, "message"=>'action failed', "data"=>$error));
		   		print_r($result);  exit;
			}
			
		}
	}
}