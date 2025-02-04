<?php 

$this->load->view('master_page/admin_dashHeader');
$this->load->view('master_page/admin_dashNavbar');
$this->load->view('master_page/admin_dashSidebar');

?>


<div class="page-body">
<div class="container-fluid">
<div class="page-title">
<div class="row">
<div class="col-6">
<h4>New Book Entry</h4>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo base_url('admin_portal'); ?>">                                       
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
</svg></a></li>
<li class="breadcrumb-item">Admin</li>
<li class="breadcrumb-item active">New Book</li>
</ol>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
<h4>Book Details</h4>
<p class="f-m-light mt-1">From concept to completion, <code>unleash your creativity</code> with our book creation features.</p>
</div>
<div class="card-body">
<div class="card-wrapper border rounded-3">


<form class="row g-3" method="POST" action="<?php echo base_url('saveBooksToDB'); ?>" enctype="multipart/form-data">

<div class="col-md-6">
<label class="form-label">Book Name</label>
<input class="form-control" name="bookName" type="text" placeholder="Enter Book Title" required>
</div>

<div class="col-md-6">
<label class="form-label">Select Category</label>
<select class="form-select form-select-md" aria-label=".form-select-sm example" name="bookCategory">
<option selected="">--- Category ---</option>
<option value="Challenge">Challenge</option>
<option value="Essentials">Essentials</option>
<option value="Foundations">Foundations</option>                      
</select>
</div>

<div class="col-md-12">
<label class="form-label">Author Name</label>
<input class="form-control" name="authorName" type="text" placeholder="Written By">
</div>


<div class="col-md-6">
<label class="form-label" >Original Price</label>
<input class="form-control" name="originalPrice" type="number" placeholder="Original Price">
</div>


<div class="col-md-6">
<label class="form-label">Sales Price</label>
<input class="form-control" name="salesPrice" type="number" placeholder="Offer Price">
</div>

<div class="col-md-12">
<label class="form-label">Description</label>
<textarea class="form-control" name="bookDescription" rows="3" placeholder="Brief about the Book Details "></textarea>
</div>

<div class="col-md-6">
<label class="form-label">Available Stock</label>
<input class="form-control" name="purchasedQuantity" type="number" placeholder="Enter Purchased Qty.">
</div>

<div class="col-md-6">
<label class="form-label" >Book Cover</label>
<input class="form-control" id="imageupload" name="bookCoverImage" type="file" onchange="loadFile(event)">
</div>

<div class="col-md-6">
<label class="form-label">Selected Cover</label>
<div class="avatars">
<img class="b-r-8 img-100" id="bookCover" src="<?php echo base_url(); ?>modules/ecommerce/assets/media/images/sign-up.png" alt="#">
</div>
</div>

<script>
var loadFile = function(event) {
var output = document.getElementById('bookCover');
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function() {
URL.revokeObjectURL(output.src) 
}
};
</script>

<?php 

$fetchUploadingAdminName = $this->db->query("SELECT * FROM admin_directory WHERE adminUID = '{$_SESSION['activeAdmin']}'");
foreach ($fetchUploadingAdminName->result() as $row) {
$admName = $row->admin_name;
}

?>
<div class="col-md-6">
<label class="form-label">Uploaded By:</label>
<input class="form-control" name="adminName" type="text" value="<?php echo $admName; ?>" readonly>
</div>




<div class="col-12">
<button class="btn btn-primary float-end" type="submit" name="addBookDetails">Add New Book </button>
</div>
</form>
</div>
</div>
</div>
</div>

</div>
</div>
</div>




<?php 

$this->load->view('master_page/admin_dashFooter');

?>