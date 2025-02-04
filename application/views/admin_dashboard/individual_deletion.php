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
                  <h4>Delete Book</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active"> Edit Profile</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
              	 <div class="col-xl-8">
                  <form class="card">
                    <div class="card-header">
                      <h4 class="card-title mb-0">Book Details</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>

                    <?php 

                      $id = $_GET['id'];
                    	$fetchSelectedBook = $this->db->query("SELECT * FROM book_directory WHERE id = '$id' ");
                    	foreach ($fetchSelectedBook->result() as $row)
                    	{
                        $bookdID = $id;
                    		$deletingBookName = $row->book_name;
                    		$deletingBookCategory = $row->category;
                    		$deletingBookAuthor = $row->author_name;
                    		$deletingBookOprice = $row->original_price;
                    		$deletingBookSprice = $row->sales_price;
                    		$deletingBookBrief = $row->book_description;
                    		$deletingBookStock = $row->available_stock;
                    		$deletingBookCover = $row->book_cover;

                    	}

                    ?>

                    <div class="card-body">
                      <div class="row">

                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Book Name</label>
                            <input class="form-control" type="text" value="<?php echo $deletingBookName; ?>" readonly>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input class="form-control" type="text" value="<?php echo $deletingBookAuthor; ?>" readonly>
                          </div>
                        </div>


                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input class="form-control" type="text" value="<?php echo $deletingBookCategory; ?>" readonly>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Original Price</label>
                            <input class="form-control" type="text" value="<?php echo $deletingBookOprice; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label class="form-label">Sales Price</label>
                            <input class="form-control" type="text" value="<?php echo $deletingBookSprice; ?>" readonly>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="4" placeholder="Enter About your description" readonly><?php echo $deletingBookBrief; ?></textarea>
                          </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                          <div class="mb-3">
                            <label class="form-label">Book Cover</label>
                            <div class="avatars">
							<img class="b-r-8 img-100" id="bookCover" src="<?php echo $deletingBookCover; ?>" alt="#">
							</div>
                          </div>
                        </div>
                      
                      
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <a href="<?php echo base_url('editExistingBook'); ?>" class="btn btn-primary">Cancel Deletion</a>
                    </div>
                  </form>
                </div>

                <div class="col-xl-4">
                  <div class="card height-equal">
                    <div class="card-header">
                      <h4 class="card-title mb-0 text-center">Confirm Deletion</h4>                      
                    </div>
                    <div class="card-body">
                      <form method="POST" action="<?php echo base_url('individual_deletion?id='.$bookdID); ?>">
                        <div class="row mb-2">
                          <div class="profile-title">
                          	<center>
                            <div >
                            	<img class="img-100 b-r-4 " alt="" src="<?php echo base_url(); ?>modules/dashboard/assets/images/gif/delete.gif">

                            </div>
                            </center>
                          </div>
                        </div>

                        <div class="mb-3">
                          <h3 class="form-label text-danger">You are about to Delete this Book!</h3>
                         
                         <p>Your action will permanently delete this data. This process is irreversible and the data cannot be recovered. Please proceed only if you are certain.</p>
                        </div>
                     
                        <div class="form-footer">
                          <button  class="btn btn-danger btn-block form-control" type="submit" name="deleteSingleBook">Yes, Delete Book</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
               
            
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
           
<?php 

$this->load->view('master_page/admin_dashFooter');

?>