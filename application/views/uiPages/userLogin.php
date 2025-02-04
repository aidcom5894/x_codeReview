<?php 

$this->load->view('master_page/ui_header');

?>

<!-- signup area Start -->
<section class="signup p-40 mb-64">
<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="form-block bg-lightest-gray">
                <h3 class="mb-48">User Login Portal</h3>
                   <div class="row mb-24">
                    <div class="col-sm-12">
                        <h6><a href="https://registration.classicalconversations.co.in/" class="link-btn mb-24 mb-sm-0"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/favicon.png" alt="" style="height: 20px;"> Child Enrollment Portal</a></h6>
                    </div>
                    
                </div>
                <h5 class="or mb-4p">or</h5>
                <h6 class="mb-24 text-center">Login with your Credentials</h6>

                <form method="POST" action="<?php echo base_url('userLoginCode'); ?>">
                    <div class="mb-24">
                        <input type="text" class="form-control" id="parentUID" name="parentEID" required placeholder="Parent UID">
                    </div>

                    <div class="mb-24">
                        <input type="email" class="form-control" id="parentEmail" name="parentEmail" required placeholder="Email">
                    </div>

                    <div class="mb-24">
                        <input type="password" class="form-control" id="portalPassword" name="portalPassword" required placeholder="Password">
                    </div>

                    <button type="submit" class="b-unstyle cus-btn w-100 mb-24" name="userPortalLogin">
                        <span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/click-button.png" alt=""></span>Account Login
                    </button>
                </form>
                <div class="register-bottom">
                    <h6>Don’t have account? <a href="<?php echo base_url('user_signup'); ?>" class="color-primary">Register Here</a></h6>
                    <h6 class="text-end"><a href="<?php echo base_url('reset_password'); ?>" class="color-primary">Forgot Password?</a></h6>
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