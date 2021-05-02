  <!-- /#top -->
                <div id="left">
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="<?php  echo base_url().$lastaccess[0]->pic;?>" style="width:80px;height:80px;">
                                    <span class="label label-danger user-label"><?php echo $visitcount[0]->visitcount;?></span>
                                </a>
                        
                                <div class="media-body">
                                    <h5 class="media-heading"><?php echo $lastaccess[0]->name;?></h5>
                                    <ul class="list-unstyled user-info">
                                        <li><b><?php echo $lastaccess[0]->usertype;?></b></li>
                                        <li>Last Access : <br>
                                            <small><i class="fa fa-calendar"></i>&nbsp;<?php echo $lastaccess[1]->datetime;?></small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- #menu -->
                        <ul id="menu" class="bg-blue dker">
                                  <li class="nav-header">Menu</li>
                                  <li class="nav-divider"></li>
                                  <?php 
                                    foreach($leftfeaturename as $name){
                                        if($name->onclickshow=='1'){
                                            echo '<li>
                                            <a href="'.base_url().'Admin/'.$name->weblink.'"
                                            <i class="'.$name->webicone.'"></i><span class="link-title">
                                            '.$name->viewname.'
                                        </span>
                                            </a>
                                        </li>';
                                        }else{
                                            echo '<li>
                                            <a href="javascript:;"
                                            <i class="'.$name->webicone.'"></i><span class="link-title">
                                            '.$name->viewname.'
                                        </span>
                                            </a>
                                        </li>';
                                        }
                                       
                                    }
                                    ?>
                                  <!-- <li class="">
                                    <a href="<?php  echo base_url();?>Admin/Dashboard">
                                      <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
                                    </a>
                                  </li>
                                  
                                  <li>
                                    <a href="<?php  echo base_url();?>Admin/NewStudentList">
                                      <i class="fa fa-map-marker"></i><span class="link-title">
                                    Admission Enquiary
                                  </span>
                                    </a>
                                  </li> -->
                                  <!-- <li>
                                    <a href="<?php  echo base_url();?>Admin/ExistStudentList">
                                      <i class="fa fa fa-bar-chart-o"></i>
                                      <span class="link-title">
                                    Existing Student
                                  </span>
                                    </a>
                                  </li>
                                  
                                  <li>
                                    <a href="javascript:;">
                                      <i class="fa fa-exclamation-triangle"></i>
                                      <span class="link-title">
                                    Assignment
                                    </span>
                                     
                                    </a>
                                    <ul class="collapse">
                                     </ul>
                                  </li>
                                  <li> -->
                                    <!-- <a href="javascript:;">
                                      <i class="fa fa-columns"></i>
                                      <span class="link-title">
                              Class Time Table 
                            </span>
                                    </a>
                                  </li> -->
                                  <!-- <li>
                                    <a href="javascript:;">
                                      <i class="fa fa-square-o"></i>
                                      <span class="link-title">
                          Exam Time Table
                            </span>
                                    </a>
                                  </li>
                                  <li class="nav-divider"></li>
                                  <li>
                                    <a href="login.html">
                                      <i class="fa fa-sign-in"></i>
                                      <span class="link-title">
                            Exam Result Generation
                            </span>
                                    </a>
                                  </li> -->
                                  <!-- <li>
                                    <a href="javascript:;">
                                      <i class="fa fa-code"></i>
                                      <span class="link-title">
                            	Conversetion
                            	</span>
                                    
                                    </a>
                                   
                                  </li> -->
                                </ul>
                        <!-- /#menu -->
                    </div>
                    <!-- /#left -->
        
            