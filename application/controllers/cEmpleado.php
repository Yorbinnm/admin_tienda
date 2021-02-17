<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cEmpleado extends CI_Controller {

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
        $this->load->model('Empleado');
        $this->load->model('Usuario');
    }

    function index() {
        $data['usuarios'] = $this->Usuario->getUsuarios($this->user['user']['s_SucursalId'], $this->user['user']['s_TipoUsuarioId']);
        $data['empleados'] = $this->Empleado->getEmpleados($this->user['user']['s_SucursalId'], $this->user['user']['s_TipoUsuarioId']);
        $data['sucursal'] = $this->Empleado->getSucursal($this->user['user']['s_SucursalId'], $this->user['user']['s_TipoUsuarioId']);
        $data['estatus'] = $this->Empleado->comboEstatus();
        $data['funcion'] = $this->Empleado->funciones_empleado();
        $data['tipoUser'] = $this->Usuario->getTiposUser($this->user['user']['s_TipoUsuarioId']);
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('lemuria/vEmpleado', $data);
        $this->load->view('layout/footer');
    }

    public function guardarEmpleado() {
        $apPat = $_POST['ApellidoPaterno'];
        $apMat = $_POST['ApellidoMaterno'];
        $nombre = $_POST['Nombre'];
        $tel = $_POST['Telefono'];
        $direccion = $_POST['Direccion'];
        $email = $_POST['Email'];
        $sueldo = $_POST['Sueldo'];
        $estatus = $_POST['EstatusId'];
        $sucursal = $_POST['SucursalId'];

  $FuncionId = $_POST['FuncionId'];
        $SucursalId = $this->user['user']['s_SucursalId'];
        $Tipo = $this->user['user']['s_TipoUsuarioId'];

        $registros = $this->Empleado->guardarEmpleado($apPat, $apMat, $nombre, $tel, $direccion, $email, $sueldo, $estatus, $sucursal,$SucursalId,$Tipo,$FuncionId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );

        echo json_encode($respuesta);
    }

    public function datosEmpleado() {
        $EmpleadoId = $_POST['EmpleadoId'];
        $registros = $this->Empleado->datos($EmpleadoId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );

        echo json_encode($respuesta);
    }

    public function ActualizarEmpleado() {

        $Nombre = $_POST['Nombre'];
        $ApellidoPaterno = $_POST['ApellidoPaterno'];
        $ApellidoMaterno = $_POST['ApellidoMaterno'];
        $Telefono = $_POST['Telefono'];
        $Direccion = $_POST['Direccion'];
        $Email = $_POST['Email'];
        $Sueldo = $_POST['Sueldo'];
        $EstatusId = $_POST['EstatusId'];
        $SucursalId = $_POST['SucursalId'];
        $EmpleadoId = $_POST['EmpleadoId'];
       $FuncionId = $_POST['FuncionId'];
        $registros = $this->Empleado->actualizarEmpleado($Nombre, $ApellidoMaterno, $ApellidoPaterno, $Telefono, $Direccion, $Email, $Sueldo, $EstatusId, $SucursalId, $EmpleadoId,$FuncionId);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $registros
        );
//        print_r($respuesta);
        echo json_encode($respuesta);
    }

}
