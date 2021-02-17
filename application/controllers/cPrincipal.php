<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cPrincipal extends CI_Controller {

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
        $this->load->model('mInsumos');
    }

    function index() {
        $data['totalInsumos'] = $this->mInsumos->totalInsumos($this->user['user']['s_SucursalId']);
        $data['totalProductos'] = $this->mInsumos->totalProductos($this->user['user']['s_SucursalId']);
        $data['stockMinimo'] = $this->mInsumos->stockMinimo($this->user['user']['s_SucursalId']);      
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('lemuria/vPrincipal', $data);
        $this->load->view('layout/footer');
    }

    public function respaldo() {
        $respuesta = $this->mInsumos->Respaldo();

        $re = array(
            'codigo' => 200,
            'mensaje' => "Guardado",
            'contenido' => $respuesta
        );

        echo json_encode($re);
    }

}
