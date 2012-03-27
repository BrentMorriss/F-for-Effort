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
	
	public function getUserData($id)
	{
		$query = $this->db->query("SELECT * FROM users WHERE id=?", array($id));
		$row = $query->row(0); 
		return array('first_name'=>$row->first_name, 'euid'=>$row->euid);
	}
	
	public function getCourses($student_id)
	{
		//$i = 0;
		$query = $this->db->query("SELECT * FROM course_enrollment WHERE student_id=?", array($student_id));
		foreach ($query->result_array() as $row)
		{
			$course_id = $row['course_id'];
			$query = $this->db->query("SELECT * FROM courses WHERE id=?", array($course_id));
			foreach ($query->result_array() as $row)
			{
				$name = $row['name'];
				$array[$course_id] = array('name'=>$row['name'], 'course_number'=>$row['course_number'], 'credit'=>$row['credit'], 'description'=>$row['description']);
			}
			//$i++;
		}
		
		if($query->num_rows() > 0)
		{
			return $array;
		}
		else
		{
			return false;
		}
	}
	
}

?>