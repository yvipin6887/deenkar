
            <title>School Configurator</title>
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/datatable_css.css">

            <?php 
            $this->load->view('secoundheader',$this->data);
            $this->load->view('leftsidebar',$this->data);
            
            ?>
                <div id="content">
                    <div class="outer">
                       <!-- ------------Tab-------------- -->
                         <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab1default" data-toggle="tab"><b>School</b></a></li>
                                            <li><a href="#tab2default" data-toggle="tab" onclick="getclasslistdata()"><b>Class List</b></a></li>
                                        </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default">Default 1</div>
                                        <div class="tab-pane fade" id="tab2default">
                                        <!-- tableview------------- -->
                                            <div class="box">
                                                <header>
                                                    <div class="icons"><i class="fa fa-table"></i></div>
                                                    <h5>Class List</h5>
                                                    <div class="btn btn-default btn-sm minimize-box" style="float:right;:50%;">
                                                    <a  href="javascript:;"class="btn" data-toggle="modal" data-target="#addclasslistModal" style="font-size: 15px;" data-toggle="tooltip" title="Add"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                    </div>
                                                </header>
                                                <div id="collapse4" class="body">
                                                    <table id="classlist" class="table table-bordered table-condensed table-hover table-striped" style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Branch</th>
                                                            <th>Class</th>
                                                            <th>Customize</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                                
                                                        </tbody>
                                                    </table>
                                                </div>
                                        <!-- tableview------------- -->
                                        </div>
                                    </div>
                                </div>
                                <!-- ------------Tab-------------- -->
                            </div>
                    <!-- /.outer -->
                </div>
                <!-- /#content -->
                 <!-- add newclass- -->
        <div class="modal fade" id="addclasslistModal" role="dialog" data-width="400">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Class</h4>
                    </div>
                    <div class="modal-body">
                         <form>
                             <div class="form-group">
                                    <label for="text1" class="control-label col-md-2">class</label>

                                    <div class="col-md-6">
                                      <input type="text" class="form-control" id="newclass" name="newclass">
                                    </div>
                                   
                                </div>
                    <br><br><br>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="newclassdata" value="Submit"  type="button" onclick="newclassadd()">
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
 <!-- add new class -->
                 <!-- edit newclass- -->
        <div class="modal fade" id="editclasslistModal" role="dialog" data-width="400">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Class</h4>
                    </div>
                    <div class="modal-body">
                         <form>
                             <div class="form-group">
                                    <label for="text1" class="control-label col-md-2">class</label>

                                    <div class="col-md-6">
                                      <input type="text" class="form-control" id="editclass" name="editclass">
                                      <input type="hidden" class="form-control" id="classid" name="classid">
                                    </div>
                                   
                                </div>
                    <br><br><br>
                                <div class="form-actions">
                                    <center>
                                    <input class="navigation_button btn btn-primary" id="editclassdata" value="Submit"  type="button" onclick="newclassedit()">
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
 <!-- edit new class -->
                 <!-- view newclass- -->
        <div class="modal fade" id="viewclasslistModal" role="dialog" data-width="400">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Class</h4>
                    </div>
                    <div class="modal-body">
                         <form>
                             <div class="form-group">
                                    <label for="text1" class="control-label col-md-2">class:</label>

                                    <div class="col-md-6">
                                   <b><p id="viewclass"></p></b>
                                    </div>
                                   
                                </div>
                    <br><br><br>
                                <div class="form-actions">
                                    <center>
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
 <!-- edit new class -->
            <!-- delete data- -->
            <div class="modal fade" id="deleteModal" role="dialog">
                <div class="modal-dialog">
                
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete of <font id="getclassname"></font></h4>
                    </div>
                    <div class="modal-body">
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
                                    <input class="navigation_button btn btn-primary" id="deletedata" value="Submit"  type="submit" onclick="deleteclassname()">
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
     <script src="<?php  echo base_url();?>assets/js/school_configurator.js"></script>
     <script src="<?php  echo base_url();?>assets/custom/datatable_bootstrap_min.js"></script>
      <script src="<?php  echo base_url();?>assets/custom/datatable_min.js"></script>
            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
            <script src="<?php  echo base_url();?>assets/custom/sweetalert.js"></script>