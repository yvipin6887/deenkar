<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Exist Student List</title>
    
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
                    <div id="content" ng-app="myApp" ng-controller="ExistingStudentController">
                    <div class="outer">
                        <div class="inner bg-light lter">
                                <hr>
                                <div class="text-center" >

                                    <a class="quick-btn btn-danger" href="#" style="background:#df8591;" >
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

                                </div>
                              <div class="box">
                                    <header>
                                        <div class="icons"><i class="fa fa-table"></i></div>
                                        <h5>Exist Student List</h5>
                                        <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                             <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#addstudentModal" style="font-size: 15px;" data-toggle="tooltip" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                             <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#rollnoassignModal" style="font-size: 15px;" data-toggle="tooltip" title="Add"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        </div>
                                    </header>
                                    <div id="collapse4" class="body">
                                        <table id="existstudentdata" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                            <thead>
                                            <tr >
                                                <th>Photo</th>
                                                <th>Branch</th>
                                                <th>Name</th>
                                                <th>Class</th>
                                                <th>Gender</th>
                                                <th>Mobile</th>
                                                <th>Email</th>
                                                <th>Date Of Birth</th>
                                                <th>City</th>
                                                <th>Customize</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                  <tr ng-repeat="x in existstudent">
                                                  <td><div style="width:50px;height:50px;"><img style="width50px;height:50px;border-radius:50%;" src="<?php echo $base_url;?>{{x.s_pic}}"></div></td>
                                                  <td>{{x.branch}}</td>
                                                  <td>{{x.firstname}} {{x.lastname}}</td>
                                                  <td>{{x.class}}</td>
                                                  <td>{{x.gender}}</td>
                                                  <td>{{x.mobile}}</td>
                                                  <td>{{x.email}}</td>
                                                  <td>{{x.dateofbirth}}</td>
                                                  <td>{{x.city}}</td>
                                                  <td>
                                                  <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#viewstudentModal" style="font-size: 15px;" data-toggle="tooltip" title="View" ng-click="veiwstudent(x.id)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                  <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#editstudentModal" style="font-size: 15px;" data-toggle="tooltip" title="Edit" ng-click="editstudent(x.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                  <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#deleteModal" style="font-size: 15px;" data-toggle="tooltip" title="Delete"  ng-click="deletedata(x.id,x.firstname +' '+ x.lastname)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                  <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#studentsendemail" style="font-size: 15px;" data-toggle="tooltip" title="Delete"  ng-click="getstudentdata(x.id,x.firstname +' '+ x.lastname)"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                                  </td>
                                                  </tr>  
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                          </div>

                        </div>
                          <!-- add student data- -->
        <div class="modal fade" id="addstudentModal"  data-width="800">
        <div class="modal-dialog modal-lg">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Student ADD</h4>
                    </div>
                    <div class="modal-body">
                        <?php  echo ' <form class="form-horizontal" action="'.base_url('Insert/query/StudentM').'" enctype="multipart/form-data"method="post">';?>
                         <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">First Name<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control" ng-model="student.firstname"value="" required>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Middle Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="middlename" name="middlename" ng-model="student.middlename"placeholder="Middle Name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Last Name<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="lastname" name="lastname" ng-model="student.lastname" placeholder="Last Name" class="form-control" value="" required>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Gender <span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" class="gender" name="gender" id="gendermale" value="Male" checked=""> Male
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" class="gender"name="gender" id="genderfemale" value="Female" checked=""> Female
                                                            <span></span>
                                                        </label>
                                                        
                                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date OF Births<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="DOB" name="DOB" placeholder="DD/MM/YYYY"  class="form-control datepicker-here" value="" required>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Contact" name="Contact" placeholder="Contact NO" class="form-control"value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="Email" name="Email" placeholder="Email" class="form-control" value="">
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Class<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                    <select  id="classname" name="classname" class="form-control" required>
                                        <option value="">Select</option>
                                       <?php foreach($classlist as $value){
                                            echo '<option value="'.$value->classname.'">'.$value->classname.'</option>';
                                        }
                                        ?>
                                        
                                    </select>
                                        
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Source</label>

                                    <div class="col-lg-8">
                                    <select  id="Source" name="Source" class="form-control">
                                        <option value="">Select</option>
                                        <option value="New Pepare">New Pepare</option>
                                        <option value="Websites">Websites</option>
                                        <option value="Friends">Friends</option>
                                        <option value="Email">Email</option>
                                        
                                    </select>
                                        
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Country</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Country" name="Country" placeholder="Country" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">State</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="State" name="State" placeholder="State" class="form-control"value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">City</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="City" name="City" placeholder="City" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                    <textarea rows="5"  id="Address" name="Address" placeholder="Address" class="form-control" ></textarea>
                                        <!-- <input type="text" id="Address" name="Address" placeholder="Address" class="form-control"> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Image</label>

                                    <div class="col-lg-8">
                                        <input type="file" id="studentpic" name="studentpic" ng-model="student.studentpic" onchange="angular.element(this).scope().uploaderFile(this);" class="form-control" >
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>

                                    <div class="col-lg-8">
                                        <h4>Father Details</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Full Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="fathername" name="fathername" placeholder="Full Name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date of  Birth</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="DOB_f" name="DOB_f" placeholder="DD/MM/YYYY" class="form-control datepicker-here" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Contact_f" name="Contact_f" placeholder="Contact NO" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="Email_f" name="Email_f" placeholder="Email" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Qualification </label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Qualification" name="Qualification" placeholder="Qualification" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Work Title</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="job_title" name="job_title" placeholder="Job Title" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>

                                    <div class="col-lg-8">
                                        <h4>Mother Details</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Full Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="fullname_m" name="fullname_m" placeholder="Full Name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date Of Birth</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="DOB_m" name="DOB_m" placeholder="DD/MM/YYYY" class="form-control datepicker-here" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Contact_m" name="Contact_m" placeholder="Contact NO" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="Email_m" name="Email_m" placeholder="Email" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Qualification </label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Qualification_m" name="Qualification_m" placeholder="Qualification" class="form-control"value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Work Title</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="job_title_m" name="job_title_m" placeholder="Job Title" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Note</label>

                                    <div class="col-lg-8">
                                    <textarea rows="3"  id="note" name="note" placeholder="Note" class="form-control" ></textarea>
                                        <!-- <input type="text" id="Address" name="Address" placeholder="Address" class="form-control"> -->
                                    </div>
                                </div>
                                
                                
                                </div>
                                </div>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="submitdata" value="Submit" style="display:none;" type="submit">
                                   </center>
                                </div>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="submitdata2" value="Submit" type="button" ng-click="insertStudentData()" >
                                    <input class="navigation_button btn" id="cancel" data-dismiss="modal" value="Cancel" type="reset">
                                    </center>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                
                </div>
            </div>
 <!-- add student data -->
                          <!-- edit student data- -->
        <div class="modal fade" id="editstudentModal"  data-width="800">
        <div class="modal-dialog modal-lg">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Student Edit</h4>
                    </div>
                    <div class="modal-body">
                        <?php  echo ' <form class="form-horizontal" action="'.base_url('Update/query/StudentM').'" enctype="multipart/form-data"method="post">';?>
                         <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">First Name<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editfirstname" name="editfirstname" placeholder="First Name" class="form-control" value="" required>
                                        <input type="hidden" id="editbarocde" name="editbarocde" >
                                        <input type="hidden" id="updateid" name="updateid" >
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Middle Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editmiddlename" name="editmiddlename" ng-model="student.middlename"placeholder="Middle Name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Last Name<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editlastname" name="editlastname" ng-model="student.lastname" placeholder="Last Name" class="form-control" value="" required>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Gender <span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                    <div class="mt-radio-inline">
                                                        <label class="mt-radio">
                                                            <input type="radio" class="editgender" name="editgender" id="editgendermale" value="Male" checked=""> Male
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-radio">
                                                            <input type="radio" class="editgender"name="editgender" id="editgenderfemale" value="Female" checked=""> Female
                                                            <span></span>
                                                        </label>
                                                        
                                                    </div>
                                        <!-- <input type="radio" id="gendermale" name="gendermale"  class="form-control" value="Male">Male
                                        <input type="radio" id="genderfemale" name="genderfemale"  class="form-control" value="Female">Female -->
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date OF Births<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editDOB" name="editDOB" placeholder="DD/MM/YYYY"  class="form-control datepicker-here" value="" required>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editContact" name="editContact" placeholder="Contact NO" class="form-control"value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="editEmail" name="editEmail" placeholder="Email" class="form-control" value="">
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Class<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                    <select  id="editclassname" name="editclassname" class="form-control" required>
                                        <option value="">Select</option>
                                       <?php foreach($classlist as $value){
                                            echo '<option value="'.$value->classname.'">'.$value->classname.'</option>';
                                        }
                                        ?>
                                        
                                    </select>
                                        
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Source</label>

                                    <div class="col-lg-8">
                                    <select  id="editSource" name="editSource" class="form-control">
                                        <option value="">Select</option>
                                        <option value="New Pepare">New Pepare</option>
                                        <option value="Websites">Websites</option>
                                        <option value="Friends">Friends</option>
                                        <option value="Email">Email</option>
                                        
                                    </select>
                                        
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Country</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editCountry" name="editCountry" placeholder="Country" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">State</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editState" name="editState" placeholder="State" class="form-control"value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">City</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editCity" name="editCity" placeholder="City" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                    <textarea rows="5"  id="editAddress" name="editAddress" placeholder="Address" class="form-control" ></textarea>
                                        <!-- <input type="text" id="Address" name="Address" placeholder="Address" class="form-control"> -->
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Image</label>

                                    <div class="col-lg-8">
                                    <img src="" id="editst_profile" width="200px" height="200px">
                                        <input type="file" id="editstudentpic" name="editstudentpic" ng-model="student.studentpic" onchange="angular.element(this).scope().uploaderFile(this);" class="form-control" >
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>

                                    <div class="col-lg-8">
                                        <h4>Father Details</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Full Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editfathername" name="editfathername" placeholder="Full Name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date of  Birth</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editDOB_f" name="editDOB_f" placeholder="DD/MM/YYYY" class="form-control datepicker-here" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editContact_f" name="editContact_f" placeholder="Contact NO" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="editEmail_f" name="editEmail_f" placeholder="Email" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Qualification </label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editQualification" name="editQualification" placeholder="Qualification" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Work Title</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editjob_title" name="editjob_title" placeholder="Job Title" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4"></label>

                                    <div class="col-lg-8">
                                        <h4>Mother Details</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Full Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editfullname_m" name="editfullname_m" placeholder="Full Name" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date Of Birth</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editDOB_m" name="editDOB_m" placeholder="DD/MM/YYYY" class="form-control datepicker-here" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editContact_m" name="editContact_m" placeholder="Contact NO" class="form-control" value="">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="editEmail_m" name="editEmail_m" placeholder="Email" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Qualification </label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editQualification_m" name="editQualification_m" placeholder="Qualification" class="form-control"value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Work Title</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="editjob_title_m" name="editjob_title_m" placeholder="Job Title" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Note</label>

                                    <div class="col-lg-8">
                                    <textarea rows="3"  id="editnote" name="editnote" placeholder="Note" class="form-control" ></textarea>
                                        <!-- <input type="text" id="Address" name="Address" placeholder="Address" class="form-control"> -->
                                    </div>
                                </div>
                                
                                
                                </div>
                                </div>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="updatesubmitdata" value="Submit" style="display:none;" type="submit">
                                   </center>
                                </div>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="submitdata3" value="Submit" type="button" ng-click="updateStudentData()" >
                                    <input class="navigation_button btn" id="cancel" data-dismiss="modal" value="Cancel" type="reset">
                                    </center>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
                
                </div>
            </div>
 <!-- add student data -->
