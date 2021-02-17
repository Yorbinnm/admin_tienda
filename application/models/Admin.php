<?php

class Admin extends CI_Model {

    private $ModSub = array();
    private $Modulos = array();
    private $Submodulos = array('submodulo' => '');

    function __construct() {
        parent::__construct();
    }

    function getModulos() {
        $info = $this->session->get_userdata();
        $this->Modulos = $this->db->select('distinct(m.ModuloId),m.Descripcion as Modulo,m.Icono,m.Linck,m.Clase')
                        ->join('modulo m', 'm.ModuloId = um.ModuloId', 'inner')
                        ->join('submodulo sm', 'sm.SubModuloId = um.SubModuloId', 'inner')
                        ->join('tipoUsuario tu', 'tu.TipoUsuarioId = um.TipoUsuarioId', 'inner')
                        ->where('um.TipoUsuarioId', $info['s_TipoUsuarioId'])
                        ->order_by('m.Descripcion', 'Asc')
                        ->get('usuariomodulos um')->result();


        foreach ($this->Modulos as $misModulos) {
            $misModulos->ModSub = $this->getSubModulos($misModulos->ModuloId);
        }
//        print_r($this->Modulos);
        return $this->Modulos;
    }

    function getSubModulos($moduloId) {
        $info = $this->session->get_userdata();
        $this->SubModulos = $this->db->select('m.ModuloId,sm.SubModuloId,sm.Descripcion as Submodulo,sm.Linck,sm.Icon')
                        ->join('modulo m', 'm.ModuloId = um.ModuloId', 'inner')
                        ->join('submodulo sm', 'sm.SubModuloId = um.SubModuloId', 'inner')
                        ->join('tipoUsuario tu', 'tu.TipoUsuarioId = um.TipoUsuarioId', 'inner')
                        ->where('m.ModuloId', $moduloId)
                        ->where('um.TipoUsuarioId', $info['s_TipoUsuarioId'])
                        ->get('usuariomodulos um')->result();

        return $this->SubModulos;
    }

    function infoUser() {
        $info = $this->session->get_userdata();
        // print_r($info['s_UsuarioId']);

        return $info;
    }

}
