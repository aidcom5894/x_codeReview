<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class AdminDashboard_Controller extends CI_Controller
{
	 
	function __construct()
	{
		parent::__construct();
	}

	public function adminRegistration()
	{
		$this->load->view('admin_dashboard/admin_registration');
	}

	public function registerAdmin()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->adminRegistration();
	}

	public function adminLogin()
	{
		$this->load->view('admin_dashboard/admin_login');
	}

	public function adminDashboard()
	{
		$this->load->view('admin_dashboard/admin_portal');
	}

	public function adminLoginVerification()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->adminAuthenticLogin();
	}

	public function admin_checkout()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->adminCheckout();
	}

	public function newBookEntry()
	{
		$this->load->view('admin_dashboard/newBookEntry');
	}

	public function updateNewBookEntry()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->addbookstolibrary();
	}

	public function editExistingBooks()
	{
		$this->load->view('admin_dashboard/editAvailableBooks');
	}

	public function adminProfile()
	{
		$this->load->view('admin_dashboard/admin_profile');
	}

	public function updateAdProfile()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->updateSAprofile();
	}

	public function avatarUpdation()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->updateAvatar();
	}

	public function passwordSetting()
	{
		$this->load->view('admin_dashboard/profile_settings');
	}

	public function passwordUpdate()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->profilePassword();
	}

	public function viewAllBooks()
	{
		$this->load->view('admin_dashboard/allBook_Details');
	}

	public function wipeData()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->wipeBookData();
	}

	public function editSingleBook()
	{
		$this->load->view('admin_dashboard/editSingleBook');
	}

	public function updateBookDetails()
	{
		$this->load->model('Admin_Model');
		$this->Admin_Model->singleBookEdit();
	}

	public function deleteIndividualBook()
	{
		$this->load->model('Admin_Model'); 
		$this->Admin_Model->deleteSingleBookData();
	}

	public function individualDeletion()
	{
		$this->load->view('admin_dashboard/individual_deletion');
	}

	public function loadDeleteWarning()
	{
		$this->load->view('admin_dashboard/tableDataDelete');
	}
}

?>