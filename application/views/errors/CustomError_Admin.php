<?php 

$this->load->view('master_page/admin_dashHeader');
$this->load->view('master_page/admin_dashNavbar');
$this->load->view('master_page/admin_dashSidebar');

?>


    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- error-404 start-->
      <div class="error-wrapper">
        <div class="container"><img class="img-100" src="<?php echo base_url(); ?>modules/dashboard/assets/images/other-images/sad.png" alt="">
          <div class="error-heading">
            <h2 class="headline font-success">404</h2>
          </div>
          <div class="col-md-8 offset-md-2">
            <p class="sub-content">The page you are attempting to reach is currently not available. This may be because the page does not exist or has been moved.</p>
          </div>
          <div><a class="btn btn-success btn-lg" href="<?php echo base_url('admin_portal'); ?>">BACK TO DASHBOARD</a></div>
        </div>
      </div>
      <!-- error-404 end      -->
    </div>















<?php 

$this->load->view('master_page/admin_dashFooter');

?>