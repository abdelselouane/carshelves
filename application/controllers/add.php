<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	
        
        $this->load->model('vehicle');
        //$this->load->model('Rss');
	}

	function index()
	{
		/*if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {*/
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
        
            
            $info = array();
            $info['title']   = 'Add Vehicle';
            $info['page']    = 'add';
            //$data = $this->template->getPage($info);
           // $this->load->view('template/main', $info);
                
			$this->template->load('template/main', 'pages/add', $info);
            
        
            
        
            
		//}
	}
    
    function addVehicle(){
    
          /*  $this->form_validation->set_rules('manufacturer', 'Manufacturer', 'required');
            $this->form_validation->set_rules('model', 'Model', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            $this->form_validation->set_rules('body-type', 'Body Type', 'required'); */
        
           
         $post= $this->input->post();
        if( !empty($post) ){
           
            echo '<pre>'; print_r($post); echo '</pre>'; 
            echo '<pre>'; print_r($_FILES); echo '</pre>'; 
			if(isset($_FILES)){
				
				
				
				for($i = 1; $i <= count($_FILES['file_'.$i]); $i++ ){
					
					$config['upload_path']		= '../carshelves/assets/';
					if( $_FILES['file_'.$i]['error'] == 0 ){
						
						
						move_uploaded_file($_FILES['file_'.$i]['tmp_name'],$config['upload_path'].'000.jpg');
						
					}
				}
				
			}
            exit;
           
            $vehicle_data['manufacturer']   = isset($post['manufacturer']) ? $post['manufacturer'] : '';
            $vehicle_data['year']           = isset($post['year']) ? $post['year'] : '';
            $vehicle_data['model']          = isset($post['model']) ? $post['model'] : '';
            $vehicle_data['body_type']      = isset($post['body_type']) ? $post['body_type'] : '';
            $vehicle_data['fuel_type']      = isset($post['fuel_type']) ? $post['fuel_type'] : '';
            $vehicle_data['transmission']   = isset($post['transmission']) ? $post['transmission'] : '';
            $vehicle_data['doors']          = isset($post['doors']) ? $post['doors'] : '';
            $vehicle_data['cylinders']      = isset($post['cylinders']) ? $post['cylinders'] : '';
            $vehicle_data['vin']            = isset($post['vin']) ? $post['vin'] : '';
            $vehicle_data['color']          = isset($post['color']) ? $post['color'] : '';
            
			if( !empty($vehicle_data) && is_array($vehicle_data) ){
				
				$vehicle['vehicle_data_id'] = $this->vehicle->createVdata($vehicle_data);
			}
        
            $vehicle_equipment['abs']   			 		= isset($post['abs']) ? 1 : 0;
            $vehicle_equipment['sun_roof']					= isset($post['sun_roof']) ? 1 : 0;
            $vehicle_equipment['differential_lock']			= isset($post['differential_lock']) ? 1 : 0;
            $vehicle_equipment['leather_interior']      	= isset($post['leather_interior']) ? 1 : 0;
            $vehicle_equipment['radio_cd']      			= isset($post['radio_cd']) ? 1 : 0;
            $vehicle_equipment['adjustable_suspension']   	= isset($post['adjustable_suspension']) ? 1 : 0;
            $vehicle_equipment['eds']          				= isset($post['eds']) ? 1 : 0;
            $vehicle_equipment['protection_framework']      = isset($post['protection_framework']) ? 1 : 0;
            $vehicle_equipment['tinted_glass']            	= isset($post['tinted_glass']) ? 1 : 0;
            $vehicle_equipment['alloy_wheels']          	= isset($post['alloy_wheels']) ? 1 : 0;
			$vehicle_equipment['heated_seats']   			= isset($post['heated_seats']) ? 1 : 0;
            $vehicle_equipment['leather_upholstery']        = isset($post['leather_upholstery']) ? 1 : 0;
            $vehicle_equipment['ESP']          				= isset($post['ESP']) ? 1 : 0;
            $vehicle_equipment['tow']      					= isset($post['tow']) ? 1 : 0;
            $vehicle_equipment['electric_windows']      	= isset($post['electric_windows']) ? 1 : 0;
            $vehicle_equipment['electric_mirrors']   		= isset($post['electric_mirrors']) ? 1 : 0;
            $vehicle_equipment['parking_sensors']          	= isset($post['parking_sensors']) ? 1 : 0;
            $vehicle_equipment['hatch']      				= isset($post['hatch']) ? 1 : 0; 
        	$vehicle_equipment['air_conditioning']          = isset($post['air_conditioning']) ? 1 : 0;
            $vehicle_equipment['traction_control']          = isset($post['traction_control']) ? 1 : 0;
			$vehicle_equipment['immobilizer']   			= isset($post['immobilizer']) ? 1 : 0;
            $vehicle_equipment['heated_windshield']         = isset($post['heated_windshield']) ? 1 : 0;
            $vehicle_equipment['rain_sensors']          	= isset($post['rain_sensors']) ? 1 : 0;
            $vehicle_equipment['xenon']      				= isset($post['xenon']) ? 1 : 0;
            $vehicle_equipment['radio_cd']      			= isset($post['radio_cd']) ? 1 : 0;
            $vehicle_equipment['airbag']   					= isset($post['airbag']) ? 1 : 0;
            $vehicle_equipment['board_computer']          	= isset($post['board_computer']) ? 1 : 0;
            $vehicle_equipment['auxiliary_heating']      	= isset($post['auxiliary_heating']) ? 1 : 0;
            $vehicle_equipment['auto_pilot']            	= isset($post['auto_pilot']) ? 1 : 0;
            $vehicle_equipment['power_steering']          	= isset($post['power_steering']) ? 1 : 0;
			$vehicle_equipment['4WD']   			 		= isset($post['4WD']) ? 1 : 0;
            $vehicle_equipment['alarm']						= isset($post['alarm']) ? 1 : 0;
            $vehicle_equipment['cruise_control']			= isset($post['cruise_control']) ? 1 : 0;
            $vehicle_equipment['central_locking']      		= isset($post['central_locking']) ? 1 : 0;
            $vehicle_equipment['fog_lights']      			= isset($post['fog_lights']) ? 1 : 0;
            $vehicle_equipment['navigation']   				= isset($post['navigation']) ? 1 : 0;
			$vehicle_equipment['additional_equipment']   	= isset($post['additional_equipment']) ? $post['additional_equipment'] : '';
		   
		   
		   if( !empty($vehicle_equipment) && is_array($vehicle_equipment) ){
				
				$vehicle['vehicle_equipment_id'] = $this->vehicle->createVequipment($vehicle_equipment);
			}
		   
		    $vehicle['condition']          	= isset($post['condition']) ? $post['condition'] : '';
            $vehicle['milage']      		= isset($post['milage']) ? $post['milage'] : '';
            $vehicle['price']            	= isset($post['price']) ? $post['price'] : '';
            $vehicle['negotiable']          = isset($post['negotiable']) ? 1 : 0;			
			$vehicle['first']   			= isset($post['first']) ? $post['first'] : '';
            $vehicle['middle']				= isset($post['middle']) ? $post['middle'] : '';
            $vehicle['last']				= isset($post['last']) ? $post['last'] : '';
            $vehicle['mobile_phone']      	= isset($post['mobile_phone']) ? $post['mobile_phone'] : '';
			$vehicle['home_phone']      	= isset($post['home_phone']) ? $post['home_phone'] : '';
            $vehicle['state']      			= isset($post['state']) ? $post['state'] : '';
            $vehicle['city']   				= isset($post['city']) ? $post['city'] : '';
			$vehicle['zip']   				= isset($post['zip']) ? $post['zip'] : '';
			$vehicle['terms']   			= isset($post['terms']) ? 1 : 0;
			
			if( !empty($vehicle) && is_array($vehicle) ){
				
				$vehicle['vehicle_id'] = $this->vehicle->createVehicle($vehicle);
			}
		   
		   $session = $this->session->all_userdata();
		   echo '<pre>';print_r($session); echo '</pre>';exit;
        
       	  // echo $vehicle_data_id; exit;
		}else{
			return false;
		}
    
    }
    
    
    
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */