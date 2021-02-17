

        <input type="hidden" id="SucursalId" value="<?php echo $user['s_SucursalId']; ?>">

<section class="invoice" id="panel_principal">

      <!-- title row -->
      <div class="row ">
        <div class="col-xs-12 bg-light-blue-gradient " >
          <h5 class="page-header ">  DELIVERY DRIVER
          
          </h5>

        </div>
      </div>
    
<br>
<ul class="nav nav-tabs">
              <li class="active select_tab " data-hijo='area_productos' id="tab_productos">
                <a href="#tab_1" data-toggle="tab" aria-expanded="true" > <i class="fa fa-fw fa-users"></i> DELIVERY DRIVER
</a>
              </li>
              <li class="select_tab "   data-hijo='area_categorias' id="tab_categoria">
                <a href="#tab_2" data-toggle="tab" aria-expanded="false" ><span class="fa  fa-map-marker"></span> ROUTES</a>
              </li>
          
              <li class="dropdown pull-right">
                <a class="dropdown-toggle  btn btn-block btn-primary" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="glyphicon glyphicon-align-center"></i>  <b> ADD

</b>
                </a>
                <ul class="dropdown-menu" style="cursor: pointer;">
                  <li class="btn_repartidor"><a role="menuitem" tabindex="-1" >
                   <i class="fa fa-fw fa-users "></i>  DELIVERY DRIVER</a></li>
                  <li class="bnt_rutas"><a role="menuitem" tabindex="-1" ><span class="fa  fa-map-marker"></span> ROUTES</a></li>
             
                 
                 
                </ul>
              </li>
             


      </ul>

   
      <div class="row areas" id="area_productos" >
        <div class="col-xs-12 table-responsives">

         <br>       <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-search"></i> SEARCH</span>
                <input type="text" class="form-control" id="input_buscar_repartidor" placeholder="SEARCH DELIVERY DRIVER">
              </div>
              <br>
          <table class="table  table-hover text-center dataTable text-md r" id="tabla" >
            <thead>
            <tr>
              <th>NAME</th>
              <th>LAST NAME</th>
             <th>PHONE</th>
               <th>STATUS</th>
            </tr>
            </thead>
            <tbody id="cuerpo_tabla_repartidor" style="cursor: pointer;">
           
           
            </tbody>
          </table>
        </div>
       
      </div>
    
   <div class="row areas" id="area_categorias"  style="display:none;" >
     <div class="col-xs-12 "><br>
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-search"></i> SEARCH</span>
                <input type="text" class="form-control" id="input_buscar_ruta" placeholder="SEARCH ROUTES">
              </div>
              <br>
     </div>

   <div class="col-xs-12 col-md-12">

        <div class="col-xs-12 table-responsive pull-center">

       
          <table class="table table- text-sm pull-center" id="tabla_rutas">
            <thead>
            <tr>
           
              <th style="width:40%">CP</th>
                <th style="width:55%">City</th>
              <th style="width:5%">STATUS</th>
           
            </tr>
            </thead>
            <tbody id="cuerpo_tabla_rutas" style="cursor: pointer;">
           
           
            </tbody>
          </table>
        </div>

 </div>
      </div>

   
    </section>

<section class="invoice " id="panel_editar"  style="display:none;" >
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-edit " id="titulo_panel"> DELIVERY DRIVER</i> 
        <i class="fa fa-close fa-lg pull-right " style="color: #FF000sss0;" id="cerrar_panel_editar"></i>
        </div>

             
          
             

      </div>

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>assets/dist/img/user1-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center" id="nombre_repartidor_editar">Nina Mcintire</h3>

              <p class="text-muted text-center" id="otros_datos_editar" >Software Engineer</p>


              <a href="#" class="btn btn-primary btn-block"><b> EDIT</b></a>
                <a href="#" class="btn btn-primary btn-danger btn-block" id="btn_nueva_ruta"><b>ADD ROUTE</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

     
        </div>
        <!-- /.col -->
        <div class="col-md-9">
      
              <div class="box box-success" id="activity">
                 <div class="col-xs-12 table-responsive">
          <table class="table table-stripeds" id="rutas_repartidor">
            <thead>
            <tr >
              
           
              <th style="width:40%">CODIGO POSTAL</th>
              <th style="width:60%" > City</th>
            
            </tr>
            </thead>
            <tbody>
        
            </tbody>
          </table>
        </div>
            
              </div>
              <!-- /.tab-pane -->
     

            
           
        <!-- /.col -->
      </div>




      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default hidden" ><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right hidden"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right hidden" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>



