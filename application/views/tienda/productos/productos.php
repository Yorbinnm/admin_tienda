

<input type="hidden" id="SucursalId" value="<?php echo $user['s_SucursalId']; ?>">

<section class="invoice" id="panel_principal">

      <!-- title row -->
      <div class="row ">
        <div class="col-xs-12 bg-light-blue-gradient " >
          <h5 class="page-header ">  MANAGE INVENTORY 

          
          </h5>

        </div>
      </div>
    
<br>
<ul class="nav nav-tabs">
              <li class="active select_tab " data-hijo='area_productos' id="tab_productos">
                <a href="#tab_1" data-toggle="tab" aria-expanded="true" > <i class="fa fa-fw fa-cube "></i> PRODUCT
</a>
              </li>
              <li class="select_tab "   data-hijo='area_categorias' id="tab_categoria">
                <a href="#tab_2" data-toggle="tab" aria-expanded="false" ><span class="glyphicon glyphicon-th-large"></span> CATEGORY</a>
              </li>
              <li class=" select_tab" data-hijo='area_sub_categorias'  id="tab_sub_categoria"><a href="#tab_3" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-th"></span>  SUB CATEGORY</a></li>
              <li class="dropdown pull-right">
                <a class="dropdown-toggle  btn btn-block btn-primary" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="glyphicon glyphicon-align-centers"></i>  <b> ADD

</b>
                </a>
                <ul class="dropdown-menu" style="cursor: pointer;">
                  <li class="btnNuevo"><a role="menuitem" tabindex="-1" >
                   <i class="fa fa-fw fa-cube "></i>  PRODUCTS</a></li>
                  <li class="btnNuevo_categoria"><a role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-th-large"></span>CATEGORY</a></li>
                  <li  class="btnNuevo_sub_categoria"><a role="menuitem" tabindex="-1" ><span class="glyphicon glyphicon-th"></span> SUB CATEGORY</a></li>
                 
                 
                </ul>
              </li>
             


      </ul>

   
      <div class="row areas" id="area_productos" >
        <div class="col-xs-12 table-responsive">

         <br>       <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-search"></i> SEARCH</span>
                <input type="text" class="form-control" id="input_buscar_productos" placeholder="SEARCH PRODUCTS">
              </div>
              <br>
          <table class="table  table-hover text-center dataTable text-sm r" id="tabla" >
            <thead>
            <tr>
             <th>IMG</th>
              <th>TITLE
</th>
             <th>CATEGORY</th>
             <th>SUB CATEGORY</th>
              <th>STATUS  
            </th>
              <th>PRICE</th>
                <th> WEIGHT 
</th>
            </tr>
            </thead>
            <tbody id="cuerpo_tabla_productos" style="cursor: pointer;">
           
           
            </tbody>
          </table>
        </div>
       
      </div>
    
   <div class="row areas" id="area_categorias"  style="display:none;" >
     <div class="col-xs-12 "><br>
          <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-search"></i> SEARCH</span>
                <input type="text" class="form-control" id="input_buscar_categoria" placeholder="SEARCH CATEGORY">
              </div>
              <br>
     </div>

   <div class="col-xs-12 col-md-12">

        <div class="col-xs-12 table-responsive pull-center">

       
          <table class="table table- text-sm pull-center" id="tabla_categoria">
            <thead>
            <tr>
           
              <th style="width:40%">CATEGORY</th>
                <th style="width:55%">DESCRIPTION</th>
              <th style="width:5%">STATUS</th>
           
            </tr>
            </thead>
            <tbody id="cuerpo_tabla_categoria" style="cursor: pointer;">
           
           
            </tbody>
          </table>
        </div>

 </div>
      </div>

       <div class="row areas" id="area_sub_categorias"  style="display:none;" >
        <div class="col-xs-12 col-md-12"> 
        <div class="col-xs-12 table-responsive">

         <br>       <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-search"></i> SEARCH</span>
                <input type="text" class="form-control" id="input_buscar_sub_categoria" placeholder="SEARCH SUB CATEGORIY">
              </div>
              <br>
          <table class="table table-hovers text-sm" id="tabla_sub_categoria">
            <thead>
            <tr>
            
          
              <th>SUB CATEGORY</th>
               <th>CATEGORY</th>
              <th>STATUS</th>
             
            </tr>
            </thead>
            <tbody id="cuerpo_tabla_sub_categoria" style="cursor: pointer;">
           
           
            </tbody>
          </table>
        </div>
      </div>
  </div>
    </section>






</div>

<div class="modal modal-default fade" id="modal_img">
    <div class="modal-dialog modal-sm">
        <div class="modal-content"   >
            <div class="modal-header " >
                <button type="button" class="close text-md" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title  "><b>IMAGENES</b></h4>
            </div>
            <div class="modal-body">
            <div class="box-body "  >
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner"  >
                  <div class="item active contenedor_img" id="contenedor_img">
                    <img src="http://placehold.it/900x500/39CCCC/ffffff&amp;text=I+Love+Bootstrap" alt="First slide">

                  </div>
                  <div class="item contenedor_img">
                    <img src="http://placehold.it/900x500/3c8dbc/ffffff&amp;text=COLECCION" alt="Second slide">
                   
                  </div>
                  <div class="item contenedor_img">
                    <img src="http://placehold.it/900x500/f39c12/ffffff&amp;text=COLECCION" alt="Third slide">

           
                  </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            <div class="pull-center " id="contenedor_imgs">
              
            </div>                
           
                            
              </div>
               
            
        </div>
        
    </div>
</div>
</div>

</div>

<div class="modal modal-default fade" id="categorias">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style=" background-color: lightblue; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><a class="fa fa-fw fa-cogs" style="color:black"></a><strong> CATEGORIAS</strong></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal">
                    <div class="box box-info">
                        <div class="box-body">
                           

                      <div class="form-group col-sm-12">
                          <label for="exampleInputEmail1">CATEGORIA</label>
                       <input type="text" id="Categoria" class="form-control"  placeholder="Categoría">
                    </div>                         
                            <div class="form-group hidden">
                                <div class="col-sm-3">
                                    <label for="inputPassword3" class="control-label text-muted">Subcategoría</label>
                                </div>
                                <div class="col-sm-9">
                                    <select type="text" id="categoriaAlimento" class="form-control">
                                        <option value="Bebidas">Bebidas</option> 
                                        <option value="Alimentos">Alimentos</option> 
                                    </select>
                                </div>
                            </div>

                        <div class="form-group col-sm-12">
                          <label for="exampleInputEmail1">ESTATUS</label>
                       
                           
                              <select type="text" id="Estatus" class="form-control">
                                <option value="0">Seleccione</option>
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                              </select>
                                
                    </div>  
                         
                    <div class="form-group col-sm-12">
                  <label for="exampleInputEmail1">DESCRIPCION</label>
                    <textarea  id="descripcion_categoria" class="form-control" rows="3" placeholder="DESCRIPCION..."></textarea>
                </div>
                        </div>
                    </div>
                </form>               
            </div>
            <div class="modal-footer">                    
                <button type="button" class="btnGuardar_categoria btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal modal-default fade" id="sub_categorias">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header " style=" background-color: lightblue; ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><a class="fa fa-fw fa-cogs" style="color:black"></a><strong> SUB CATEGORIAS</strong></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal">
                    <div class="box box-info">
                        <div class="box-body">
                           

                      <div class="form-group col-sm-12">
                          <label for="exampleInputEmail1">SUB CATEGORIA</label>
                       <input type="text" id="sub_categoria" class="form-control"  placeholder="SUB CATEGORIA">
                    </div>                         
                          
                      <div class="form-group col-sm-12">
                  <label for="exampleInputEmail1">CATEGORIA</label>
                         <select class="form-control " id='selectcategoria_sub_categoria' style="width: 100%;"> 
                              

                          </select>  
                </div>
                        <div class="form-group col-sm-12">
                          <label for="exampleInputEmail1">ESTATUS</label>
                       
                           
                              <select type="text" id="Estatus_sub_categoria" class="form-control">
                                <option value="0">Seleccione</option>
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                              </select>
                                
                    </div>  
                         
                
                        </div>
                    </div>
                </form>               
            </div>
            <div class="modal-footer">                    
                <button type="button" class="btnGuardar_sub_categoria btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
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



        function consulta_productos() {
           $("#tabla").dataTable().fnDestroy();

            $.post('product/consulta_productos', {
                criterio: $('#input_buscar_productos').val()
            },
                    function (data) {
                        if (data.codigo == 200) {
                      $("#tabla tbody  ").html('');  
                            $.each(data.datos, function (indice, registros) {
     $("#tabla tbody ").append(
             ' <tr data-id="'+registros.ProductoId+'"" class="linkhover editar" >'+
               ' <td class="text-center">'+'<span data-img="'+registros.imagen+'"  class=" imagen  fa fa-search-plus  bg-red-actives" style="font-size:25px"></span>'+'</td>'+
               ' <td>'+registros.NombreProducto+'</td>'+
            ' <td>'+registros.Categoria+'</td>'+
            ' <td>'+registros.sub_categoria+'</td>'+
               ' <td>'+'<span class="'+registros.Clase+'">'+registros.Estatus+'</span></td>'+
               ' <td>'+registros.Precio+'</td>'+
                   ' <td><p >'+registros.peso+'</p></td>'+
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
    $('#cuerpo_tabla_productos').on('click', 'span.imagen ', function() {
      imgn=$(this).data('img');
  $(".contenedor_img").html('<img class="img-responsive"   src="<?php echo base_url(); ?>assets/dist/productos/'+imgn+' " style="height:20%;">');
 $("#modal_img").modal("handleUpdate");

});


            function consulta_categoria() {
           $("#tabla_categoria").dataTable().fnDestroy();

            $.post('product/consulta_categorias', {
                criterio: $('#input_buscar_categoria').val()
            },
                    function (data) {
                        if (data.codigo == 200) {
                      $("#tabla_categoria tbody  ").html('');  
                            $.each(data.datos, function (indice, registros) {
     $("#tabla_categoria tbody ").append(
       ' <tr data-id="'+registros.CategoriaId+'"" class="linkhover editar" >'+
             ' <td>'+registros.Descripcion+'</td>'+
               ' <td>'+registros.detalle_categoria+'</td>'+
     
               ' <td>'+'<span class="label label-success">'+registros.Estatus+'</span></td>'+
              '</tr>'
            );


                            });


                       
                        }
                    }, "json");


    $("#tabla_categoria").DataTable({
           
            "pageLength": 1,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,

       
        });

        }

                  function consulta_sub_categoria() {
           $("#tabla_sub_categoria").dataTable().fnDestroy();

            $.post('product/consulta_sub_categorias', {
                criterio: $('#input_buscar_sub_categoria').val()
            },
                    function (data) {
                        if (data.codigo == 200) {
                      $("#tabla_sub_categoria tbody  ").html('');  
                            $.each(data.datos, function (indice, registros) {
     $("#tabla_sub_categoria tbody ").append(
       ' <tr data-id="'+registros.sub_categoria_id+'"" class="linkhover editar" >'+
             ' <td>'+registros.sub_categoria+'</td>'+
               ' <td>'+registros.Descripcion+'</td>'+
     
               ' <td>'+'<span class="label label-success">'+registros.Estatus+'</span></td>'+
              '</tr>'
            );


                            });


                       
                        }
                    }, "json");


    $("#tabla_sub_categoria").DataTable({
           
            "pageLength": 1,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,

       
        });

        }



            function consulta_categoria_combos() {
           

            $.post('product/consulta_categorias', {
                criterio: ''
            },
                    function (data) {
                        if (data.codigo == 200) {
                    $("#selectcategoria").html('<option value="Seleccione">seleccione</option>');
                      $("#selectcategoria_sub_categoria").html('<option value="Seleccione">seleccione</option>');
               
                            $.each(data.datos, function (indice, registros) {
            $("#selectcategoria").append('<option value="'+registros.CategoriaId+'">'+registros.Descripcion+'</option>');

$("#selectcategoria_sub_categoria").append('<option value="'+registros.CategoriaId+'">'+registros.Descripcion+'</option>');
                            });
                        }
                    }, "json");

        }


    $('#cuerpo_tabla_productos').on('click', 'span.imagen ', function() {
          imgn=$(this).data('img');
      $(".contenedor_img").html('<img class="img-responsive" src="<?php echo base_url(); ?>assets/dist/productos/'+imgn+' ">');
     $("#modal_img").modal("show");

    });

    //funciones de llenado
        consulta_productos();
       consulta_categoria();
       consulta_categoria_combos();
       consulta_sub_categoria();
           //Buscar Categoria. XD
        $('#input_buscar_productos').keyup(function () {

          consulta_productos();
        });



        $('#input_buscar_categoria').keyup(function () {

          consulta_categoria();
        });


        $('#input_buscar_sub_categoria').keyup(function () {

          consulta_sub_categoria();
        });





        
       
         $('#cerrar_panel_editar ').on('click', function() {
           $("#panel_editar").hide('slow');
          $("#panel_principal").slideDown(2000);;
        });


        //Botón para agragar un nuevo gasto
        $(".btnNuevo").unbind('click').click(function () {
            Estado = 'Nuevo';
            $("#nombre").val('');
            $("#duracion").val('');
            $("#precio").val('');
            //  $('#selecEstatus> option[value="33"]').attr('selected', 'selected');

            $("#cocina").val(0);
            $("#selecEstatus").val("Seleccione");

            $("#peso").val('');
            $("#stock").val('');
               $("#input_file").val('');
              $("#descripcion").val('');
            $("#selectcategoria").val("Seleccione");
             $("#selectcategoria").change();
           // $("#Modal_Producto").modal("show");
              $("#panel_principal").hide('slow');
            $("#panel_editar").slideDown(2000);
        });
        function limpia_productos(){
            $("#nombre").val('');
            $("#duracion").val('');
            $("#precio").val('');
            //  $('#selecEstatus> option[value="33"]').attr('selected', 'selected');

            $("#cocina").val(0);
            $("#selecEstatus").val("Seleccione");

            $("#peso").val('');
            $("#stock").val('');
             $("#input_file").val('');
            $("#descripcion").val('');
            $("#selectcategoria").val("Seleccione");
             $("#selectcategoria").change();
        }

           //Botón para agerar un nuevo registro
        $(".btnNuevo_categoria").unbind('click').click(function () {
             Estado = 'Nuevo';
          limpia_categorias();
            $("#categorias").modal("show");
        });

  $(".btnNuevo_sub_categoria").unbind('click').click(function () {
             Estado = 'Nuevo';
         limpia_sub_categorias();
            $("#sub_categorias").modal("show");
        });
        function limpia_categorias(){
           $("#Categoria").val('');
            $("#categoriaAlimento").val(0);
            $("#Estatus").val(0);
             $("#descripcion_categoria").val('');

        }

          function limpia_sub_categorias(){
            $("#sub_categoria").val('');
            $("#selectcategoria_sub_categoria").val('Seleccione');
            $("#Estatus_sub_categoria").val(0);

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


 
     //Botón para guardar y/o actualizar categoria
        $(".btnGuardar_categoria").unbind('click').click(function () {
            if (($("#Categoria").val() != "") && ($("#Estatus").val() != "0") ) {
                if (Estado == 'Nuevo') {

                    //Guardar Catedgoria
                    $.post('cCategorias/guardarCategoria', {
                        Descripcion: $("#Categoria").val(),
                        Subcategoria: 'Bebidas',
                        detalle: $("#descripcion_categoria").val(),
                        SucursalId: $("#SucursalId").val(),
                        EstatusId: document.getElementById("Estatus").value
                    },
                            function (data) {
                                if (data.codigo == 200) {
                                    swal("Categoria guardada correctamente", {
                                        icon: "success",
                                         timer: 1000
                                    })
                               
          consulta_categoria();
              consulta_categoria_combos();
              limpia_categorias();
                                    
                           
                                } else {
                                    alert('Ha ocurrido un error al guardar');
                                }
                            }, "json");
                } else {

                    //Actualizar categoria
                    $.post('cCategorias/actualizarCategoria', {
                        Descripcion: $("#Categoria").val(),
                        Subcategoria: $("#categoriaAlimento").val(),
                        SucursalId: $("#SucursalId").val(),
                        EstatusId: document.getElementById("Estatus").value,
                        CategoriaId: CategoriaId
                    },
                            function (data) {
                                if (data.codigo == 200) {
                                    swal("Actualizado correctamente", {
                                        icon: "success",
                                        title: "Exitoso",
                                        text: "Categoría Actualizada correctamente",
                                        timer: 1000
                                    }).then(function () {
                                        location.href = "<?php base_url(); ?>cCategorias";
                                    });
                                    $("#categorias").modal("hide");
                                } else {
                                    swal({
                                        icon: "error",
                                        title: "Verifica tus productos, por favor",
                                        text: "No puedes inactivar esta categoría, debido a que tienes productos asociados.",
                                         timer: 1000

                                    }).then(function () {
                                        location.href = "<?php base_url(); ?>cCategorias";
                                    });
                                    $("#categorias").modal("hide");
                                }
                            }, "json");
                }
            } else {
                alert('No deje espacios vacios');
            }
        });



         $(".btnGuardar_sub_categoria").unbind('click').click(function () {
            if (($("#sub_categoria").val() != "") || ($("#Estatus_sub_categoria").val() != "0") ) {
                if (Estado == 'Nuevo') {

                    //Guardar Catedgoria
                    $.post('cCategorias/guardarsub_Categoria', {
                        sub_categoria: $("#sub_categoria").val(),
                        categoria: $("#selectcategoria_sub_categoria").val(),
                 
                        SucursalId: $("#SucursalId").val(),
                        EstatusId: $("#Estatus_sub_categoria").val(),
                    },
                            function (data) {
                                if (data.codigo == 200) {
                                    swal("Sub Categoria guardada correctamente", {
                                        icon: "success",
                                         timer: 1000
                                    })
                               
         
              limpia_sub_categorias();
                     consulta_sub_categoria();
                                    
                           
                                } else {
                                    alert('Ha ocurrido un error al guardar');
                                }
                            }, "json");
                } else {

                    //Actualizar categoria
                    $.post('cCategorias/actualizarCategoria', {
                        Descripcion: $("#Categoria").val(),
                        Subcategoria: $("#categoriaAlimento").val(),
                        SucursalId: $("#SucursalId").val(),
                        EstatusId: document.getElementById("Estatus").value,
                        CategoriaId: CategoriaId
                    },
                            function (data) {
                                if (data.codigo == 200) {
                                    swal("Actualizado correctamente", {
                                        icon: "success",
                                        title: "Exitoso",
                                        text: "Categoría Actualizada correctamente",
                                        timer: 1000
                                    }).then(function () {
                                        location.href = "<?php base_url(); ?>cCategorias";
                                    });
                                    $("#categorias").modal("hide");
                                } else {
                                    swal({
                                        icon: "error",
                                        title: "Verifica tus productos, por favor",
                                        text: "No puedes inactivar esta categoría, debido a que tienes productos asociados.",
                                         timer: 1000

                                    }).then(function () {
                                        location.href = "<?php base_url(); ?>cCategorias";
                                    });
                                    $("#categorias").modal("hide");
                                }
                            }, "json");
                }
            } else {
                alert('No deje espacios vacios');
            }
        });
        $(".btnGuardar").unbind('click').click(function () {
            if ( ($("#selectstatus").val() != 'Seleccione') && ($("#selectcategoria").val() != 'Seleccione') && ($("#nombre").val() != "")  && ($("#precio").val() != "") && ($("#select_sub_categoria").val() != "0")) {
                if (Estado == 'Nuevo') {



                     var formData = new FormData();

             jQuery.each(jQuery('#input_file')[0].files, function(i, file) {
   // data.append('file-'+i, file);
        formData.append('input_file[]', file);
             });

     formData.append('SucursalId', $('#SucursalId').val());
 formData.append('nombre', $('#nombre').val());
 formData.append('descripcion', $('#descripcion').val());

     formData.append('precio', $('#precio').val());
        formData.append('peso', $('#peso').val());         
          formData.append('estatus', $('#selectstatus').val());         
              formData.append('categoria', $('#selectcategoria').val());                
                     formData.append('sub_categoria', $('#select_sub_categoria').val());  
               
                        


   $.ajax({
                url: "<?php echo base_url(); ?>"+'/product/guardar2',
                type: 'POST',
                dataType: "json",
                data: formData,
                success: function (data) {
                  if (data.codigo == 200) {
                                    swal("Producto guardado correctamente", {
                                        icon: "success",
                                         timer: 1000
                                    })
                       consulta_productos();
                     limpia_productos();
                }
                },
                cache: false,
                contentType: false,
                processData: false
            });











                } else {

                    //Actualizar Información de gastos
                    $.post('product/actualizar', {
                        nombre: $("#nombre").val(),
                        descripcion: $('#descripcion').val(),
                        duracion: $('#duracion').val(),
                        precio: $("#precio").val(),
                        estatus: $("#selectstatus").val(),
                        categoria: $("#selectcategoria").val(),
                        productoId: ProductoId,
                       cocina: $("#cocina").val()
                    },
                            function (data) {
                                if (data.codigo == 200) {
                                    $("#Modal_Producto").modal("hide");
//                                    UlProducto();
                                    swal({
                                        icon: "success", //info->advertencia, error->error,warning->advertencia y success->ok
                                        title: "Exitoso",
                                        text: "Elemento Actualizado correctamente",
                                        timer: 800

                                    }).then(function () {
                                        window.location.href = '<?php echo base_url() ?>product';
                                    });
//                                    recargar()
                                } else {
                                    alert('Error al actualizar');
                                }

                            }, "json");
                }
            } else {
                alert('No deje espacios vacios');
            }
        });

    });


    


 $("#selectcategoria").unbind('change').change(function () {
   $("#select_sub_categoria").html('<option value="0">seleccione</option>');
      $.post('product/consulta_sub_categorias_por_id', {
                id: $('#selectcategoria').val()
            },
                    function (data) {
                        if (data.codigo == 200) {
      $.each(data.datos, function (indice, registros) {
  
   $("#select_sub_categoria").append('<option value="'+registros.sub_categoria_id+'">'+registros.sub_categoria+'</option>');
        });
                       
                        }
                    }, "json");
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