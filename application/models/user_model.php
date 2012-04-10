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
		$query = $this->db->query("SELECT * FROM course_enrollment WHERE student_id=?", array($student_id));
		foreach ($query->result_array() as $row)
		{
			$course_section_id = $row['course_section_id'];
			$query = $this->db->query("SELECT * FROM course_sections WHERE id=?", array($course_section_id));
			foreach ($query->result_array() as $row)
			{
				$section = $row['section'];
				$enrolled = $row['enrolled'];
				$capacity = $row['capacity'];
				$course_id = $row['course_id'];
				$course_time_id = $row['course_time_id'];
				$teacher_id = $row['teacher_id'];
				$term_id = $row['term_id'];
				
				$query = $this->db->query("SELECT * FROM course_terms WHERE id=?", array($term_id));
				foreach ($query->result_array() as $row)				{
					$start_date=$row['start_date'];
					$end_date=$row['end_date'];
					$year=$row['year'];
					$term=$row['term'];
					
					$query = $this->db->query("SELECT * FROM courses WHERE id=?", array($course_id));
					foreach ($query->result_array() as $row)					{
						$name=$row['name'];
						$course_number=$row['course_number'];
						$credit=$row['credit'];
						$department_id=$row['department_id'];
						$description=$row['description'];
						
						$query = $this->db->query("SELECT * FROM departments WHERE id=?", array($department_id));
						foreach ($query->result_array() as $row)
						{
							$ticker=$row['ticker'];
							$department_name=$row['name'];
							
							$query = $this->db->query("SELECT * FROM course_times WHERE id=?", array($course_time_id));
							foreach ($query->result_array() as $row)							{
								$start_time=$row['start_time'];
								$end_time=$row['end_time'];
								$monday=$row['monday'];
								$tuesday=$row['tuesday'];
								$wednesday=$row['wednesday'];
								$thursday=$row['thursday'];
								$friday=$row['friday'];
								$saturday=$row['saturday'];
								$sunday=$row['sunday'];
																				$query = $this->db->query("SELECT * FROM course_terms WHERE id=?", array($term_id));
								foreach ($query->result_array() as $row)
								{
									$start_date=$row['start_date'];
									$end_date=$row['end_date'];
									$year=$row['year'];
									$term=$row['term'];
																					$array[$course_section_id] = array('name'=>$name, 'course_number'=>$course_number,'credit'=>$credit, 'description'=>$description, 'ticker'=>$ticker, 'department_name'=>$department_name, 'enrolled'=>$enrolled, 'capacity'=>$capacity, 'start_time'=>$start_time, 'end_time'=>$end_time, 'monday'=>$monday, 'tuesday'=>$tuesday, 'wednesday'=>$wednesday, 'thursday'=>$thursday, 'friday'=>$friday, 'saturday'=>$saturday, 'sunday'=>$sunday, 'start_date'=>$start_date, 'end_date'=>$end_date, 'year'=>$year, 'term'=>$term, 'section'=>$section);
								}
							}
						}						
					}
				}
			}
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