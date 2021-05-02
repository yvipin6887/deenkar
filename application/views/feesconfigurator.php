<link rel="stylesheet" href="<?php  echo base_url();?>assets/custom/jquery-ui.css">
            <title><?php echo  $Title;?></title>
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/datatable_css.css">
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/jquery.multiselect.css">

            <?php 
            $this->load->view('secoundheader',$this->data);
            $this->load->view('leftsidebar',$this->data);
            
            ?>
                <div id="content" ng-app="myApp" ng-controller="FeesConfiguratorController" data-ng-init="getFeesProfiledata()">
                
                    <div class="outer">
                       <!-- ------------Tab-------------- -->
                         <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab1default" data-toggle="tab"><b>Fees Profile</b></a></li>
                                            <li><a href="#tab2default" data-toggle="tab" ><b>Fees Assign</b></a></li>
                                        </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <div class="box">
                                                    <header>
                                                        <div class="icons"><i class="fa fa-table"></i></div>
                                                        <h5>Fees Profile List</h5>
                                                        <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                                        <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#addfeesprofileModal" style="font-size: 15px;" data-toggle="tooltip" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        </div>
                                                    </header>
                                                    <div id="collapse4" class="body">
                                                        <table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                                            <thead>
                                                            <tr >
                                                                
                                                                <th>Branch </th>
                                                                <th>Profile Name </th>
                                                                <th>Custmize </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <tr ng-repeat="pro in profilesdata">
                                                                 <td>{{pro.branch}}</td>
                                                                 <td>{{pro.profilename}}</td>
                                                                 <td>
                                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#editfeesprofileModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="geteditfees(pro.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#deleteprofileModal" style="font-size: 15px;" data-toggle="tooltip" title="Delete"  ng-click="deletedata(pro.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                    </td>
                                                                 </tr>   
                                                            </tbody>
                                                        </table>
                                                    </div>
                                            <!-- tableview------------- -->
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2default">
                                        <!-- tableview------------- -->
                                            <div class="box">
                                                <header>
                                                    <div class="icons"><i class="fa fa-table"></i></div>
                                                    <h5>Fees Assign List</h5>
                                                    <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#classfeesassignModal" style="font-size: 15px;" data-toggle="tooltip" title="Add" ng-click="getProfiledata()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                    </div>
                                                </header>
                                                <div id="collapse4" class="body">
                                                    <table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Student</th>
                                                            <th>Class</th>
                                                            <th>Profile</th>
                                                            <th>Amount</th>
                                                            <th>Installment</th>
                                                            <th>Custmize</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                             <tr ng-repeat="fee in feesassigndata">
                                                                <td>{{fee.firstname}} {{fee.lastname}}</td>
                                                                <td>{{fee.class}}</td>
                                                                <td>{{fee.profilename}}</td>
                                                                <td>{{fee.net_fees}}</td>
                                                                <td>{{fee.installment}}</td>
                                                                <td>
                                                                <a ng-if="fee.net_fees!=''&& fee.net_fees!=null" href="javascript:;"class="btn" data-toggle="modal" data-target="#veiwclassfeesassignModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="getveiwfees(fee.id,fee.firstname,fee.lastname,fee.barcode)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                <a ng-if="fee.net_fees!=''&& fee.net_fees!=null" href="javascript:;"class="btn" data-toggle="modal" data-target="#editfeesprofileModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="geteditfees(fee.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                <a ng-if="fee.net_fees=='' || fee.net_fees==null" href="javascript:;"class="btn" data-toggle="modal" data-target="#classfeesassignModal" style="font-size: 15px;" data-toggle="tooltip" title="Add" ng-click="getProfiledata()"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                                </td>
                                                             </tr>   
                                                        </tbody>
                                                    </table>
                                                </div>
                                        <!-- tableview------------- -->
                                        </div>
                                    </div>
                                </div>
                                 <!-- add newclass- -->
                 <div class="modal fade" id="addfeesprofileModal" role="dialog" data-width="400">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">New Fees Profile</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Profile Name<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="feesprofile" name="feesprofile" placeholder="Fees Preofile" class="form-control" ng-model="feesprofile"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-actions">
                                                        <center>
                                                         <input      class="navigation_button btn btn-primary" id="submitdata3" value="Submit" type="button" ng-click="newprofiledata()" >
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
                    <!-- add new profile -->
                    <!-- edit new profie -->
                    <div class="modal fade" id="editfeesprofileModal" role="dialog" data-width="400">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Fees Profile</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Profile Name<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="profilename" name="profilename" placeholder="Fees Preofile" class="form-control" ng-model="profilename"value="" required>
                                                                    <input type="hidden" id="updateid" name="updateid"  class="form-control" ng-model="updateid"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-actions">
                                                        <center>
                                                         <input      class="navigation_button btn btn-primary" value="Submit" type="button" ng-click="editprofiledata()" >
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
                                <!-- edit profile-------- -->
                    <!-- delete new profile -->
                    <div class="modal fade" id="deleteprofileModal" role="dialog" data-width="400">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Fees Profile</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-10">
                                                        <center><h2>Are You Sour delete for this data? </h2></center>
                                                        <input type="hidden" id="deleteidprpofile" name="deleteidprpofile" class="form-control"ng-model="deleteidprpofile" value="">
                                                            <br><br>
                                                            <div class="form-actions">
                                                                <center>
                                                                <input      class="navigation_button btn btn-primary" id="submitdata3" value="Submit" type="button" ng-click="deletefeesdata()" >
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                    <!-- Edit new profile -->
                     <!-- add new Fees assign - -->
                 <div class="modal fade" id="classfeesassignModal" role="dialog" data-width="1000">
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
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Class</label>

                                                                <div class="col-lg-8">
                                                                 <select  id="selectedclassname" name="selectedclassname" class="form-control" ng-model="selectedclassname">
                                                                        <option value="">Select</option>
                                                                    <?php foreach($classlist as $value){
                                                                            echo '<option value="'.$value->classname.'">'.$value->classname.'</option>';
                                                                        }
                                                                        ?>
                                                                        
                                                                    </select>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Profile</label>

                                                                <div class="col-lg-8">
                                                                    <select  id="selectedprofile" name="selectedprofile" class="form-control" ng-model="selectedprofile" >
                                                                    <!-- <select  id="selectedprofile" name="selectedprofile" class="form-control" ng-model="selectedprofile" multiple="multiple" class="3col active"> -->
                                                                            <option value="">Select</option>
                                                                            <option ng-repeat="pro1 in profilesdataOnly" value="{{pro1.id}}||{{pro1.profilename}}">{{pro1.profilename}}</option>
                                                                        
                                                                            
                                                                        </select> 
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Installment</label>

                                                                <div class="col-lg-8">
                                                                    <select  id="selectedinstall" name="selectedinstall" class="form-control" ng-model="selectedinstall">
                                                                        <option value="">Select</option>  
                                                                        <option value="1">1</option>  
                                                                        <option value="2">2</option>  
                                                                        <option value="3">3</option>  
                                                                        <option value="4">4</option>  
                                                                        <option value="5">5</option>  
                                                                        <option value="6">6</option>  
                                                                        <option value="7">7</option>  
                                                                        <option value="8">8</option>  
                                                                        <option value="9">9</option>  
                                                                        <option value="10">10</option>  
                                                                        <option value="11">11</option>  
                                                                        <option value="12">12</option>  
                                                                            </select> 
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-actions">
                                                        <center>
                                                         <input      class="navigation_button btn btn-primary" id="nextbutton" value="Next" type="button" ng-click="nextbutton()" >
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </center>
                                                    </div>
                                                    <br><br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div id="newfeesassign"></div>
                                                            <br><br>
                                                            <div class="form-actions" style="display:none" id="actionid">
                                                                <center>
                                                                <input      class="navigation_button btn btn-primary" id="submitfees" value="Submit" type="button" ng-click="submitfeesassign()" >
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                    <!-- add new fees asssign -->
                     <!--veiw Fees assign - -->
                 <div class="modal fade" id="veiwclassfeesassignModal" role="dialog" data-width="1000">
                                    <div class="modal-dialog modal-lg">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Fees of {{stname}} Student </h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-3">
                                                             <div style="width:100px;height:100px;"><img style="width:100px;height:100px;" src="<?php echo base_url();?>{{s_pic}}"></div>
                                                        </div>
                                                        <div class="col-md-4">
                                                      <b>    <span>Name:{{stname}} </span> 
                                                          <br>
                                                          <span>Class:{{classname}}</span> </b>
                                                        </div>
                                                        <div class="col-md-5">
                                                       <b> <span>Barcode:{{barcode}}</span><br>  
                                                          <span>Installment:{{installment}}</span><b>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                <div class="row">
                                                        <div class="col-md-1">
                                                           
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="quick-btn btn-danger" href="#" style="background:#8dec7b;" >
                                                            <span>Actule Fees </span>
                                                            <i class="fa fa-inr" aria-hidden="true"></i>
                                                            <span >{{actul_fees}}</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="quick-btn btn-danger" href="#" style="background: #dbec7b;" >
                                                                <span>Discounts </span>
                                                                <i class="fa fa-inr" aria-hidden="true"></i>
                                                                <span >{{discount}}</span>
                                                                </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="quick-btn btn-danger" href="#" style="background:#8dec7b;" >
                                                                <span>Net Fees </span>
                                                                <i class="fa fa-inr" aria-hidden="true"></i>
                                                                <span >{{net_fees}}</span>
                                                                </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="quick-btn btn-danger" href="#" style="background: #6db55f;" >
                                                                <span>Collected </span>
                                                                <i class="fa fa-inr" aria-hidden="true"></i>
                                                                <span >{{totalfemaledata}}</span>
                                                                </a>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a class="quick-btn btn-danger" href="#" style="background:#f18d96;" >
                                                                <span>Remaining </span>
                                                                <i class="fa fa-inr" aria-hidden="true"></i>
                                                                <span >{{totalfemaledata}}</span>
                                                                </a>
                                                        </div>
                                                        <div class="col-md-1">
                                                           
                                                           </div>
                                                    </div>
                                                    
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                    <!-- view fees assign -->
                                <!-- ------------Tab-------------- -->
                                
                            </div>
                    <!-- /.outer -->
                       
                </div>
                <!-- /#content -->

 <script src="<?php  echo base_url();?>assets/custom/angular.min.js"></script>

<script src="<?php  echo base_url();?>assets/js/feesconfigurator.js"></script>
     <script src="<?php  echo base_url();?>assets/custom/datatable_bootstrap_min.js"></script>
      <script src="<?php  echo base_url();?>assets/custom/datatable_min.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/jquery-ui.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/jquery.multiselect.js"></script>