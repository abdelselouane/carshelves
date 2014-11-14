<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller
{

    private $AppToken = '';
    
   function __construct(){
        parent::__construct();
       
    }
    
	function index()
	{
        $this->load->view('API_VIEW/api');
		//$this->load->view('admin/login');
    }
    
    
}

/* End of file api.php */
/* Location: ./application/controllers/api/api.php */
