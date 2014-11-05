<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AppToken extends CI_Controller {
	
	public function index()
	{
		 $this->load->view('API_VIEW/appToken');
		
	}

	public function getToken()
	{
		 $post = $this->input->post();
		 
		
		if( isset($post['appToken']) && !empty($post['appToken']) ){
		
		//echo '<pre>'; print_r($post); echo '</pre>';exit;
			
			$token = $this->token->getTokenByApp($post['appToken']);
		
		//echo '<pre>'; print_r($post); echo '</pre>';exit;
		
			if(is_object($token) && !empty($token)){
				
				$result = json_encode(array("status"=>1, "message"=>"action succeed", "data"=>$token));
				print_r($result);  exit;
				
			}else{
				
				$error['error'] = TRUE;
		        $error['msg'] = 'The App Token is not available. Please try again.';
					
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
				
			}
		}else{
				$error['error'] = TRUE;
		        $error['msg'] = 'The App Token is not available. Please try again.';
					
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
		}
        
	}

	public function formToken(){
		
		$this->load->view('API_VIEW/formToken');
		
	}
	
	public function generateToken(){
		
		$post = $this->input->post();
		
		if( isset($post) && !empty($post) ){
		
			if($post['appToken']){
				
				$name		= $post['appToken'];
				$newToken	= rand_string(32);
				
				$this->token->setTokenByname($name, $newToken);
				
				$error['success'] = TRUE;
		        $error['msg'] = 'The Token for the APP: '.$name.' has been change successfuly.';
				
				$result = json_encode(array("status"=>1, "message"=>"action succeed", "data"=>$error));
				print_r($result);  exit;
				
			}else{
				
				$error['error'] = TRUE;
		        $error['msg'] = 'The App Token is not available. Please try again.';
					
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
				
			}
		}else{
				$error['error'] = TRUE;
		        $error['msg'] = 'The POST data has an issue. Please fix the issue first.';
					
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
				print_r($result);  exit;
		}	
	}
	
}

