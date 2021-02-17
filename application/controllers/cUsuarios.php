<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cUsuarios extends CI_Controller {

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
        $this->load->model('Usuario');
    }

    function index() {
        $data['usuarios'] = $this->Usuario->getUsuarios($this->user['user']['s_SucursalId'],$this->user['user']['s_TipoUsuarioId']);
        $data['empleados'] = $this->Usuario->getEmpleadosxS($this->user['user']['s_SucursalId'],$this->user['user']['s_TipoUsuarioId']);
        $data['tipoUser'] = $this->Usuario->getTiposUser($this->user['user']['s_TipoUsuarioId']);
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('lemuria/vUsuarios', $data);
        $this->load->view('layout/footer');
       // print_r($this->user['user']['s_TipoUsuarioId']);
    }

    public function guardarUsuario() {
        $tipoId = $_POST['TipoUsuarioId'];
        $user = $_POST['Usuario'];
        $pass = $_POST['Password'];
        $EmpleadoId = $_POST['EmpleadoId'];

        $registros = $this->Usuario->guardarUsuario($tipoId, $user, $pass, $EmpleadoId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );

        echo json_encode($respuesta);
    }

    public function datosUsuario() {
        $UsuarioId = $_POST['UsuarioId'];
        $registros = $this->Usuario->datosUsuario($UsuarioId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );

        echo json_encode($respuesta);
    }

    public function actualizarUsuario() {
        $tipoId = $_POST['TipoUsuarioId'];
        $user = $_POST['Usuario'];
        $pass = $_POST['Password'];
        $EmpleadoId = $_POST['EmpleadoId'];
        $UsuarioId = $_POST['UsuarioId'];

        $registros = $this->Usuario->actualizarUsuario($tipoId, $user, $pass, $EmpleadoId, $UsuarioId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );

        echo json_encode($respuesta);
    }

}
