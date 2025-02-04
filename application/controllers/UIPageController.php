<?php 

defined('BASEPATH') OR exit('no direct script access allowed');


/**
 * 
 */
class UIPageController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}

	public function userLogin()
	{
		$this->load->view('uiPages/userLogin');
	}

	public function userOnboarding()
	{
		$this->load->view('uiPages/userOnboarding');
	}

	public function userOnboarding2()
	{
		$this->load->view('uiPages/userOnboarding_id');
	}

	public function fetchUserData()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->fetchParentDetails();		
	}

	public function updatePassword()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->setPassword();
	}

	public function userLoginAccess()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->userPortalLoginAccess();
	}

	public function destroyUserSession()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->destroyActiveUser();
	}

	public function loadBookDescription()
	{
		$this->load->view('uiPages/book_description');
	}

	public function contactUs()
	{
		$this->load->view('uiPages/admin_contactPage');
	}

	public function queryAssistanceForm()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->formAssistance();
	}

	public function showBookstore()
	{
		$this->load->view('uiPages/all_in_one_bookstore');

	}

	public function catEssentials()
	{
		$this->load->view('uiPages/category_essentials');
	}

	public function catFoundations()
	{
		$this->load->view('uiPages/category_foundation');
	}

	public function catChallenge()
	{
		$this->load->view('uiPages/category_challenge');
	}

	public function cartView()
	{
		$this->load->view('uiPages/shopping_cart');
	}

	public function paymentCheckout()
	{
		$this->load->view('uiPages/payment_checkout');
	}

	public function addtoCart()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->addToCart();
	}

	public function deletecartProd()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->deleteCartItems();
	}

	public function checkoutNpayment()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->finalCheckOut();
	}
	
	public function booksBySearch()
	{
		$this->load->view('uiPages/search_Results');
	}
	
	public function updateCartQty()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->updateQty();
	}

	public function generateMyInvoice()
	{
		$this->load->view('uiPages/purchase_invoice');
	}

	public function forgotPassword()
	{
		$this->load->view('uiPages/forgot_password');
	}

	public function resetMyPassword()
	{
		$this->load->model('Action_Model');
		$this->Action_Model->resetUserPassword();
	}
}


?>