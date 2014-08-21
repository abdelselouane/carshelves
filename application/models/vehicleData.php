<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class VehicleData extends CI_Controller {
 
    private $tableName = 'vehicle_data';
    
    function __construct()
	{
		parent::__construct();
       
        $this->load->database();
        $this->db->reconnect();
	}
    
    
    function createVdata($data)
    {
         echo '<pre>'; print_r($data); echo '</pre>';
       if($data && is_array($data)){
            $this->db->insert($this->tableName, $data);
            return  $user_id = $this->db->insert_id();
       }else{
        return FALSE;}
        
    }
}



?>