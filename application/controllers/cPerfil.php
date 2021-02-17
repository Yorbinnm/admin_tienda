<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cPerfil extends CI_Controller {

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
        $this->load->model('mCaja');
        $this->user['cta'] = $this->mCaja->verCuentas($this->user['user']['s_SucursalId']);
///       dfdfsdfsdfdsf           fasfasfasfas echo "wwewe";
        //Cargar el modelo de la clase
        $this->load->model('mPerfil');
    }

    function index() {
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('lemuria/vCambiarContra');
        $this->load->view('layout/footer');
    }

    public function comprobarPass() {
        $user = $_POST['UsuarioId'];
        $pass = $_POST['Password'];
        $resultado = $this->mPerfil->comprobarPass($user, $pass);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $resultado
        );
        if (count($resultado) == 0) {
            $respuesta['codigo'] = 500;
        } else {
            $respuesta['codigo'] = 200;
        }

        echo json_encode($respuesta);
    }

    function CambiarPass() {
        $usuarioId = $_POST['UsuarioId'];
        $Password = $_POST['Password'];
        $resultado = $this->mPerfil->CambiarPass($usuarioId, $Password);

        $respuesta = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $resultado
        );

        echo json_encode($respuesta);
    }

}
