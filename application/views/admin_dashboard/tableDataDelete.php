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
                  <h4>Wipe All Data</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Book Directory</li>
                    <li class="breadcrumb-item active">Delete</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <center>
              <div class="col-xl-6">
                <div class="card">
                  <div class="card-header"> 
                    <h2 class="text-danger">Attention Required!</h2>
                    <img src="<?php echo base_url(); ?>modules/dashboard/assets/images/gif/delete.gif" alt="error" class="b-c-8 img-100">
                    <p class="f-m-light mt-4 text-center">You are about to <span><h3 class="text-danger">Wipe All Data</h3></span>This action is irreversible. Please ensure that you have saved any important information before proceeding. Users will no longer be able to see the details of the deleted book.</p>
                  </div>
                  <div class="card-body"> 
                    <!--Centered modal-->
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter1">Confirm Deletion</button>
                    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-body"> 
                            <div class="modal-toggle-wrapper">  
                              <ul class="modal-img">
                                <li> <img src="<?php echo base_url(); ?>modules/dashboard/assets/images/gif/danger.gif" alt="error"></li>
                              </ul>
                              <h4 class="text-center pb-2 text-danger">Warning : Permanent Deletion!</h4>
                              <p class="text-justify">Your action will permanently delete this data. This process is irreversible and the data cannot be recovered. Please proceed only if you are certain.<br><h6>Are you sure you want to continue?</h6></p>

                              <a href="<?php echo base_url('wipe_date'); ?>" class="btn btn-secondary d-flex m-auto" >Yes, Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </center>
              
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>






<?php 

$this->load->view('master_page/admin_dashFooter');

?>