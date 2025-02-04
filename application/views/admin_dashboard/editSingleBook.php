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
<h4>Edit Books</h4>
</div>
<div class="col-6">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo base_url('editExistingBook'); ?>">                                       
<svg class="stroke-icon">
<use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
</svg></a></li>
<li class="breadcrumb-item">Edit</li>
<li class="breadcrumb-item active">Book Details</li>
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
<p class="f-m-light mt-1">Edit the Creation to, <code>unleash your creativity</code> with our books edit features.</p>
</div>
<div class="card-body">
<div class="card-wrapper border rounded-3">

<?php 
$id = $_GET['id'];

$bookEditQuery = $this->db->query("SELECT * FROM book_directory WHERE id='$id'");

foreach ($bookEditQuery->result() as $row)
{
	$editMyBook = $row->id;
	$editMyBookName = $row->book_name;
	$myBookCategory = $row->category;
	$myBookAuthor = $row->author_name;
	$myBookOrgPrice = $row->original_price;
	$myBookSalesPrice = $row->sales_price;
	$myBookBrief = $row->book_description;
	$mybookCover = $row->book_cover;
}

?>



<form class="row g-3" method="POST" action="<?php echo base_url('update_book_details?id='.$id.''); ?>" enctype="multipart/form-data">


<div class="col-md-6">
<label class="form-label">Book Name</label>
<input class="form-control" name="editedName" type="text" placeholder="Enter Book Title" required value="<?php echo $editMyBookName; ?>">
</div>

<div class="col-md-6">
<label class="form-label">Select Category</label>
<select class="form-select form-select-md" aria-label=".form-select-sm example" name="editedCategory">
<option selected value="<?php echo $myBookCategory ?>"><?php echo $myBookCategory; ?></option>
<option value="Challenge">Challenge</option>
<option value="Essentials">Essentials</option>
<option value="Foundations">Foundations</option>                      
</select>
</div>
   
<div class="col-md-12">
<label class="form-label">Author Name</label>
<input class="form-control" name="editedAuthor" type="text" placeholder="Written By" value="<?php echo $myBookAuthor; ?>">
</div>


<div class="col-md-6">
<label class="form-label" >Original Price</label>
<input class="form-control" name="editedOrgPrice" type="number" placeholder="Original Price" value="<?php echo $myBookOrgPrice; ?>">
</div>


<div class="col-md-6">
<label class="form-label">Sales Price</label>
<input class="form-control" name="editedOrgSalesPrice" type="number" placeholder="Offer Price" value="<?php echo $myBookSalesPrice; ?>">
</div>

<div class="col-md-12">
<label class="form-label">Description</label>
<textarea class="form-control" name="editedDescription" rows="3" placeholder="Brief about the Book Details "><?php echo $myBookBrief; ?></textarea>
</div>

<div class="col-md-6"  style="display:none;">
<label class="form-label">Book Cover Address</label>
<input class="form-control" name="bookCoverAddrs" type="text" placeholder="Offer Price" value="<?php echo $mybookCover; ?>" readonly>
</div>

<div class="col-md-6">
<label class="form-label" >Book Cover</label>
<input class="form-control" id="imageupload" accept="image/jpg,image/png,image/jpeg" name="editedBookCover" type="file" onchange="loadFile(event)">
</div>

<div class="col-md-6" >
<label class="form-label">Selected Cover</label>
<div class="avatars">
<img class="b-r-8 img-100" id="bookCover" src="<?php echo $row->book_cover; ?>" alt="#">
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


<div class="col-12">
<button class="btn btn-primary float-end" type="submit" name="editBookDetails">Save Book</button>
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