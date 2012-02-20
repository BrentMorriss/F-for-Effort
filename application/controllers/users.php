<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends LayoutController
{	

	public function index()
	{
		if($this->session->userdata('logged_in')==true)
		{
			$this->Set('content', $this->load->view('users/home', '', true));
		}
		else{
			$this->login();
		}
	}
	
	public function login()
	{
		if($this->session->userdata('logged_in')==true)
		{
			$this->Set('content', $this->load->view('users/home', '', true));
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
				$id = $this->User_model->check_login($email, $password);
				//echo $id;
				if($id)
				{
					// Your In!!!
					$this->session->set_userdata(array('logged_in'=>true, 'user_id'=>$id));
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
		if($this->session->userdata('logged_in')==true){
			$this->Set('content', $this->load->view('users/home', '', true));
		}
		else
		{
			$this->login();
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		redirect(base_url());
	}
}