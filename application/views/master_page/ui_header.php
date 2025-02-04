<?php 

if(isset($_SESSION['activeUser']))
{
  $fetchParentBySess = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no = '{$_SESSION['activeUser']}'");
  foreach ($fetchParentBySess->result() as $row)
  {
    $pid = $row->parent_enrollment_no;
    $parentName = $row->parents_name;
  }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Booktore HTML5 Template" />

  <title>BookStore | CC</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>modules/ecommerce/assets/media/favicon.png" />

  <!-- All CSS files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>modules/ecommerce/assets/css/vendor/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>modules/ecommerce/assets/css/vendor/font-awesome.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>modules/ecommerce/assets/css/vendor/slick.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>modules/ecommerce/assets/css/vendor/slick-theme.css" />
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>modules/ecommerce/assets/css/vendor/aksVideoPlayer.css" /> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>modules/ecommerce/assets/css/app.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>modules/ecommerce/assets/css/vendor/wizard/smart_wizard_all.min.css">

  <style type="text/css">
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0; 
    }
  </style>

</head>

<body>
  <!-- Preloader-->
  <!-- <div id="preloader">
    <div class="loader">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div> -->

  <!-- Back To Top Start -->
  <a href="#main-wrapper" id="backto-top" class="back-to-top"><i class="fas fa-angle-up"></i></a>
  <!-- Main Wrapper Start -->
  <div id="main-wrapper" class="main-wrapper overflow-hidden">

    <!-- Header Area Start -->
    <header class="header">
      <div class="container-fluid">
        <nav class="navbar upper d-lg-flex d-none">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img alt="" src="<?php echo base_url(); ?>modules/ecommerce/assets/media/brand-logo2.png" style="width: 195px; height: 85px;" />
          </a>
          <div class="search-bar">
            <form method="POST" action="<?php echo base_url('search_books'); ?>">
              <div class="form-group header-search">
                <button type="submit" class="fa fa-search form-control-search" name="searchMyBook"></button>
                <input type="text" class="form-control" name="search_term" placeholder="Search Books By Name, Author or Category" />
              </div>
            </form>
          </div>
         

          <div class="right-content">
             <?php 
     
            if(!isset($_SESSION['activeUser'])) { ?>

            <a href="<?php echo base_url('bookstore'); ?>"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/wish-list.png" alt="" /></a>


            <a href="<?php echo base_url('user_portal'); ?>"><span class="position-absolute p-1 translate-middle badge bg-secondary"><small style="font-size: 10px;"></small></span><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/shopping-cart.png" alt="" /></a>

            
            <ul class="unstyled">
            	<li>
                <a href="<?php echo base_url('user_portal'); ?>" class="login-border active">
                  <h6>User</h6>
                </a>
              </li>

              <li>
                <a href="<?php echo base_url('user_portal'); ?>">
                  <h6>Dashboard</h6>
                </a>
              </li>
              
            </ul>
          <?php } ?>

          <?php if(isset($_SESSION['activeUser'])) { ?>

              <a href=""><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/wish-list.png" alt="" /></a>
              <?php 
                $countmyCart = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no = '{$_SESSION['activeUser']}' AND purchase_status='On Hold' AND payment_status = 'Payment Pending'");
                
                $itemCount = $countmyCart->num_rows();

              ?>
            <a href="<?php echo base_url('bookstore_cart'); ?>"><span class="position-absolute p-1 translate-middle badge bg-secondary"><small style="font-size: 10px;"><?php echo $itemCount ?></small></span><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/shopping-cart.png" alt="" /></a>
            <ul class="unstyled">
              <li>
                <a href="#" class="login-border active">
                  <h6><?php echo $parentName; ?></h6>
                </a>
              </li>

              <li>
                <a href="<?php echo base_url('user_dashboard'); ?>">
                  <h6>Dashboard</h6>
                </a>
              </li>
              
            </ul>
          <?php } ?>

          </div>
        </nav>
      </div>
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand d-lg-none" href="index.html">
          <img alt="" src="<?php echo base_url(); ?>modules/ecommerce/assets/media/brand-logo2.png" style="width: 95px; height: 45px; margin-top: -4px;" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav mainmenu m-0">
            <li class="menu-item">
              <h6><a href="<?php echo base_url(); ?>" class="active">Home</a></h6>
            </li>

           <!--  <li class="menu-item">
              <h6><a href="javascript:void(0);">About Us</a></h6>
            </li> -->
            
            <!-- <li class="menu-item-has-children">
              <h6><a href="javascript:void(0);">Category</a></h6>
              <ul class="submenu">
                <li><a href="#">Essential</a></li>
                <li><a href="#">Foundation</a></li>
                <li><a href="#">Challenge</a></li>
              </ul>
            </li> --> 

             <li class="menu-item">
              <h6><a href="<?php echo base_url('category_foundation'); ?>">Foundations</a></h6>
            </li>
            
            <li class="menu-item">
              <h6><a href="<?php echo base_url('category_essentials'); ?>">Essentials</a></h6>
            </li>

            <li class="menu-item">
              <h6><a href="<?php echo base_url('category_challenge'); ?>">Challenge</a></h6>
            </li>

            

         <!--    <li class="menu-item">
              <h6><a href="<?php echo base_url('contact_us'); ?>">Contact Us</a></h6>
            </li>

             -->

            <?php 
            if(!isset($_SESSION['activeUser'])){ ?>
             <li class="menu-item-has-children">
              <h6><a href="javascript:void(0);">My Accounts</a></h6>
              <ul class="submenu">
                <li><a href="<?php echo base_url('user_portal'); ?>">Login</a></li>
                <li><a href="<?php echo base_url('user_signup'); ?>">Register</a></li>
              </ul>
            </li>
          <?php } ?>


          <?php 
            if(isset($_SESSION['activeUser'])){ ?>
             <li class="menu-item-has-children">
              <h6><a href="javascript:void(0);">My Accounts</a></h6>
              <ul class="submenu">
                <li><a href="<?php echo base_url('user_logout'); ?>">Logout</a></li>
              </ul>
            </li>
          <?php } ?>




          </ul>
        </div>
      </nav>
    </header>
    <!-- Header Area end -->
