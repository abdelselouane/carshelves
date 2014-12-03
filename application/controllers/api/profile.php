<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
    private $AppToken = '';
    
   function __construct(){
        parent::__construct();
        
        $token = $this->token->getTokenByApp('MobileIosAppToken');
        $this->AppToken =  $token->token;
       
        $newdata = array(
                   'display_name' => 'John Doe',
                   'username'  => 'johndoe12',
                   'email'     => 'johndoe@some-site.com',
                   'logged_in' => TRUE
               );

       $this->session->set_userdata($newdata);
    }
    
	public function index()
	{
        
        
        $data = $this->session->all_userdata();
        //echo '<pre>'; print_r($session); echo '</pre>';exit;
        $data['AppToken'] = $this->AppToken;
        $this->load->view('API_VIEW/profile_login', $data);
		
	}
    
    public function profile_personal()
	{
        $data['AppToken'] = $this->AppToken;
        $this->load->view('API_VIEW/profile_personal', $data);
		
	}
    
    public function profile_contact()
	{
        $data['AppToken'] = $this->AppToken;
        $this->load->view('API_VIEW/profile_contact', $data);
		
	}
    
    public function profile_social()
	{
        $data['AppToken'] = $this->AppToken;
        $this->load->view('API_VIEW/profile_social', $data);
		
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
				
                /** No Code treating ANDROID APP yet **/
                
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

	public function getTerms(){
		
		$terms = $this->token->getTerms(1);
		$result = array("terms"=>$terms->terms);
		print_r($result);  exit;
	}
	
}

