<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
      //  $this->load->library('template');
	}

	function index()
	{
		/*if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {*/
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
           
            //$info = array();
           // $info['title']   = 'Catalog';
          //  $info['page']    = 'catalog';
        
           // $data = $this->template->getPage($info);
        $data = '';
            $this->load->view('admin/login', $data);
		//}
	}
    
    function signin(){
    
        $post = $this->input->post();
        echo '<pre>'; print_r($post); echo '</pre>'; 
        exit;
        
    }
    
    
    
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */