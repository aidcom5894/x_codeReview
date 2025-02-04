<?php 

$this->load->view('master_page/admin_dashHeader');
$this->load->view('master_page/admin_dashNavbar');
$this->load->view('master_page/admin_dashSidebar');

?>

<!-- section for breadcrumb starts here -->
   <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Edit Book Details</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('editExistingBook'); ?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Books</li>
                    <li class="breadcrumb-item active">Edit Books</li>
                  </ol>
                </div>
              </div>


                <!-- section for table -->
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Book Name</th>
                <th>Book Cover</th>
                 <th>Author Name</th>
                <th>Category</th>
                <th>Original Price</th>
                <th>Sales Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
         <?php
            $fetchMyBooks = $this->db->query("SELECT * FROM book_directory");
            foreach ($fetchMyBooks->result() as $row) { ?>
              <tr>
                <td><?php echo $row->id; ?></td>
                <td><?php echo $row->book_name; ?></td>
                <td><img class="img-100 b-r-8" src="<?php echo $row->book_cover; ?>" alt="#"></td>
                <td><?php echo $row->author_name; ?></td>
                <td><?php echo $row->category; ?></td>
                <td><?php echo $row->original_price; ?></td>
                <td><?php echo $row->sales_price; ?></td>
                <td><a href="<?php echo base_url('edit_book_details?id='.$row->id); ?>" class="btn btn-primary" title="btn btn-primary">Edit</a></td>
                <td><a href="<?php echo base_url('confirm_deletion?id='.$row->id); ?>" class="btn btn-danger" title="btn btn-primary">Delete</a></td>
              </tr>
            <?php } ?>
 
        </tbody>
        <tfoot>
            <tr>
               <th>Sl.No</th>
                <th>Book Name</th>
                <th>Book Cover</th>
                <th>Category</th>
                <th>Original Price</th>
                <th>Sales Price</th>
                <th>Available Stock</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
                <!-- section for table -->


            </div>
          </div>

</div>

<!-- section for breadcrumb ends here -->


<script type="text/javascript">
	new DataTable('#example');
</script>


<?php 

$this->load->view('master_page/admin_dashFooter');

?>