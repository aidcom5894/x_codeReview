<?php 

$this->load->view('master_page/user_dashHeader');
$this->load->view('master_page/user_dashNavbar');
$this->load->view('master_page/user_dashSidebar');

$rupee = new \IndRupee\IndRupee();

?>

<div class="page-body"> 
<div class="container-fluid">            
<div class="page-title"> 
<div class="row">
<div class="col-6">
<h4>
Dashboard</h4>
</div>
<div class="col-6"> 
<ol class="breadcrumb"> 
<li class="breadcrumb-item"> <a href="index.html">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
</svg></a></li>
<li class="breadcrumb-item">Dashboard </li>
<li class="breadcrumb-item active">Parents</li>
</ol>
</div>
</div>
</div>
</div>
<!-- Container-fluid starts -->
<div class="container-fluid">
<div class="row"> 

<div class="col-xl-6 box-col-7"> 
<div class="row">
<div class="col-xl-5 col-sm-6">
<div class="card">
<div class="card-body"> 


<ul class="product-costing">
<?php 

$countTransaction = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
?>
<li class="product-cost">
<div class="product-icon bg-primary-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#activity"></use>
</svg>
</div>
<div><span class="f-w-500 f-14 mb-0">No. of Purchase</span>
<h2 class="f-w-600"><?php echo $countTransaction->num_rows(); ?></h2>
</div>
</li>
<li> <span class="f-light f-14 f-w-500">How frequently you have shopped</span></li>
</ul>

<?php 

$countMyChild = $this->db->query("SELECT * FROM child_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
?>

<ul class="product-costing">
<li class="product-cost">
<div class="product-icon bg-warning-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#people"></use>
</svg>
</div>
<div><span class="f-w-500 f-14 mb-0">Child Profile</span>
<h2 class="f-w-600"><?php echo $countMyChild->num_rows(); ?></h2>
</div>
</li>
<li> <span class="f-light f-14 f-w-500">Child Enrolled to this Portal </span></li>
</ul>

<?php 

$totalInvestment = 0;
$fetchMyInvestments = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no = '{$_SESSION['activeUser']}' AND purchase_status = 'Items Purchased' AND payment_status = 'Payment Completed'");
foreach ($fetchMyInvestments->result() as $row)
{
  $costing = $row->book_price;
  $totalInvestment += (int)$costing;
}

?>

<ul class="product-costing">
<li class="product-cost">
<div class="product-icon bg-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#task-square"></use>
</svg>
</div>
<div><span class="f-w-500 f-14 mb-0">Total Investment</span>
<h2 class="f-w-600"><?php echo $rupee->withcomma($totalInvestment,1); ?></h2>
</div>
</li>
<li> <span class="f-light f-14 f-w-500">Contributed in Child's Education</span></li>
</ul>

<?php 

$totalLiability = 0;
$fetchMyInvestments = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no = '{$_SESSION['activeUser']}' AND purchase_status = 'On Hold' AND payment_status = 'Payment Pending'");
foreach ($fetchMyInvestments->result() as $row)
{
  $costingliability = $row->book_price;
  $totalLiability += (int)$costingliability;
}

?>

<ul class="product-costing">
<li class="product-cost">
<div class="product-icon bg-danger-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#money-recive"></use>
</svg>
</div>
<div><span class="f-w-500 f-14 mb-0">Amount in Cart</span>
<h2 class="f-w-600"><?php echo $rupee->withcomma($totalLiability,1); ?></h2>
</div>
</li>
<li> <span class="f-light f-14 f-w-500">Items On-hold in your Cart</span></li>
</ul>

</div>
</div>
</div>

<!-- section for another chart starts here -->
<div class="col-xl-7 col-sm-6">
<div class="card height-equal">
<div class="card-header pb-0 total-revenue card-no-border"> 
<h4>Sale History </h4><a href="">View All</a>
</div>

<div class="card-body"> 
<ul>
<?php 


$this->db->select('*');
$this->db->from('user_cart');
$this->db->order_by('id', 'DESC');
$this->db->where('parent_enrollment_no',$_SESSION['activeUser']); 
$this->db->limit(5);
$fetchTotalShopping = $this->db->get();

foreach ($fetchTotalShopping->result() as $row) { ?>
  
<li class="sale-history-card">
<div class="history-price"><a class="f-w-500 f-14  mb-0" href="#"><?php echo character_limiter($row->book_name,15); ?></a><span class="mb-0 txt-primary f-w-600 f-16">₹ <?php echo $row->book_price; ?></span></div>
<div class="state-time"> <span class="f-w-500 f-14 f-light mb-0"><?php echo "Qty Purchased: ". $row->quantity; ?></span><span class="f-w-400 f-14 f-light"><?php echo date('d/m/Y',strtotime($row->cart_addition_date)); ?></span></div>
</li>
<?php } ?>

</ul>
</div>



</div>
</div>
<!-- section for another chart ends here -->
</div>
</div>

<?php 

$totalInvestment = 0;
$fetchMyInvestments = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no = '{$_SESSION['activeUser']}' AND purchase_status = 'Items Purchased' AND payment_status = 'Payment Completed'");
foreach ($fetchMyInvestments->result() as $row)
{
  $costing = $row->book_price;
  $totalInvestment += (int)$costing;
}

?>

<div class="col-xl-3 col-md-6 box-col-5 total-revenue-total-order">
<div class="row"> 
<div class="col-xl-12">
<div class="card"> 
<div class="card-body"> 
<div class="total-revenue mb-2"> <span>Total Investment</span><a href="index.html">View Report</a></div>
<h3 class="f-w-600"><?php echo $rupee->withcomma($totalInvestment,1); ?> </h3>
<div class="total-chart">
<div class="data-grow d-flex gap-2"><i class="font-primary" data-feather="arrow-up-right"></i><span class="f-w-500"><?php echo $rupee->inwords($totalInvestment). " Only"; ?></span></div>
<div class="total-revenue-chart"> 
<div id="revenue"></div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>

<div class="col-xl-3 col-md-6 special-Offer-banner box-col-none">

<div class="card ">
<div class="card-header border-l-primary border-3 text-center">
<h4>Insights</h4>
<?php 

$fetchThoughts = $this->db->query("SELECT quotes FROM quotesForDay ORDER BY RAND() LIMIT 1");
foreach ($fetchThoughts->result() as $row) { ?>
	<p class="mt-1 f-m-light"><?php echo $row->quotes; ?></p>
<?php } ?>
</div>
<div class="card-body">
<img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/thoughts/da.jpg" itemprop="thumbnail" alt="Image description">
</div>
</div>

</div>

</div>
</div>

<!-- Container-fluid Ends -->
</div>



<?php 

$this->load->view('master_page/user_dashFooter');

?>