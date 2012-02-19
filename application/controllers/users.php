<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends LayoutController
{
	public function index()
	{
		$this->Set('content', $this->load->view('users/login', '', true));
	}
}