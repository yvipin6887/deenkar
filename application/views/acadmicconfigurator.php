<link rel="stylesheet" href="<?php  echo base_url();?>assets/custom/jquery-ui.css">
            <title><?php echo  $Title;?></title>
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/datatable_css.css">

            <?php 
            $this->load->view('secoundheader',$this->data);
            $this->load->view('leftsidebar',$this->data);
            
            ?>
                <div id="content" ng-app="myApp" ng-controller="AcademicConfiguratorController" data-ng-init="getacademicdata()">
                
                    <div class="outer">
                       <!-- ------------Tab-------------- -->
                         <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab1default" data-toggle="tab"><b>Academic</b></a></li>
                                            <li><a href="#tab2default" data-toggle="tab" ><b>Semester</b></a></li>
                                        </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">
                                            <div class="box">
                                                    <header>
                                                        <div class="icons"><i class="fa fa-table"></i></div>
                                                        <h5>Academic Year List</h5>
                                                        <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                                        <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#addacademiclistModal" style="font-size: 15px;" data-toggle="tooltip" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                        </div>
                                                    </header>
                                                    <div id="collapse4" class="body">
                                                        <table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                                            <thead>
                                                            <tr >
                                                                <th>Branch</th>
                                                                <th>Academic</th>
                                                                <th>From</th>
                                                                <th> TO </th>
                                                                <th>Active </th>
                                                                <th>Custmize </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                                 <tr ng-repeat="acd in academicdata">
                                                                 <td>{{acd.branch}}</td>
                                                                 <td>{{acd.academic}}</td>
                                                                 <td>{{acd.fromdate}}</td>
                                                                 <td>{{acd.todate}}</td>
                                                                 <td ng-if="acd.active==1">Yes</td>
                                                                 <td ng-if="acd.active!=1">No</td>
                                                                 <td>
                                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#editacademiclistModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="geteditacademic(acd.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#deleteacademiclistModal" style="font-size: 15px;" data-toggle="tooltip" title="Delete"  ng-click="deletedata(acd.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                                                    <h5>Semester List</h5>
                                                    <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                                    <a  href="javascript:;"class="btn" data-toggle="modal" ng-click="getacadmicdata()" data-target="#addsemesterModal" style="font-size: 15px;" data-toggle="tooltip" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                    </div>
                                                </header>
                                                <div id="collapse4" class="body">
                                                    <table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Academic</th>
                                                            <th>Branch</th>
                                                            <th>Semester</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Active</th>
                                                            <th>Custmize</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr ng-repeat="sem in semesterdata">
                                                                 <td>{{sem.academic}}</td>
                                                                 <td>{{sem.branch}}</td>
                                                                 <td>{{sem.semester}}</td>
                                                                 <td>{{sem.fromdate}}</td>
                                                                 <td>{{sem.todate}}</td>
                                                                 <td ng-if="sem.active==1">Yes</td>
                                                                 <td ng-if="sem.active!=1">No</td>
                                                                 <td>
                                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#editacademiclistModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="geteditacademic(sem.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#deleteacademiclistModal" style="font-size: 15px;" data-toggle="tooltip" title="Delete"  ng-click="deletedata(sem.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                 <div class="modal fade" id="addacademiclistModal" role="dialog" data-width="400">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">New Academic</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Academic<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="Academic" name="Academic" placeholder="Academic" class="form-control" ng-model="academicname"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">From<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="fromdate" name="fromdate" placeholder="From Date" class="form-control datepicker-here" ng-model="fromdate"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">To<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="todate" name="todate" placeholder="To Date" class="form-control datepicker-here" ng-model="todate"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4"></span></label>

                                                                <div class="col-lg-8">
                                                                     <div class="checkbox">
                                                                    <label><input type="checkbox" name="active" id="active" ng-model="active"value="">Active</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-actions">
                                                        <center>
                                                         <input      class="navigation_button btn btn-primary" id="submitdata3" value="Submit" type="button" ng-click="newacademicdata()" >
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
                    <!-- add new acdemic -->
                    <!-- edit new acdemic -->
                    <div class="modal fade" id="editacademiclistModal" role="dialog" data-width="400">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit Academic</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Academic<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="Academicedit" name="Academicedit" placeholder="Academic" class="form-control" ng-model="academicnameedit"value="" required>
                                                                    <input type="hidden" id="updateid" name="updateid" class="form-control" ng-model="updateid"value="" >
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">From<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="fromdateedit" name="fromdateedit" placeholder="From Date" class="form-control datepicker-here" ng-model="fromdateedit"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">To<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="todateedit" name="todateedit" placeholder="To Date" class="form-control datepicker-here" ng-model="todateedit"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4"></span></label>
                                         
                                                                <div class="col-lg-8">
                                                                     <div class="checkbox" >
                                                                    <label><input type="checkbox" name="activeedit" id="activeedit" ng-model="activeedit"value="">Active</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-actions">
                                                        <center>
                                                         <input      class="navigation_button btn btn-primary" id="submitdata3" value="Submit" type="button" ng-click="editacademicdata()" >
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
                    <!-- Edit new acdemic -->
                    <!-- delete new acdemic -->
                    <div class="modal fade" id="deleteacademiclistModal" role="dialog" data-width="400">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Delete Academic</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-10">
                                                        <center><h2>Are You Sour delete for this data? </h2></center>
                                                        <input type="hidden" id="deleteid" name="deleteid" class="form-control"ng-model="deleteid" value="">
                                                            <br><br>
                                                            <div class="form-actions">
                                                                <center>
                                                                <input      class="navigation_button btn btn-primary" id="submitdata3" value="Submit" type="button" ng-click="deleteacademicdata()" >
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
                    <!-- Edit new acdemic -->
                     <!-- add new semester - -->
                 <div class="modal fade" id="addsemesterModal" role="dialog" data-width="400">
                                    <div class="modal-dialog">
                                    
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">New Semester</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Academic<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <select  id="selectedacademic" name="selectedacademic" class="form-control" ng-model="selectedacademic" >
                                                                        <!-- <select  id="selectedprofile" name="selectedprofile" class="form-control" ng-model="selectedprofile" multiple="multiple" class="3col active"> -->
                                                                                <option value="">Select</option>
                                                                                <option ng-repeat="acad1 in academicedataOnly" value="{{acad1.academic}}">{{acad1.academic}}</option>
                                                                            
                                                                                
                                                                            </select> 
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">Semester<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="Semester" name="Semester" placeholder="Semester" class="form-control" ng-model="Semestername"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">From<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="sefromdate" name="sefromdate" placeholder="From Date" class="form-control datepicker-here" ng-model="sefromdate"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4">To<span style="color:red;"> *</span></label>

                                                                <div class="col-lg-8">
                                                                    <input type="text" id="setodate" name="setodate" placeholder="To Date" class="form-control datepicker-here" ng-model="setodate"value="" required>
                                                                    
                                                                </div>
                                                            </div>
                                                            <br><br>
                                                            <div class="form-group">
                                                                <label for="text1" class="control-label col-lg-4"></span></label>

                                                                <div class="col-lg-8">
                                                                     <div class="checkbox">
                                                                    <label><input type="checkbox" name="seactive" id="seactive" ng-model="seactive"value="">Active</label>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br><br>
                                                    <div class="form-actions">
                                                        <center>
                                                         <input      class="navigation_button btn btn-primary" id="submitdata4" value="Submit" type="button" ng-click="newsemesterdata()" >
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
                    <!-- add new semester -->
                                <!-- ------------Tab-------------- -->
                                
                            </div>
                    <!-- /.outer -->
                       
                </div>
                <!-- /#content -->
             
 <script src="<?php  echo base_url();?>assets/custom/angular.min.js"></script>

<script src="<?php  echo base_url();?>assets/js/academicconfigurator.js"></script>
     <script src="<?php  echo base_url();?>assets/custom/datatable_bootstrap_min.js"></script>
      <script src="<?php  echo base_url();?>assets/custom/datatable_min.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/jquery-ui.js"></script>