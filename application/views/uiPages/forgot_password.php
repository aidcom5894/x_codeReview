<?php 

$this->load->view('master_page/ui_header');

?>

<!-- signup area Start -->
<section class="signup p-40 mb-64">
<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="form-block bg-lightest-gray">
                <h3 class="mb-30">Password Reset Portal</h3>
                <h6 class="mb-24 text-center">To reset your password, verify your account using your registered email and contact information. The updated password will be sent to your email for security reasons.</h6>
          

              

                <form method="POST" action="<?php echo base_url('setNewPassword'); ?>">
                    <div class="mb-24">
                        <input type="email" class="form-control" id="parentEmail" name="parentEmail" required placeholder="Email">
                    </div>

                    <div class="mb-24">
                        <input type="number" class="form-control" id="parentContact" name="parentContact" required placeholder="Contact No.">
                    </div>

                    <button type="submit" class="b-unstyle cus-btn w-100 mb-24" name="resetCredentials">
                        <span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/click-button.png" alt=""></span>Account Login
                    </button>
                </form>
                <div class="register-bottom float-end">
                    <h6><a href="<?php echo base_url('user_portal'); ?>" class="color-primary">Cancel Resetting</a></h6>
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