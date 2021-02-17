<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class ctr_delivery extends CI_Controller {

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
                $this->load->model('repartidor');
                   $this->load->model('sentencias_genericas');
    }

    function index() {
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
      ///  $this->load->view('lemuria/vBienvenida');
        $this->load->view('tienda/repartidor');
        $this->load->view('layout/footer');
    }

  function consulta_repartidor(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->repartidor->getrepartidor($this->user['user']['s_SucursalId'],$_POST['criterio'])
        );
        echo json_encode($respuesta);
    }

     function consulta_rutas(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->repartidor->getrutas($this->user['user']['s_SucursalId'],$_POST['criterio'])
        );
        echo json_encode($respuesta);
    }




    function guarda_repartidor() {
        $campos = $_POST;
     

        $this->sentencias_genericas->insertar('repartidor',$campos);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
    }
    function guarda_ruta() {
        $campos = $_POST;
     

        $this->sentencias_genericas->insertar('ruta',$campos);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
    }

        function guarda_ruta_repartidor() {
        $campos = $_POST;
     

        $this->sentencias_genericas->insertar('ruta_repartidor',$campos);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
    }





     function consulta_datos_repartidor(){

            $respuesta = array(
            'codigo' => 200,
            'datos_generales' => $this->sentencias_genericas->obtener_valores_por_id('repartidor','repartidor_id',$_POST['criterio']),
             'datos_rutas' => $this->repartidor->rutas_repartidor($_POST['criterio'])
        );
        echo json_encode($respuesta);
    }


       function obtiene_rutas(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->repartidor->obtiene_rutas()
        );
        echo json_encode($respuesta);
    }


}
