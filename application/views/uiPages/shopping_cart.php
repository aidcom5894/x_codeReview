<?php 

$this->load->view('master_page/ui_header');

?>

<!-- section for cart banner starts here -->
<!-- <div class="hero-banner-3 bg-lightest-gray">
<div class="container">
<div class="row">
<div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
<div class="text-block">
<h1 class="mb-12">Shopping Cart</h1>
<p class="dark-gray" style="text-align:justify;">We streamline the shopping process, enhancing our user experience by offering a convenient way to manage purchases before finalizing transactions. </p>
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
<!-- section for cart banner ends here -->

<!-- section for shopping cart start here -->
   <!-- Cart Area Start -->
    <section class="cart">
      <div class="container">



        <div class="d-md-block d-none">
          <table class="cart-table mb-24">
            <thead>
              <tr>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <!-- <th>UPDATE</th> -->
                <th>TOTAL</th>
                
              </tr>
            </thead>
           
              <div class="row">
                <div class="col-lg-12 d-md-none">
                <tbody>

                  <tr class=" col-md-8 mb-5">
                   <?php 

           $fetchCartProducts = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no = '{$_SESSION['activeUser']}' AND purchase_status='On Hold' AND payment_status = 'Payment Pending'");
            foreach ($fetchCartProducts->result() as $row) { ?>
           
                    <td class="pd">
                      <div class="product-detail-box">
                        <div class="img-block">
                          <a href="#"><img src="<?php echo $row->book_cover; ?>" alt="" style="width: 104px; height: 140px;"></a>
                        </div>
                        <div>
                          <h5 class="dark-gray"><?php echo $row->book_name; ?></h5>
                        </div>
                      </div>
                    </td>

              
                    <td>
                      <h5 class="dark-gray" id="bookPrice"><?php echo "&#8377;".$row->book_price; ?></h5>
                      
                    </td>
                    <td>
                      <center>
                     <select class="form-select form-select-lg mb-3 text-center" aria-label=".form-select-lg example" style="width: 105px;" name="selectQty" id="qty" disabled >
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                      </center>
                    </td>                   
                   
                   
                    <!-- <td style="text-align: center;"><a class="mx-auto" href=""><i class="fal fa-fast-forward"></i></a></td> -->

                     <td>
                      <h5 id="totalPrice"><?php echo "&#8377;". $row->book_price; ?></h5>                        
                    </td>

                     <td><a href="<?php echo base_url('deleteCartItems?id='.$row->id); ?>"><i class="fal fa-times"></i></a></td>


                    
                  </tr>
                </tbody>
              </div>
            </div>

          <?php } ?>
          </table>
        </div>


        <div class="d-md-none d-block">
          <div class="row">
            <?php 

            $fetchCartProducts = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no = '{$_SESSION['activeUser']}' AND purchase_status='On Hold' AND payment_status = 'Payment Pending'");
            foreach ($fetchCartProducts->result() as $row) { ?>


              
            <div class="col-sm-6">
              <div class="cart-item-block mb-32">
                <div class="img-block">
                  <a href="#"><img src="<?php echo $row->book_cover; ?>" alt="" style="width: 104px; height:140px;"></a>
                  <a href="" class="cross"><i class="fal fa-times"></i></a>
                </div>
                <h5 class="mb-24 mt-24"><b><?php echo $row->book_name; ?></b></h5>
                <ul class="unstyled detail">
                  <li>
                    <h5>Price</h5>
                    <h5 class="medium-gray"><?php echo "&#8377;". $row->book_price; ?></h5>
                  </li>


                  <li>
                    <h5>Quantity</h5>
                    <select class="form-select form-select-sm mb-3 text-center" aria-label=".form-select-lg example" style="width: 105px;" name="selectQty" id="qty" disabled>
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                  </li>
               <!--     
                  <li class="text-end">
                    <h5>Update</h5>
                   <a class="ml-auto" href="<?php echo base_url('updateQuantity'); ?>"><i class="fal fa-fast-forward"></i></a>
                  </li>
                   -->

                  <li>
                    <h5>Total</h5>
                    <h5 class="color-primary"><?php echo "&#8377;". $row->book_price; ?></h5>
                  </li>
                </ul>
              </div>
            </div>
            
          <?php } ?>
  
          </div>
        </div>


        <h6><a href="<?php echo base_url('bookstore'); ?>" class="cus-btn mt-24"><span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/orange-cart.png" alt=""></span>Continue Shopping</a></h6>
      </div>
    </section>
    <!-- Cart Area End -->

<?php 
  
  $fetchParentAddress = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
  foreach ($fetchParentAddress->result() as $row)
  {
    $parentNames = $row->parents_name;
    $parentAddress = $row->home_address;
    $parentfetchedContact = $row->parents_contact;
  }

?>

    <!-- Shipping Details Start -->
    <form method="POST" action="<?php echo base_url('bookstore_checkout'); ?>">
    <section class="shipping mb-40">
      <div class="container">
        <div class="choose-shipping-mode">
          <div class="row">
            <div class="col-xl-6">
              <div class="shipping-details">
                <div class="filter-block">
                  <div class="title mb-32">
                    <h4>Shipping Address:</h4>
                  </div>
                  <ul class="unstyled list"> 

                    <li class="cart-list mb-10">
                    <label class="cart-font black-color" ><h3><?php echo $parentNames; ?></h3></label>
                    </li>

                    <li class="cart-list mb-10">
                    <label class="cart-font black-color" ><?php echo $parentAddress; ?></label>
                    </li>

                    <li class="cart-list mb-10">
                    <label class="cart-font black-color" ><?php echo $parentfetchedContact; ?></label>
                    </li>

                   
                  </ul>
                </div>
              </div>
            </div>

              <?php 

            $totalCost = 0;
            $fetchCartProducts = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no = '{$_SESSION['activeUser']}' AND purchase_status='On Hold' AND payment_status = 'Payment Pending'");
            foreach ($fetchCartProducts->result() as $row) 
            {               
              $productCost = $row->total_price;

              $totalCost += (int) $productCost;
            }

            ?>
           

            <div class="col-xl-6">
              <div class="amounts">
                <div class="sub-total mb-24">
                  <h6>SUBTOTAL</h6>
                  <h6><?php echo "&#8377;". $totalCost; ?></h6>
                </div>
                <div class="shipping-charges mb-24">
                  <h6>SHIPPING</h6>
                  <h6 class="text-center">0</h6>
                </div>
                <div class="grand-total mb-24">
                  <h5>TOTAL</h5>
                  <h5><?php echo "&#8377;". $totalCost; ?></h5>
                </div>
              <h6>
                <button class="cus-btn" type="submit" name="cartCheckout"><span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/orange-cart.png" alt=""></span>Proceed to Checkout</button>
              </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</form>
    <!-- Shipping Details End -->

<!-- section for shopping cart ends here -->




<?php 

$this->load->view('master_page/ui_footer');

?>