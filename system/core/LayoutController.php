<?php
	class LayoutController extends CI_Controller
	{
		var $data;
		public function __construct()
		{
			parent::__construct();
			$this->data = array();
			if(!isset($this->data))
			{
				die('DEATH');
			}
		}
		
		public function Set($name, $value)
		{
			$this->data[$name] = $value;
		}
		
		public function _output($output)
		{
			// Run the view and grab it's output.
			$output = $this->load->view('layout', $this->data, true);
			
			// Send output to the browser.
			echo $output;
		}
	}
?>