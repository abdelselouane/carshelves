<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Profile_model extends CI_Model {
 
    private $table_name = 'profile';
   
    function __construct()
	{
		parent::__construct();
       
        $this->load->database();
        $this->db->reconnect();
	}
    
    /**
	 * Create an empty profile for a new user
	 *
	 * @param	int
	 */
	public function get_profiles()
	{
        $query = $this->db->get($this->table_name);
		return $query->result();

	}
    
    /**
	 * Create an empty profile for a new user
	 *
	 * @param	int
	 */
	public function create_profile($user_id)
	{
        //echo $user_id; exit;
		$this->db->set('user_id', $user_id);
		return $this->db->insert($this->table_name);

	}

	/**
	 * Delete user profile
	 *
	 * @param	int
	 * @return	void
	 */
	public function delete_profile($user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->delete($this->table_name);
	}

}



?>
