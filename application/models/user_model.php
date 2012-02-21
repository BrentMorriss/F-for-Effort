<?php
class User_model extends CI_Model {
	
	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();	 
	}
	
	public function check_login($email, $password)
	{
		$sha1_password = sha1($password);
		$query_str = "SELECT id FROM users WHERE email=? AND password=?";
		
		$result = $this->db->query($query_str, array($email, $sha1_password));
		
		if($result->num_rows() == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}

?>