<div class="modal modal-default fade" id="modal_repartidor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header "  style=" background-color: lightblue; ">
                <button type="button" class="close text-md" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title  "><i class="fa fa-fw fa-cogs fa-md"></i> <b>DELIVERY DRIVER</b></h4>
            </div>
            <div class="modal-body" style=" background-color: #FAFAFA">
            <div class="box-body ">
                            
             <form role="form">
              
                <div class="form-group col-sm-6 ">
                  <label for="exampleInputEmail1">NAME</label>
                  <input type="text" class="form-control " id="nombre" placeholder="NAME">
                </div>

                <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">LAST NAME</label>
                  <input type="text" class="form-control " id="apellidos" placeholder="LAST NAME ">
                </div>
             
                

                

                  <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">STATUS</label>
                        <select class="form-control" id='selectstatus'>
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>

                             </select>
                </div>
                 <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">PHONE</label>
                  <input type="text" class="form-control " id="telefono" placeholder="Phone ">
                </div>




                 
             
            </form>

                            
                        </div>
               
            
        </div>
        <div class="modal-footer"  >                    
            <button type="button" class="btn_guarda_repartidor btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
        </div>
    </div>
</div>
</div>

</div>



</div>

<div class="modal modal-default fade" id="modal_rutas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style=" background-color: lightblue; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><a class="fa fa-fw fa-cogs" style="color:black"></a><strong> ROUTES</strong></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal">
                    <div class="box box-info">
                        <div class="box-body">
                           

                      <div class="form-group col-sm-12">
                          <label for="exampleInputEmail1">CODIGO POSTAL</label>
                       <input type="text" id="cp_ruta" class="form-control"  placeholder="CODIGO POSTAL">
                    </div>                         
                      

                        <div class="form-group col-sm-12">
                          <label for="exampleInputEmail1">STATUS</label>
                       
                           
                              <select type="text" id="estatus_ruta" class="form-control">
                                <option value="0">Seleccione</option>
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                              </select>
                                
                    </div>  
                         
                    <div class="form-group col-sm-12">
                  <label for="exampleInputEmail1">DESCRIPTION</label>
                    <textarea  id="descripcion_ruta" class="form-control" rows="3" placeholder="DESCRIPCION"></textarea>
                </div>
                        </div>
                    </div>
                </form>               
            </div>
            <div class="modal-footer">                    
                <button type="button" class="btn_guarda_ruta btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-default fade" id="modal_rutas_repartidor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style=" background-color: lightblue; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><a class="fa fa-fw fa-users" style="color:black"></a><strong id="descripcion_modal"> ROUTES</strong></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal">
                    <div class="box box-info">
                        <div class="box-body">
                           
              <input type="text" id="id_repartidor" class="form-control hidden"  >
                                           
                      

                        <div class="form-group col-sm-12">
                          <label for="exampleInputEmail1">ROUTE</label>
                       
                           
                              <select type="text" id="select_ruta" class="form-control">
                           
                                
                              </select>
                                
                    </div>  
                  
                        </div>
                    </div>
                </form>               
            </div>
            <div class="modal-footer">                    
                <button type="button" class="btn_guarda_ruta_repartidor btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>



<style >

    .tt-query {
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
        color: #999
    }

    .tt-menu {    /* used to be tt-dropdown-menu in older versions */
        width: 100%;
        margin-top: 4px;
        padding: 4px 0;
        background-color: #D3F1B3;
        border: 1px solid #ccc;
        border: 1px solid rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);

    }

    .tt-suggestion {
        padding: 3px 20px;
        line-height: 24px;
    }

    .tt-suggestion.tt-cursor,.tt-suggestion:hover {
        color: #fff;
        background-color: #36c43b;

    }

    .tt-suggestion p {
        margin: 0;
    }


</style>
    <style>
        #tabla td {
            border-top: 1px solid #E6EBEB !important;

        }
         #tabla_categoria td {
            border-top: 1px solid #E6EBEB !important;

        }
        #tab_lista_notas td {
            border-top: 1px solid #dbcca0 !important;

        }


       
    </style>


