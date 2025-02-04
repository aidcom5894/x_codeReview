
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo base_url(); ?>modules/dashboard/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>modules/dashboard/assets/images/favicon.png" type="image/x-icon">
    <title>Admin Login Portal</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url(); ?>modules/dashboard/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/responsive.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
              <div><a class="logo" href="index.html"><img class="img-fluid for-dark" src="<?php echo base_url(); ?>modules/dashboard/assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-light" src="<?php echo base_url(); ?>modules/dashboard/assets/images/brand-logo2.png" alt="loginpage" style="height: 65px;"></a></div>
              <div class="login-main"> 
                <form class="theme-form" method="POST" action="<?php echo base_url('adminAuthorisation'); ?>">
                  <h4>Sign in to account </h4>
                  <p>Enter Credentials to Access the Portal</p>
                 
                 <div class="form-group">
                    <label class="col-form-label">Admin UID</label>
                    <input class="form-control" type="text" name="adminUniqueID" required="" placeholder="Unique ID">
                  </div>
                  
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" name="adminEmail" required="" placeholder="youremail@gmail.com">
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">Password </label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password" name="portalPassword" required="" placeholder="*********">
                      <!-- <div class="show-hide"> <span class="show"></span></div> -->
                    </div>
                  </div>
                    <div class="form-group mb-6">                    
                        <a class="float-end mb-3"  href="">Forgot password?</a>
                        <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                      <a class="btn btn-primary btn-block w-100 mt-3" href="<?php echo base_url(); ?>">Back to Home</a>
                      
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="<?php echo base_url(); ?>modules/dashboard/assets/js/jquery.min.js"></script>
      <!-- Bootstrap js-->
      <script src="<?php echo base_url(); ?>modules/dashboard/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
      <!-- feather icon js-->
      <script src="<?php echo base_url(); ?>modules/dashboard/assets/js/icons/feather-icon/feather.min.js"></script>
      <script src="<?php echo base_url(); ?>modules/dashboard/assets/js/icons/feather-icon/feather-icon.js"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="<?php echo base_url(); ?>modules/dashboard/assets/js/config.js"></script>
      <!-- Plugins JS start-->
      <!-- calendar js-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="<?php echo base_url(); ?>modules/dashboard/assets/js/script.js"></script>
    </div>
  </body>
</html>