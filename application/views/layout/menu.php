<aside class="main-sidebar skin-blue-light">  
    <section class="sidebar" style="height: auto;">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url(); ?>assets/dist/img/LOGOS.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
            </div>
        </form>

        <ul class="sidebar-menu" data-widget="tree">    
            <?php foreach ($modulos as $reg) {?> 
            
                <li class="<?php echo $reg->Clase; ?>">
                    <a href="<?php echo base_url(); ?><?php echo $reg->Linck; ?>">                   
                        <i class="<?php echo $reg->Icono; ?>"></i><span><?php echo $reg->Modulo; ?></span>                     
                        <?php if ($reg->Clase != NULL) { ?>
                        <i class="fa fa-angle-left pull-right"></i> 
                        <?php } ?> 
                    </a>   
                    <?php if ($reg->Clase != NULL) { ?>
                        <ul class="treeview-menu">
                            <?php foreach ($reg->ModSub as $item2 => $value) { ?>                            
                                <li class=""><a href="<?php echo base_url(); ?><?php echo $value->Linck; ?>"><i class="<?php echo $value->Icon; ?>"></i><?php echo $value->Submodulo; ?></a></li>                       
                            <?php } ?>  
                        </ul>
                    <?php } ?>         
                </li>
            <?php } ?>
            <br>
            <br>
        </ul>
    </section>
</aside>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">



