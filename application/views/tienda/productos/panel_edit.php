

<section class="invoice   " id="panel_editar"  style="display:nones;"  >
      <!-- title row -->
      <div class="row ">
        <div class="col-xs-12 col-md-12 col-lg-12 bg-aquas">
          <h2 class="page-header text-aqua ">
            <i class="fa fa-edit " id="titulo_panel"> PRODUCTS</i> 
        <i class="fa fa-close fa-lg pull-right " style="color: #FF000sss0;" id="cerrar_panel_editar"></i>
        </div>
      </div>

  
  
      <div class="col-sm-12" style="background: #FBFBFB">
  <br>
            
           <div class=" col-sm-4">
              <div class="input-group ">
                <span class="input-group-addon resalta_span" style=" "><b><i class="fa fa-fw fa-pencil"></i></b></span>
                <input type="text" class="form-control" id="nombre" placeholder="NOMBRE DEL PRODUCTO">
              </div>
              </div>

                 <div class=" col-sm-3">
              <div class="input-group ">
                <span class="input-group-addon resalta_span" style=" "><b>ESTATUS</b></span>
                      <select class="form-control" id='selectstatus'>
                                        <option value="Seleccione">Seleccione</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>

                             </select>
              </div>
              </div>


            <div class=" col-sm-2">
            
              <div class="input-group">
                <span class="input-group-addon resalta_span"><b>PESO</b></span>
                <input type="text" class="form-control" id="peso" placeholder="PESO ">
              </div>
              <br>
         </div>
             <div class=" col-sm-3">
          
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
                <span class="input-group-addon resalta_span"><b>STOCK</b></span>
                <input type="text" class="form-control"id="stock" placeholder="STOCK ">
              </div>
              
         </div>
        <div class=" col-sm-6">
             <br>
              <div class="input-group">
                <span class="input-group-addon resalta_span"><b>CATEGORIA</b></span>
                 <select class="form-control " id='selectcategoria' style="width: 100%;"> 

                  </select> 
              </div>
              <br>
         </div>   
          <div class=" col-sm-6">
             <br>
              <div class="input-group">
                <span class="input-group-addon resalta_span"><b>SUB CATEGORIA</b></span>
                   <select class="form-control" id='select_sub_categoria'>
                     <option value="0">Seleccione</option> </select>  
              </div>
              <br>
         </div>    
             
      
          
        
       

             <form role="form">
          

                

                 <div class="form-group col-sm-3">
                  <label for="exampleInputEmail1">PICTURE (REQUESTED)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-info btn-sm">
                                            ADD&hellip; <input type="file" 
                                          id="input_file"  name="input_file"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input"  readonly>
                                </div><br>
                    <div id="previo" class="border border-primary rounded" style=" border: 1px solid #C6C4C4;width:100%;height:150px">
      
    </div>        

                </div>
                  <div class="form-group col-sm-3">
                  <label for="exampleInputEmail1">PICTURE (OPTIONAL)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-success btn-sm">
                                            ADD&hellip; <input type="file" 
                                          id="input_file2"  name="input_file2"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input" readonly>
                                </div><br>
                                 <div id="previo2" style=" border: 1px solid #C6C4C4;width:100%;height:150px">
      
    </div>

                </div>
                  <div class="form-group col-sm-3">
                  <label for="exampleInputEmail1">PICTURE (OPTIONAL)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-success btn-sm">
                                            ADD&hellip; <input type="file" 
                                          id="input_file3"  name="input_file3"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input" readonly>
                                </div>  <br>
      <div id="previo3" style=" border: 1px solid #C6C4C4;width:100%;height:150px">
      
    </div>

                </div>
                  <div class="form-group col-sm-3">
                  <label for="exampleInputEmail1">PICTURE (OPTIONAL)</label>
     

                         <div class="input-group my-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-success btn-sm">
                                            ADD &hellip; <input type="file" 
                                          id="input_file4"  name="input_file4"  class="file"
                                             class="tab_incidencias_ct_modal_aplica_incidencia_botones_archivos"  style="display: none;"  accept="image/*" >
                                        </span>
                                    </label>
                                    <input type="text" class="form-control input-sm tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input" readonly>
                                </div>
                                <br>
      <div id="previo4" style=" border: 1px solid #C6C4C4;width:100%;height:150px">
      
    </div>

                </div>

                 <div class="form-group col-sm-12 col-lg-12">
              
                    <textarea  id="descripcion" class="form-control" rows="3" placeholder="DESCRIPCION..."></textarea>
                </div>



                 
             
            </form>




      </div>
      <!-- /.row -->

  

      <!-- this row will not appear when printing -->
     
      <div class="row no-prints">
   
        <div class="col-xs-12">
       <br> <hr>
          <button type="button" class="btn btn-primary pull-right btnGuardar "><i class="fa fa-save"></i> SAVE PRODUCT
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
     
        $(this).closest('div').find('.tab_incidencias_ct_modal_aplica_incidencia_botones_archivos_input').val($(this).val().replace(/\\/g, '/').replace(/.*\//, ''));
    });

document.getElementById("input_file").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('previo'),
            image = document.createElement('img');

    image.src = reader.result;
   image.style.width = "100%";
   image.style.height = "150px";
   image.class = "img-responsive";
    preview.innerHTML = '';
    preview.append(image);
  };
}
document.getElementById("input_file2").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('previo2'),
            image = document.createElement('img');

    image.src = reader.result;
   image.style.width = "100%";
   image.style.height = "150px";
    preview.innerHTML = '';
    preview.append(image);
  };
}
document.getElementById("input_file3").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('previo3'),
            image = document.createElement('img');

    image.src = reader.result;
   image.style.width = "100%";
   image.style.height = "150px";
    preview.innerHTML = '';
    preview.append(image);
  };
}
document.getElementById("input_file4").onchange = function(e) {
  // Creamos el objeto de la clase FileReader
  let reader = new FileReader();

  // Leemos el archivo subido y se lo pasamos a nuestro fileReader
  reader.readAsDataURL(e.target.files[0]);

  // Le decimos que cuando este listo ejecute el código interno
  reader.onload = function(){
    let preview = document.getElementById('previo4'),
            image = document.createElement('img');

    image.src = reader.result;
   image.style.width = "100%";
   image.style.height = "150px";
    preview.innerHTML = '';
    preview.append(image);
  };
}



    $(document).ready(function () {

    

    });

  </script>  	



