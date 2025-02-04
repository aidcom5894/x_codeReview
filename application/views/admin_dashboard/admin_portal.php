<?php 

$this->load->view('master_page/admin_dashHeader');
$this->load->view('master_page/admin_dashNavbar');
$this->load->view('master_page/admin_dashSidebar');

$rupee = new \IndRupee\IndRupee();

use NumberToWords\NumberToWords;

// create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new number transformer using the RFC 3066 language identifier
$numberTransformer = $numberToWords->getNumberTransformer('en');

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
<li class="breadcrumb-item"> <a href="<?php echo base_url('admin_portal'); ?>">
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
</svg></a></li>
<li class="breadcrumb-item">Dashboard </li>
<li class="breadcrumb-item active">Super Admin</li>
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
<div class="card height-equal">
<div class="card-body"> 

<?php 

$totalBookCost = 0;

$fetchTotalCost = $this->db->query("SELECT * FROM user_cart");
foreach($fetchTotalCost->result() as $row)
{
  $bookAmt = $row->total_price;
  $totalBookCost += (int) $bookAmt;
}

?>  

<ul class="product-costing">

<li class="product-cost">
<div class="product-icon bg-primary-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#activity"></use>
</svg>
</div>
<div><span class="f-w-500 f-14 mb-0">Total Transactions</span>
<h2 class="f-w-600"><?php echo $rupee->withcomma($totalBookCost,1); ?></h2>
</div>
</li>

<li> <span class="f-light f-14 f-w-500">Congrats <?php echo $rupee->inlakhs($totalBookCost,2,1); ?> Transacted</span></li>
</ul>

<?php 

$countEnrolledChild = $this->db->query("SELECT * FROM child_directory");

?>

<ul class="product-costing">
<li class="product-cost">
<div class="product-icon bg-warning-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#people"></use>
</svg>
</div>
<div><span class="f-w-500 f-14 mb-0">Child Enrolled</span>
<h2 class="f-w-600"><?php echo $countEnrolledChild->num_rows(); ?></h2>
</div>
</li>
<li> <span class="f-light f-14 f-w-500">We educated <?php echo $countEnrolledChild->num_rows(); ?> Children </span></li>
</ul>

<?php 

$fetchParentsData = $this->db->query("SELECT * FROM parent_directory");

?>
<ul class="product-costing">
<li class="product-cost">
<div class="product-icon bg-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#task-square"></use>
</svg>
</div>
<div><span class="f-w-500 f-14 mb-0">Parents Onboarded</span>
<h2 class="f-w-600"><?php echo $fetchParentsData->num_rows(); ?></h2>
</div>
</li>
<li> <span class="f-light f-14 f-w-500"><?php echo $fetchParentsData->num_rows(); ?> Parents Trusted us</span></li>
</ul>

<ul class="product-costing">
<li class="product-cost">
<div class="product-icon bg-danger-light">
<svg>
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#money-recive"></use>
</svg>
</div>

<?php 

$totalDueFee = 0;

$fetchTotalCost = $this->db->query("SELECT * FROM user_cart WHERE payment_status = 'Payment Pending'");
foreach($fetchTotalCost->result() as $row)
{
  $BookDueAmt = $row->total_price;
  $totalDueFee += (int) $BookDueAmt;
}

?>  
<div><span class="f-w-500 f-14 mb-0">Payment Dues</span>
<h2 class="f-w-600"><?php echo $rupee->withcomma($totalDueFee,1); ?></h2>
</div>
</li>
<li> <span class="f-light f-14 f-w-500">Payments Due By Customers</span></li>
</ul>


</div>
</div>
</div>

<!-- section for another chart starts here -->
<div class="col-xl-7 col-sm-6">
<div class="card">
<div class="card-header pb-0 total-revenue card-no-border"> 
<h4>Sale History </h4><a href="">View All</a>
</div>
<div class="card-body"> 
<ul>

<?php 

$paymentStatus = 'Payment Completed';

$this->db->select('*');
$this->db->from('user_cart');
$this->db->where('user_cart.payment_status', $paymentStatus);
$this->db->join('parent_directory', 'user_cart.parent_enrollment_no = parent_directory.parent_enrollment_no');
$this->db->order_by('user_cart.id', 'DESC'); 
$this->db->limit(5);

$fetchParentDetails = $this->db->get();

foreach($fetchParentDetails->result() as $row) { ?>

 

<li class="sale-history-card">
<div class="history-price"><a class="f-w-500 f-14  mb-0" href="#"><?php echo $row->book_name; ?></a><span class="mb-0 txt-primary f-w-600 f-16"><?php echo "&#8377;". $row->total_price; ?></span></div>
<div class="state-time"> <span class="f-w-500 f-14 f-light mb-0"><?php echo $row->parents_name; ?></span><span class="f-w-400 f-14 f-light"><?php echo date('d/m/Y',strtotime($row->cart_addition_date)); ?></span></div>
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

$totalCosting = 0;

$fetchCostingDetails = $this->db->query("SELECT * FROM user_cart WHERE payment_status = 'Payment Completed'");
foreach ($fetchCostingDetails->result() as $row)
{
  $fetchCost = $row->total_price;
  $totalCosting += (int) $fetchCost;
}

?>

<div class="col-xl-3 col-md-6 box-col-5 total-revenue-total-order">
<div class="row"> 
<div class="col-xl-12">
<div class="card"> 
<div class="card-body"> 
<div class="total-revenue mb-2"> <span>Total Revenue</span><a href="#">View Report</a></div>
<h3 class="f-w-600"><?php echo $rupee->withcomma($totalCosting,1); ?> </h3>
<div class="total-chart">
<div class="data-grow d-flex gap-2"><i class="font-primary" data-feather="arrow-up-right"></i><span class="f-w-500"><?php echo "Total of " . $rupee->inlakhs($totalCosting,2,1); ?></span></div>
<div class="total-revenue-chart"> 
<div id="revenue"></div>
</div>
</div>
</div>
</div>
</div>

<?php 

$fetchBookstoreDetails = $this->db->query("SELECT * FROM user_cart");
$countEntry = $fetchBookstoreDetails->num_rows();

?>

<div class="col-xl-12">
<div class="card"> 
<div class="card-body"> 
<div class="total-revenue mb-2"> <span>Books Purchased</span><a href="#">View Report</a></div>
<h3 class="f-w-600"><?php echo $countEntry; ?></h3>
<div class="total-chart">
<div class="data-grow d-flex gap-2"> <i class="font-secondary" data-feather="arrow-up-right"></i><span class="f-w-500"><?php echo ucwords($numberTransformer->toWords($countEntry));?></span></div>
<div class="total-order">
<div id="totalOrder"></div>
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
<img class="img-fluid" src="<?php echo base_url(); ?>modules/dashboard/assets/images/thoughts/adminImg.jpg" itemprop="thumbnail" alt="Image description">
</div>
</div>
</div>
</div>

<!-- section for another row starts here -->
<!-- section for another row ends here -->

</div>
<!-- Container-fluid Ends -->
</div>













<?php 

$this->load->view('master_page/admin_dashFooter');

?>