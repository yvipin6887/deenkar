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
  ?>
                    <!-- middle content -->
                    <div id="content" ng-app="myApp" ng-controller="FeesCollectionController">
                    <div class="outer">
                        <div class="inner bg-light lter">
                                <hr>
                                <div class="text-center" >

                                 <!--   <a class="quick-btn btn-danger" href="#" style="background:#df8591;" >
                                    <span>Total </span>
                                    <span class="label label-danger">{{totalstudentdata}}</span>
                                    </a>
                                    <a class="quick-btn btn-danger" href="#" style="background:#df8591;" >
                                    <span>Male </span>
                                    <span class="label label-danger">{{totalmaledata}}</span>
                                    </a>
                                    <a class="quick-btn btn-danger" href="#" style="background:#df8591;" >
                                    <span>Female </span>
                                    <span class="label label-danger">{{totalfemaledata}}</span>
                                    </a>
                                    -->

                                </div>
                              <div class="box">
                                    <header>
                                        <div class="icons"><i class="fa fa-table"></i></div>
                                        <h5>Student Fees Collection</h5>
                                        <!-- <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                             <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#feescollectionModal" style="font-size: 15px;" data-toggle="tooltip" title="Add"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </div> -->
                                    </header>
                                    <div id="collapse4" class="body">
                                    <table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Student</th>
                                                            <th>Class</th>
                                                            <th>Amount</th>
                                                            <th>Collected Fees</th>
                                                            <th>Remaining Fees</th>
                                                            <th>Custmize</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                             <tr ng-repeat="fee in feescollecteddata">
                                                                <td>{{fee.firstname}} {{fee.lastname}}</td>
                                                                <td>{{fee.class}}</td>
                                                                <td>{{fee.net_fees1}}</td>
                                                                <td>{{fee.collectedamount}}</td>
                                                                <td>{{fee.net_fees1-fee.collectedamount}}</td>
                                                                
                                                                <td>
                                                                <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#feescollectionModal" style="font-size: 15px;" data-toggle="tooltip" title="Add" ng-click="getstudentfees(fee.barcode)"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                                <a  href="javascript:;"class="btn" data-toggle="modal" data-target="" style="font-size: 15px;" data-toggle="tooltip" title="Add" ng-click="printstudentfees(fee.barcode)"><i class="fa fa-print" aria-hidden="true"></i></a>
                                                                <!-- <a ng-if="fee.net_fees!=''&& fee.net_fees!=null" href="javascript:;"class="btn" data-toggle="modal" data-target="#veiwclassfeesassignModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="getveiwfees(fee.id,fee.firstname,fee.lastname,fee.barcode)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                <a ng-if="fee.net_fees!=''&& fee.net_fees!=null" href="javascript:;"class="btn" data-toggle="modal" data-target="#editfeesprofileModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="geteditfees(fee.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                <a ng-if="fee.net_fees=='' || fee.net_fees==null" href="javascript:;"class="btn" data-toggle="modal" data-target="#classfeesassignModal" style="font-size: 15px;" data-toggle="tooltip" title="Add" ng-click="getProfiledata()"><i class="fa fa-plus" aria-hidden="true"></i></a> -->
                                                                </td>
                                                             </tr>   
                                                        </tbody>
                                                    </table>
                                    </div>
                                </div>
                          </div>

                        </div>
                             <!-- add  collected Fees - -->
                 <div class="modal fade" id="feescollectionModal" role="dialog" data-width="1000">
                                    <div class="modal-dialog modal-lg">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Fees Assign</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="col-md-3">
                                                                    <label for="text1" >Name:</label>
                                                                    <span id="stud_name"></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="text1" >Net Fees:</label>
                                                                    <span id="stunetfees"></span>
                                                                    <input type="hidden" ng-model="stubarcode" id="stubarcode">
                                                                    <input type="hidden" ng-model="stunetfees1" id="stunetfees1">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="text1"> Collected Fees:</label>
                                                                    <span id="stunetcollect"></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="text1"> Remaining Fees:</label>
                                                                    <span id="stunetremaing"></span>
                                                                </div>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                        </div>
                                                         <div class="col-md-2">
                                                                <label for="text1">Installment:</label>
                                                                <input type="hidden" id="studentbarcode" >
                                                                <input type="hidden" id="assign_id" >
                                                                <input type="hidden" id="classname" >
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select  id="selectedinstall" name="selectedinstall" class="form-control" ng-model="selectedinstall">
                                                                <option value="">Select</option>  
                                                                <option ng-repeat="int1 in installment" value="{{int1}}">{{int1}}</option>
                                                                    </select> 
                                                            
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-actions">
                                                        <center>
                                                         <input    class="navigation_button btn btn-primary" id="nextbutton" value="Next" type="button" ng-click="nextbutton()" >
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </center>
                                                    </div>
                                                    <br><br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="collectfeesassign"></div>
                                                            <br><br>
                                                            <div class="form-actions" style="display:none" id="actionid">
                                                                <center>
                                                                <input      class="navigation_button btn btn-primary" id="submitfees" value="Submit" type="button" ng-click="submitfeescollection()" >
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                    <!-- add collected Fees -->
                         
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
      
            </div>
            

 <script src="<?php  echo base_url();?>assets/custom/angular.min.js"></script>

<script src="<?php  echo base_url();?>assets/js/fees_collection.js"></script>
         
      <script src="<?php  echo base_url();?>assets/custom/datatable_bootstrap_min.js"></script>
      <script src="<?php  echo base_url();?>assets/custom/datatable_min.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/jquery-ui.js"></script>
        </body>

</html>
