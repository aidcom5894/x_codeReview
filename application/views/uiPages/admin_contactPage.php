<?php 

$this->load->view('master_page/ui_header');

?>

<!-- section for body starts here -->
<!-- Banner-3 Start -->
  <!--   <div class="hero-banner-3 bg-lightest-gray">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="text-block">
              <h1 class="mb-12">Contact Us</h1>
              <p class="dark-gray" style="text-align: justify;"> We're here to assist you with any questions or concerns. Whether you need support, have inquiries about our products and services, or simply want to learn more about what we do, our team is ready to help.</p>
            </div>
          </div>
          <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
            <div class="images-row">
              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/banner/banner2-2.png" class="blog-img" alt="">
              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/banner/banner2-3.png" class="blog-img big" alt="">
              <img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/banner/banner2-1.png" class="blog-img" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Banner-3 End-->
    <!-- Form and Map Start -->
    <section class="form-map pt-40 mb-40">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-8">
            <div class="form-section bg-lightest-gray mb-32">
			 <h3 class="mb-16 mt-24">Contact Form</h3>
			 	 <p class="dark-gray mb-24"> Reach out to us via the contact form, email, or phone, and a member of our team will get back to you promptly. We look forward to connecting with you!</p>
              <div class="row">
                <div class="col-sm-12 mb-16">
                  <h6><a href="" class="link-btn mb-24 mb-sm-0"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/telephone.png" alt=""> +91-9409539631</a></h6>
                </div>
               </div>

               <div class="row">
                <div class="col-sm-12 mb-4">
                  <h6><a href="mailto:cchristian@classicalconversations.com?subject=Assistance Regarding Your Organisations" class="link-btn"><img src="<?php echo base_url(); ?>modules/ecommerce/assets/media/icons/mail-box.png" alt="">
                      cchristian@classicalconversations.com</a></h6>
                </div>
             </div>
              
             
              <form method="POST" action="<?php echo base_url('formAssistanceQuery'); ?>" >
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-24">
                      <input type="text" class="form-control" id="userName" name="userName" required
                        placeholder="Your Name">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="mb-24">
                      <input type="email" class="form-control" id="userEmail" name="userEmail" required
                        placeholder="Your Email">
                    </div>
                  </div>
                </div>

                <div class="col-sm-12 mb-24">
                  <input type="number" class="form-control" id="userContact" name="userContact" required
                    placeholder="Your Number">
                </div>

                <div class="col-sm-12 mb-24">
                  <input type="text" class="form-control" id="query" name="query" required
                    placeholder="Write your comments here">
                </div>
                <h6><button type="submit" class="b-unstyle cus-btn w-100" name="sendQuery">Send Message</button></h6>
                <!-- Alert Message -->
                <div id="message" class="alert-msg"></div>
              </form>
            </div>
          </div>
          <div class="col-xl-6 col-lg-4">
            <div class="map-block">
              <iframe
                src="https://www.google.com/maps/embed/v1/place?q=Classical+Conversations+India+B/5+Gordhanbhai+Park++Behind+petrophiles+bus+stop++Gorwa+Undera+Road++391345&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Form and Map End -->
<!-- section for body ends here -->


<?php 

$this->load->view('master_page/ui_footer');

?>