<!-- assign student data- -->
        <div class="modal fade" id="rollnoassignModal"  data-width="600">
        <div class="modal-dialog modal-lg">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Roll NO Assign</h4>
                    </div>
                    <div class="modal-body">
                          <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <select  id="classname" name="classname" class="form-control" ng-change="getStudentClassBy()" ng-model="classvalue">
                                        <option value="">Select</option>
                                       <?php foreach($classlist as $value){
                                            echo '<option value="'.$value->classname.'">'.$value->classname.'</option>';
                                        }
                                        ?>
                                        
                                    </select>
                            </div>
                                <div id="rollnodiv"><br><br><br>
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="fa fa-table"></i></div>
                                            <h5>Student Roll No Update</h5>
                                            <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                                <input type="button" class="btn"  style="font-size: 15px;" data-toggle="tooltip" title="Generate Roll no" ng-click="generaterollno()" value="Generate Roll no">
                                            </div>
                                        </header>
                                        <div id="collapse4" class="body">
                                        <table id="rollnostudentdata" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                                    <thead>
                                                    <tr >
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Class</th>
                                                        <th>Gender</th>
                                                        <th>Roll No</th>
                                                    </tr>
                                                    </thead>
                                                    <tr ng-repeat="st in studentdata">
                                                    <td><div style="width:50px;height:50px;"><img style="width50px;height:50px;border-radius:50%;" src="<?php echo $base_url;?>{{st.s_pic}}"></div></td>
                                                    <td>{{st.fullname}}</td>
                                                    <td>{{st.class}}</td>
                                                    <td>{{st.gender}}</td>
                                                    <td> 
                                                    <input type="text" id="rollno{{st.barcode}}" name="rollno" placeholder="Roll no" class="form-control studentrollno" value="{{st.rollno}}">
                                                    <input type="hidden"  class="form-control studentbarocde" value="{{st.barcode}}"></td>
                                                    </tr>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </div>
                         </div>
                     <div class="modal-footer">
                             <center>
                                <input class="navigation_button btn btn-primary" id="submitdata3" value="Submit" type="button" ng-click="updateStudentRollno()" >
                                <input class="navigation_button btn" id="cancel" value="Cancel" type="reset"  class="close" data-dismiss="modal">
                                </center>
                    </div>
                </div>
                
                </div>
            </div>
 <!--  student roll assign data -->
  <!-- student email -->
            <div class="modal fade" id="studentsendemail"  data-width="800">
                    <div class="modal-dialog modal-lg">
                            
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Student Send Email</h4>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="row">
                                           <div class="col-md-2">
                                                <img src="" id="editst_profile" width="150px" height="150px">
                                               
                                           </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="text1" class="control-label col-md-4">First Name</label>

                                                        <div class="col-md-8">
                                                        <p ></p>
                                                            <input type="hidden" id="studentid" name="studentid" >
                                                            <input type="hidden" id="studenbarcode" name="studenbarcode" >
                                                            
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="text1" class="control-label col-md-4">class</label>
                                                        <div class="col-md-8">
                                                        <p ></p>   
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="text1" class="control-label col-md-4">Father Name</label>

                                                        <div class="col-md-8">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label for="text1" class="control-label col-md-4">Mother Name</label>

                                                        <div class="col-md-8">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <hr>
                                            <div class="row">
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text1" class="control-label col-lg-4">Messagr<span style="color:red;"> *</span></label>

                                                        <div class="col-lg-8">
                                                        <textarea rows="3"  id="message" name="message" placeholder="Message" class="form-control" ng-modal="message"></textarea>
                                                            
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="text1" class="control-label col-lg-4"></label>

                                                        <div class="col-lg-8">
                                                            <!-- <h4>Father Details</h4> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        <div class="form-actions">
                                            <center>
                                            <input class="navigation_button btn btn-primary" id="submitdata3" value="Send" type="button" ng-click="Sendmail()" >
                                            <input class="navigation_button btn" id="cancel" data-dismiss="modal" value="Cancel" type="reset">
                                            </center>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    <!-- student email -->
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
                    <h4 class="modal-title">Delete of <font id="getstudentname"></font></h4>
                    </div>
                    <div class="modal-body">
                  <?php echo '<form class="form-horizontal" action="'.base_url('Delete/query/StudentM').'" enctype="multipart/form-data"method="post">';
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
            <div id="viewstudentModal" class="modal fade" data-width="800">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">View Student</h4>
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
                                        <div class="form-group">
                                            <label for="text1" class="control-label col-md-4 text-right">Image: </label>

                                            <div class="col-md-8">
                                                <img src="" id="st_profile" width="200px" height="200px">
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

 <script src="<?php  echo base_url();?>assets/custom/angular.min.js"></script>

<script src="<?php  echo base_url();?>assets/js/existstudent_list.js"></script>
         
      <script src="<?php  echo base_url();?>assets/custom/datatable_bootstrap_min.js"></script>
      <script src="<?php  echo base_url();?>assets/custom/datatable_min.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/jquery-ui.js"></script>
        </body>

</html>
