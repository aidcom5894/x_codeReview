<?php 

$this->load->view('master_page/ui_header');

use NumberToWords\NumberToWords;

$numberToWords = new NumberToWords();

$numberTransformer = $numberToWords->getNumberTransformer('en');

?>

<!-- section for checkout banner starts here -->
 <!-- <div class="hero-banner-3 bg-lightest-gray">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h2 class="mb-12"><b>Checkout</b></h2>
              <p class="dark-gray" style="text-align:justify;">We assure the Safety and Security of your payment and checkout process, so you can shop with confidence knowing your financial data is well-protected. </p>
            </div>
          </div>
           <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
    <div class="images-row">
    <?php 

    $fetchBooks = $this->db->query("SELECT * FROM book_directory ORDER BY RAND() LIMIT 3");

    foreach($fetchBooks->result() as $row) { ?>

    <img src="<?php echo $row->book_cover; ?>" class="blog-img" alt="" style="width: 174px; height: 240px;">

    <?php } ?>
    </div>
</div>
        </div>
      </div>
    </div> -->
<!-- section for checkout banner starts here -->

<!-- section for payment checkout starts here -->
<div class="page-content">
      <!-- Shipping Details Start -->
      <section class="checkout container">
        <div class="row">
          <div class="col-xl-8">
            <div class="checkout-form">


              <form action="<?php echo base_url('final_checkout'); ?>" method="POST" id="form-wizard">
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link active" href="#step-1">
                      <div class="num">1</div>
                      <span>User Details</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#step-2">
                      <div class="num">2</div>
                      <span>Delivery Address</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#step-3">
                      <div class="num">3</div>
                      <span>Make Payment</span>
                    </a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div id="step-1" class="tab-pane " role="tabpanel" aria-labelledby="step-1">
                    <div class="contact-info">
                      <h4 class="mb-32">Contact Info</h4>                      
                    </div>

                    <?php 

                      $fetchactiveSession = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'"); 
                      foreach ($fetchactiveSession->result() as $row) 
                      {
                         $activeSessionUsers = $row->parent_enrollment_no;
                      } 
                      
                      $this->db->select('*');
                      $this->db->from('parent_directory');
                      $this->db->where('parent_directory.parent_enrollment_no', $activeSessionUsers); 
                      $this->db->join('user_cart', 'user_cart.parent_enrollment_no = parent_directory.parent_enrollment_no');
                      $mergedChkoutDtls = $this->db->get();

                      foreach ($mergedChkoutDtls->result() as $row)
                      {
                        $parentUId = $row->parent_enrollment_no;
                        $parentName = $row->parents_name;
                        $parntEmail = $row->parents_email;
                        $parentsContacts = $row->parents_contact;
                        $parentDelAddress = $row->home_address;
                        $bookHeading = $row->book_name;
                      }

                   

                    ?>

                    <div class="row">

                      <div class="col-sm-6">
                        <div class="mb-24">
                          <input type="text" class="form-control" id="first-name" name="first-name" required
                            value="Mr./Ms." readonly>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb-24">
                          <input type="text" class="form-control" name="cartParentName" value="<?php echo $parentName; ?>" required readonly>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb-24">
                          <input type="text" class="form-control" name="cartParentEmail" value="<?php echo $parntEmail; ?>" required readonly>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="mb-24">
                          <input type="text" class="form-control" name="cartParentcontact" required value="<?php echo $parentsContacts; ?>" readonly>
                        </div>
                      </div>

                      <div class="mb-32 col-md-12">
                        <input type="text" class="form-control" name="cartParentUID" value="<?php echo $parentUId; ?>" required readonly>
                      </div>

                    </div>
                  </div>
                  <div id="step-2" class="tab-pane" role="tabpanel" aria-labelledby="step-2">
                    <div class="contact-info">
                      <h4 class="mb-32">Shipping Info</h4>
                     
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="mb-24">
                          <div class="mb-24">
                            <div >
                             <input type="text" class="form-control" name="cartParentCountry"  value="India" required readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-24">
                          <div >
                             <input type="text" class="form-control" name="cartParentState" placeholder="State"  required >
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-24">
                          <input type="text" class="form-control" name="cartParentCity" id="town" placeholder="Town / City" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="mb-24">
                          <input type="number" class="form-control" name="cartParentPincode" id="zip-code" required placeholder="Zip Code" onKeyPress="if(this.value.length==6) return false;">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb-24">
                          <input type="text" class="form-control" name="cartParentHome" id="House" required placeholder="House number and street name">
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="mb-24">
                          <input type="text" class="form-control" name="cartParentHomeAddr" name="cart" value="<?php echo $parentDelAddress ?>" placeholder="Primary Delivery Location" required>
                        </div>
                      </div>
                  <!--     <div class="col-sm-12">
                        <textarea class="form-control notes mb-32" name="notes" id="" cols="68" rows="5"
                          placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                      </div>
 -->
                    </div>
                  </div>


                  <div id="step-3" class="tab-pane" role="tabpanel" aria-labelledby="step-3">
                    <div class="contact-info">
                      <h4 class="mb-32">Payment Method</h4>
                     
                    </div>
                    <div class="row">
                      <div class="col-sm-12 mb-12">
                        <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/payments/qr.png" class="rounded mx-auto d-block" alt="upi_QR" style="height: 375px;">
                      </div>
                    </div>
                    <?php 
                    $traxnID = random_string('alnum',10);

                    ?>
                    <div class="row">
                      <div class="col-sm-6 mx-auto">
                     <input type="text" class="form-control" id="zip-code" name="transactionID" required
                            placeholder="UPI Transaction ID" style="text-transform: uppercase" value="<?php echo strtoupper($traxnID); ?>" readonly>
                      </div>
                    </div>
                    
                  </div>
                </div>
                <!-- <h6><a href="#step-2" class="cus-btn float-end btn"><span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/orange-cart.png" alt=""></span>Continue</a></h6> -->
                <div class="sw-toolbar-elm toolbar toolbar-bottom" role="toolbar">
                  <button class="btn sw-btn-prev sw-btn" type="button">Continue</button> 
                  <button class="btn sw-btn-next sw-btn" type="button">Next</button>
                </div>
              
            </div>
          </div>
          <?php 

            $countCartProducts = $this->db->query("SELECT * FROM user_cart WHERE purchase_status='On Hold' AND payment_status = 'Payment Pending'");
            $countProducts = $countCartProducts->num_rows();

            $mycheckoutPayment = 0;

            $fetchProductDetails = $this->db->query("SELECT * FROM user_cart WHERE purchase_status='On Hold' AND payment_status = 'Payment Pending'");
            foreach ($fetchProductDetails->result() as $row)
            {
              $bookSold = $row->total_price;
              $mycheckoutPayment += (int) $bookSold;
            }

          ?>

          <div class="col-xl-4">
            <div class="order-detail">
              <h4>Order Summary</h4>
              <hr>
              <div class="sub-total">
                <h6><span class="dark-gray">Total Items</span></h6>
                <h6><?php echo $countProducts; ?></h6>
              </div>
              <div class="sub-total">
                <h6><span class="dark-gray">Order</span></h6>
                <h6 style="text-align: right;"><?php echo "<strong>".$bookHeading."</strong>"."+"."</br>".ucwords($numberTransformer->toWords($countProducts-1)). " more Books in Cart"; ?></h6>
              </div>
              <hr>
              <div class="sub-total">
                <h5 class="dark-gray">Subtotal</h5>
                <h5><?php echo "&#8377;".$mycheckoutPayment; ?></h5>
              </div>
              <hr>
              <div class="sub-total">
                <h5 class="dark-gray">Shipping Fee</h5>
                <h5>0</h5>
              </div>
          
              <div class="sub-total">
                <h4>Total</h4>
                <h4><?php echo "&#8377;".$mycheckoutPayment; ?></h4>
              </div>
              <hr>
                <button class="b-unstyle cus-btn w-100 mb-24" name="cartCheckout" type="submit"><span class="icon" ><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/click-button.png" alt=""></span>Download Invoice</button>
 
            </div>
          </div>
        </div>
      </section>
    </form>
      <!-- Shipping Details End -->
    </div>
<!-- section for payment checkout starts here -->











<?php 

$this->load->view('master_page/ui_footer');

?>