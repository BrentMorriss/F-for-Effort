<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends LayoutController
{	
	public function index()
	{
		if($this->session->userdata('logged_in')==true)
		{
			$this->home();
		}
		else{
			$this->login();
		}
	}
	
	public function login()
	{
		if($this->session->userdata('logged_in')==true)
		{
			$this->home();
		}
		else
		{
			$this->form_validation->set_rules('email', 'Email', 'required|trim|maxlength[50]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'required|trim|maxlength[50]|xss_clean');
		
			if ($this->form_validation->run() == FALSE)
			{
				$this->Set('content', $this->load->view('users/login', '', true));
			}
			else
			{	
				extract($_POST);
				$id = $this->User_model->authenticate($email, $password);
				if($id)
				{
					// Your In!!!
					$data = $this->User_model->getUserData($id);
					$this->session->set_userdata($data);
					$this->session->set_userdata(array('logged_in'=>true,'user_id'=>$id));
					$this->home();
				}
				else
				{
					// redirect back to login
					redirect(base_url());
				}
			}
		}
	}
	
	public function home(){
		if($this->session->userdata('logged_in')==true)
		{
			$array['schedule'] = $this->User_model->getCourses($this->session->userdata('user_id'));
			$this->Set('content', $this->load->view('users/home', $array, true));
			echo "<pre>";
			print_r($array);
			print_r($this->session->userdata);
			echo "</pre>";
		}
		else
		{
			$this->login();
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}