<?php 

if(!isset($_SESSION['activeUser']))
{
  redirect(base_url('user_portal'));
}

$fetchMyPurchase = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no='{$_SESSION['activeUser']}' AND purchase_status ='Items Purchased' AND payment_status='Payment Completed'");
  foreach($fetchMyPurchase->result() as $row)
  {
    $fetchTranxsnID = $row->upi_transaction_id;
    $tranxnDate = $row->cart_addition_date;
    $invoiceDate = $row->invoice_date;
    $userAddress = $row->delivery_address;
    $transactionDate = $row->invoice_date;
  }

  $fetchParentData = $this->db->query("SELECT * FROM parent_directory WHERE parent_enrollment_no='{$_SESSION['activeUser']}'");
  foreach ($fetchParentData->result() as $row)
  {
    $parentName = $row->parents_name;
    $parentEmail = $row->parents_email;
    $parentContact = $row->parents_contact;
  }

$rupee = new \IndRupee\IndRupee();
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Purchase Invoice</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>modules/invoice/assets/css/style.css">
</head>

<body>
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center tm_mb20">
            <div class="tm_invoice_left">
              <div class="tm_logo"><img src="<?php echo base_url(); ?>modules/invoice/assets/img/logo.png" alt="Logo"></div>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <div class="tm_primary_color tm_f50 tm_text_uppercase">Invoice</div>
            </div>
          </div>
          <div class="tm_invoice_info tm_mb20">
            <div class="tm_invoice_seperator tm_gray_bg"></div>
            <div class="tm_invoice_info_list">
              <p class="tm_invoice_number tm_m0">Transaction ID: <b class="tm_primary_color"><?php echo $fetchTranxsnID; ?></b></p>
              <p class="tm_invoice_date tm_m0">Date: <b class="tm_primary_color"><?php echo date('d/m/Y', strtotime($transactionDate)); ?></b></p>
            </div>
          </div>
          <div class="tm_invoice_head tm_mb10">
            <div class="tm_invoice_left">
              <p class="tm_mb2"><b class="tm_primary_color">Invoice To:</b></p>
              <p>
                <?php echo $parentName; ?><br>
                <?php echo $userAddress; ?><br>
                <?php echo $parentEmail; ?><br>
                <?php echo $parentContact; ?>
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <p class="tm_mb2"><b class="tm_primary_color">Paid To:</b></p>
              <p>
                <strong>Classical Conversations</strong><br>
                B-5 GordhanBhai Park<br>
                Petrofils Township<br>
                Vadodara, Gujrat - 391345<br>
              </p>
            </div>
          </div>
          <div class="tm_table tm_style1">
            <div class="tm_round_border tm_radius_0">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                    <tr>
                      <th class="tm_width_3 tm_semi_bold tm_primary_color tm_gray_bg">Item</th>
                      
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Price</th>
                      <th class="tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">Qty</th>
                      <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg tm_text_right">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                     $systemDate = date('d/m/Y');

                     $fetchMyPurchase = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no='{$_SESSION['activeUser']}' AND purchase_status ='Items Purchased' AND payment_status='Payment Completed' AND invoice_date = '$systemDate'");
                      foreach($fetchMyPurchase->result() as $row) { ?>
                       
                    <tr class="tm_table_baseline">
                      <td class="tm_width_3 tm_primary_color"><?php echo $row->book_name; ?></td>                     
                      <td class="tm_width_2"><?php echo "&#8377; ".$row->book_price; ?></td>
                      <td class="tm_width_1"><?php echo $row->quantity; ?></td>
                      <td class="tm_width_2 tm_text_right"><?php echo (int)$row->quantity * $row->book_price; ?></td>
                    </tr>
                 <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <?php 
              $systemDate = date('d/m/Y');

              $totalBookPrice = 0;

              $fetchMyBooks = $this->db->query("SELECT * FROM user_cart WHERE parent_enrollment_no='{$_SESSION['activeUser']}' AND invoice_date='$systemDate'");
              foreach ($fetchMyBooks->result() as $row){
                $totalBcost = $row->total_price;
                $totalBookPrice += (int)$totalBcost;
              }

            ?>
            <div class="tm_invoice_footer tm_border_left tm_border_left_none_md">
              <div class="tm_left_footer tm_padd_left_15_md">
                <p class="tm_mb2"><b class="tm_primary_color">Total Amount Paid:</b></p>
                <p class="tm_m0"><?php echo $rupee->inwords($totalBookPrice)." Only"; ?> </p>
              </div>
              <div class="tm_right_footer">
                <table>
                  <tbody>
                    <tr class="tm_gray_bg tm_border_top tm_border_left tm_border_right">
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_bold">Amount</td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none"><?php echo "&#8377; ". $totalBookPrice; ?></td>
                    </tr>
                    <tr class="tm_gray_bg tm_border_left tm_border_right">
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Discount <span class="tm_ternary_color"></span></td>
                      <td class="tm_width_3 tm_text_right tm_border_none tm_pt0 tm_danger_color">0</td>
                    </tr>
                   <!--  <tr class="tm_gray_bg tm_border_left tm_border_right">
                      <td class="tm_width_3 tm_primary_color tm_border_none tm_pt0">Tax <span class="tm_ternary_color">(5%)</span></td>
                      <td class="tm_width_3 tm_primary_color tm_text_right tm_border_none tm_pt0">+$82</td>
                    </tr> -->
                    <tr class="tm_border_top tm_gray_bg tm_border_left tm_border_right">
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color">Total	</td>
                      <td class="tm_width_3 tm_border_top_0 tm_bold tm_f16 tm_primary_color tm_text_right"><?php echo "&#8377; ". $totalBookPrice; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <hr class="tm_mb20">
          <div class="tm_text_center">
            <p class="tm_mb5"><b class="tm_primary_color">With Thanks & Regards:</b></p>
            <p class="tm_m0"><strong>Classical Conversations</strong></p>
            <p class="tm_m0">B-5 Gordhan Bhai Park, Petrofils Township, Vadodara, Gujarat - 391345</p>
          </div><!-- .tm_note -->
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="javascript:window.print()" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="392" cy="184" r="24" fill='currentColor'/></svg>
          </span>
          <span class="tm_btn_text">Print</span>
        </a>
        <button id="tm_download_btn" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span class="tm_btn_text">Download</span>
        </button>
         <a href="<?php echo base_url(); ?>" class="tm_invoice_btn tm_color1">
          <span class="tm_btn_icon">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <path fill="currentColor" d="M412 190.5c-12.5-12.5-32.75-12.5-45 0L352 704h-96L217.5 190.5c-12.5-12.5-32.75-12.5-45 0-12.5 12.5-12.5 32.75 0 45L256 704h96l-64.5 64.5c-12.5 12.5-12.5 32.75 0 45 12.5 12.5 32.75 12.5 45 0L512 256l-64.5-64.5c-12.5-12.5-12.5-32.75 0-45z"/>
            </svg>
          </span>
          <span class="tm_btn_text">Home</span>
        </a>
      </div>
    </div>
  </div>
  <script src="<?php echo base_url(); ?>modules/invoice/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>modules/invoice/assets/js/jspdf.min.js"></script>
  <script src="<?php echo base_url(); ?>modules/invoice/assets/js/html2canvas.min.js"></script>
  <script src="<?php echo base_url(); ?>modules/invoice/assets/js/main.js"></script>
</body>
</html>