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
        $this->load->model('Producto');
    }

    function index() {
        //Convertir objetos a array
        $data['Producto'] = json_decode(json_encode($this->Producto->getProductos($this->user['user']['s_SucursalId'])), true);
        $data['resumen']=array();
        foreach ($data['Producto'] as $key => $value) {
           $data['resumen'][$value['CategoriaId']]=array(
            'descripcion'=>$value['Categoria'],
            'total'=>$value['Total_categoria']
           );
        }
        
        $data['Categorias'] = $this->Producto->getCategorias($this->user['user']['s_SucursalId']);
        

        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('tienda/productos/panel_edit', $data);
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

     function guardar2() {
       
   

   $Num_Archivo = count($_FILES["input_file"]['name']);
  ///   print_r($_FILES);  
   for ($i = 0; $i < $Num_Archivo; $i++) {
    $imagen=$this->uid().'_'.$_FILES["input_file"]['name'][$i];
      $rutadestino =$_SERVER["DOCUMENT_ROOT"].'/admin/assets/dist/productos/'.$imagen;
  

    if(!@copy($_FILES["input_file"]['tmp_name'][$i], $rutadestino)) {
        $errors = error_get_last();
        print_r($errors);
      } else {
             // $this->Tercero_mod->Carga_Estatal($rutadestino, $_POST['concepto'], $_POST['quincenaProc']);
      }
        }


   $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
      
        $precio = $_POST['precio'];
        $estatus = $_POST['estatus'];
        $categoria = $_POST['categoria'];
       

        $sucursal = $this->user['user']['s_SucursalId'];
 $peso = $_POST['peso'];
   $sub_categoria = $_POST['sub_categoria'];                      
        $this->Producto->GuardaProducto($nombre, $descripcion, $precio, $estatus, $categoria, $sucursal,$imagen,$peso,$sub_categoria);

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
