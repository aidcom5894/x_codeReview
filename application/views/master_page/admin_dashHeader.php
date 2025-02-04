<?php 

if(!isset($_SESSION['activeAdmin']))
{
	redirect(base_url('checkoutAdmin'));
}

?>
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
<title>Super Admin Portal</title>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/slick-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/scrollbar.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/animate.css">
<!-- Plugins css Ends-->
<!-- Bootstrap css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/vendors/bootstrap.css">
<!-- App css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/style.css">
<link id="color" rel="stylesheet" href="<?php echo base_url(); ?>modules/dashboard/assets/css/color-1.css" media="screen">
<!-- Responsive css-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>modules/dashboard/assets/css/responsive.css">

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">


<script type="text/javascript" src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>



</head>
<body> 
<!-- loader starts-->
<!-- <div class="loader-wrapper">
<div class="loader"> 
<div class="loader4"></div>
</div>
</div> -->
<!-- loader ends-->
