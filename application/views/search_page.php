<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Search</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
      <!-- left and sec header-------------- -->
      <?php 
        $this->load->view('secoundheader',$this->data);
        $this->load->view('leftsidebar',$this->data);
        
        ?>
    <!-- left and sec header-------------- -->
                    <!-- middle content -->
                    
                    <div id="content">
                    
                    <div class="outer">
                       <?php  foreach($student as $row){?>
                        <div class="inner">
                            <hr>
                               <?php 
                                       $fullname=$row->firstname.' '.$row->lastname;               
                                  echo '<div class="row">
                                        <div class="col-md-2">
                                             <div style="width:50px;height:100px;"><img style="width50px;height:100px;" src="'.base_url().''.$row->s_pic.'"></div>
                                         </div>
                                        <div class="col-md-4"> <span style="font-weight:300;font-size:17px;padding:5px;"><b> '.$fullname.'</b></span>
                                         </div>
                                    <div class="col-md-2"><span style="font-weight:300;font-size:17px;padding:5px;"><b>'.$row->class.'</b></span>
                                    </div>
                                    <div class="col-md-1"><span style="font-weight:300;font-size:17px;padding:5px;"><b>'.$row->gender.'</b></span>
                                    </div>
                                    <div class="col-md-2"><span style="font-weight:300;font-size:17px;padding:5px;"><b>'.$row->mobile.'</b></span>
                                    </div>
                                  </div>';
                                  echo '<div class="row">
                                        <div class="col-md-2">
                                        </div>
                                    <div class="col-md-4"> <b>'.$row->barcode.'</b>
                                    
                                    </div>
                                    <div class="col-md-3"><span style="font-weight:300;font-size:17px;padding:5px;"></span>
                                    </div>
                                    <div class="col-md-3"><span style="font-weight:300;font-size:17px;padding:5px;"></span>
                                    </div>
                                  </div>';
                            
                               ?>      
                              <hr>
                              </div>
                    <?php } ?>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->

                </div>
                <!-- /#content -->

          
<script src="<?php  echo base_url();?>assets/js/jqueryui2.js"></script>
  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
        </body>

</html>
