<?php

class Usuario extends CI_Model {

    public function guardarUsuario($tipoId, $user, $pass, $EmpleadoId) {
        $campos = array(
            'TipoUsuarioId' => $tipoId,
            'Usuario' => $user,
            'Password' => $pass,
            'EmpleadoId' => $EmpleadoId
        );
        $this->db->insert('usuario', $campos);
        $id = $this->db->insert_id();
        if ($tipoId == 1) {
            $this->updateBanVisibleEmpleado($EmpleadoId);
        }
        //hace un select a tabla de acuerdo al ultimo registro insertado
        $resultados = $this->db->select('*')
                        ->join('tipousuario T', 'T.TipoUsuarioId = U.TipoUsuarioId', 'inner')
                        ->join('empleado E', 'E.EmpleadoId = U.EmpleadoId', 'inner')
                        ->where('UsuarioId', $id)
                        ->get('usuario U')->result();

        return $resultados;
    }

    function updateBanVisibleEmpleado($EmpleadoId) {
        $this->db->where('EmpleadoId', $EmpleadoId)
                ->set('Ban_Visible', 0)
                ->update('empleado');
    }

    public function getUsuarios($SucursalId, $tipo) {
        if (($tipo == 1) && ($SucursalId == 1)) {
            $registro = $this->db->select('*')
                            ->join('tipousuario T', 'T.TipoUsuarioId = U.TipoUsuarioId', 'inner')
                            ->join('empleado E', 'E.EmpleadoId = U.EmpleadoId', 'inner')
                             ->where('E.EstatusId', 1)
                            ->get('usuario U')->result();
        }
        if (($tipo != 1) && ($SucursalId == 1)) {
            $registro = $this->db->select('*')
                            ->join('tipousuario T', 'T.TipoUsuarioId = U.TipoUsuarioId', 'inner')
                            ->join('empleado E', 'E.EmpleadoId = U.EmpleadoId', 'inner')
                            ->where('U.TipoUsuarioId !=', 1)
                             ->where('E.EstatusId', 1)
                            ->where('E.SucursalId', $SucursalId)
                            ->get('usuario U')->result();
        }

        if (($tipo == 1) && ($SucursalId != 1)) {
            $registro = $this->db->select('*')
                            ->join('tipousuario T', 'T.TipoUsuarioId = U.TipoUsuarioId', 'inner')
                            ->join('empleado E', 'E.EmpleadoId = U.EmpleadoId', 'inner')
                            ->where('E.SucursalId', $SucursalId)
                             ->where('E.EstatusId', 1)
                            ->get('usuario U')->result();
        }
        if (($tipo != 1) && ($SucursalId != 1)) {
            $registro = $this->db->select('*')
                            ->join('tipousuario T', 'T.TipoUsuarioId = U.TipoUsuarioId', 'inner')
                            ->join('empleado E', 'E.EmpleadoId = U.EmpleadoId', 'inner')
                            ->where('U.TipoUsuarioId !=', 1)
                             ->where('E.EstatusId', 1)
                            ->where('E.SucursalId', $SucursalId)
                            ->get('usuario U')->result();
        }

        return $registro;
    }

    public function getEmpleadosxS($SucursalId, $tipo) {
        if ($tipo == 1) {
            $Empleados = $this->db->select('empleado.EmpleadoId,ApellidoPaterno,ApellidoMaterno,Nombre,NombreSucursal')
                            ->join('sucursal', 'sucursal.SucursalId=empleado.SucursalId', 'inner')
                            ->order_by('NombreSucursal', 'ASC')
                            ->order_by('ApellidoPaterno', 'ASC')
                             ->where('empleado.EstatusId', 1)
                            ->get('empleado')->result();
        } else {
            $Empleados = $this->db->select('empleado.EmpleadoId,ApellidoPaterno,ApellidoMaterno,Nombre,NombreSucursal')
                            ->join('sucursal', 'sucursal.SucursalId=empleado.SucursalId', 'inner')
                            ->where('empleado.Ban_Visible', 1)
                            ->where('empleado.SucursalId', $SucursalId)
                            ->where('EstatusId', 1)
                            ->order_by('ApellidoPaterno', 'ASC')
                            ->get('empleado')->result();
        }
//        echo '<pre>';
//        print_r($Empleados);
//        echo '</pre>';
        return $Empleados;
    }

    public function getEmpleados($SucursalId) {
        $Empleados = $this->db->select('EmpleadoId,ApellidoPaterno,ApellidoMaterno,Nombre')
                        ->where('SucursalId', $SucursalId)
                        ->get('empleado')->result();

        return $Empleados;
    }

    public function getTiposUser($Tipo) {
        if ($Tipo == 1) {
            $TiposUser = $this->db->select('TipoUsuarioId,Descripcion')
                            ->get('tipousuario')->result();
        } else {
            $TiposUser = $this->db->select('TipoUsuarioId,Descripcion')
                            ->where('TipoUsuarioId !=', 1)
                            ->get('tipousuario')->result();
        }
        return $TiposUser;
    }

    public function datosUsuario($UsuarioId) {
        $resultados = $this->db->select('*')
                        ->join('tipousuario T', 'T.TipoUsuarioId = U.TipoUsuarioId', 'inner')
                        ->join('empleado E', 'E.EmpleadoId = U.EmpleadoId', 'inner')
                        ->where('UsuarioId', $UsuarioId)
                        ->get('usuario U')->result();

        return $resultados;
    }

    public function actualizarUsuario($tipoId, $user, $pass, $EmpleadoId, $UsuarioId) {
        $campos = array(
            'TipoUsuarioId' => $tipoId,
            'Usuario' => $user,
            'Password' => $pass,
            'EmpleadoId' => $EmpleadoId
        );

        $resultados = $this->db->where('UsuarioId', $UsuarioId)
                ->update('usuario', $campos);

        return $resultados;
    }

    public function buscar($criterio) {
        $resultados = $this->db->select('*')
                        ->where('nombre', $criterio)
                        ->get('usuario')->result();

        return $resultados;
    }

}
