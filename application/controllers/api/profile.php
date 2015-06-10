<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
    private $AppToken = '';
    private $user = '';
    
   function __construct(){
        parent::__construct();
        
        $token = $this->token->getTokenByApp('MobileIosAppToken');
        $this->AppToken =  $token->token;
        
    }
    
	public function _index()
	{   
        $data = $this->session->all_userdata();
        $data['AppToken'] = $this->AppToken;
        
        //echo '<pre>'; print_r($data); echo '</pre>'; exit;
   
        if( !isset($data['user_id']) || empty($data['user_id'])){
            $data['alert'] = 'alert-danger';
            $data['alert_msg'] = 'Please log-in first to access the profile navigation menu';
            $this->load->view('API_VIEW/login', $data);
        }else{
            $this->user['id'] = $data['user_id'];
            $this->load->view('API_VIEW/profile_login', $data);
        }
        
        
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
	
}

