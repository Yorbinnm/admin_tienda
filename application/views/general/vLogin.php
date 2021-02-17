<head>
    <title>Administrator</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
 <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</head>



   <br>   <br>





     
        <div class="login-box" style="border: 1.5px solid #6EC2BB; border-radius: 10px;">
            <div class="login-logo" >   
                <div class="box box-widget widget-user bg-aqua-success" >    
                    <div class="widget-user-header ">
                        <h3 class="widget-user-username">ADMINISTRADOR</h3>            
                    </div>
                    <div class="widget-user-image ">
                        <img class="img-circle img-responsive " src="<?php echo base_url(); ?>assets/dist/img/LOGOS.JPG" alt="User Avatar">
                    </div>
                </div>
            </div>  
            <div class="login-box-body box box-info">
                <div class="box-body">
                    <form action="<?php echo base_url(); ?>cLogin/ingresar" method="POST">
                        <div class="form-group has-feedback">
                            <input type="text" name="txtUsuario" id="usuario" class="form-control" placeholder="Usuario" autocomplete="off">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" name="txtClave" id="password" class="form-control" placeholder="Contraseña">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btnIngresar btn btn-sm btn-primary btn-flat pull-right"><li class="fa fa-arrow-right"></li> Ingresar</button>
                            </div>
                            <div class="col-md-12 align-center" style="color: red"><?php echo $mensaje; ?></div>
                        </div>
                    </form>          
                </div>
            </div>
        </div>
