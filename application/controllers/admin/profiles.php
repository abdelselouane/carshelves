<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profiles extends CI_Controller
{

	private $AppToken = '';
    
   function __construct(){
        parent::__construct();
        
        $token = $this->token->getTokenByApp('MobileIosAppToken');
        $this->AppToken =  $token->token;
    }
    
	public function index(){
        $data['result'] = $this->profile_model->get_profiles();
        $data['AppToken'] = $this->AppToken;
        
       
		$this->load->view('admin/profiles', $data);
		
        
        
		/*$error['error'] = TRUE;
        $error['msg'] = 'Sorry, you need to specify what function you are looking for to get an answer back.';
		
		$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$error));
		print_r($result);  exit;*/
	}
    
    
}

/* End of file admin/dashboard.php */
/* Location: ./application/controllers/ admindashboard.php */
