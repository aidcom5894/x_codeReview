<!-- Page Body Start-->
<div class="page-body-wrapper">
<!-- Page Sidebar Start-->
<div class="sidebar-wrapper" data-layout="stroke-svg">
<div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/brand-logo2.png" alt="" style="width: 120; height: 45px;"></a>
<div class="back-btn"><i class="fa fa-angle-left"> </i></div>
<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
</div>
<div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/logo/logo-icon.png" alt=""></a></div>
<nav class="sidebar-main">
<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
<div id="sidebar-menu">
<ul class="sidebar-links" id="simple-bar">
<li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/logo/logo-icon.png" alt=""></a>
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
</svg><span class="lan-3">Dashboard          </span></a>
<ul class="sidebar-submenu">
<li><a href="<?php echo base_url('user_dashboard'); ?>">Home</a></li>
<li><a href="<?php echo base_url('edit_user_profile'); ?>">Profile</a></li>
<li><a href="<?php echo base_url('password_mgmt'); ?>">Settings</a></li>
</ul>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
<svg class="stroke-icon"> 
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-widget"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-widget"></use>
</svg><span>My Address</span></a>
<ul class="sidebar-submenu">
<li><a href="<?php echo base_url('complete_address'); ?>">Primary Address</a></li>
</ul>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-layout"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-layout"></use>
</svg><span >Child Record</span></a>
<ul class="sidebar-submenu">
<li><a href="<?php echo base_url('view_all_child'); ?>">Child Profile</a></li>
</ul>
</li>
<li class="sidebar-main-title">
<div>
<h6>My Orders</h6>
</div>
</li>
<li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-project"></use>
</svg>
<svg class="fill-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-project"></use>
</svg><span>Transactions</span></a>
<ul class="sidebar-submenu">
<li><a href="<?php echo base_url('my_purchase'); ?>">Purchased Books</a></li>
</ul>
</li>


<li class="sidebar-list"><a href="<?php echo base_url(); ?>" >
<svg class="stroke-icon">
  <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
</svg>
<svg class="fill-icon">
  <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#fill-ecommerce"></use>
</svg><span>Go to Bookstore</span></a>
</li>




</ul>
<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
</div>
</nav>
</div>
<!-- Page Sidebar Ends-->


