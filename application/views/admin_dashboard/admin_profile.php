<?php 

$this->load->view('master_page/admin_dashHeader');
$this->load->view('master_page/admin_dashNavbar');
$this->load->view('master_page/admin_dashSidebar');


?>


<!-- section for profile edit starts here -->
 <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Edit Profile</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin_portal'); ?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?php echo base_url(); ?>modules/dashboard/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Form Controls</li>
                    <li class="breadcrumb-item active">Profile Mgmt</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Profile Management</h4>
                    <p class="f-m-light mt-1">Update your Profile Here</p>
                  </div>
                  <div class="card-body">
                    <div class="card-wrapper border rounded-3">

                    	<?php 

                    		$fetchAdminDetails = $this->db->query("SELECT * FROM admin_directory WHERE adminUID='{$_SESSION['activeAdmin']}'");
                    		foreach ($fetchAdminDetails->result() as $row) 
                    		{
                    			$adminUID = $row->adminUID;
                    			$adminName = $row->admin_name;
                    			$adminEmail = $row->admin_email;
                    			$adminContact = $row->admin_contact;
                    			$adminAvatar = $row->admin_avatar;
                    		}

                    	?>


                      <form class="row g-3" method="POST" action="<?php echo base_url('profileUpdation'); ?>">

                        <div class="col-md-12">
                          <label class="form-label">Admin UID</label>
                          <input class="form-control" type="text" value="<?php echo $adminUID; ?>" readonly>
                        </div>

                        <div class="col-md-12">
                          <label class="form-label">Admin Name</label>
                          <input class="form-control" type="text" name="admName" placeholder="Enter Your Name" value="<?php echo $adminName; ?>">
                        </div>

                        <div class="col-md-12">
                          <label class="form-label" >Admin Email</label>
                          <input class="form-control" type="email" name="admEmail" placeholder="Enter Your Email" value="<?php echo $adminEmail; ?>">
                        </div>

                       <div class="col-md-12">
                          <label class="form-label">Admin Contact</label>
                          <input class="form-control" type="number" name="admContact" placeholder="Enter Your Contact" value="<?php echo $adminContact; ?>" onkeypress="if(this.value.length == 10) return false;">
                        </div>
                       
                        <div class="col-12">
                          <button class="btn btn-primary" type="submit" name="updateAdminProfile">Update Details </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Avatar Mgmt.</h4>
                    <p class="f-m-light mt-1">Update a smile that the world will see</p>
                  </div>
                  <div class="card-body">
                    <div class="card-wrapper border rounded-3">

                      <form class="row g-3 floating-wrapper" method="POST" enctype="multipart/form-data" action="<?php echo base_url('avatarChange'); ?>">

                        <div class="col-12">
                        	<label class="form-floating">Upload Avatar</label>
                          <div class="mb-3">
                            <input class="form-control" type="file" id="userAvatar" name="userAvatar">                           
                          </div>
                        </div>

                        <div class="col-12">
                        	<label class="form-floating">Selected Image</label>
                          <div class="mb-2">
                           	<img class="b-r-10 img-100" id="adminAvatar" src="<?php echo $adminAvatar; ?>" alt="#">
                          </div>
                        </div>

                        <div class="col-12">
                          <button class="btn btn-primary" name="profileUpdate" type="submit">Upload Image</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- section for profile edit ends here -->

<script type="text/javascript">
	$('#userAvatar').change(function() {
	var url = window.URL.createObjectURL(this.files[0]);
	 $('#adminAvatar').attr('src',url);
	});
</script>


<?php 

$this->load->view('master_page/admin_dashFooter');

?>