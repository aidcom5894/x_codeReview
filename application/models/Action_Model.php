<?php 

defined('BASEPATH') OR exit('no direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Load Composer's autoloader
require 'vendor/autoload.php';

/**
 * 
 */
class Action_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function fetchParentDetails()
	{
		$parentcontact = $_POST['contactNo'];

		$fetchParentDtls = $this->db->query("SELECT * FROM parent_directory WHERE parents_contact = '$parentcontact'");
		foreach($fetchParentDtls->result() as $row){
			$pcontacts = $row->parents_contact;
			$penrollmentNo = $row->parent_enrollment_no;
		}

		if(isset($_POST['fetchParents']))
		{
			if($fetchParentDtls->num_rows()>0)
			{
				redirect(base_url('user_Signup?parents_contact='.$row->parents_contact.''));				
			}
			else
			{
			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		    echo '<script type="text/javascript">';
		    echo 'setTimeout(function () {';
		    echo '    swal({';
		    echo '        title: "Access Denied! Registration Required",';
		    echo '        text: "We are sorry, but your contact details could not be found in our system. It appears you are not registered with the Classical Conversations Portal. Access to our bookstore is restricted to registered members only.",';
		    echo '        icon: "error"';
		    echo '    }).then(function() {';
		    echo '        window.location.href = "'.base_url('user_portal').'";';  
		    echo '    });';
		    echo '}, 100);';
		    echo '</script>';
			}						
		}		
	}

	public function setPassword()
	{
		$enteredPassword = $_POST['parentPassword'];

		$pid = $_POST['parentEnrollID'];

		$parentsDetailsByContact = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='$pid'");
		foreach ($parentsDetailsByContact->result() as $row)
		{
			$parentsUID = $row->parent_enrollment_no;
			$parentPortalpswd = $row->portal_password;
		}

		if(isset($_POST['updatePassword']))
		{
			if($parentPortalpswd == '')
			{
				$this->db->query("UPDATE parent_directory SET portal_password='$enteredPassword' WHERE parent_enrollment_no='$pid'");

				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			    echo '<script type="text/javascript">';
			    echo 'setTimeout(function () {';
			    echo '    swal({';
			    echo '        title: "New Password Updated",';
			    echo '        text: "You can now Login to your Portal with the New Password. Happy Surfing",';
			    echo '        icon: "success"';
			    echo '    }).then(function() {';
			    echo '        window.location.href = "'.base_url('user_portal').'";';  
			    echo '    });';
			    echo '}, 100);';
			    echo '</script>';
			}
			else
			{
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			    echo '<script type="text/javascript">';
			    echo 'setTimeout(function () {';
			    echo '    swal({';
			    echo '        title: "Password Already Set!",';
			    echo '        text: "You have already set your password. This portal is for users setting their password for the first time only. To change or update your password, visit your portal and update your password from the settings section available at the top right corner of the dashboard.",';
			    echo '        icon: "error"';
			    echo '    }).then(function() {';
			    echo '        window.location.href = "'.base_url('user_portal').'";';  
			    echo '    });';
			    echo '}, 100);';
			    echo '</script>';
			}						
		}		
	}

	public function userPortalLoginAccess()
	{
		$parentEID = $_POST['parentEID'];
		$parentEmail = $_POST['parentEmail'];
		$parentPassword = $_POST['portalPassword'];

		$matchExistingData = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='$parentEID' AND parents_email = '$parentEmail' AND portal_password='$parentPassword'");

		if(isset($_POST['userPortalLogin']))
		{

			if($matchExistingData->num_rows()>0)
			{			
				$_SESSION['activeUser'] = $parentEID;

				redirect(base_url('bookstore'));
			}
			else
			{
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			    echo '<script type="text/javascript">';
			    echo 'setTimeout(function () {';
			    echo '    swal({';
			    echo '        title: "Credentials Mismatched!",';
			    echo '        text: "We are sorry, but it looks like your credentials does not match our records. For security reasons, we cannot allow your login at this time. Please double-check your information and try again. If you continue to experience issues, contact our support team for assistance.",';
			    echo '        icon: "error"';
			    echo '    }).then(function() {';
			    echo '        window.location.href = "'.base_url('user_portal').'";';  
			    echo '    });';
			    echo '}, 100);';
			    echo '</script>';
			}
		}
	}

	public function formAssistance()
	{
		$username = $_POST['userName'];
		$userEmail = $_POST['userEmail'];
		$userContact = $_POST['userContact'];
		$query = $_POST['query'];

		if(isset($_POST['sendQuery']))
		{
			$userQuery = array(
				'name' => $username,
				'email' => $userEmail,
				'contact' => $userContact,
				'message' => $query
			);
			$this->db->insert('form_assistance',$userQuery);

				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			    echo '<script type="text/javascript">';
			    echo 'setTimeout(function () {';
			    echo '    swal({';
			    echo '        title: "Query Sent to Admin",';
			    echo '        text: "Thank you for reaching out! Your email has been successfully sent, and one of our representatives will contact you soon. We appreciate your patience and look forward to assisting you.",';
			    echo '        icon: "success"';
			    echo '    }).then(function() {';
			    echo '        window.location.href = "'.base_url().'";';  
			    echo '    });';
			    echo '}, 100);';
			    echo '</script>';

			    $mailBody = "<b>Dear Admin,</b><br> A user with Email: <b>$userEmail</b> and Contact No.: <b>$userContact</b> posted a query for you. <br> The user needs assistance on the following Query, which says: <br> $query. <br><h3 style='color:#055487'>Please provide them assistance with their query ASAP.</h3><br> <b>Thanks & Regards,</b><br> Support Team <br> Classical Conversations.";

			    //Create an instance; passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
				    //Server settings
				    $mail->SMTPDebug = 0;                      //Enable verbose debug output
				    $mail->isSMTP();                                            //Send using SMTP
				    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
				    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				    $mail->Username   = 'apikey';                     //SMTP username
				    $mail->Password   = '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';                               //SMTP password
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				    //Recipients
				    $mail->setFrom('support@aadamya.in', 'CC Bookstore');
				    $mail->addAddress('cchristian@classicalconversations.com');     //Add a recipient
				    $mail->addAddress('developerbth@gmail.com');     			   //Add a recipient
				    $mail->addBCC('developerbth@gmail.com');

				    //Content
				    $mail->isHTML(true);                                  //Set email format to HTML
				    $mail->Subject = 'Query Assistance from CC Bookstore';
				    $mail->Body    = $mailBody;

				    $mail->send();
				    echo 'Message has been sent';
				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}
		}
	}

	public function addToCart()
	{
		if(!isset($_SESSION['activeUser']))
		{
			redirect(base_url('user_portal'));
		}

		if(isset($_SESSION['activeUser']))
		{
			$dummyData = 'To be Updated';
			$prodID = $_GET['id'];
			$activeParentsData = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
			foreach ($activeParentsData->result() as $row)
			{
				$parentEID = $row->parent_enrollment_no;
			}
			$fetchProductDetails = $this->db->query("SELECT * FROM book_directory WHERE id='$prodID'");
			foreach ($fetchProductDetails->result() as $row)
			{
				$bookName = $row->book_name;
				$totalPrice = $row->sales_price;
				$bookPageCover = $row->book_cover;
			}

			$cartEntryDetails = array(
				'parent_enrollment_no' => $parentEID,
				'book_name' => $bookName,
				'book_price' => $totalPrice,
				'quantity' => 1,
				'total_price' => $totalPrice,
				'purchase_status' => 'On Hold',
				'amount_received' => $dummyData,
				'amount_pending' => $dummyData,
				'upi_transaction_id' => $dummyData,
				'payment_status' => 'Payment Pending',
				'delivery_address' => $dummyData,
				'book_review' => $dummyData,
				'star_rating' => $dummyData,				
				'book_cover' => $bookPageCover,				
				);

			$this->db->insert('user_cart',$cartEntryDetails);

			echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
		    echo '<script type="text/javascript">';
		    echo 'setTimeout(function () {';
		    echo '    swal({';
		    echo '        title: "Product Added Successfully!",';
		    echo '        text: "Your product has been successfully added to the cart. You can continue shopping for more amazing items or proceed to checkout to complete your purchase. Happy shopping!",';
		    echo '        icon: "success"';
		    echo '    }).then(function() {';
		    echo '        window.location.href = "'.base_url('bookstore').'";';  
		    echo '    });';
		    echo '}, 100);';
		    echo '</script>';
		}		
	}


	public function deleteCartItems()
	{
		$prodtID = $_GET['id'];
		$this->db->where('id', $prodtID);
		$this->db->delete('user_cart');
		redirect(base_url('bookstore_cart'));
	}

	public function finalCheckOut()
	{

		if(isset($_POST['cartCheckout']))
		{

		$parentsBrief = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");

		foreach ($parentsBrief->result() as $row)
		{
			$parentsEmail = $row->parents_email;
			$parentsName = $row->parents_name;
		}

		// cost calculations & shipping address here
		$state = $_POST['cartParentState'];
		$townCity = $_POST['cartParentCity'];
		$zipCode = $_POST['cartParentPincode'];
		$homeLocation = $_POST['cartParentHome'];

		$completeAddress = $homeLocation.", ".$townCity.", ".$state.", ".$zipCode;

		$transactionUID = $_POST['transactionID'];

		$cartAmount = 0;
		$getStatus = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no='{$_SESSION['activeUser']}' AND payment_status = 'Payment Pending' AND purchase_status = 'On Hold'");
		foreach ($getStatus->result() as $row)
		{
			
			$bookCost = $row->book_price;
			$quantity = $row->quantity;
			$cartTotal = $row->total_price;

			$purchaseAMT = (int)$bookCost * $quantity;
			$cartAmount += (int) $purchaseAMT;
		}

		// pdf invoice generation
			$mpdf = new \Mpdf\Mpdf();
			$invoiceAddress = 'modules/downloaded_invoice/'.$transactionUID.'.pdf';
	        $html = $this->load->view('uiPages/purchase_invoice',[],true);
	        $mpdf->WriteHTML($html);
	        $mpdf->debug = true; 
	        $mpdf->Output($invoiceAddress,'F'); // opens in browser
	        chmod($invoiceAddress, 0777);

	        $completeInvoiceAddress = base_url().$invoiceAddress;

	        $transationDate = date('d/m/Y');

		// cost calculations & shipping address here

		$transactionMail = "<b>Dear $parentsName,</b><br>We are thrilled to extend our heartfelt gratitude to you for purchasing books from our online store. Your support means the world to us, and we are committed to providing you with the best possible service.<br> Your purchase has been successfully processed.<br>Your invoice will be available on your dashboard for your convenience.<br><br><b>Thanks & Regards,</b><br>Support Team,<br>Classical Conversations.";

		$this->db->query("UPDATE user_cart SET amount_received ='$cartAmount',upi_transaction_id = '$transactionUID', delivery_address = '$completeAddress', gernerated_invoice = '$completeInvoiceAddress',invoice_date='$transationDate', purchase_status='Items Purchased',payment_status='Payment Completed' WHERE parent_enrollment_no='{$_SESSION['activeUser']}' AND payment_status = 'Payment Pending' AND purchase_status = 'On Hold'");

		$mail = new PHPMailer(true);

				try {
				    //Server settings
				    $mail->SMTPDebug = 0;                      //Enable verbose debug output
				    $mail->isSMTP();                                            //Send using SMTP
				    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
				    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				    $mail->Username   = 'apikey';                     //SMTP username
				    $mail->Password   = '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';                               //SMTP password
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				    //Recipients
				    $mail->setFrom('support@aadamya.in', 'CC Bookstore');
				    $mail->addAddress('cchristian@classicalconversations.com');     //Add a recipient
				    // $mail->addAddress('robinkujur@aidcom.in');     //Add a recipient
				    $mail->addAddress($parentsEmail);     //Add a recipient
				    $mail->addBCC('developerbth@gmail.com');

				     $mail->addAttachment($completeInvoiceAddress);   

				    //Content
				    $mail->isHTML(true);                                  //Set email format to HTML
				    $mail->Subject = 'Thank You for Your Purchase!';
				    $mail->Body    = $transactionMail;

				    $mail->send();
				    echo 'Message has been sent';
				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}

				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			    echo '<script type="text/javascript">';
			    echo 'setTimeout(function () {';
			    echo '    swal({';
			    echo '        title: "Checkout Completed & Payment Processed!",';
			    echo '        text: "Thank you for purchasing from our online store! You will receive your receipt via email shortly, and your invoice will be available on your dashboard.",';
			    echo '        icon: "success"';
			    echo '    }).then(function() {';
			    echo '        window.location.href = "'.base_url('purchase_invoice').'";';  
			    echo '    });';
			    echo '}, 100);';
			    echo '</script>';
			}
	}

	

	public function booksearchClick()
	{
		$fetchBooks = $this->db->query("SELECT * FROM book_directory");

		if(isset($_POST['searchMyBook']))
		{
		    $search_term = $_POST['search_term']; // assuming you have a form input with name="search_term"

		    $this->db->select('*');
		    $this->db->from('book_directory');
		    $this->db->like('book_name', "%". $search_term. "%");
			$this->db->or_like('author_name', "%". $search_term. "%");
			$this->db->or_like('category', "%". $search_term. "%");

		    $matchBookDetails = $this->db->get(); 

		    $data['search_results'] = $matchBookDetails->result();

		    $this->load->view('uiPages/search_Results', $data);
		} else {
		    redirect(base_url());
		}
	}

	public function destroyActiveUser()
	{
		session_start();
		unset($_SESSION['activeUser']);
		session_destroy();
		redirect(base_url('user_portal'));
	}

	public function resetUserPassword()
	{
		$userEmail = $_POST['parentEmail'];
		$userContact = $_POST['parentContact'];

		$updatedpassword = random_string('alnum',8);

		$findUserDetails = $this->db->query("SELECT * FROM parent_directory WHERE parents_email = '$userEmail' AND parents_contact = '$userContact'");
		foreach ($findUserDetails->result() as $row)
		{
			$userfetchedID = $row->parent_enrollment_no;
		}

		$resetPswdMail = "<b>Dear User,</b><br><br>You have chosen to reset your password. Your updated password for your portal is provided below:<br><br><b>Parent Enrollment ID: </b>$userfetchedID<br><b>New Password: </b>$updatedpassword<br><br><h6 style='color:#C70039;'>For your security, please ensure to change the Password soon after logging to your Portal.</h6><br><b>Please ensure the following:</b><br><ul><li>Do not share your new password with anyone.</li><li>Choose a strong password, including a mix of letters, numbers, and special characters.</li><li>Regularly update your password to maintain account security.</li></ul><br><br>Stay vigilant to prevent any unauthorized access to your account.<br></br><b>Thanks & Regards</b><br>Support Team<br>Classical Conversations, India.";

		if(isset($_POST['resetCredentials']))
		{
			if($findUserDetails->num_rows()>0)
			{

				$this->db->query("UPDATE parent_directory SET portal_password='$updatedpassword' WHERE parents_email='$userEmail' AND parents_contact='$userContact'");

				//Create an instance; passing `true` enables exceptions
				$mail = new PHPMailer(true);

				try {
				    //Server settings
				    $mail->SMTPDebug = 0;                      //Enable verbose debug output
				    $mail->isSMTP();                                            //Send using SMTP
				    $mail->Host       = 'smtp.sendgrid.net';                     //Set the SMTP server to send through
				    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
				    $mail->Username   = 'apikey';                     //SMTP username
				    $mail->Password   = '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';                               //SMTP password
				    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
				    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

				    //Recipients
				    $mail->setFrom('support@aadamya.in', 'CC Bookstore');
				    // $mail->addAddress('cchristian@classicalconversations.com');     //Add a recipient
				    // $mail->addAddress('robinkujur@aidcom.in');     //Add a recipient
				    $mail->addAddress($userEmail);     //Add a recipient
				    $mail->addBCC('developerbth@gmail.com');

				     
				    //Content
				    $mail->isHTML(true);                                  //Set email format to HTML
				    $mail->Subject = 'Password Reset Confirmation';
				    $mail->Body    = $resetPswdMail;

				    $mail->send();
				    echo '';
				} catch (Exception $e) {
				    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
				}

				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			    echo '<script type="text/javascript">';
			    echo 'setTimeout(function () {';
			    echo '    swal({';
			    echo '        title: "Password Reset Successful!",';
			    echo '        text: "We have verified your credentials for the Portal and have reset your password. A copy of the updated credentials has been sent over mail. Please ensure to change the system generated password soon after login from Parents Portal Setting located at the top right corner.",';
			    echo '        icon: "success"';
			    echo '    }).then(function() {';
			    echo '        window.location.href = "'.base_url('user_portal').'";';  
			    echo '    });';
			    echo '}, 100);';
			    echo '</script>';
			}
			else
			{
				echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
			    echo '<script type="text/javascript">';
			    echo 'setTimeout(function () {';
			    echo '    swal({';
			    echo '        title: "No Authorised User Found!",';
			    echo '        text: "Sorry, we could not verify your account, hence cannot reset your password for this request. Kindly check your details and enter the correct details to proceed.",';
			    echo '        icon: "error"';
			    echo '    }).then(function() {';
			    echo '        window.location.href = "'.base_url('user_portal').'";';  
			    echo '    });';
			    echo '}, 100);';
			    echo '</script>';
			}
		}
	}

}
?>