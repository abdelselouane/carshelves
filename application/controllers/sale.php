<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
        $this->load->library('template');
	}

	function index()
	{
		/*if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {*/
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
           
            $info = array();
            $info['title']   = 'For Sale';
            $info['page']    = 'sale';
        
            $data = $this->template->getPage($info);
        
            $this->load->view('template/main', $data);
		//}
	}
    
    
    
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */
