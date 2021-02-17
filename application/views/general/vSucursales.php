<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sucursales</h3>
                    <button type="button" class="btn btn-success pull-right btnNuevo">
                        <li class="fa fa-plus"></li> Nuevo
                    </button>
                    <button type="button" class="btn btn-primary pull-right btnExportar" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Generar Excel
                    </button>  
                </div>  
                <br>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="input-group input-group-md">
                            <input type="text" name="table_search" id="inputBuscar" class="form-control pull-right" placeholder="Buscar...">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button> 
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7">
                        <?php
                        $carpetaDestino = "C:/xampp/htdocs/Lemuria/application/printer/src/Mike42/Escpos/resources/";
                        //si hay algun archivo que subir
                        if (isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]) {
                            //recorremos todos los arhivos que se han subido
                            for ($i = 0; $i < count($_FILES["archivo"]["name"]); $i++) {
                                //si es un formato de imagen
                                if ($_FILES["archivo"]["type"][$i] == "image/jpeg" || $_FILES["archivo"]["type"][$i] == "image/png") {

                                    //si existe la carpeta o se ha creado
                                    if (file_exists($carpetaDestino) || @mkdir($carpetaDestino)) {
                                        $origen = $_FILES["archivo"]["tmp_name"][$i];
                                        $destino = $carpetaDestino . $_FILES["archivo"]["name"][$i];

                                        //movemos el archivo
                                        if (@move_uploaded_file($origen, $destino)) {
                                            echo "<br>" . $_FILES["archivo"]["name"][$i] . " movido correctamente";
                                        } else {
                                            echo "<br>No se ha podido mover el archivo: " . $_FILES["archivo"]["name"][$i];
                                        }
                                    } else {
                                        echo "<br>No se ha podido crear la carpeta: " . $carpetaDestino;
                                    }
                                } else {

                                    echo "<br>" . $_FILES["archivo"]["name"][$i] . " - No es imagen jpg o png";
                                }
                            }
                        }
                        ?>
                        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="multipart/form-data" name="inscripcion">
                            <div class="col-md-12">
                                <div class="form-group input-group input-group-md">
                                    <input class="imagen form-control" type="file" name="archivo[]" multiple="multiple"> 
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary trig" type="submit" value="Enviar"><li class="fa fa-mail-reply"></li> Importar logo</button>
                                    </div>
                                </div>
                            </div>                        
                        </form>
                    </div>
                </div>
                <br>
                <br> 
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="box-body searchable">  
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <input type="hidden" id="SucursalId" value="<?php echo $user['s_SucursalId']; ?>">
                                        <table id="tabla" border="1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">                                      
                                            <caption style="text-align:center">Sucursales</caption>
                                            <thead>
                                                <tr role="row" class="bg-aqua">    
                                                    <th bgcolor="#00ced1" class="sorting" tabindex="0" aria-controls="tabla" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Id</th>
                                                    <th bgcolor="#00ced1" class="sorting" tabindex="0" aria-controls="tabla" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Sucursal</th>
                                                    <th bgcolor="#00ced1" class="sorting" tabindex="0" aria-controls="tabla" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Dirección</th>
                                                    <th bgcolor="#00ced1" class="sorting" tabindex="0" aria-controls="tabla" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Teléfono</th>
                                                    <th bgcolor="#00ced1" class="sorting" tabindex="0" aria-controls="tabla" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Estatus</th>
                                                    <th bgcolor="#00ced1" class="sorting_desc" tabindex="0" aria-controls="tabla" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">Editar</th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($sucursales as $miSucursal) {
                                                    ?>
                                                    <tr role="row" class="odd">  
                                                        <td><?php echo $miSucursal->SucursalId; ?></td>
                                                        <td><span class="glyphicon glyphicon-home"></span>  &nbsp;<?php echo $miSucursal->NombreSucursal; ?></td>
                                                        <td><?php echo $miSucursal->Calle . ' , Col. ' . $miSucursal->Colonia . ' , ' . $miSucursal->Ciudad . ' , Cp. ' . $miSucursal->Cp; ?></td>                                          
                                                        <td><?php echo $miSucursal->Telefono; ?></td>
                                                        <td style="text-align:center"><?php echo $miSucursal->Descripcion; ?></td>
                                                        <td style="text-align:center"><a class="btnActualizar" data-sucursalid='<?php echo $miSucursal->SucursalId; ?>' href="#"><span class="pull-center fa fa-fw fa-edit"></span></a></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>       
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<!--modal sucursal-->
<div class="modal modal-default fade" id="sucursal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><a class="fa fa-building" style="color: black"></a><strong> Sucursal</strong></h4>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-horizontal">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputPassword3" class="control-label text-muted">Sucursal Padre</label>
                                </div>
                                <div class="col-sm-9">
                                    <select type="text" id="nombreP" class="form-control">
                                        <option value="0">Seleccione</option>
                                        <?php
                                        foreach ($sucursales as $miSucursal) {
                                            ?> 
                                            <option value="<?php echo $miSucursal->NombreSucursal; ?>"><?php echo $miSucursal->NombreSucursal; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">Sucursal</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="nombre" class="form-control"  placeholder="Nombre de la sucursal">
                                </div>
                            </div>  
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">R.F.C</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="rfc" class="form-control"  placeholder="R.F.C">
                                </div>
                            </div> 
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">Calle</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="calle" class="form-control"  placeholder="Calle">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">Colonia</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="colonia" class="form-control"  placeholder="Colonia">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">Cp</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="cp" class="form-control"  placeholder="Cp">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">Ciudad</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="ciudad" class="form-control"  placeholder="Ciudad">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">Teléfono</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="telefono" class="form-control"  placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputEmail3" class="control-label text-muted">Página web</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="web" class="form-control"  placeholder="Página web">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="inputPassword3" class="control-label text-muted">Estatus</label>
                                </div>
                                <div class="col-sm-9">
                                    <select type="text" id="estatus" class="form-control">
                                        <option value="0">Seleccione</option>
                                        <?php
                                        foreach ($estatus as $esta) {
                                            ?> 
                                            <option value="<?php echo $esta->EstatusId; ?>"><?php echo $esta->Descripcion; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                        </div>
                    </div>
                </form>               
            </div>
            <div class="modal-footer">                    
                <button type="button" class="btnGuardar btn btn-sm btn-primary"><i class="fa fa-save"></i> Guardar</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script  type="text/javascript">
    function descargarExcel() {
        var tmpElemento = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel';
        var tabla_div = document.getElementById('tabla');
        var tabla_html = tabla_div.outerHTML.replace(/ /g, '%20');
        var f = new Date().toJSON().slice(0, 10);
        tmpElemento.href = data_type + ', ' + tabla_html;
        tmpElemento.download = 'Reporte de sucursales_' + f + '.xls';
        tmpElemento.click();
    }

    $(document).ready(function () {
         $(".imagen").click(function () {

            alert('los siguientes formatos para cambiar la imagen son obligatorios\n\nFORMATO *: JPG \nTAMAÑO *: 350px \nNOMBRE *: LOGO1');

        });
        $(".btnExportar").click(function () {
            descargarExcel();
        });

        //Declaración de variables
        var Estado = '';
        var SucursalId = 0;
        //Botón para agerar un nuevo registro
        $(".btnNuevo").unbind('click').click(function () {
            Estado = 'Nuevo';
            $("#nombre").val('');
            $("#nombreP").val(0);
            $("#rfc").val('');
            $("#calle").val('');
            $("#colonia").val('');
            $("#cp").val('');
            $("#ciudad").val('');
            $("#telefono").val('');
            $("#web").val('');
            $("#estatus").val(0);
            $("#sucursal").modal("show");
        });
        //Botón para obtener la información de la sucursal
        $(".btnActualizar").unbind('click').click(function () {
            Estado = 'Editar';
            SucursalId = $(this).data('sucursalid');
            $.post('cSucursales/datosSucursal', {
                SucursalId: SucursalId
            },
                    function (data) {
                        if (data.codigo == 200) {
//                            alert(JSON.stringify(data.contenido));
                            $("#sucursal").modal("show");
                            $.each(data.contenido, function (indice, registro) {
                                $("#nombre").val(registro.NombreSucursal);
                                $("#nombreP").val(registro.SucursalPadre);
                                $("#rfc").val(registro.RFC);
                                $("#calle").val(registro.Calle);
                                $("#colonia").val(registro.Colonia);
                                $("#cp").val(registro.Cp);
                                $("#ciudad").val(registro.Ciudad);
                                $("#telefono").val(registro.Telefono);
                                $("#web").val(registro.PaginaWeb);
                                $("#estatus").val(registro.EstatusId);
                            });
                        } else {
                            alert('Error al obtenr los datos');
                        }
                    }, "json");
        });
        //Botón para guardar y/o actualizar sucursales
        $(".btnGuardar").unbind('click').click(function () {
            if (($("#nombre").val() != "") && ($("#direccion").val() != "") && ($("#telefono").val() != "") && ($("#web").val() != "") && ($("#estatus").val() != "")) {
                if (Estado == 'Nuevo') {

                    //Guardar Catedgoria
                    $.post('cSucursales/guardarSucursal', {
                        NombreSucursal: $("#nombre").val(),
                        SucursalPadre: $("#nombreP").val(),
                        RFC: $("#rfc").val(),
                        Calle: $("#calle").val(),
                        Colonia: $("#colonia").val(),
                        Cp: $("#cp").val(),
                        Ciudad: $("#ciudad").val(),
                        Telefono: $("#telefono").val(),
                        PaginaWeb: $("#web").val(),
                        EstatusId: document.getElementById("estatus").value
                    },
                            function (data) {
                                if (data.codigo == 200) {
                                    swal("Sucursal guardada correctamente", {
                                        icon: "success",
                                        timer: 1000
                                    }).then(function () {
                                        location.href = "<?php base_url(); ?>cSucursales";
                                    });
                                    $("#sucursal").modal("hide");
                                } else {
                                    alert('Ha ocurrido un error al guardar');
                                }
                            }, "json");
                } else {

                    //Actualizar sucursales

                    $.post('cSucursales/actualizarSucursal', {
                        SucursalId: SucursalId,
                        NombreSucursal: $("#nombre").val(),
                        SucursalPadre: $("#nombreP").val(),
                        RFC: $("#rfc").val(),
                        Calle: $("#calle").val(),
                        Colonia: $("#colonia").val(),
                        Cp: $("#cp").val(),
                        Ciudad: $("#ciudad").val(),
                        Direccion: $("#direccion").val(),
                        Telefono: $("#telefono").val(),
                        PaginaWeb: $("#web").val(),
                        EstatusId: document.getElementById("estatus").value
                    },
                            function (data) {
                                if (data.codigo == 200) {
                                    swal("Sucursal actualizada correctamente", {
                                        icon: "success",
                                        timer: 1000
                                    }).then(function () {
                                        location.href = "<?php base_url(); ?>cSucursales";
                                    });
                                    $("#sucursal").modal("hide");
                                } else {
                                    alert('Error al actualizar');
                                }
                            }, "json");
                }
            } else {
                alert('No deje espacios vacios');
            }
        });
        //Buscar sucursal. XD

        $("#inputBuscar").keyup(function () {
            if ($(this).val() != "") {
                $("#tabla tbody>tr").hide();
                $("#tabla td:contains-ci('" + $(this).val() + "')").parent("tr").show();
            } else {
                $("#tabla tbody>tr").show();
            }
        });

        $.extend($.expr[":"], {
            "contains-ci": function (elem, i, match, array) {
                return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });
    });


</script>




