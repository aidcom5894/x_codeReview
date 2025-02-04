<?php 

$this->load->view('master_page/ui_header');

?>

<!-- signup area Start -->
<section class="signup p-40 mb-64">
<div class="container">
<div class="row">
<div class="col-xl-6 col-lg-6">
<div class="form-block bg-lightest-gray">
<h3 class="mb-48">User Registration Portal</h3>

<?php 

$fetchPhoneNo = $_GET['parents_contact'];
$fetchParentByPhone = $this->db->query("SELECT * FROM parent_directory WHERE parents_contact='$fetchPhoneNo'");
foreach($fetchParentByPhone->result() as $row)
{
	$parentUID = $row->parent_enrollment_no;
	$parentName = $row->parents_name;
	$parentEmail = $row->parents_email;
	$parentContact = $row->parents_contact;
}

?>


<form method="POST" action="<?php echo base_url('fetchParentsData');?>">
<div class="row mb-18">

<div class="col-sm-6 mb-24">
<input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo $fetchPhoneNo; ?>" required placeholder="Your Contact No.">
</div>

<div class="col-sm-6">
<button type="submit" class="b-unstyle cus-btn w-100 mb-24" name="fetchParents" id="fetchParents">
<span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/click-button.png" alt=""></span>Fetch Details</button>
</div>
</form>

</div>

<h6 class="mb-24 text-center">We value your time. For your convenience, we have fetched your registered details. Please update your password to access the portal.</h6>

<form method="POST" action="<?php echo base_url('passwordUpdation'); ?>">

<div class="row mb-18">

<div class="mb-24 col-sm-6">
<input type="text" class="form-control" id="parentName" name="parentName" value="<?php echo $parentName; ?>" required placeholder="Parents Name" readonly>
</div>

<div class="mb-24 col-sm-6">
<input type="text" class="form-control" id="parentEnrollID" name="parentEnrollID" value="<?php echo $parentUID; ?>" placeholder="Parent Enroll ID" required readonly>
</div>

</div>

<div class="row mb-18">

<div class="mb-24 col-sm-6">
<input type="text" class="form-control" id="parentEmail" name="parentEmail" value="<?php echo $parentEmail; ?>" required placeholder="Parent Email" readonly>
</div>

<div class="mb-24 col-sm-6">
<input type="text" class="form-control" id="parentContact" name="parentContact" value="<?php echo $parentContact; ?>" required placeholder="Parent Contact" readonly>
</div>

</div>



<div class="mb-24">
<input type="password" class="form-control" id="parentPassword" name="parentPassword" required placeholder="Password" minlength="8" maxlength="12">
</div>


<button type="submit" class="b-unstyle cus-btn w-100 mb-24" name="updatePassword">
<span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/click-button.png" alt=""></span>Set Password
</button>
</form>

<div class="register-bottom">
<h6>Already have an account? <a href="<?php echo base_url('user_portal'); ?>" class="color-primary">Login Here</a></h6>
<h6 class="text-end"><a href="https://registration.classicalconversations.co.in/" class="color-primary">Enroll Child</a></h6>
</div>
</div>
</div>
<div class="col-xl-6 col-lg-6">
<div class="sign-up-image bg-lightest-gray br-30 box-shadow">
<img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/images/sign-up.png" alt="">
</div>
</div>
</div>
</div>

</section>




<?php 

$this->load->view('master_page/ui_footer');

?>