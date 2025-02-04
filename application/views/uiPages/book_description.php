<?php 

$this->load->view('master_page/ui_header');

$id = $_GET['id'];

$fetchSingleBookDetails = $this->db->query("SELECT * FROM book_directory WHERE id='$id'");
foreach ($fetchSingleBookDetails->result() as $row)
{
  $bookName = $row->book_name;
  $category = $row->category;
  $author_name = $row->author_name;
  $original_price = $row->original_price;
  $salesPrice = $row->sales_price;
  $bookDesc = $row->book_description;
  $availableStock = $row->available_stock;
  $bookCover = $row->book_cover;

}

?>

        
    <!-- Main Content Start -->
    <div class="page-content">
      <!-- Product Detail Start -->
    <section class="product-detail p-40">
        <div class="container">
            <div class="row">
              <div class="col-xl-6">
                <div class="product-image">
                  <img src="<?php echo $bookCover; ?>" alt="" style="width: 650px; height: 756px;">
                </div>
              </div>
              <div class="col-xl-6">
                  <div class="product-content">
                      <div class="main-content ">
                          <h2><?php echo $bookName; ?></h2>
                          <div class="price">
                              <h3><?php echo "&#8377;". $salesPrice; ?></h3>
                              <h4 class="old-price dark-gray"><?php echo "&#8377;". $original_price; ?></h4>
                          </div>
                          <div class="rating-stars">
                              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/shapes/rate-star.png" alt="">
                              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/shapes/rate-star.png" alt="">
                              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/shapes/rate-star.png" alt="">
                              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/shapes/rate-star.png" alt="">
                              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/shapes/rate-star.png" alt="">
                          </div>
                          <p class="dark-gray mb-40"><?php echo $bookDesc; ?></p>
                      </div> 

                      <div class="quantity quantity-wrap mb-32">
                          <input class="decrement" type="button" value="-" >
                          <input type="text" name="quantity" value="1" maxlength="2" size="1" class="number">
                          <input class="increment" type="button" value="+" >
                      </div>
                      <div class="cart-button mb-32">
                          <h6><a href="<?php echo base_url('addBookstoCart?id='.$row->id.''); ?>" class="cus-btn"><span class="icon"><img
                                  src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/orange-cart.png" alt=""></span>Buy Now</a></h6>
                          <ul class="unstyled hover-buttons">
                            <li><a href="<?php echo base_url('addBookstoCart?id='.$row->id.''); ?>"><i class="fal fa-shopping-cart"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                          </ul>
                      </div>
                     <!--  <span class="sold-books">
                        <p class="dark-gray">Already Sold</p> &nbsp; <h6>700/1000</h6>
                      </span> -->
                    <!--   <div class="progress mb-40">
                          <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%;">
                          <span class="sr-only">70% Complete</span>
                          </div>
                      </div> -->
                      <hr class="mb-32">
                      <div class="writer-area">
                          <span>
                              <h5 class="dark-gray">Author:</h5> &nbsp;<h5><?php echo $author_name; ?></h5>
                          </span>
                          <span>
                              <h5 class="dark-gray">Categoty:</h5>&nbsp;<h5><?php echo $category; ?></h5>
                          </span>
                          <span>
                              <h5 class="dark-gray">Share:</h5>&nbsp;&nbsp;
                              <ul class="unstyled">
                                  <li><a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/facebook-fade.png" alt=""></a></li>
                                  <li><a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/instagram-fade.png" alt=""></a></li>
                                  <li><a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/whatsapp.png" alt=""></a></li>
                                  <li><a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/twitter.png" alt=""></a></li>
                                  <li><a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/snapchat-icon.png" alt=""></a></li>
                              </ul>
                          </span>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </section>
      <!-- Product Detail End -->



            <!-- Related Product Start -->
    <section class="related-product">
      <div class="container">
        <div class="top-row mb-48">
          <div class="heading mb-0">
            <h3>Related Product</h3>
          </div>
          <h6><a href="shop-listing.html" class="cus-btn"><span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/click-button.png"
                  alt=""></span>VIEW ALL</a></h6>
        </div>
        <div class="row">

          <?php 

            $fetchBooksByCategory = $this->db->query("SELECT * FROM book_directory WHERE category = '$category'");
            foreach ($fetchBooksByCategory->result() as $row) { ?>
            

          <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="book-card mb-24">
              <a href="#"><img src="<?php echo $row->book_cover; ?>" alt="" style="width: 550px; height: 320px;"></a>
              <div class="">
                <ul class="unstyled hover-buttons">
                  <li><a href="#"><i class="fal fa-heart"></i></a></li>
                  <li><a href="<?php echo base_url('addBookstoCart?id='.$row->id.''); ?>"><i class="fal fa-shopping-cart"></i></a></li>
                  <li><a href="#"><i class="fal fa-eye"></i></a></li>
                </ul>
              </div>
              <div class="book-content">
                <h5 class="mt-24"><a href="shop-listing.html.html"><?php echo $row->book_name; ?></a></h5>
                <div class="rating-stars">
                  <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                  <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                  <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                  <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                  <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/empty-star.png" alt=""></a>
                </div>
                <h6 class="dark-gray"><?php echo $row->author_name; ?></h6>
                <div class="books-price">
                  <h5><?php echo "&#8377;". $row->sales_price ?></h5>
                  <h6 class="old-price"><?php echo "&#8377;". $row->original_price; ?></h6>
                </div>
              </div>
            </div>
          </div>

        <?php } ?>

        </div>
      </div>
    </section>
      <!-- Related Product End -->



<?php 

$this->load->view('master_page/ui_footer');

?>