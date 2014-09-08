<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reset_password extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

	}

	function index()
	{
		/*if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {*/
			//$data['user_id']	= $this->tank_auth->get_user_id();
			//$data['username']	= $this->tank_auth->get_username();
           //echo $user_id; exit;
            $info = array();
            $info['user_id']    = ($this->session->flashdata('user_id')) ? $this->session->flashdata('user_id') : '';
            $info['error']      = ($this->session->flashdata('error')) ? $this->session->flashdata('error') : '';
            $info['success']    = ($this->session->flashdata('success')) ? $this->session->flashdata('success') : '';
            $info['msg']        = ($this->session->flashdata('msg')) ? $this->session->flashdata('msg') : '';
       
            $info['title']   = 'Reset Password';
            $info['page']    = 'reset_password';
        
            $this->template->load('template/main', 'pages/reset_password', $info);
		//}
	}
    
    function reset(){
    
        $post = $this->input->post();
       // echo '<pre>'; print_r($post); echo '</pre>'; exit;
        
        if(!empty($post) && is_array($post)){
        
                if( $post['password'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please enter a valid Password';
                    
                    
                }else if($post['cpassword'] === '' ){
                
                    $error['error'] = TRUE;
                    $error['msg'] = 'Please confirm your password';
                    
                    
                }else if ($post['password'] !== $post['cpassword']){
                   
                    $error['error'] = TRUE;
                    $error['msg'] = 'The <strong>Password</strong> and <strong>Confirm Password</strong> fields are not matching.<br/>Please try again';
                   
                    
                }else{
                    
                    $new_pass = encryptIt($post['password']);
                    $user_id = $post['user_id'];
                    $this->users->reset_password($user_id, $new_pass);
                    $this->email->from('office@carshelves.com', 'Carshelves.com');
                    $this->email->to($post['email']); 
                    //$this->email->cc('another@another-example.com'); 
                    //$this->email->bcc('them@their-example.com'); 

                    $this->email->subject('Password Changed');
                    $this->email->message('<a href="'.base_url().'login">Login Now</a>');	

                    $this->email->send();

                    //echo $this->email->print_debugger();                    
                    $error['success'] = TRUE;
                    $error['msg'] = 'The <strong>Password</strong> has been changed successfully.<br/> <a href="'.base_url().'login">Login Now</a>';
                
                }
            
            $this->session->set_flashdata($error);
            //echo '<pre>'; print_r($error); echo '</pre>';
            redirect(base_url().'reset_password');
        
        }
        redirect(base_url().'forgot_password');
    }
    
    
}

/* End of file reset_password.php */
/* Location: ./application/controllers/reset_password.php */