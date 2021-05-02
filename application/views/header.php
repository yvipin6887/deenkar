<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/metismenu/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/onoffcanvas/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <!-- <link rel="stylesheet" href="<?php  echo base_url();?>assets/lib/animate.css/animate.css"> -->


        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!--For Development Only. Not required -->
    <!-- <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script> -->
    <link rel="stylesheet" href="<?php  echo base_url();?>assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="<?php  echo base_url();?>assets/less/theme.less">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script> -->

  </head>

        <body class="  ">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-fixed-top">
                        <div class="container-fluid">
                    
                    
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <header class="navbar-header">
                    
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="index.html" class="navbar-brand"><img src="<?php  echo base_url();?>assets/img/logo.png" alt=""></a>
                    
                            </header>
                    
                    
                    
                            <div class="topnav">
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip"
                                       class="btn btn-default btn-sm" id="toggleFullScreen">
                                        <i class="glyphicon glyphicon-fullscreen"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="E-mail" data-toggle="tooltip"
                                       class="btn btn-default btn-sm">
                                        <i class="fa fa-envelope"></i>
                                        <span class="label label-warning">5</span>
                                    </a>
                                    <a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip"
                                       class="btn btn-default btn-sm">
                                        <i class="fa fa-comments"></i>
                                        <span class="label label-danger">4</span>
                                    </a>
                                    <a data-toggle="modal" data-original-title="Help" data-placement="bottom"
                                       class="btn btn-default btn-sm"
                                       href="#helpModal">
                                        <i class="fa fa-question"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:;" onclick="logout()" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom"
                                       class="btn btn-metis-1 btn-sm">
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip"
                                       class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                    <a href="#right" data-toggle="onoffcanvas" class="btn btn-default btn-sm" aria-expanded="false">
                                        <span class="fa fa-arrow-left"></span>
                                    </a>
                                </div>
                    
                            </div>
                    
                    
                    
                    
                            <div class="collapse navbar-collapse navbar-ex1-collapse">
                    
                                <!-- .nav -->
                                <ul class="nav navbar-nav">
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="table.html">Tables</a></li>
                                    <li class='dropdown '>
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            Form Elements <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="form-general.html">General</a></li>
                                            <li><a href="form-validation.html">Validation</a></li>
                                            <li><a href="form-wysiwyg.html">WYSIWYG</a></li>
                                            <li><a href="form-wizard.html">Wizard &amp; File Upload</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- /.nav -->
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </nav>
                   
                </div>
                <!-- /#top -->
                
                    <!-- middle content -->
                   
                <!-- /#content -->
<?php 
 echo '<input type="hidden" id="base_url" value="'.base_url().'">';
?>
                   <div id="right" class="onoffcanvas is-right is-fixed bg-light" aria-expanded=false>
                        <a class="onoffcanvas-toggler" href="#right" data-toggle=onoffcanvas aria-expanded=false></a>
                        <br>
                        <br>
                        <div class="well well-small dark">
                        <!-- <!-- -------------- Configurator-------- -->
                         <!-- #menu -->
                         <ul id="menu" class="bg-blue dker">
                                  <li class="nav-header">Configurator</li>
                                  <li class="nav-divider"></li>
                                    <?php 
                                    foreach($featurename as $name){
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
                                  <!-- <li>
                                    <a href="<?php  echo base_url();?>Admin/schoolConfigurator">
                                      <i class="fa fa-map-marker"></i><span class="link-title">
                                    School Configurator
                                  </span>
                                    </a> -->
                                  </li>
                                    
                                </ul>
                        <!-- /#menu -->
                        <!-- -------------- Configurator-------- --> 
                        </div>
                       
                    </div>
                    <!-- /#right -->
            </div>
            
            <script src="<?php  echo base_url();?>assets/lib/jquery/jquery.js"></script>

                    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/prism/0.0.1/prism.min.js"></script> -->

            <!--Bootstrap -->
            <script src="<?php  echo base_url();?>assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="<?php  echo base_url();?>assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="<?php  echo base_url();?>assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="<?php  echo base_url();?>assets/lib/screenfull/screenfull.js"></script>

<script src="<?php  echo base_url();?>assets/js/userlogin.js"></script>
            <!-- Metis core scripts -->
            <script src="<?php  echo base_url();?>assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="<?php  echo base_url();?>assets/js/app.js"></script>


            <script src="<?php  echo base_url();?>assets/js/style-switcher.js"></script>
        </body>

</html>
