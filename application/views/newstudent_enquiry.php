<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admission Enquriy</title>
    
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
                        <div class="inner bg-light lter">
                            <hr>
                            <?php 
                            $firstname="";
                            $middlename="";
                            $lastname="";
                            $gender="";
                            $dateofbirth="";
                            $mobile="";
                            $email="";
                            $class="";
                            $source="";
                            $country="";
                            $state="";
                            $city="";
                            $address="";
                            $fathername="";
                            $f_mobile="";
                            $f_email="";
                            $f_DOB="";
                            $f_qualification="";
                            $f_worktitle="";
                            $mothername="";
                            $m_mobile="";
                            $m_email="";
                            $m_DOB="";
                            $m_qualification="";
                            $m_worktitle="";
                            $note="";
                            $updateid="";
                            if($actiontype!=null && $actiontype!=''){
                           echo ' <form class="form-horizontal" action="'.base_url('index.php/Update/query/NewStudentEnquiryM').'" enctype="multipart/form-data"method="post">';
                            $firstname=$newstudentdata[0]->firstname;
                            $middlename=$newstudentdata[0]->middlename;
                            $lastname=$newstudentdata[0]->lastname;
                            $gender=$newstudentdata[0]->gender;
                            $dateofbirth=$newstudentdata[0]->dateofbirth;
                            $class=$newstudentdata[0]->class;
                            $source=$newstudentdata[0]->source;
                            echo '<input type="hidden" id="gender" value="'.$gender.'">';
                            echo '<input type="hidden" id="class" value="'.$class.'">';
                            echo '<input type="hidden" id="source" value="'.$source.'">';
                            $mobile=$newstudentdata[0]->mobile;
                            $email=$newstudentdata[0]->email;
                            $country=$newstudentdata[0]->country;
                            $state=$newstudentdata[0]->state;
                            $city=$newstudentdata[0]->city;
                            $address=$newstudentdata[0]->address;
                            $fathername=$newstudentdata[0]->fathername;
                            $f_mobile=$newstudentdata[0]->f_mobile;
                            $f_email=$newstudentdata[0]->f_email;
                            $f_DOB=$newstudentdata[0]->f_DOB;
                            $f_qualification=$newstudentdata[0]->f_qualification;
                            $f_worktitle=$newstudentdata[0]->f_worktitle;
                            $mothername=$newstudentdata[0]->mothername;
                            $m_mobile=$newstudentdata[0]->m_mobile;
                            $m_email=$newstudentdata[0]->m_email;
                            $m_DOB=$newstudentdata[0]->m_DOB;
                            $m_qualification=$newstudentdata[0]->m_qualification;
                            $m_worktitle=$newstudentdata[0]->m_worktitle;
                            $note=$newstudentdata[0]->note;
                            $updateid=$newstudentdata[0]->id;
                            
                            }else{
                                echo ' <form class="form-horizontal" action="'.base_url('index.php/Insert/query/NewStudentEnquiryM').'" enctype="multipart/form-data"method="post">';  
                            }
                          ?>
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">First Name<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="firstname" name="firstname" placeholder="First Name" class="form-control" value="<?php echo $firstname;?>" required>
                                        <input type="hidden" id="updateid" name="updateid"  class="form-control" value="<?php echo $updateid;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Middle Name</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="middlename" name="middlename" placeholder="Middle Name" class="form-control" value="<?php echo $middlename;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Last Name<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="lastname" name="lastname" placeholder="Last Name" class="form-control" value="<?php echo $lastname;?>" required>
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
                                        <!-- <input type="radio" id="gendermale" name="gendermale"  class="form-control" value="Male">Male
                                        <input type="radio" id="genderfemale" name="genderfemale"  class="form-control" value="Female">Female -->
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date OF Births<span style="color:red;"> *</span></label>

                                    <div class="col-lg-8">
                                        <input type="text" id="DOB" name="DOB" placeholder="DD/MM/YYYY"  class="form-control datepicker-here" value="<?php echo $dateofbirth;?>" required>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Contact" name="Contact" placeholder="Contact NO" class="form-control"value="<?php echo $mobile;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="Email" name="Email" placeholder="Email" class="form-control" value="<?php echo $email;?>">
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
                                        <!-- <option value="I A">I A</option>
                                        <option value="I B">I B</option>
                                        <option value="II A">II A</option>
                                        <option value="II B">II B</option> -->
                                        
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
                                        <input type="text" id="Country" name="Country" placeholder="Country" class="form-control" value="<?php echo $country;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">State</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="State" name="State" placeholder="State" class="form-control"value="<?php echo $state;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">City</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="City" name="City" placeholder="City" class="form-control" value="<?php echo $city;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Address</label>

                                    <div class="col-lg-8">
                                    <textarea rows="5"  id="Address" name="Address" placeholder="Address" class="form-control" ><?php echo $address;?></textarea>
                                        <!-- <input type="text" id="Address" name="Address" placeholder="Address" class="form-control"> -->
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
                                        <input type="text" id="fathername" name="fathername" placeholder="Full Name" class="form-control" value="<?php echo $fathername;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date of  Birth</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="DOB_f" name="DOB_f" placeholder="DOB" class="form-control" value="<?php echo $f_DOB;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Contact_f" name="Contact_f" placeholder="Contact NO" class="form-control" value="<?php echo $f_mobile;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="Email_f" name="Email_f" placeholder="Email" class="form-control" value="<?php echo $f_email;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Qualification </label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Qualification" name="Qualification" placeholder="Qualification" class="form-control" value="<?php echo $f_qualification;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Work Title</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="job_title" name="job_title" placeholder="Job Title" class="form-control" value="<?php echo $f_worktitle;?>">
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
                                        <input type="text" id="fullname_m" name="fullname_m" placeholder="Full Name" class="form-control" value="<?php echo $mothername;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Date Of Birth</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="DOB_m" name="DOB_m" placeholder="DOB" class="form-control" value="<?php echo $m_DOB;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Contact NO</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Contact_m" name="Contact_m" placeholder="Contact NO" class="form-control" value="<?php echo $m_mobile;?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Email</label>

                                    <div class="col-lg-8">
                                        <input type="Email" id="Email_m" name="Email_m" placeholder="Email" class="form-control" value="<?php echo $m_email;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Qualification </label>

                                    <div class="col-lg-8">
                                        <input type="text" id="Qualification_m" name="Qualification_m" placeholder="Qualification" class="form-control"value="<?php echo $m_qualification;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Work Title</label>

                                    <div class="col-lg-8">
                                        <input type="text" id="job_title_m" name="job_title_m" placeholder="Job Title" class="form-control" value="<?php echo $m_worktitle;?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="text1" class="control-label col-lg-4">Note</label>

                                    <div class="col-lg-8">
                                    <textarea rows="3"  id="note" name="note" placeholder="Note" class="form-control" ><?php echo $note;?></textarea>
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
                                    <input class="navigation_button btn btn-primary" id="submitdata2" value="Submit" type="button" onclick="submitnewstudentdata()" >
                                    <input class="navigation_button btn" id="cancel" value="Cancel" type="reset">
                                    </center>
                                </div>
                            </form>          
                              <hr>
                              
                          </div>

                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->


                    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->

            <!--Bootstrap -->

<script src="<?php  echo base_url();?>assets/js/newstudent_enquiry.js"></script>

            <!-- Metis core scripts -->
            <script src="<?php  echo base_url();?>assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="<?php  echo base_url();?>assets/js/app.js"></script>
            <script src="<?php  echo base_url();?>assets/js/jqueryui.js"></script>
<script src="<?php  echo base_url();?>assets/js/jqueryui2.js"></script>
  <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>
        </body>

</html>
