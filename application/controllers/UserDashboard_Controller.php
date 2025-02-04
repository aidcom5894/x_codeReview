<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class UserDashboard_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function loadUserDashboard()
	{
		$this->load->view('user_dashboard/user_portal');
	}

	public function displayUserProfile()
	{
		$this->load->view('user_dashboard/user_Profile');
	}

	public function displaySettingsPage()
	{
		$this->load->view('user_dashboard/password_Settings');
	}

	public function addressProfile()
	{
		$this->load->view('user_dashboard/user_address');
	}

	public function viewAllChild()
	{
		$this->load->view('user_dashboard/child_profile');
	}

	public function completeBookPurchased()
	{
		$this->load->view('user_dashboard/complete_purchase.php');
	}

	public function updateUserProfile()
	{
		$this->load->model('User_DashboardModel');
		$this->User_DashboardModel->updateProfile();
	}

	public function updateAddress()
	{
		$this->load->model('User_DashboardModel');
		$this->User_DashboardModel->updateAddressBook();
	}

	public function updateProfilePic()
	{
		$this->load->model('User_DashboardModel');
		$this->User_DashboardModel->updateAvatar();
	}

	public function changePswd()
	{
		$this->load->model('User_DashboardModel');
		$this->User_DashboardModel->passwordReset();
	}
}


?>