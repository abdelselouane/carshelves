<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		$info = array();
        
        $loginInfo = $this->session->all_userdata();
      // echo '<pre>'; print_r($loginInfo); echo '</pre>';exit;

        if(isset($loginInfo['user_id']) && !empty($loginInfo['user_id'])){
            //********************/check if account is active before permission/****************/
            $info['user_id']    = $loginInfo['user_id'];
            $info['username']   = $loginInfo['username'];
            $info['email']      = $loginInfo['email'];

        }
        
        $info['success'] = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '';
        $info['error'] = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
        $info['msg']   = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
        $info['username_email'] = ($this->session->flashdata('username')) ? $this->session->flashdata('username_email') : '';

        $info['title']   = 'User Profile';
        $info['page']    = 'Profile';

        $this->template->load('template/main', 'pages/profile', $info);
		//}
	}
    
    
    
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */