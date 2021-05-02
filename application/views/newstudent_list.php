<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>New Student List</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    
    <!-- datable css -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/datatable_css.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script> -->
<style>
#newstudentdata_wrapper th,td{
padding:5px;
font-size:10px;
margin:0px;
}
</style>

  <?php 
  $this->load->view('secoundheader',$this->data);
  $this->load->view('leftsidebar',$this->data);
  
  ?>
                    <!-- middle content -->
                    <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                                <hr>
                                <div class="text-center" >

                                    <a class="quick-btn btn-danger" href="#" style="background:#df8591;">
                                    <span>Total </span>
                                    <span class="label label-danger"><?php echo $totalcount[0]->totalstatus;?></span>
                                    </a>
                                   <?php
                                //    echo '<input type="hidden" id="base_url" value="'.base_url().'">';
                                   foreach($statuscount as $row)
                                 echo '   <a class="quick-btn btn-danger" href="#" >
                                    <span>'.$row->status.' </span>
                                    <span class="label label-danger">'.$row->statuscount.'</span>
                                    </a>';
                                   ?>

                                </div>
                              <div class="box">
                                    <header>
                                        <div class="icons"><i class="fa fa-table"></i></div>
                                        <h5>New Student List</h5>
                                        <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                        <a href="<?php  echo base_url();?>Admin/NewStudentEnquiry/" class="btn btn-primary" data-toggle="tooltip" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                    </header>
                                    <div id="collapse4" class="body">
                                        <table id="newstudentdata" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                            <thead>
                                            <tr>
                                                <th>Branch</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Gender</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Source</th>
                                                <th>Follow Date</th>
                                                <th>Customize</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                          </div>

                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->

            </div>
            <!-- delete data- -->
            <div class="modal fade" id="deleteModal" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete of <font id="getnewstudentname"></font></h4>
                    </div>
                    <div class="modal-body">
                  <?php echo '<form class="form-horizontal" action="'.base_url('index.php/Delete/query/NewStudentEnquiryM').'" enctype="multipart/form-data"method="post">';
                  ?>
                  
                    <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>

                                    <div class="col-lg-8">
                                        <input type="hidden" id="deleteid" name="deleteid" class="form-control" value="">
                                    </div>
                                </div>
                    <center><h2>Are You Sour delete for this data? </h2></center>
                    <br>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="deletedata" value="Submit"  type="submit">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   </center>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                
                </div>
            </div>
 <!-- delete data -->
            <!-- #viewmodal -->
            <div id="viewnewstudentModal" class="modal fade" data-width="800">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">View New Student</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">First Name:</label>

                                            <div class="col-md-8">
                                                <p id="viewfirstname"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Middle Name:</label>

                                            <div class="col-md-8">
                                                <p id="viewmiddlename"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Last Name:</label>

                                            <div class="col-md-8">
                                                <p id="viewlastname"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Gender :</label>

                                            <div class="col-md-8">
                                                <p id="viewgender"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Date Of Birth: </label>

                                            <div class="col-md-8">
                                                <p id="viewdateofbirth"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Mobile: </label>

                                            <div class="col-md-8">
                                                <p id="viewmobile"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Email: </label>

                                            <div class="col-md-8">
                                                <p id="viewemail"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Class: </label>

                                            <div class="col-md-8">
                                                <p id="viewclass"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Source: </label>

                                            <div class="col-md-8">
                                                <p id="viewsource"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Conutry: </label>

                                            <div class="col-md-8">
                                                <p id="viewConutry"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">State: </label>

                                            <div class="col-md-8">
                                                <p id="viewstate"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">City: </label>

                                            <div class="col-md-8">
                                                <p id="viewcity"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Address: </label>

                                            <div class="col-md-8">
                                                <p id="viewaddress"></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right"></label>

                                            <div class="col-md-8">
                                            <label for="text1" class="control-label">Father Details</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Father Name:</label>

                                            <div class="col-md-8">
                                                <p id="viewfathername"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Date Of Birth: </label>

                                            <div class="col-md-8">
                                                <p id="viewf_DOB"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Mobile: </label>

                                            <div class="col-md-8">
                                                <p id="viewf_mobile"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Email: </label>

                                            <div class="col-md-8">
                                                <p id="viewf_email"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Qualification: </label>

                                            <div class="col-md-8">
                                                <p id="viewf_qualification"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Work Title: </label>

                                            <div class="col-md-8">
                                                <p id="viewf_worktitle"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right"></label>

                                            <div class="col-md-8">
                                            <label for="text1" class="control-label">Mother Details</label>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Mother Name:</label>

                                            <div class="col-md-8">
                                                <p id="viewmothername"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Date Of Birth: </label>

                                            <div class="col-md-8">
                                                <p id="viewm_DOB"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Mobile: </label>

                                            <div class="col-md-8">
                                                <p id="viewm_mobile"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Email: </label>

                                            <div class="col-md-8">
                                                <p id="viewm_email"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Qualification: </label>

                                            <div class="col-md-8">
                                                <p id="viewm_qualification"></p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Work Title: </label>

                                            <div class="col-md-8">
                                                <p id="viewm_worktitle"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
                <!-- add newstatus data- -->
        <div class="modal fade" id="addstatusModal" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Status</h4>
                    </div>
                    <div class="modal-body">
                         <form>
                             <div class="form-group">
                                    <label for="text1" class="control-label col-lg-2">Status</label>

                                    <div class="col-lg-6">
                                      <input type="text" class="form-control" id="newstatus" name="newstatus">
                                    </div>
                                   
                                </div>
                    <br><br><br>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="newstatusdata" value="Submit"  type="button" onclick="newstatusadd()">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   </center>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                
                </div>
            </div>
 <!-- add new status data -->

<script src="<?php  echo base_url();?>assets/js/newstudent_list.js"></script>

      <script src="<?php  echo base_url();?>assets/custom/datatable_bootstrap_min.js"></script>
      <script src="<?php  echo base_url();?>assets/custom/datatable_min.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
        </body>

</html>
