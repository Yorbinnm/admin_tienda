<?php

class Login extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('Empleado');
        $this->load->model('Admin');
    }

    public function ingresar($usu, $pass) {
        $resultado = $this->db->select('TU.Clase,U.UsuarioId,U.Usuario,U.Password,U.TipoUsuarioId,TU.Descripcion, S.SucursalId,E.ApellidoPaterno,E.ApellidoMaterno,E.Nombre,S.NombreSucursal')
                ->join('empleado E', 'E.EmpleadoId = U.EmpleadoId', 'inner')
                ->join('sucursal S', 'S.SucursalId = E.SucursalId', 'inner')
                ->join('tipousuario TU', 'TU.TipoUsuarioId = U.TipoUsuarioId', 'inner')
                ->where('U.Usuario', $usu)
               // ->where('E.EstatusId', 1)
                ->where('U.Password', $pass)
                ->get('usuario U');

        if ($resultado->num_rows() == 1) {
            $r = $resultado->row();

            $s_usuario = array(
                's_SucursalId' => $r->SucursalId,
                's_Clase' => $r->Clase,
                's_Sucursal' => $r->NombreSucursal,
                's_TipoUsuarioId' => $r->TipoUsuarioId,
                's_Descripcion' => $r->Descripcion,
                's_UsuarioId' => $r->UsuarioId,
                's_Usuario' => $r->Usuario,
                's_Empleado' => $r->Nombre . ' ' . $r->ApellidoPaterno . '  ' . $r->ApellidoMaterno
            );

            $this->session->set_userdata($s_usuario);
        } else {

            return 0;
        }

        return $resultado->result();
    }

}
