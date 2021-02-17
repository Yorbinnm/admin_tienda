

<section class="invoice   " id="panel_editar"  style="display:nones;" >
      <!-- title row -->
      <div class="row ">
        <div class="col-xs-12 col-md-12 col-lg-12 ">
          <h2 class="page-header  text-info">
            <i class="fa fa-edit " id="titulo_panel"> PRODUCTS</i> 
        <i class="fa fa-close fa-lg pull-right " style="color: #FF000sss0;" id="cerrar_panel_editar"></i>
        </div>
      </div>

  
      <div class="col-sm-9">
              
           <div class=" col-sm-6">
              <div class="input-group ">
                <span class="input-group-addon resalta_span" style=" "><b>TITLE</b></span>
                <input type="text" class="form-control" id="nombre" placeholder="NOMBRE DEL PRODUCTO">
              </div>
              </div>

                 <div class=" col-sm-6">
              <div class="input-group ">
                <span class="input-group-addon resalta_span" style=" "><b>ESTATUS</b></span>
                      <select class="form-control" id='selectstatus'>
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>

                             </select>
              </div>
              </div>


            <div class=" col-sm-6">
                  <br>
              <div class="input-group">
                <span class="input-group-addon resalta_span"><b>PESO</b></span>
                <input type="text" class="form-control" id="peso" placeholder="PESO ">
              </div>
              <br>
         </div>
             <div class=" col-sm-6">
             <br>
              <div class="input-group">
                <span class="input-group-addon resalta_span"><b>UNIDAD</b></span>
              <select class="form-control" id='selectstatus'>
                        <option value="Seleccione">Seleccione</option>
                        <option value="1">Activo</option>
                        <option value="2">Inactivo</option>

                     </select>
              </div>
              <br>
         </div>

            <div class=" col-sm-6">
               
              <div class="input-group">
                <span class="input-group-addon resalta_span"><b>PESO</b></span>
                <input type="text" class="form-control"id="precio" placeholder="PRECIO ">
              </div>
              
         </div>
           <div class=" col-sm-6">
               
              <div class="input-group">
                <span class="input-group-addon resalta_span">STOCK</span>
                <input type="text" class="form-control"id="stock" placeholder="STOCK ">
              </div>
              
         </div>
        <div class=" col-sm-6">
             <br>
              <div class="input-group">
                <span class="input-group-addon resalta_span">CATEGORIA</span>
                 <select class="form-control " id='selectcategoria' style="width: 100%;"> 

                  </select> 
              </div>
              <br>
         </div>   
          <div class=" col-sm-6">
             <br>
              <div class="input-group">
                <span class="input-group-addon resalta_span">SUB CATEGORIA</span>
                   <select class="form-control" id='select_sub_categoria'>
                     <option value="0">Seleccione</option> </select>  
              </div>
              <br>
         </div>    
             
      
          
        
       

             <form role="form">
          

                

                 <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">PICTURE (REQUESTED)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-info btn-sm">
                                            Agregar&hellip; <input type="file" 
                                          id="input_file"  name="input_file"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input"  readonly>
                                </div>

                </div>
                  <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">PICTURE (OPTIONAL)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-success btn-sm">
                                            Agregar&hellip; <input type="file" 
                                          id="input_file2"  name="input_file2"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input" readonly>
                                </div>

                </div>
                  <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">PICTURE (OPTIONAL)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-success btn-sm">
                                            Agregar&hellip; <input type="file" 
                                          id="input_file3"  name="input_file3"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input" readonly>
                                </div>

                </div>
                  <div class="form-group col-sm-6">
                  <label for="exampleInputEmail1">PICTURE (OPTIONAL)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-success btn-sm">
                                            Agregar&hellip; <input type="file" 
                                          id="input_file4"  name="input_file4"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input" readonly>
                                </div>

                </div>

                 <div class="form-group col-sm-12">
                  <label for="exampleInputEmail1">DESCRIPCION</label>
                    <textarea  id="descripcion" class="form-control" rows="5" placeholder="DESCRIPCION..."></textarea>
                </div>



                 
             
            </form>




      </div>
      <!-- /.row -->



      <!-- this row will not appear when printing -->
      <div class="row no-prints">
    
        <div class="col-xs-12">
     
          <button type="button" class="btn btn-info pull-right btnGuardar "><i class="fa fa-save"></i> SAVE PRODUCT
          </button>
        
        </div>
      </div>
    </section>




<style type="text/css">
  

 .resalta_span{
  background-color: rgb(57, 204, 204); 
  border-color: rgb(57, 204, 204);
}
</style>

<script  type="text/javascript">
   var Estado = '';
        var ProductoId = '';

              $(".file").change(function(){ //boton buscar archivo a subir
          alert('23213');
        $(this).closest('div').find('.tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input').val($(this).val().replace(/\\/g, '/').replace(/.*\//, ''));
    });
    $(document).ready(function () {

    

    });

  </script>  	



