<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
        $this->load->library('input');
        $this->load->library('form_validation');
		$this->load->library('tank_auth');
        $this->load->library('template');
        
        $this->load->model('vehicleData');
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
            $data = $this->template->getPage($info);
            $this->load->view('template/main', $data);
                

            
        
            
        
            
		//}
	}
    
    function addVehicle(){
    
            $this->form_validation->set_rules('manufacturer', 'Manufacturer', 'required');
            $this->form_validation->set_rules('model', 'Model', 'required');
            $this->form_validation->set_rules('year', 'Year', 'required');
            $this->form_validation->set_rules('body-type', 'Body Type', 'required');
        
           
        
        //if(!empty($post)){
            $post= $this->input->post();
           // print_r($post); exit;
       // }
        
            $vehicle_data['manufacturer']   = $post['manufacturer'];
           
            $vehicle_data['year']           = $post['year'];
            $vehicle_data['model']          = $post['model'];
            $vehicle_data['body_type']      = $post['body_type'];
            $vehicle_data['fuel_type']      = $post['fuel_type'];
            $vehicle_data['transmission']   = $post['transmission'];
            $vehicle_data['doors']          = $post['doors'];
            $vehicle_data['cylinders']      = $post['cylinders'];
            
            $vehicle_data['vin']            = $post['vin'];
            $vehicle_data['color']          = $post['color'];
            

        
           $vehicle_data_id = $this->vehicleData->createVdata($vehicle_data);
        
        echo $vehicle_data_id; exit;
           
    
    }
    
    
    
}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */