<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends LayoutController
{
    public function __construct()
	{
		parent::__construct();	 
		$this->load->helper('url');
	}
		
	public function index()
	{
		// Redirect to the user's course/enrollment listing.
		// TODO: Replace 0 with the user's id grabbed from session variables.
		redirect('/registration/schedule/0');
	}
	
	public function schedule($userID)
	{
		$this->Set('content', $this->load->view('registration/schedule', '', true));
	}
	
	public function search()
	{
		$this->Set('content', $this->load->view('registration/search'));
	}
}