<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Token extends CI_Controller {
 
    private $table_name = 'token';
   
    function __construct()
	{
		parent::__construct();
       
        $this->load->database();
        $this->db->reconnect();
	}
    
    function getTokenByApp($appName)
	{
        if(!empty($appName)){
            $this->db->where('label', $appName);

            $query = $this->db->get($this->table_name);
            if ($query->num_rows() == 1) return $query->row();
		      return NULL;
            
        }else{
            return NULL;
        }
	}
}



?>
