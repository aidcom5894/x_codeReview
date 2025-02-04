<?php

$this->load->view('master_page/user_dashHeader');
$this->load->view('master_page/user_dashNavbar');
$this->load->view('master_page/user_dashSidebar');

?>

<!-- section for breadcrumb starts here -->
   <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Child Enrolled</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('editExistingBook'); ?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Enrollments</li>
                    <li class="breadcrumb-item active">All Child</li>
                  </ol>
                </div>
              </div>


                <!-- section for table -->
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sl.No</th>
                <th>Book Cover</th>
                <th>Book Name</th>
                <th>Price</th>
                <th>Quantity</th>
                 <th>Purchase Status</th>
                <th>Payment Status</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
         <?php
            $fetchMyPurchase = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
            foreach ($fetchMyPurchase->result() as $row) { ?>
              <tr>
                <td><?php echo $row->id; ?></td>               
                <td><img class="img-100 b-r-8" src="<?php echo $row->book_cover; ?>" alt="#"></td>
                 <td><?php echo $row->book_name; ?></td>
                <td><?php echo "&#8377; ". $row->book_price; ?></td>
                <td><?php echo $row->quantity; ?></td>
                <td><?php echo $row->purchase_status; ?></td>
                <td><?php echo $row->payment_status; ?></td>
                <td><?php echo "&#8377; ". $row->book_price; ?></td>
                
              </tr>
            <?php } ?>

            <?php

            	$toatlInvestedAmt = 0;
            	$fetchInvestedAmt = $this->db->query("SELECT * FROM child_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
	            foreach ($fetchInvestedAmt->result() as $row)
	            {
	            	$costing = $row->course_fees;
	            	$toatlInvestedAmt += (int)$costing;
	            }

            ?>

            
 
        </tbody>
        <tfoot>
           <tr>
                <th>Sl.No</th>
                <th>Book Cover</th>
                <th>Book Name</th>
                <th>Price</th>
                <th>Quantity</th>
                 <th>Purchase Status</th>
                <th>Payment Status</th>
                <th>Total Amount</th>
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

$this->load->view('master_page/user_dashFooter');

?>