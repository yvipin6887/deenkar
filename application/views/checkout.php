<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Fees Collection</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    
    <!-- datable css -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/datatable_css.css">
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/custom/jquery-ui.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script> -->
<style>
#existstudentdata th,td{
padding:5px;
font-size:15px;
margin:0px;
TEXT-ALIGN: center;
}
</style>

  <?php 
  $this->load->view('secoundheader',$this->data);
  $this->load->view('leftsidebar',$this->data);
  $base_url= base_url();
  $productinfo = $itemInfo;
$txnid = time();
$surl = $surl;
$furl = $furl;        
$key_id = RAZOR_KEY_ID;
$currency_code = $currency_code;            
$total = ($itemInfo['price']* 100); 
$amount = $itemInfo['price'];
$merchant_order_id = $itemInfo['product_id'];
$card_holder_name = 'TechArise Team';
$email = 'vipinrajbahadur97@gmail.com';
$phone = '8237056887';
$name = 'local host';
$return_url = base_url().'Admin/callback';
  ?>
                    <!-- middle content -->
<form name="razorpay-form" id="razorpay-form" action="<?php echo $return_url; ?>" method="POST">
  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
  <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
  <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
  <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
  <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
  <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
  <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
  <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
  <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
</form>           
 <script src="<?php  echo base_url();?>assets/custom/angular.min.js"></script>

<script src="<?php  echo base_url();?>assets/js/fees_collection.js"></script>
         
      <script src="<?php  echo base_url();?>assets/custom/datatable_bootstrap_min.js"></script>
      <script src="<?php  echo base_url();?>assets/custom/datatable_min.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/jquery-ui.js"></script>
        </body>

</html>
