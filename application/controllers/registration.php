<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends LayoutController
{
    public function __construct()
	{
		parent::__construct();	 
		$this->load->helper('url');
		$this->load->helper('form');
	}
		
	public function index()
	{
		// Redirect to the user's course/enrollment listing.
		// TODO: Replace 0 with the user's id grabbed from session variables.
		redirect(base_url());
	}
	
	public function schedule()
	{
		$array['schedule'] = $this->User_model->getCourses($this->session->userdata('user_id'));
		$this->Set('content', $this->load->view('registration/schedule', $array, true));
	}
	
	public function drop($course)
	{
		$student = $this->session->userdata('user_id');
		if ($student == NULL && $course == NULL)
		{
			$this->errors[] = 'Error deleting row.';
			return FALSE;
		}
		$this->db->delete('course_enrollment', array('student_id' => $student, 'course_section_id'=>$course));
		//$this->User_model->deleteCourse($student, $course);
		redirect(base_url());
		return TRUE;
	}
	
	public function search()
	{
		// Define a variable for search results.
		$results = array();
		
		// If post data came in,
		$post = $this->input->post(null, true);		
		if(!empty($post))
		{
			print_r($post);
			// Build a query.
			$sign = $this->input->post('courseNumberSearchType');
			
			// Find the sign to use in the course number search.
			if($sign == 'greater')
			{
				$sign = '>';
			}
			else if($sign == 'less')
			{
				$sign = '<';
			}
			else
			{
				$sign = '=';
			}
			
			$courseNumber = $this->input->post('courseNumber');
			if(empty($courseNumber))
			{
				$courseNumber = '*';
				$sign = '=';
			}
			//if($this->input->post('courseNumberSearchType') == 'contains')
			//{
			//	$courseNumber = '%'.$courseNumber.'%';
			//}
			
			// TODO: Sync this up with course_enrollment table.
			//$endQuery = '';
			//if($this->input->post('openClasses') == 1)
			//{
			//	$endQuery = ' AND 
			//}
			
			$deptID = -1;
			$subject = $this->input->post('subject');
			$subject = $this->db->query('SELECT id FROM departments WHERE ticker=? OR name=?', array($subject, $subject));
			$deptID = -1;
			if($subject->num_rows() == 1)
			{
					foreach($subject->result() as $row)
					{
						$deptID = $row->id;
					}
			}
			$query = 'SELECT * FROM courses WHERE course_number'.$sign.'?';
			if($deptID != -1)
			{
				$query .= ' AND deptartment_id=?';
			}
			$results = $this->db->query($query, array($courseNumber, $deptID));
		}
	
		$data = array();
		$data['results'] = $results;
		$this->Set('content', $this->load->view('registration/search', $data, true));
	}
}