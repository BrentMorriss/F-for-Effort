<?php
class User_model extends CI_Model {
	
	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();	 
	}
	
	public function authenticate($email, $password)
	{
		$sha1_password = sha1($password);
		$query_str = "SELECT id FROM users WHERE email=? AND password=?";
		
		$result = $this->db->query($query_str, array($email, $sha1_password));
		
		if($result->num_rows() == 1)
		{
			return $result->row(0)->id;
		}
		else
		{
			return false;
		}
	}
	
	/*public function getInformation($id)
	{
		$query_str = "SELECT * FROM users WHERE id=?";
		$result = $this->db->query($query_str, array($id));
		$name = $result->row()->name;
		$euid = $result->row()->euid;
		return array('name'=>$name, 'euid'=>$euid);
	}*/
	
}

?>