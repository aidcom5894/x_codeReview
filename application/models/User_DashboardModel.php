<?php 

defined('BASEPATH') OR exit ('no direct script access allowed');

/**
 * 
 */
class User_DashboardModel extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function updateProfile()
	{
		$parentname = $_POST['parentName'];
		$parentEmail = $_POST['parentEmail'];
		$parentContact = $_POST['parentContact'];

		if(isset($_POST['updateParentDetails']))
		{
			$this->db->query("UPDATE parent_directory SET parents_name = '$parentname',	parents_email='$parentEmail',parents_contact = '$parentContact' WHERE parent_enrollment_no='{$_SESSION['activeUser']}' ");

			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {';
            echo '  swal({';
            echo '      title: "Parent Profile Updated!",';
            echo '      text: "The details you provided for the parent\'s profile have been successfully updated.",';
            echo '      icon: "success"';
            echo '  }).then(function() {';
            echo '      window.location.href = "'.base_url('edit_user_profile').'";';  
            echo '  });';
            echo '}, 100);';
            echo '</script>';
		}
	}

	public function updateAddressBook()
	{
		$officialAddress = $_POST['offAddress'];
		$deliveryAddress = $_POST['delvAddress'];

		if(isset($_POST['updtAddres']))
		{
			$this->db->query("UPDATE user_cart SET delivery_address='$deliveryAddress' WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
			$this->db->query("UPDATE parent_directory SET home_address='$officialAddress' WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");

			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {';
            echo '  swal({';
            echo '      title: "Address Book Updated!",';
            echo '      text: "Your new address has been updated successfully. We hope this helps us stay in touch with you.",';
            echo '      icon: "success"';
            echo '  }).then(function() {';
            echo '      window.location.href = "'.base_url('complete_address').'";';  
            echo '  });';
            echo '}, 100);';
            echo '</script>';

		}
	}

	public function updateAvatar()
	{
		$config['upload_path'] = 'modules/userAvatar/';
		$config['file_name'] = $_FILES['parentAvatar']['name'];
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['file_ext_tolower'] = TRUE;
		$config['remove_spaces'] = TRUE;
		$config['overwrite'] = FALSE;

		$completeImgAddress = base_url().$config['upload_path'].$config['file_name'];

		$this->load->library('upload', $config);

		if(isset($_POST['avatarUpdate']))
		{
			$this->upload->do_upload('parentAvatar');

			$this->db->query("UPDATE parent_directory SET parent_avatar = '$completeImgAddress' WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");

			move_uploaded_file($config['upload_path'],$completeImgAddress);

			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () {';
            echo '  swal({';
            echo '      title: "Avatar Updated Successfully!",';
            echo '      text: "We recognize our fellow mates through the pictures they use in their profiles. We hope you uploaded a smiling face so we can see and get to know you better.",';
            echo '      icon: "success"';
            echo '  }).then(function() {';
            echo '      window.location.href = "'.base_url('edit_user_profile').'";';  
            echo '  });';
            echo '}, 100);';
            echo '</script>';
		}
	}

	public function passwordReset()
	{
		$oldPassword = $_POST['oldPassword'];
		$newPassword = $_POST['newPassword'];
		$cnfPassword = $_POST['cnfPassword'];

		$fetchMyOldPswd = $this->db->query("SELECT portal_password FROM parent_directory WHERE parent_enrollment_no	= '{$_SESSION['activeUser']}' AND portal_password='$oldPassword'");
		if(isset($_POST['passwordUpdate']))
		{
			if($fetchMyOldPswd->num_rows()>0 AND $newPassword == $cnfPassword)
			{
				$this->db->query("UPDATE parent_directory SET portal_password='$cnfPassword' WHERE parent_enrollment_no	= '{$_SESSION['activeUser']}'");
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
	            echo '<script type="text/javascript">';
	            echo 'setTimeout(function () {';
	            echo '  swal({';
	            echo '      title: "Password Updated!",';
	            echo '      text: "Your password has been updated. Keeping your account secure is our top priority. Thank you for helping us maintain a safe environment.",';
	            echo '      icon: "success"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('user_logout').'";';  
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
	            echo '      title: "Password Mismatch!",';
	            echo '      text: "The new password and confirmation password do not match, or the old password you provided does not exist in our database. Please ensure both passwords are identical and try again.",';
	            echo '      icon: "error"';
	            echo '  }).then(function() {';
	            echo '      window.location.href = "'.base_url('password_mgmt').'";';  
	            echo '  });';
	            echo '}, 100);';
	            echo '</script>';
			}
		}
	}
}

?>