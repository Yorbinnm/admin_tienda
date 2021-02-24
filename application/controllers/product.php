<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class product extends CI_Controller {

    private $user;
    private $modulos;

    function __construct() {
        parent::__construct();
        //Este codigo es para todos los controladores en el constructor
        $this->load->model('Admin');
        $this->user['user'] = $this->Admin->infoUser();
        $this->modulos['modulos'] = $this->Admin->getModulos();
        if ($this->session->get_userdata()['s_Usuario'] == NULL) {
            redirect(base_url());
        }

//Cargar el modelo de la clase
     $this->load->model('sentencias_genericas');
        $this->load->model('Producto');
    }

    function index() {
     $data=array();
        
        $catalogo['unidades'] = $this->sentencias_genericas->select_catalogo('unidad');
        

        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('tienda/productos/panel_edit',  $catalogo);
        $this->load->view('tienda/productos/productos', $data);
        $this->load->view('layout/footer');
    }

    function MiProducto() {
        $ProductoId = $_POST['ProductoId'];
        $datos = $this->Producto->Productoid($ProductoId);
        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'Datos' => $datos
        );
        echo json_encode($respuesta);
    }

    function misInsumos() {

        $ProductoId = $_POST['ProductoId'];

        $InfoP = $this->Producto->Producto_infoId($ProductoId);
        $InfoP[0]->suma = $this->Producto->SumaConstruccion($ProductoId);
        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'DatosP' => $InfoP
        );

        echo json_encode($respuesta);
    }

    function misInsumosrefresh() {
        $ProductoId = $_POST['ProductoId'];
        $InfoP = $this->Producto->Producto_infoId($ProductoId);
        $InfoP[0]->suma = $this->Producto->SumaConstruccion($ProductoId);
        $InfoI = $this->Producto->Producto_infoInsumos($ProductoId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'DatosI' => $InfoI,
            'DatosP' => $InfoP
        );
        echo json_encode($respuesta);
    }

    function actualizar() {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $duracion = $_POST['duracion'];
        $precio = $_POST['precio'];
        $estatus = $_POST['estatus'];
        $categoria = $_POST['categoria'];
        $productoId = $_POST['productoId'];
        $cocina = $_POST['cocina'];
        $this->Producto->actualizar($nombre, $descripcion, $duracion, $precio, $estatus, $categoria, $productoId,$cocina);
        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
    }

    function guardar_anterior() {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
      
        $precio = $_POST['precio'];
        $estatus = $_POST['estatus'];
        $categoria = $_POST['categoria'];
       

        $sucursal = $_POST['SucursalId'];

        $this->Producto->GuardaProducto($nombre, $descripcion, $precio, $estatus, $categoria, $sucursal,'','');

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
    }

    public function uid() {
        $this->load->library('uuid');
        $id = $this->uuid->v4();
        $id = str_replace('-', '', $id);
        $resultados = $id;


        return $resultados;
    }

    



    function guardar_producto(){

          $campos = $_POST;
       $archivos1 = count($_FILES["input_file"]['name']);
  ///   print_r($_FILES);  
   for ($i = 0; $i < $archivos1; $i++) {
    $imagen=$this->uid().'_'.$_FILES["input_file"]['name'][$i];
      $rutadestino =$_SERVER["DOCUMENT_ROOT"].'/admin/assets/dist/productos/'.$imagen;
  

    if(!@copy($_FILES["input_file"]['tmp_name'][$i], $rutadestino)) {
        $errors = error_get_last();

        print_r($errors);
      } else {
             $campos['imagen1']=$imagen;
        }
    }
 $archivos2 = count($_FILES["input_file2"]['name']);   
     for ($i = 0; $i < $archivos1; $i++) {
    $imagen=$this->uid().'_'.$_FILES["input_file2"]['name'][$i];
      $rutadestino =$_SERVER["DOCUMENT_ROOT"].'/admin/assets/dist/productos/'.$imagen;
  

    if(!@copy($_FILES["input_file2"]['tmp_name'][$i], $rutadestino)) {
        $errors = error_get_last();
        print_r($errors);
      } else {
        $campos['imagen2']=$imagen;
      }
        } 

       $archivos3 = count($_FILES["input_file3"]['name']);   
     for ($i = 0; $i < $archivos1; $i++) {
    $imagen=$this->uid().'_'.$_FILES["input_file3"]['name'][$i];
      $rutadestino =$_SERVER["DOCUMENT_ROOT"].'/admin/assets/dist/productos/'.$imagen;
  

    if(!@copy($_FILES["input_file3"]['tmp_name'][$i], $rutadestino)) {
        $errors = error_get_last();
        print_r($errors);
      } else {
           $campos['imagen3']=$imagen;
      }
        } 

             $archivos4 = count($_FILES["input_file4"]['name']);   
     for ($i = 0; $i < $archivos1; $i++) {
    $imagen=$this->uid().'_'.$_FILES["input_file4"]['name'][$i];
      $rutadestino =$_SERVER["DOCUMENT_ROOT"].'/admin/assets/dist/productos/'.$imagen;
  

    if(!@copy($_FILES["input_file4"]['tmp_name'][$i], $rutadestino)) {
        $errors = error_get_last();
        print_r($errors);
      } else {
        $campos['imagen4']=$imagen;
      }
        }       


        $this->sentencias_genericas->insertar('productos',$campos);
         $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
       

    }

    function getProductos() {
        $datos = $this->Producto->getProductos();
        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'Datos' => $datos
        );

        echo json_encode($respuesta);
    }

    function BuscaInsumos($criterio = null) {
        $datos = $this->Producto->insumos($criterio);
        $respuesta = array(
            'pages' => 1,
            'total_pages' => 1,
            'total_results' => count($datos),
            'results' => $datos,
            'criterio' => $criterio
        );
        echo json_encode($respuesta);
    }

    function baja_insumo() {
        $ProductoId = $_POST['ProductoId'];
        $InsumoId = $_POST['InsumoId'];
        $this->Producto->baja_insumo($ProductoId, $InsumoId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Movimiento Guardado",
        );

        echo json_encode($respuesta);
    }

    function edita_insumo() {
        $ProductoId = $_POST['ProductoId'];
        $InsumoId = $_POST['InsumoId'];
        $Porcion = $_POST['Porcion'];
        $PrecioPor = $_POST['PrecioPor'];
        $this->Producto->actualizar_insumo_porcion($ProductoId, $InsumoId, $Porcion, $PrecioPor);
        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
    }

    function InfoInsumoID() {
        $InsumoId = $_POST['InsumoId'];
        $datos = $this->Producto->Infoinsumo($InsumoId);
        $respuesta = array(
            'codigo' => 200,
            'datos' => $datos
        );
        echo json_encode($respuesta);
    }

    function consulta_productos(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->Producto->getProductos($this->user['user']['s_SucursalId'],$_POST['criterio'])
        );
        echo json_encode($respuesta);
    }

       function consulta_categorias(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->Producto->getCategorias($this->user['user']['s_SucursalId'],$_POST['criterio'])
        );
        echo json_encode($respuesta);
    }

    function consulta_sub_categorias(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->Producto->get_sub_categorias($this->user['user']['s_SucursalId'],$_POST['criterio'])
        );
        echo json_encode($respuesta);
    }
    
 function consulta_sub_categorias_por_id(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->Producto->obtien_subcategoria($_POST['id'])
        );
        echo json_encode($respuesta);
    }


}
