<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Token extends CI_Model {
 
    private $table_name = 'token';
   
    function __construct()
	{
		parent::__construct();
       
        $this->load->database();
        $this->db->reconnect();
	}
    
    function getTokenByApp($appName)
	{
        $this->db->where('label', $appName);
        $query = $this->db->get($this->table_name);
        //return $query->result_object();
        //echo '<pre>'; print_r($query->result_array()); echo '</pre>';exit;
        if ($query->num_rows() == 1) return $query->row();
          return NULL;
    }
}



?>
