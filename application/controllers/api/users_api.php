<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_api extends CI_Controller {

	
	public function index()
	{
		
		$redirect =  site_url("welcome");
		redirect($redirect, 'refresh');
		//$this->load->view('pages/error_404');
	}
	
	public function verify_token($user_id, $token){
			
		$this->load->model('users');
		$verify = FALSE;
		if( isset($token) && isset($user_id)){
			
			$verify = $this->users->verify_token($user_id, $token);
			
		}
		return $verify;
	}
	
	public function get_user_by_id($user_id, $activated, $token = '')
	{
		$this->load->model('users');
		
		if( isset($token) && isset($user_id)){
			
			$verify = $this->verify_token($user_id, $token);
			
		}
		
		if($verify){
			$response =  $this->users->get_user_by_id($user_id, $activated);
			if($response == NULL)
				$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
			else
				$result = json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
			
		}else{
			$response = array("error"=>"Missing or Invalid Token");
			$result = json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		}
		
		
		print_r(json_decode($result));  exit;
		

	function get_users_by_activation_code($code)
	{
		$this->load->model('users');
		$response =  $this->users->get_users_by_activation_code($code);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));

	}

	function get_user_by_login($login)
	{
		$this->load->model('users');
		$response =  $this->users->get_user_by_login($login);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function get_user_by_username($username)
	{
		$this->load->model('users');
		$response =  $this->users->get_user_by_username($username);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function get_user_by_email($email)
	{
		$this->load->model('users');
		$response =  $this->users->get_user_by_email($email);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function get_user_by_reset_code($reset_code)
	{
		$this->load->model('users');
		$response =  $this->users->get_user_by_reset_code($reset_code);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function check_credentials($data)
	{
		$this->load->model('users');
		$response =  $this->users->check_credentials($data);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function is_username_available($username)
	{
		$this->load->model('users');
		$response =  $this->users->is_username_available($username);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function is_email_available($email)
	{
		$this->load->model('users');
		$response =  $this->users->is_email_available($email);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function create_user($data, $activated = TRUE)
	{
		$this->load->model('users');
		$response =  $this->users->create_user($data, $activated = TRUE);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function activate_user($user_id, $activation_key, $activate_by_email)
	{
		$this->load->model('users');
		$response =  $this->users->activate_user($user_id, $activation_key, $activate_by_email);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function activate($user_id)
	{
		$this->load->model('users');
		$response =  $this->users->activate($user_id);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function purge_na($expire_period = 172800)
	{
		$this->load->model('users');
		$response =  $this->users->purge_na($expire_period = 172800);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function delete_user($user_id)
	{
		$this->load->model('users');
		$response =  $this->users->delete_user($user_id);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function set_password_key($user_id, $new_pass_key)
	{
		$this->load->model('users');
		$response =  $this->users->set_password_key($user_id, $new_pass_key);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function can_reset_password($user_id, $new_pass_key, $expire_period = 900)
	{
		$this->load->model('users');
		$response =  $this->users->can_reset_password($user_id, $new_pass_key, $expire_period = 900);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function reset_password($user_id, $new_pass)
	{
		$this->load->model('users');
		$response =  $this->users->reset_password($user_id, $new_pass);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function change_password($user_id, $new_pass)
	{
		$this->load->model('users');
		$response =  $this->users->change_password($user_id, $new_pass);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function set_new_email($user_id, $new_email, $new_email_key, $activated)
	{
		$this->load->model('users');
		$response =  $this->users->set_new_email($user_id, $new_email, $new_email_key, $activated);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function activate_new_email($user_id, $new_email_key)
	{
		$this->load->model('users');
		$response =  $this->users->activate_new_email($user_id, $new_email_key);
		if($response == FALSE)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function update_login_info($user_id, $record_ip, $record_time)
	{
		$this->load->model('users');
		$response =  $this->users->update_login_info($user_id, $record_ip, $record_time);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function resetPasswordCode($user_id, $reset_code, $reset_digits)
	{
		$this->load->model('users');
		$response =  $this->users->resetPasswordCode($user_id, $reset_code, $reset_digits);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function ban_user($user_id, $reason = NULL)
	{
		$this->load->model('users');
		$response =  $this->users->ban_user($user_id, $reason = NULL);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	function unban_user($user_id)
	{
		$this->load->model('users');
		$response =  $this->users->unban_user($user_id);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	private function create_profile($user_id)
	{
		$this->load->model('users');
		$response =  $this->users->create_profile($user_id);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}

	private function delete_profile($user_id)
	{
		$this->load->model('users');
		$response =  $this->users->delete_profile($user_id);
		if($response == NULL)
			echo json_encode(array("status"=>0, "message"=>"action failed", "data"=>$response));
		else
			echo json_encode(array("status"=>1, "message"=>"action successful", "data"=>$response));
	}
}

