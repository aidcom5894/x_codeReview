
<!-- Page Body Start-->
<div class="page-body-wrapper">
<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-layout="stroke-svg">
<div class="logo-wrapper"><a href="<?php echo base_url('admin_portal'); ?>"><img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/brand-logo2.png" alt="" style="width: 120px; height: 50px;"></a>
<div class="back-btn"><i class="fa fa-angle-left"> </i></div>
<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
</div>
<div class="logo-icon-wrapper"><a href="<?php echo base_url('admin_portal'); ?>"><img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/brand-logo2.png" alt="" style="width: 120px; height: 50px;"></a></div>
<nav class="sidebar-main">
<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
<div id="sidebar-menu">
<ul class="sidebar-links" id="simple-bar">
<li class="back-btn"><a href="<?php echo base_url('admin_portal'); ?>"><img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/brand-logo2.png" alt="" style="width: 120px; height: 50px;"></a>
<div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
</li>
<li class="pin-title sidebar-main-title">
<div> 
<h6>Pinned</h6>
</div>
</li>
<li class="sidebar-main-title">
<div>
<h6 class="lan-1">General</h6>
</div>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-home"></use>
</svg><span class="lan-3">Dashboard</span></a>
<ul class="sidebar-submenu">
<li><a href="<?php echo base_url('admin_portal'); ?>">Home</a></li>
<li><a href="<?php echo base_url('profile_mgmt'); ?>">Profile</a></li>
<li><a href="<?php echo base_url('profile_settings'); ?>">Settings</a></li>
</ul>
</li>

<li class="sidebar-main-title">
<div>
<h6>Book Mgmt.</h6>
</div>
</li>

<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
<svg class="stroke-icon"> 
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-widget"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-widget"></use>
</svg><span >Directory</span></a>
<ul class="sidebar-submenu">
<li><a href="<?php echo base_url('add_new_books'); ?>">Add Books</a></li>
<li><a href="<?php echo base_url('editExistingBook'); ?>">Edit Books</a></li>
<li><a href="<?php echo base_url('view_all_books'); ?>">All Books</a></li>
</ul>
</li>
<!-- 
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-learning"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-learning"></use>
</svg><span>Category</span></a>
<ul class="sidebar-submenu">
<li><a href="#">Challenge</a></li>
<li><a href="#">Essentials</a></li>
<li><a href="#">Foundation</a></li>
</ul>
</li> -->


<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url(); ?>" target="_blank">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-job-search"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-job-search"></use>
</svg><span>View My Store</span></a></li>

  <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('deletion_warning'); ?>">
                    <svg class="stroke-icon">
                      <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-task"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-task"> </use>
                    </svg><span>Wipe Data</span></a></li>


<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="<?php echo base_url('checkoutAdmin'); ?>">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-faq"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-faq"></use>
</svg><span>Logout</span></a></li>



</ul>
<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</div>
</nav>
</div>
<!-- Page Sidebar Ends-->



