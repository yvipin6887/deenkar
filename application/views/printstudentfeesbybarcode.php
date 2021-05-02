<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Student Fess</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    
    <!-- datable css -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/selfcustom/printsetstyle.css">
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/bootstrap/css/bootstrap.css">

</head>

<body>
    <div class="container-fluid">
       <div class="row">
          <div class="col-xs-6" style="border-right:1px dotted gray;">
             <div class="invoice-title">
                  <?php
                  $logo=base_url();
                  echo '<img src="'.$logo.'/uploads/logo/schoolheader.jpg" style="width: 100%;height:80px;">';
                  ?>
              </div>
              <hr>
                <div class="row" style="margin-top:-15px">
                    <div class="col-xs-6">
                      <address>
                      <span>Name:Vipin Kumar</span><br>
                      <span>Class:I A</span><br>
                      <span>Father Name:Rajbahadur Yadav</span><br>
                      <span>Contact No:8237056887</span><br>
                      </address>
                    </div>
                    <div class="col-xs-6 text-right">
                      <address>
                        <span>Receipt No:5555</span><br>
                        <span>Payment Mode:Cash</span><br>
                        <span>Date:01-05-2020</span><br>
                        <span>Admin No:8208452875</span><br>
                      </address>
                    </div>
                </div>
                <!-- tabledetails----------------- -->
                <div class="row" >
                  <div class="col-md-12" style="margin-top:-20px">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title"><strong>Fees summary</strong></h3>
                      </div>
                        <div class="panel-body">
                          <div class="table">
                            <table class="table table-condensed">
                              <thead>
                                              <tr>
                                    <td><strong>Categories</strong></td>
                                    <td class="text-center"><strong>Fees Amount</strong></td>
                                    <td class="text-center"><strong>Discount</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                              </tr>
                              </thead>
                              <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                
                                <tr>
                                  <td>BS-200</td>
                                  <td class="text-center">1</td>
                                  <td class="text-center">1</td>
                                  <td class="text-right">$10.99</td>
                                </tr>
                                              <tr>
                                    <td>BS-400</td>
                                  <td class="text-center">3</td>
                                  <td class="text-center">3</td>
                                  <td class="text-right">$60.00</td>
                                </tr>
                                              <tr>
                                      <td>BS-1000</td>
                                  <td class="text-center">1</td>
                                  <td class="text-center">1</td>
                                  <td class="text-right">$600.00</td>
                                </tr>
                                <tr>
                                  <td class="thick-line"></td>
                                  <td class="thick-line"></td>
                                  <td class="thick-line text-center"><strong>Total</strong></td>
                                  <td class="thick-line text-right">$670.99</td>
                                </tr>
                                <tr>
                                  <td class="thick-line">Remaning</td>
                                  <td class="thick-line">500</td>
                                  <td class="thick-line text-center"><strong>Rupees</strong></td>
                                  <td class="thick-line text-right">$670.99</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- tabledetails----------------- -->
          </div>
          <div class="col-xs-6">
              <div class="invoice-title">
                  <?php
                  $logo=base_url();
                  echo '<img src="'.$logo.'/uploads/logo/schoolheader.jpg" style="width: 100%;height:80px;">';
                  ?>
              </div>
              <hr>
                <div class="row" style="margin-top:-15px">
                    <div class="col-xs-6">
                      <address>
                      <span>Name:Vipin Kumar</span><br>
                      <span>Class:I A</span><br>
                      <span>Father Name:Rajbahadur Yadav</span><br>
                      <span>Contact No:8237056887</span><br>
                      </address>
                    </div>
                    <div class="col-xs-6 text-right">
                      <address>
                        <span>Receipt No:5555</span><br>
                        <span>Payment Mode:Cash</span><br>
                        <span>Date:01-05-2020</span><br>
                        <span>Admin No:8208452875</span><br>
                      </address>
                    </div>
                </div>
                <!-- tabledetails----------------- -->
                <div class="row" >
                  <div class="col-md-12" style="margin-top:-20px">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title"><strong>Fees summary</strong></h3>
                      </div>
                        <div class="panel-body">
                          <div class="table">
                            <table class="table table-condensed">
                              <thead>
                                              <tr>
                                    <td><strong>Categories</strong></td>
                                    <td class="text-center"><strong>Fees Amount</strong></td>
                                    <td class="text-center"><strong>Discount</strong></td>
                                    <td class="text-right"><strong>Totals</strong></td>
                                              </tr>
                              </thead>
                              <tbody>
                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                
                                <tr>
                                  <td>BS-200</td>
                                  <td class="text-center">1</td>
                                  <td class="text-center">1</td>
                                  <td class="text-right">$10.99</td>
                                </tr>
                                              <tr>
                                    <td>BS-400</td>
                                  <td class="text-center">3</td>
                                  <td class="text-center">3</td>
                                  <td class="text-right">$60.00</td>
                                </tr>
                                              <tr>
                                      <td>BS-1000</td>
                                  <td class="text-center">1</td>
                                  <td class="text-center">1</td>
                                  <td class="text-right">$600.00</td>
                                </tr>
                                <tr>
                                  <td class="thick-line"></td>
                                  <td class="thick-line"></td>
                                  <td class="thick-line text-center"><strong>Total</strong></td>
                                  <td class="thick-line text-right">$670.99</td>
                                </tr>
                                <tr>
                                  <td class="thick-line">Remaning</td>
                                  <td class="thick-line">500</td>
                                  <td class="thick-line text-center"><strong>Rupees</strong></td>
                                  <td class="thick-line text-right">$670.99</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- tabledetails----------------- -->
          </div>
      </div>
      
     </div>
</body>

</html>
<script src="<?php  echo base_url();?>assets/lib/bootstrap/js/bootstrap.js"></script>
