<?php 

$this->load->view('master_page/user_dashHeader');
$this->load->view('master_page/user_dashNavbar');
$this->load->view('master_page/user_dashSidebar');

?>
     <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Parent Address</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Delivery Address</li>
                    <li class="breadcrumb-item active">Parent</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>

          <?php 

          	$fetchmyParentDetails = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
          	foreach ($fetchmyParentDetails->result() as $row)
          	{
          		$parentfetchMain = $row->parent_enrollment_no;
          		$parentfetchdetails1 = $row->parents_name;
          		$parentfetchdetails2 = $row->parents_email;
          		$parentfetchdetails3 = $row->parents_contact;
          		$parentfetchdetails4 = $row->home_address;
          		$parentfetchdetails5 = $row->parent_avatar;
          		$parentfetchdetails6 = $row->parents_initial;
          	}


          	$fetchmyParentDetails = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no='{$_SESSION['activeUser']}'  AND purchase_status = 'Items Purchased' AND payment_status = 'Payment Completed'");
          	foreach ($fetchmyParentDetails->result() as $row)
          	{
          		$parentAddress = $row->delivery_address;
          	}          	
          ?>




     <div class="row">
     <div class="col-sm-12 col-xl-6">
                <div class="card shadow-none border">
                  <div class="card-header">
                    <h4>User Complete Address</h4>
                    <p class="f-m-light mt-1">Complete Postal Address to get your Purchase Delivered</p>
                 
                  </div>
                  <div class="card-body">
                    <div class="flex-space flex-wrap align-items-center"><img class="tab-img" src="<?php echo $parentfetchdetails5; ?>" alt="profile">
                      <p>
                      	<strong>User Name: </strong> <?php echo $parentfetchdetails1; ?><br>
                      	<strong>Email: </strong> <?php echo $parentfetchdetails2; ?><br>
                      	<strong>Contact Number: </strong> <?php echo $parentfetchdetails3; ?> <br>
                      	<strong>Parent Enroll ID: </strong> <?php echo $parentfetchdetails6; ?> <br>
                      	<strong>Official Address: </strong> <?php echo $parentfetchdetails4; ?> <br>
                      	<strong>Delivery Address: </strong> <?php echo $parentAddress; ?> <br>

                      </p>
                    </div>
                  
                  </div>
                </div>
              </div>

              <div class="col-sm-12 col-xl-6">
                <div class="card shadow-none border">
                  <div class="card-header">
                    <h4>Edit Address</h4>
                    <p class="f-m-light mt-1">In changes in Address, Update Here</p>                 
                  </div>

                  <div class="card-body">
                    <div class="card-wrapper border rounded-3">

                      <form class="row g-3" method="POST" action="<?php echo base_url('updateAddressBook'); ?>">

                        <div class="col-md-12">
                          <label class="form-label">Parent Enroll ID</label>
                          <input class="form-control" type="text" value="<?php echo $parentfetchMain; ?>" readonly>
                        </div>

                        <div class="col-md-12">
                          <label class="form-label">Parent Name</label>
                          <input class="form-control" type="text" name="parentName" placeholder="Enter Your Email" value="<?php echo $parentfetchdetails1; ?>" readonly>
                        </div>

                         <div class="col-md-12">
                          <label class="form-label">Official Address</label>
                         <textarea class="form-control" name="offAddress" rows="3"><?php echo $parentfetchdetails4; ?></textarea>
                        </div>

                         <div class="col-md-12">
                          <label class="form-label">Delivery Address</label>
                         <textarea class="form-control" name="delvAddress" rows="3"><?php echo $parentAddress; ?></textarea>
                        </div>

                        
                       
                        <div class="col-12">
                          <button class="btn btn-primary float-end" type="submit" name="updtAddres">Update Details </button>
                        </div>
                      </form>
                    </div>
                  </div>
               		
                </div>
              </div>

              


              </div>


          </div>




<?php 

$this->load->view('master_page/user_dashFooter');

?>