<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class cLogin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Login');
        $this->load->model('Admin');
    }

    public function index() {
        $data['mensaje'] = '';
        $info = $this->session->get_userdata();
        if (is_array($info)) {
            if (isset($info['s_UsuarioId']) && $info['s_UsuarioId'] = !"") {
                redirect(base_url() . 'cBienvenida');
            } else {
                $this->load->view('general/vLogin', $data);
            }
        }
    }

    public function ingresar() {
        $usu = $this->input->post('txtUsuario');
        $pass = $this->input->post('txtClave');
        if (isset($res)) {
            $res = $res;
        } else {
            $res = "";
        }
        if ($usu != "" && $pass != "") {
            $res = $this->Login->ingresar($usu, $pass);
        }
        $respuesta = json_decode(json_encode($res), true);


        if ($res != NULL) {
            if ($respuesta[0]['TipoUsuarioId'] == 3) {
                redirect(base_url() . 'cCaja');
            }if ($respuesta[0]['TipoUsuarioId'] == 4) {
                redirect(base_url() . 'cVenta');
            } else {
                redirect(base_url() . 'cBienvenida');
            }
        } else {
            $data['mensaje'] = "Datos erroneos";
            $this->load->view('general/vLogin', $data);
        }
    }

    public function cerrar_sesion() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

}
