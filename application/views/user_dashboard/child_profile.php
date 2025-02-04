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
                <th>Profile Image</th>
                <th>Child Name</th>
                <th>Child DOB</th>
                 <th>Program</th>
                <th>Program Fees</th>
            </tr>
        </thead>
        <tbody>
         <?php
            $fetchMyChild = $this->db->query("SELECT * FROM child_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
            foreach ($fetchMyChild->result() as $row) { ?>
              <tr>
                <td><?php echo $row->id; ?></td>               
                <td><img class="img-100 b-r-8" src="<?php echo $row->child_avatar; ?>" alt="#"></td>
                 <td><?php echo $row->child_name; ?></td>
                <td><?php echo $row->child_dob; ?></td>
                <td><?php echo $row->opted_subject; ?></td>
                <td><?php echo "&#8377; ". $row->course_fees; ?></td>
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

            <tr>
            	<td>N.B</td>
            	<td></td>
            	<td></td>
            	<td></td>
            	<td><strong>Total Investment: </strong></td>
            	<td><strong><?php echo "&#8377; ".$toatlInvestedAmt; ?></strong></td>
            </tr>

 
        </tbody>
        <tfoot>
            <tr>
                <th>Sl.No</th>
                <th>Profile Image</th>
                <th>Child Name</th>
                <th>Child DOB</th>
                 <th>Program</th>
                <th>Program Fees</th>
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