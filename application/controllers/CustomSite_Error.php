<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

/**
 * 
 */
class CustomSite_Error extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->output->set_status_header('404');
		if(isset($_SESSION['activeAdmin']))
		{
			$this->load->view('errors/CustomError_Admin');
		}
		if(isset($_SESSION['activeUser']))
		{
			$this->load->view('errors/CustomError_User');
		}
	}

}

?>