<script  type="text/javascript">
   var Estado = '';
        var ProductoId = '';
    $(document).ready(function () {
   
      $(".select_tab").unbind('click').click(function () {
      $(".areas").hide('slow');
      valor= $(this).data('hijo');

      $("#"+valor).show('slow');


    });



        function consulta_repartidor() {
           $("#tabla").dataTable().fnDestroy();

            $.post('ctr_delivery/consulta_repartidor', {
                criterio: $('#input_buscar_repartidor').val()
            },
                    function (data) {
                        if (data.codigo == 200) {
                      $("#tabla tbody  ").html('');  
                            $.each(data.datos, function (indice, registros) {
     $("#tabla tbody ").append(
             ' <tr data-id="'+registros.repartidor_id+'"" class="linkhover editar" >'+
         
               ' <td>'+registros.nombre+'</td>'+
            ' <td>'+registros.apellidos+'</td>'+
            ' <td>'+registros.telefono+'</td>'+
               ' <td>'+'<span class="label label-success">'+'activo'+'</span></td>'+
         
            '</tr>'

            );


                            });


                       
                        }
                    }, "json");


    $("#tabla").DataTable({
           
            "pageLength": 1,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,

       
        });

        }
    $('#tabla tbody ').on('click', 'tr ', function() {
 
  $("#panel_principal").hide('slow');
  $("#panel_editar").show('slow');
  //alert($(this).data('id'));
  $('#id_repartidor').val($(this).data('id'));
  consulta_datos_repartidor();

});


    function consulta_datos_repartidor(){
               $("#rutas_repartidor").dataTable().fnDestroy();

            $.post('ctr_delivery/consulta_datos_repartidor', {
                criterio: $('#id_repartidor').val()
            },
                    function (data) {
                        if (data.codigo == 200) {
                      $("#rutas_repartidor tbody  ").html('');  
                            $.each(data.datos_rutas, function (indice, registros) {
     $("#rutas_repartidor tbody ").append(
       ' <tr data-id="'+registros.ruta_id+'"" class="linkhover editar" >'+
             ' <td>'+registros.cp+'</td>'+
               ' <td>'+registros.descripcion+'</td>'+
              '</tr>'
            );


                            });


             $.each(data.datos_generales, function (indice, registros) {
     $("#nombre_repartidor_editar").html(registros.nombre +' '+registros.apellidos
       );
         $("#descripcion_modal").html(registros.nombre +' '+registros.apellidos
       );
     $("#otros_datos_editar").html(registros.telefono+' '  );



                            });


                       
                        


                       
                        }
                    }, "json");


    $("#rutas_repartidor").DataTable({
           
            "pageLength": 1,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,

       
        });

        }
    

         
$('#cerrar_panel_editar ').on('click', function() {
 
   $("#panel_editar").hide('slow');
  $("#panel_principal").show('slow');

});


            function consulta_rutas() {
           $("#tabla_rutas").dataTable().fnDestroy();

            $.post('ctr_delivery/consulta_rutas', {
                criterio: $('#input_buscar_ruta').val()
            },
                    function (data) {
                        if (data.codigo == 200) {
                      $("#tabla_rutas tbody  ").html('');  
                            $.each(data.datos, function (indice, registros) {
     $("#tabla_rutas tbody ").append(
       ' <tr data-id="'+registros.ruta_id+'"" class="linkhover editar" >'+
             ' <td>'+registros.cp+'</td>'+
               ' <td>'+registros.descripcion+'</td>'+
     
               ' <td>'+'<span class="label label-success">'+'activo'+'</span></td>'+
              '</tr>'
            );


                            });


                       
                        }
                    }, "json");


    $("#tabla_rutas").DataTable({
           
            "pageLength": 1,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,

       
        });

        }


            function obtiene_rutas() {
   

            $.post('ctr_delivery/obtiene_rutas', {
                criterio:0
            },
                    function (data) {
                        if (data.codigo == 200) {
                      $("#select_ruta ").html('');  
                            $.each(data.datos, function (indice, registros) {
     $("#select_ruta").append('  <option value="'+registros.ruta_id+'">'+registros.descripcion+'</option>'
        
            );


                            });


                       
                        }
                    }, "json");



        }





    //funciones de llenado
        consulta_repartidor();
       consulta_rutas();
       obtiene_rutas();
     
           //Buscar Categoria. XD
        $('#input_buscar_repartidor').keyup(function () {

          consulta_repartidor();
        });



        $('#input_buscar_ruta').keyup(function () {

          consulta_rutas();
        });






        //Declaración de variables
       
      


        //Botón para agragar un nuevo gasto
        $(".btn_repartidor").unbind('click').click(function () {
            Estado = 'Nuevo';
          limpia_repartidor();
            $("#modal_repartidor").modal("show");
        });
        function limpia_repartidor(){
            $("#nombre").val('');
            $("#apellidos").val('');
           $("#telefono").val('');
            //  $('#selecEstatus> option[value="33"]').attr('selected', 'selected');

            $("#selecEstatus").val("Seleccione");

        }

           //Botón para agerar un nuevo registro
        $(".bnt_rutas").unbind('click').click(function () {
             Estado = 'Nuevo';
          limpia_categorias();
            $("#modal_rutas").modal("show");
        });

           $("#btn_nueva_ruta").unbind('click').click(function () {
              Estado = 'Nuevo';
            obtiene_rutas();
     
            $("#modal_rutas_repartidor").modal("show");
        });

        function limpia_categorias(){
           $("#Categoria").val('');
            $("#categoriaAlimento").val(0);
            $("#Estatus").val(0);
             $("#descripcion_categoria").val('');

        }




        function estatus(valor) {
            if (valor == 1) {
                cadena = 'Activo';
                return cadena
            } else {
                cadena = 'Inactivo';
                return cadena
            }
        }

  $(".btn_guarda_ruta_repartidor").unbind('click').click(function () {
          
                if (Estado == 'Nuevo') {
               var formData = new FormData();

         // formData.append('SucursalId', $('#SucursalId').val());
          formData.append('ruta_id', $('#select_ruta').val());
          formData.append('repartidor_id', $('#id_repartidor').val());
                
               
            $.ajax({
                url: "<?php echo base_url(); ?>"+'/ctr_delivery/guarda_ruta_repartidor',
                type: 'POST',
                dataType: "json",
                data: formData,
                success: function (data) {
                  if (data.codigo == 200) {
                                    swal(" Guardado correctamente", {
                                        icon: "success",
                                         timer: 1000
                                    })
                   consulta_datos_repartidor();
                }
                },
                cache: false,
                contentType: false,
                processData: false
            });
                } 
             
            
        });
 
     //Botón para guardar y/o actualizar categoria
        $(".btn_guarda_ruta").unbind('click').click(function () {
            if (($("#cp_ruta").val() != "") && ($("#estatus_ruta").val() != "0") ) {
                if (Estado == 'Nuevo') {
               var formData = new FormData();

         // formData.append('SucursalId', $('#SucursalId').val());
          formData.append('cp', $('#cp_ruta').val());
          formData.append('descripcion', $('#descripcion_ruta').val());
          formData.append('estatus', $('#estatus_ruta').val());         
               
            $.ajax({
                url: "<?php echo base_url(); ?>"+'/ctr_delivery/guarda_ruta',
                type: 'POST',
                dataType: "json",
                data: formData,
                success: function (data) {
                  if (data.codigo == 200) {
                                    swal(" Guardado correctamente", {
                                        icon: "success",
                                         timer: 1000
                                    })
                       consulta_rutas();
                    limpia_repartidor();
                }
                },
                cache: false,
                contentType: false,
                processData: false
            });
                } 
            } else {
                alert('No deje espacios vacios');
            }
        });


             //Botón para guardar y/o actualizar categoria
      



 
        $(".btn_guarda_repartidor").unbind('click').click(function () {
            if ( ($("#selectstatus").val() != 'Seleccione')  && ($("#nombre").val() != "")  && ($("#apellidos").val() != "") && ($("#telefono").val() != "0")) {
                if (Estado == 'Nuevo') {

            var formData = new FormData();

         // formData.append('SucursalId', $('#SucursalId').val());
          formData.append('nombre', $('#nombre').val());
          formData.append('apellidos', $('#apellidos').val());
          formData.append('telefono', $('#telefono').val());
          formData.append('estatus_repartidor_id', $('#selectstatus').val());         
               
            $.ajax({
                url: "<?php echo base_url(); ?>"+'/ctr_delivery/guarda_repartidor',
                type: 'POST',
                dataType: "json",
                data: formData,
                success: function (data) {
                  if (data.codigo == 200) {
                                    swal(" Guardado correctamente", {
                                        icon: "success",
                                         timer: 1000
                                    })
                       consulta_repartidor();
                    limpia_repartidor();
                }
                },
                cache: false,
                contentType: false,
                processData: false
            });


                } 
            } else {
                alert('No deje espacios vacios');
            }
        });

    });


    





    function validadNumeros(e) {
        tecla = (document.all) ? e.keyCode : e.which;
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla == 8) {
            return true;
        }
        // Patron de entrada, en este caso solo acepta numeros
        patron = /[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
    $.extend($.expr[":"], {
        "contains-ci": function (elem, i, match, array) {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }
    });


</script>