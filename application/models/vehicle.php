<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Vehicle extends CI_Controller {
 
   
    function __construct()
	{
		parent::__construct();
       
        $this->load->database();
        $this->db->reconnect();
	}
    
    function createVehicle($data)
    {
         //echo '<pre>'; print_r($data); echo '</pre>'; exit;
       if($data && is_array($data)){
            $this->db->insert('vehicle_ad', $data);
            return  $user_id = $this->db->insert_id();
       }else{
        	return FALSE;
	   }
        
    }
	
	
    function createVdata($data)
    {
         //echo '<pre>'; print_r($data); echo '</pre>'; exit;
       if($data && is_array($data)){
            $this->db->insert('vehicle_data', $data);
            return  $user_id = $this->db->insert_id();
       }else{
        	return FALSE;
	   }
        
    }
	
	 function createVequipment($data)
    {
         //echo '<pre>'; print_r($data); echo '</pre>'; exit;
       if($data && is_array($data)){
            $this->db->insert('vehicle_equipment', $data);
            return  $user_id = $this->db->insert_id();
       }else{
        	return FALSE;
	   }
        
    }
	
	function createVphotos($data)
    {
         //echo '<pre>'; print_r($data); echo '</pre>'; exit;
       if($data && is_array($data)){
            $this->db->insert('vehicle_photos', $data);
            return  $user_id = $this->db->insert_id();
       }else{
        	return FALSE;
	   }
        
    }
}



?>