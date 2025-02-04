<?php 

$this->load->view('master_page/user_dashHeader');
$this->load->view('master_page/user_dashNavbar');
$this->load->view('master_page/user_dashSidebar');


?>


<!-- section for profile edit starts here -->
 <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Edit Profile</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_portal'); ?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Form Controls</li>
                    <li class="breadcrumb-item active">Profile Mgmt</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Profile Management</h4>
                    <p class="f-m-light mt-1">Be wary of phishing attempts. Don’t click on suspicious links or provide your password to unverified sites.</p>
                  </div>
                  <div class="card-body">
                    <div class="card-wrapper border rounded-3">

                      <form class="row g-3" method="POST" action="<?php echo base_url('changeUserPassword'); ?>">

                        <div class="col-md-12">
                          <label class="form-label">Old Password</label>
                          <input class="form-control" type="password" name="oldPassword">
                        </div>

                        <div class="row">

                        <div class="col-md-6">
                          <label class="form-label">New Password</label>
                          <input class="form-control" type="password" minlength="8" name="newPassword" required>
                        </div>

                        <div class="col-md-6">
                          <label class="form-label" >Confirm Password</label>
                          <input class="form-control" type="password" minlength="8" name="cnfPassword" required>
                        </div>

                        </div>
                   
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit" name="passwordUpdate">Update Details </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Password Setting Instructions</h4>
                    <p class="f-m-light mt-1">Best practices for Setting and Managing Passwords</p>
                  </div>
                  <div class="card-body">
                      <ol type="I">
                        <code> <li>Aim for at least 8 characters. Longer passwords are generally more secure.</li></code>
                        <code> <li>Use a mix of uppercase letters, lowercase letters, numbers, and special characters<br> (e.g., !, @, #, $).</li></code>
                        <code> <li>Don't use easily guessable words, sequences, or patterns (e.g., "password", "123456", "qwerty").</li></code>
                        <code> <li>Consider using a passphrase—a sequence of random words or a sentence that's easy to remember but hard to guess (e.g., "HorseBatteryStaple!") for better security. </li></code>
                        <code><li>Use a different password for each account to prevent a security breach on one account from affecting others.</li></code>
                        <code><li>Change your passwords periodically, especially for sensitive accounts such as email, banking, and social media.</li></code>
                      
                      </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- section for profile edit ends here -->

<?php 

$this->load->view('master_page/user_dashFooter');

?>