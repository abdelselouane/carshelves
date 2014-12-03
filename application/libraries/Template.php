<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{   
            
          //  echo $template;exit;
			$this->CI =& get_instance();
            $this->set('header', $this->CI->load->view('admin/template/header', '', TRUE));
            $this->set('navigation', $this->CI->load->view('admin/template/navigation', '', TRUE));	
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
