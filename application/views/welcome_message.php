<?php 

$this->load->view('master_page/ui_header');

?>

<!-- section for bookstore starts here -->
   <!-- <div class="hero-banner-3 bg-lightest-gray">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h1 class="mb-12">Shop Now</h1>
              <p class="dark-gray">Discover a wide range of books from all categories, Browse through our extensive collection and find your next great read today!</p>
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

    <div class="page-content">
     

      <section class="filters">
        <div class="container">
          <div class="row">
           
            
            
          </div>
          <div class="row">
            <div class="col-xxl-12">
              <div class="row">

                <?php 

                  $fetchallbooks = $this->db->query("SELECT * FROM book_directory");
                  foreach($fetchallbooks->result() as $row) { ?>

                <div class="col-xl-3 col-lg-4 col-md-6">
                  <div class="book-card mb-24">
                    <a href="#"><img src="<?php echo $row->book_cover; ?>" alt="" style="height: 350px; width: 620px;"></a>
                    <div class="">
                      <ul class="unstyled hover-buttons">
                        <li><a href=""><i class="fal fa-heart"></i></a></li>
                        <li><a href="<?php echo base_url('addBookstoCart?id='.$row->id.''); ?>"><i class="fal fa-shopping-cart"></i></a></li>
                        <li><a href="<?php echo base_url('page_description?id='.$row->id.''); ?>"><i class="fal fa-eye"></i></a></li>
                      </ul>
                    </div>
                    <div class="book-content">
                      <h5 class="mt-24"><a href="<?php echo base_url('page_description?id='.$row->id.''); ?>"><?php echo character_limiter($row->book_name,15); ?></a></h5>
                      <div class="rating-stars">
                        <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                        <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                        <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                        <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/fill-star.png" alt=""></a>
                        <a href="#"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/empty-star.png" alt=""></a>
                      </div>
                      <h6 class="dark-gray"><?php echo $row->author_name; ?></h6>
                      <div class="books-price">
                        <h5><?php echo "&#8377;".$row->sales_price; ?></h5>
                        <h6 class="old-price"><?php echo "&#8377;".$row->original_price; ?></h6>

                         <div class="product-btn">
                    <button type="button" href="<?php echo base_url('addBookstoCart?id='.$row->id.''); ?>" class="cus-btn small h6">                      
                      <span class="icon"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/orange-cart.png" alt="" /></span><span
                        class="plain-text"><a href="<?php echo base_url('addBookstoCart?id='.$row->id.''); ?>">Add to Cart</a></span>
                    </button>
                  </div>
                      </div>

                    </div>
                  </div>
                </div>
              <?php } ?>

              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
<!-- section for bookstore ends here -->


<?php 


$this->load->view('master_page/ui_footer');

?>