<!DOCTYPE html>
<html>
    <head>
 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/typeahead/typeahead.css">
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/flat/blue.css">
        <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/sweetalert-master/docs/assets/sweetalert/sweetalert.min.js" ></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/typeahead/typeaheadjs/typeahead.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/bower_components/typeahead/bootbox.min.js"></script>

      
        <script src="<?php echo base_url(); ?>assets/bower_components/TimePicker/js/timepicki.js"></script>
             <script src="<?php echo base_url(); ?>assets/bower_components/select2/dist/js/select2.js"></script>
        <!-- jQuery 3 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.css">

        
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="sidebar-mini skin-blue-light ">
        <!--<body class="hold-transition skin-black sidebar-mini">-->
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a  class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>IMPERIA</b>ADMIN</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>IMPERIAL  HERB 
</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                      <!--<span class="sr-only">Toggle navigation</span>-->
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">  
                            <?php if ($user['s_TipoUsuarioId'] == 3) { ?>
                                <li class="dropdown notifications-menu open">
                                    <a href="<?php echo base_url(); ?>cCuenta">
                                        <i class="fa fa-bell-o"></i>
                                        <span class="label label-danger not"><?php echo $cta ?></span>
                                    </a>                              
                                </li>
                                
                            <?php } ?>

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url(); ?>assets/dist/img/LOGOS.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><b><?php echo $user['s_Empleado']; ?></b></span>                                  
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url(); ?>assets/dist/img/LOGOS.jpg" class="img-circle" alt="User Image" class="img-circle" alt="User Image">

                                        <p>
                                            Administrator

                                        </p>

                                    </li>          
                                    <li class="user-footer">
                                        
                                        <div class="pull-right">
                                            <a href="<?php echo base_url() ?>cLogin/cerrar_sesion" class="cerrar btn btn-default btn-flat"><i class="fa fa-power-off"></i> &nbsp;Sign off</a>
                                              <!--<a href="<?php echo base_url(); ?>" class="cerrar btn btn-default btn-flat"><i class="fa fa-power-off"></i> &nbsp;Cerrar Sesion</a>-->
                                        </div>
                                    </li>
                                </ul>
                            </li>  

                        </ul>
                    </div>
                 
              

                    
                </nav>
            </header>
            <!--//session_destroy();--> 

            <script  type="text/javascript">
                 segundos = 0;
                    intervalo = 0;
                $(document).ready(function () {
               
                });


       


              


            </script>