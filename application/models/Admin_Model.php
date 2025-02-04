<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

/**
 * 
 */
class Admin_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function adminRegistration()
	{
	    $adminUID = $_POST['adminUID'];
	    $adminName = $_POST['adminName'];
	    $adminEmail = $_POST['adminEmail'];
	    $adminPassword = $_POST['portalPassword'];
	    $adminContact = '9876543210';

	    $imageCollection = array('avatar1.png','avatar2.png','avatar3.png','avatar4.png','avatar5.png','avatar6.png','avatar7.png','avatar8.png','avatar9.png','avatar10.png','avatar11.png','avatar12.png','avatar13.png','avatar14.png','avatar15.png','avatar16.png','avatar17.png','avatar18.png','avatar19.png');
	    $imagePrefix = base_url()."modules/avatar/";

	    $adminImage = $imagePrefix.$imageCollection[array_rand($imageCollection,1)];

	    $matchExistingData = $this->db->query("SELECT * FROM admin_directory WHERE admin_email = '$adminEmail' OR admin_contact = '$adminContact'");

	    if(isset($_POST['adminEnrollment']))
	    {
	        if($matchExistingData->num_rows()>0)
	        {
	            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	            echo '<script type="text/javascript">';
	            echo 'setTimeout(function () {';
	            echo '  swal({';
	            echo '      title: "Duplicate Data Found!",';
	            echo '      text: "We are sorry, but it looks like your provided data matches our records. For security reasons, we cannot allow your signup at this time. Please provide unique data for registration and try again. If you continue to experience issues, contact our support team for assistance.",';
	            echo '      icon: "error"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('admin_onboarding').'";';  
	            echo '  });';
	            echo '}, 100);';
	            echo '</script>';
	        }
	        else 
	        {
	            $adminData = array(
	                'adminUID' => $adminUID,
	                'admin_name' => $adminName,
	                'admin_email' => $adminEmail,
	                'admin_contact' => $adminContact,
	                'portal_credentials' => $adminPassword,
	                'admin_avatar' => $adminImage
	            );
	            $this->db->insert('admin_directory',$adminData);

	            echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	            echo '<script type="text/javascript">';
	            echo 'setTimeout(function () {';
	            echo '  swal({';
	            echo '      title: "Admin Registration Successful!",';
	            echo '      text: "We have successfully onboarded the Admin with full authorization to the portal. Please provide the Admin with their UID details and other login credentials. Happy surfing!",';
	            echo '      icon: "success"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('super_admin').'";';  
	            echo '  });';
	            echo '}, 100);';
	            echo '</script>';
	        }
	    }
	}

	public function adminAuthenticLogin()
	{
		$adminUID = $_POST['adminUniqueID'];
		$adminContactMail = $_POST['adminEmail'];
		$adminPortalPassword = $_POST['portalPassword'];

		$matchAdminDB = $this->db->query("SELECT * FROM admin_directory WHERE adminUID='$adminUID' AND admin_email='$adminContactMail' AND portal_credentials = '$adminPortalPassword'");

		if($matchAdminDB->num_rows() > 0)
		{
			$_SESSION['activeAdmin'] = $adminUID;

			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {';
            echo '  swal({';
            echo '      title: "Admin Login Successful!",';
            echo '      text: "We have successfully verified the Admin with full authorization to the portal. Enjoy our seamless features with user-friendly Dashboards. Happy surfing!",';
            echo '      icon: "success"';
            echo '  }).then(function() {';
            echo '      window.location.href = "'.base_url('admin_portal').'";';  
            echo '  });';
            echo '}, 100);';
            echo '</script>';
		}
		else
		{
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {';
            echo '  swal({';
            echo '      title: "Credentials Mismatched!",';
            echo '      text: "We could not verify your Credentials. Please check your username and password, and try again. If you continue to experience issues, contact support for assistance.",';
            echo '      icon: "error"';
            echo '  }).then(function() {';
            echo '      window.location.href = "'.base_url('super_admin').'";';  
            echo '  });';
            echo '}, 100);';
            echo '</script>';
		}
	}

	public function addbookstolibrary()
	{
		$fetchAdminDetails = $this->db->query("SELECT * FROM admin_directory WHERE adminUID='{$_SESSION['activeAdmin']}'");
		foreach ($fetchAdminDetails->result() as $row)
		{
			$adminFtchdID = $row->adminUID;
			$adminFtchdName = $row->admin_name;
		}
		$bookTitle = addslashes($_POST['bookName']);
		$bookCategory = $_POST['bookCategory'];
		$authorName = addslashes($_POST['authorName']);
		$purchasePrice = $_POST['originalPrice'];
		$discountedPrice = $_POST['salesPrice'];
		$description = addslashes($_POST['bookDescription']);
		$availableQty = $_POST['purchasedQuantity'];

		// configuration for fileupload
		$image =  $_FILES['bookCoverImage']['name'];
		$config['upload_path'] = 'modules/bookCover/';
		$config['file_name'] = $image;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$config['overwrite'] = FALSE;
		$config['remove_spaces'] = TRUE;

		$fullAddress = base_url().$config['upload_path'].$config['file_name'];

		$this->load->library('upload',$config);

		if(isset($_POST['addBookDetails']))
		{
			if($discountedPrice > $purchasePrice)
			{
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	            echo '<script type="text/javascript">';
	            echo 'setTimeout(function () {';
	            echo '  swal({';
	            echo '      title: "Price Difference Found!",';
	            echo '      text: "Could Not Add Books to Library because the Discounted Price could not exceed Original Price",';
	            echo '      icon: "error"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('add_new_books').'";';  
	            echo '  });';
	            echo '}, 100);';
	            echo '</script>';
			}
			else
			{
				$bookConfiguration = array(
				'book_name' => $bookTitle,
				'category' => $bookCategory,
				'author_name' => $authorName,
				'original_price' => $purchasePrice,
				'sales_price' => $discountedPrice,
				'book_description' => $description,
				'available_stock' => $availableQty,
				'book_cover' => $fullAddress,
				'adminUID' => $adminFtchdID,
				'admin_name' => $adminFtchdName
				);

				$this->db->insert('book_directory',$bookConfiguration);
				
				$this->upload->do_upload('bookCoverImage');

				move_uploaded_file($config['upload_path'],$config['file_name']);

				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	            echo '<script type="text/javascript">';
	            echo 'setTimeout(function () {';
	            echo '  swal({';
	            echo '      title: "New Book Added!",';
	            echo '      text: "New Book Added Successfully to Bookstore",';
	            echo '      icon: "success"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('add_new_books').'";';  
	            echo '  });';
	            echo '}, 100);';
	            echo '</script>';
			}
			
		}		
	}

	public function updateSAprofile()
	{
		$adminName = $_POST['admName'];
		$adminEmail = $_POST['admEmail'];
		$adminContact = $_POST['admContact'];

		if(isset($_POST['updateAdminProfile']))
		{
			$this->db->query("UPDATE admin_directory SET admin_name='$adminName',admin_email='$adminEmail',admin_contact='$adminContact' WHERE adminUID='{$_SESSION['activeAdmin']}'");
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {';
            echo '  swal({';
            echo '      title: "Profile Successfully Updated!",';
            echo '      text: "We have successfully updated your profile.",';
            echo '      icon: "success"';
            echo '  }).then(function() {';
            echo '      window.location.href = "'.base_url('profile_mgmt').'";';  
            echo '  });';
            echo '}, 100);';
            echo '</script>';
		}
	}

	public function updateAvatar()
	{
		$config['upload_path'] = 'modules/adminAvatar/';
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['file_name'] = $_FILES['userAvatar']['name'];
		$config['file_ext_tolower'] = TRUE;
		$config['overwrite'] = FALSE;
		$config['remove_spaces'] = TRUE;

		$avatarAddress = base_url().$config['upload_path'].$config['file_name'];

		$this->load->library('upload', $config);

		if(isset($_POST['profileUpdate']))
		{
			$this->upload->do_upload('userAvatar');

			$this->db->query("UPDATE admin_directory SET admin_avatar = '$avatarAddress' WHERE adminUID='{$_SESSION['activeAdmin']}'");

			move_uploaded_file($config['upload_path'],$config['file_name']);
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {';
            echo '  swal({';
            echo '      title: "Avatar Successfully Updated!",';
            echo '      text: "A profile picture is the window to your online presence and we are glad that you have updated it.",';
            echo '      icon: "success"';
            echo '  }).then(function() {';
            echo '      window.location.href = "'.base_url('profile_mgmt').'";';  
            echo '  });';
            echo '}, 100);';
            echo '</script>';
		}
	}

	public function profilePassword()
	{
		$oldpswd = $_POST['oldPassword'];
		$newpswd = $_POST['newPassword'];
		$cnfPassword = $_POST['cnfPassword'];

		$fetchAdmin = $this->db->query("SELECT * FROM admin_directory WHERE adminUID='{$_SESSION['activeAdmin']}' AND portal_credentials = '$oldpswd'");
		
		if(isset($_POST['updateProfilePassword']))
		{
			if($fetchAdmin->num_rows()>0 AND $newpswd == $cnfPassword)
			{
				$this->db->query("UPDATE admin_directory SET portal_credentials = '$newpswd' WHERE adminUID='{$_SESSION['activeAdmin']}'");
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	            echo '<script type="text/javascript">';
	            echo 'setTimeout(function () {';
	            echo '  swal({';
	            echo '      title: "Password Updated Successfully!",';
	            echo '      text: "Your password has been updated successfully. Thank you for keeping your account secure.",';
	            echo '      icon: "success"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('checkoutAdmin').'";';  
	            echo '  });';
	            echo '}, 100);';
	            echo '</script>';
			}
			else
			{
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	            echo '<script type="text/javascript">';
	            echo 'setTimeout(function () {';
	            echo '  swal({';
	            echo '      title: "Mismatched",';
	            echo '      text: "We could not verify your previous credentials, or your new password and confirmation password do not match. Please check and update again.",';
	            echo '      icon: "error"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('profile_settings').'";';  
	            echo '  });';
	            echo '}, 100);';
	            echo '</script>';
			}
		}
	}

	public function wipeBookData()
	{
		$this->db->empty_table('book_directory');

		echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () {';
        echo '  swal({';
        echo '      title: "Data Wiped Successfully",';
        echo '      text: "We have cleaned your database by removing pre-existing data. You can now freshly enter new details and provide your customers with the latest updated books.",';
        echo '      icon: "success"';
        echo '  }).then(function() {';
        echo '      window.location.href = "'.base_url('add_new_books').'";';  
        echo '  });';
        echo '}, 100);';
        echo '</script>';
	}


	public function adminCheckout()
	{
		session_start();
		unset($_SESSION['activeAdmin']);
		session_destroy();
		redirect(base_url('super_admin'));
	}


	public function singleBookEdit()
	{
		$bookNewName = addslashes($_POST['editedName']);
		$bookNewCategory = $_POST['editedCategory'];
		$bookNewAuthor = addslashes($_POST['editedAuthor']);
		$bookNewOPrice = $_POST['editedOrgPrice'];
		$bookNewSPrice = $_POST['editedOrgSalesPrice'];
		$bookNewDesc = addslashes($_POST['editedDescription']);
		$bookCoverAddress = addslashes($_POST['bookCoverAddrs']);

		// image configurations
		$config['file_name'] = $_FILES['editedBookCover']['name'];
		$config['upload_path'] = 'modules/bookCover/';
		$config['allowed_types'] = 'jpeg|jpg|png';
		$config['file_ext_tolower'] = TRUE;
		$config['overwrite'] = FALSE;
		$config['remove_spaces'] = TRUE;

		$bookId = $_GET['id'];
		$covercompleteAddress = base_url().$config['upload_path'].$config['file_name'];

		$this->load->library('upload', $config);

		if(isset($_POST['editBookDetails']))
		{
			if($this->upload->do_upload('editedBookCover'))
			{
				$this->upload->do_upload('editedBookCover');

				move_uploaded_file($config['upload_path'],$covercompleteAddress);

				$this->db->query("UPDATE book_directory SET book_name='$bookNewName',category='$bookNewCategory',author_name='$bookNewAuthor',original_price='$bookNewOPrice',sales_price='$bookNewSPrice',book_description='$bookNewDesc',book_cover='$covercompleteAddress' WHERE id = '$bookId'");

				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		        echo '<script type="text/javascript">';
		        echo 'setTimeout(function () {';
		        echo '  swal({';
		        echo '      title: "Data Updated Successfully",';
		        echo '      text: "We are pleased to inform you that we have successfully updated the details of your books. Your records are now up to date with the latest information.",';
		        echo '      icon: "success"';
		        echo '  }).then(function() {';
		        echo '      window.location.href = "'.base_url('editExistingBook').'";';  
		        echo '  });';
		        echo '}, 100);';
		        echo '</script>';
			}
			else
			{
				$this->db->query("UPDATE book_directory SET book_name='$bookNewName',category='$bookNewCategory',author_name='$bookNewAuthor',original_price='$bookNewOPrice',sales_price='$bookNewSPrice',book_description='$bookNewDesc',book_cover='$bookCoverAddress' WHERE id = '$bookId'");

				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		        echo '<script type="text/javascript">';
		        echo 'setTimeout(function () {';
		        echo '  swal({';
		        echo '      title: "Data Updated Successfully",';
		        echo '      text: "We are pleased to inform you that we have successfully updated the details of your books. Your records are now up to date with the latest information.",';
		        echo '      icon: "success"';
		        echo '  }).then(function() {';
		        echo '      window.location.href = "'.base_url('editExistingBook').'";';  
		        echo '  });';
		        echo '}, 100);';
		        echo '</script>';
			}
			
		}
	}


	public function deleteSingleBookData()
	{
		$bookID = $this->input->get('id');

		if(isset($_POST['deleteSingleBook']))
		{
			$deleteMyBook = $this->db->query("DELETE FROM book_directory WHERE id='$bookID'");

			if($deleteMyBook)
			{
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		        echo '<script type="text/javascript">';
		        echo 'setTimeout(function () {';
		        echo '  swal({';
		        echo '      title: "Book Deleted Successfully",';
		        echo '      text: " The book has been permanently removed from our database and is no longer accessible.",';
		        echo '      icon: "success"';
		        echo '  }).then(function() {';
		        echo '      window.location.href = "'.base_url('editExistingBook').'";';  
		        echo '  });';
		        echo '}, 100);';
		        echo '</script>';
			}
			else
			{
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		        echo '<script type="text/javascript">';
		        echo 'setTimeout(function () {';
		        echo '  swal({';
		        echo '      title: "Deletion Failed!",';
		        echo '      text: " The deletion of the book was unsuccessful. Please try again or contact support for further assistance.",';
		        echo '      icon: "error"';
		        echo '  }).then(function() {';
		        echo '      window.location.href = "'.base_url('editExistingBook').'";';  
		        echo '  });';
		        echo '}, 100);';
		        echo '</script>';
			}			
		}
		else
		{
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		        echo '<script type="text/javascript">';
		        echo 'setTimeout(function () {';
		        echo '  swal({';
		        echo '      title: "Invalid Book Id!",';
		        echo '      text: "The book you are trying to delete does not exist with the provided ID. Please verify the ID or log in again to fetch the current details.",';
		        echo '      icon: "error"';
		        echo '  }).then(function() {';
		        echo '      window.location.href = "'.base_url('editExistingBook').'";';  
		        echo '  });';
		        echo '}, 100);';
		        echo '</script>';
		}
	}


}


?>
