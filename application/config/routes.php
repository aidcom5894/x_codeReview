<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html 
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = 'CustomSite_Error';
$route['translate_uri_dashes'] = FALSE;

$route['user_portal'] = 'UIPageController/userLogin';

$route['user_signup'] = 'UIPageController/userOnboarding';

$route['user_Signup'] = 'UIPageController/userOnboarding2';

$route['fetchParentsData'] = 'UIPageController/fetchUserData';

$route['passwordUpdation'] = 'UIPageController/updatePassword';

$route['user_dashboard'] = 'UserDashboard_Controller/loadUserDashboard';

$route['userLoginCode'] = 'UIPageController/userLoginAccess';

$route['user_logout'] = 'UIPageController/destroyUserSession';

$route['page_description'] = 'UIPageController/loadBookDescription';

$route['contact_us'] = 'UIPageController/contactUs';

$route['formAssistanceQuery'] = 'UIPageController/queryAssistanceForm';

$route['bookstore'] = 'UIPageController/showBookstore';

$route['category_essentials'] = 'UIPageController/catEssentials';

$route['category_foundation'] = 'UIPageController/catFoundations';

$route['category_challenge'] = 'UIPageController/catChallenge';

$route['bookstore_cart'] = 'UIPageController/cartView';

$route['bookstore_checkout'] = 'UIPageController/paymentCheckout'; 

$route['deleteCartItems'] = 'UIPageController/deletecartProd';

$route['purchase_invoice'] = 'UIPageController/generateMyInvoice';

$route['reset_password'] = 'UIPageController/forgotPassword';

$route['setNewPassword'] = 'UIPageController/resetMyPassword';

// $route['updateQuantity'] = 'UIPageController/updateCartQty';

// Admin Controller Starts here
$route['admin_onboarding'] = 'AdminDashboard_Controller/adminRegistration';

$route['adminRegistration'] = 'AdminDashboard_Controller/registerAdmin';

$route['super_admin'] = 'AdminDashboard_Controller/adminLogin';

$route['admin_portal'] = 'AdminDashboard_Controller/adminDashboard';

$route['adminAuthorisation'] = 'AdminDashboard_Controller/adminLoginVerification';

$route['checkoutAdmin'] = 'AdminDashboard_Controller/admin_checkout';

$route['add_new_books'] = 'AdminDashboard_Controller/newBookEntry';

$route['saveBooksToDB'] = 'AdminDashboard_Controller/updateNewBookEntry';

$route['editExistingBook'] = 'AdminDashboard_Controller/editExistingBooks';

$route['addBookstoCart'] = 'UIPageController/addtoCart';

$route['final_checkout'] = 'UIPageController/checkoutNpayment';

$route['search_books'] = 'UIPageController/booksBySearch';

$route['profile_mgmt'] = 'AdminDashboard_Controller/adminProfile';

$route['profileUpdation'] = 'AdminDashboard_Controller/updateAdProfile';

$route['avatarChange'] = 'AdminDashboard_Controller/avatarUpdation';

$route['profile_settings'] = 'AdminDashboard_Controller/passwordSetting';

$route['updateAdminPassword'] = 'AdminDashboard_Controller/passwordUpdate';

$route['view_all_books'] = 'AdminDashboard_Controller/viewAllBooks';

$route['wipe_date'] = 'AdminDashboard_Controller/wipeData';

$route['edit_book_details'] = 'AdminDashboard_Controller/editSingleBook';

$route['update_book_details'] = 'AdminDashboard_Controller/updateBookDetails';

$route['individual_deletion'] = 'AdminDashboard_Controller/deleteIndividualBook';

$route['confirm_deletion'] = 'AdminDashboard_Controller/individualDeletion';

$route['deletion_warning'] = 'AdminDashboard_Controller/loadDeleteWarning';

// User Controller Routing Starts Here
$route['edit_user_profile'] = 'UserDashboard_Controller/displayUserProfile';

$route['password_mgmt'] = 'UserDashboard_Controller/displaySettingsPage';

$route['complete_address'] = 'UserDashboard_Controller/addressProfile';

$route['view_all_child'] = 'UserDashboard_Controller/viewAllChild';

$route['my_purchase'] = 'UserDashboard_Controller/completeBookPurchased';

$route['userProfileUpdate'] = 'UserDashboard_Controller/updateUserProfile';

$route['updateAddressBook'] = 'UserDashboard_Controller/updateAddress';

$route['userAvatarMgmt'] = 'UserDashboard_Controller/updateProfilePic';

$route['changeUserPassword'] = 'UserDashboard_Controller/changePswd';