<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
        $info = array();
        
        $loginInfo = $this->session->all_userdata();
       //echo '<pre>'; print_r($loginInfo); echo '</pre>';exit;

        if(isset($loginInfo['user_id']) && !empty($loginInfo['user_id'])){

            $info['user_id']    = $loginInfo['user_id'];
            $info['username']   = $loginInfo['username'];
            $info['email']      = $loginInfo['email'];

        }


        $info['title']   = 'Home';
        $info['page']    = 'home';

        $this->template->load('template/main', 'pages/home', $info);
		
	}
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
