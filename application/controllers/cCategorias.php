<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cCategorias extends CI_Controller {

    private $user;
    private $modulos;

    function __construct() {
        parent::__construct();
        //Este codigo es para todos los controladores en el constructor
        $this->load->model('Admin');
        $this->user['user'] = $this->Admin->infoUser();
        $this->modulos['modulos'] = $this->Admin->getModulos();
        if ($this->session->get_userdata()['s_Usuario'] == NULL)
            redirect(base_url());
        //Cargar el modelo de la clase
        $this->load->model('Categorias');
         //$this->load->model('mCaja');
       /// $this->user['cta'] = $this->mCaja->verCuentas($this->user['user']['s_SucursalId']);
    }

    function index() {
        $data['categorias'] = $this->Categorias->getCategorias($this->user['user']['s_SucursalId']);
        $data['estatus'] = $this->Categorias->getEstatus();
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('lemuria/vCategorias', $data);
        $this->load->view('layout/footer');
    }

    public function guardarCategoria() {
        $Descripcion = $_POST['Descripcion'];
        $Subcategoria = $_POST['Subcategoria'];
        $SucursalId = $_POST['SucursalId'];
        $EstatusId = $_POST['EstatusId'];
         $detalle = $_POST['detalle'];

        $registros = $this->Categorias->guardarCategoria($Descripcion, $Subcategoria, $SucursalId, $EstatusId,$detalle);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );

        echo json_encode($respuesta);
    }


       public function guardarsub_Categoria() {
        $sub_categoria = $_POST['sub_categoria'];
        $categoria = $_POST['categoria'];
        $SucursalId = $_POST['SucursalId'];
        $EstatusId = $_POST['EstatusId'];
    

        $registros = $this->Categorias->guardarsub_Categoria($sub_categoria, $categoria, $SucursalId, $EstatusId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
         
        );

        echo json_encode($respuesta);
    }

    public function datosCategoria() {
        $SucursalId = $this->user['user']['s_SucursalId'];
        $CategoriaId = $_POST['CategoriaId'];
        $registros = $this->Categorias->datosCategoria($CategoriaId, $SucursalId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );
//       print_r($CategoriaId);
        echo json_encode($respuesta);
    }

    public function actualizarCategoria() {
        $CategoriaId = $_POST['CategoriaId'];
        $Descripcion = $_POST['Descripcion'];
        $Subcategoria = $_POST['Subcategoria'];
        $SucursalId = $_POST['SucursalId'];
        $EstatusId = $_POST['EstatusId'];
        $respuesta = array(
            'codigo' => 0,
            'mensaje' => "Guardado",
            'contenido' => ''
        );
        if ($EstatusId == 1) {
            $registros = $this->Categorias->actualizarCategoria($CategoriaId, $Descripcion, $Subcategoria, $SucursalId, $EstatusId);
            $respuesta['codigo'] = 200;
            $respuesta['contenido'] = $registros;
        } else {
            $reg = $this->Categorias->verificarCategoria($CategoriaId);
            if ($reg > 0) {
                $respuesta['codigo'] = 400;
            } else {
                $registros = $this->Categorias->actualizarCategoria($CategoriaId, $Descripcion, $Subcategoria, $SucursalId, $EstatusId);
                $respuesta['codigo'] = 200;
                $respuesta['contenido'] = $registros;
            }
        }

        echo json_encode($respuesta);
    }

    function Eliminar() {
        $CategoriaId = $_POST['CategoriaId'];
        $respuesta = array(
            'codigo' => 0,
            'mensaje' => "ok",
            'contenido' => ''
        );

        $reg = $this->Categorias->verificarCategoria($CategoriaId);

        if ($reg > 0) {
            $respuesta['codigo'] = 400;
        } else {
            $registros = $this->Categorias->Eliminar($CategoriaId);
            $respuesta['codigo'] = 200;
            $respuesta['contenido'] = $registros;
        }

        echo json_encode($respuesta);
    }

}
