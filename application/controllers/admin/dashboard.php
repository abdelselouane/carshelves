<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
       
        
        $info = array();
        $info['error'] = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
        $info['msg']   = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
        $info['email'] = ($this->session->flashdata('email')) ? $this->session->flashdata('email') : '';
        $info['success'] = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '';
        //echo '<pre>'; print_r($info); echo '</pre>';exit;
        $info['title']   = 'Admininstration Panel';
        $info['page']    = 'dashboard';

        $this->template->load('admin/template/main', 'admin/dashboard', $info);
		
	}
    
    
    
}

/* End of file admin/dashboard.php */
/* Location: ./application/controllers/ admindashboard.php */