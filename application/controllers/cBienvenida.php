<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cBienvenida extends CI_Controller {

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
    
    
    }

    function index() {
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('general/vBienvenida');
        $this->load->view('layout/footer');
        //echo 'Versión actual de PHP: ' . phpversion();
    }

}
