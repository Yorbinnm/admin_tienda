<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class ctr_orden extends CI_Controller {

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
                $this->load->model('orden');
                   $this->load->model('sentencias_genericas');
    }

    function index() {
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
      ///  $this->load->view('lemuria/vBienvenida');
        $this->load->view('tienda/orden');
        $this->load->view('layout/footer');
    }

  function consulta_pendientes(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->orden->getpendientes($_POST['criterio'])
        );
        echo json_encode($respuesta);
    }


      function consulta_proceso(){

            $respuesta = array(
            'codigo' => 200,
            'datos' => $this->orden->getproceso($_POST['criterio'])
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

        function asigna_repartidor() {
        $campos = $_POST;
         $campos['estatus_id']=2   ;
          $campo_update=array('orden_id' =>$campos['orden_id']);
               unset($campos['orden_id']);
            /// modificar($tabla,$campos,$campos_where) 

        $this->sentencias_genericas->modificar('orden',$campos,$campo_update);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado"
        );

        echo json_encode($respuesta);
    }





     function consulta_datos_orden(){
        $datos=$this->orden->detalle_orden($_POST['criterio']);

        $datos_repartidores=$this->orden->repartidores_disponobles();
            $respuesta = array(
            'codigo' => 200,
            'datos_generales' => $datos,
             'datos_repartidores' => $datos_repartidores,
            
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
