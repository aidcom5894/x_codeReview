<?php 

$this->load->view('master_page/admin_dashHeader');
$this->load->view('master_page/admin_dashNavbar');
$this->load->view('master_page/admin_dashSidebar');

?> 

<!-- section for body starts here -->
<div class="page-body"> 
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Book Details</h3>
                </div>
                <div class="col-sm-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_portal'); ?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Library</li>
                    <li class="breadcrumb-item active">Book Lists</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">


             <?php
            // stock and inventory options

            $fetchMyBooks = $this->db->query("SELECT * FROM book_directory");

            foreach ($fetchMyBooks->result() as $row) {
                $totalSales = 0;
                $fetchShoppingCartDetails = $this->db->query("SELECT * FROM user_cart WHERE book_name = '$row->book_name'");
                foreach ($fetchShoppingCartDetails->result() as $cartRow) {
                    $quantity = $cartRow->quantity;
                    $totalSales += (int)$cartRow->quantity;
                }
            ?> 

<div class="col-md-6 col-xxl-3 box-col-6">
    <div class="card">
        <div class="blog-box blog-grid text-center">
            <img class="img-fluid top-radius-blog" src="<?php echo $row->book_cover; ?>" style="width: 450px; height: 490px;" alt="">
            <div class="blog-details-main">
                <ul class="blog-social">
                    <li><strong>Stock:</strong> <?php echo " " . $row->available_stock; ?></li>
                    <li><strong>Sales:</strong> <?php echo $totalSales; ?></li>
                    <li><strong>Available:</strong> <?php echo " " . intval($row->available_stock - $totalSales); ?></li>
                </ul>
                <hr>
                <h6 class="blog-bottom-details"><?php echo $row->book_name; ?></h6>
            </div>
        </div>
    </div>
</div>

<?php } ?>

            


            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
<!-- section for body ends here -->













<?php 

$this->load->view('master_page/admin_dashFooter');

?>