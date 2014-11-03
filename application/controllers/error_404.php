<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Error_404 extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
            $info = array();
        
            $info['title']   = 'Error 404';
            $info['page']    = 'error_404';
        
            $this->template->load('template/main', 'pages/error_404', $info);
	}
    
    
    
}

/* End of file error_404.php */
/* Location: ./application/controllers/error_404.php */
