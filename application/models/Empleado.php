<?php

class Empleado extends CI_Model {

    function guardarEmpleado($apPat, $apMat, $nombre, $tel, $direccion, $email, $sueldo, $estatus, $sucursal, $SucursalId, $Tipo,$funcion_id) {
       
        $datos = array(
            'ApellidoPaterno' => $apPat,
            'ApellidoMaterno' => $apMat,
            'Nombre' => $nombre,
            'Telefono' => $tel,
            'Direccion' => $direccion,
            'Email' => $email,
            'Sueldo' => $sueldo,
            'EstatusId' => $estatus,
            'SucursalId' => $sucursal,
            'Ban_Visible' => 1,
            'FuncionId' => $funcion_id
        );

        $this->db->insert('empleado', $datos);
        $id = $this->db->insert_id();


//hace un llenado en la tabla de acuerdo al registro insertado
        $resultados = $this->db->select('*')
                        ->where('EmpleadoId', $id)
                        ->get('empleado')->result();

        return $resultados;
    }

    function getEmpleados($SucursalId, $tipo) {
        if ($tipo == 1) {
            $Data = $this->db->select('empleado.Ban_Visible,empleado.EmpleadoId, ApellidoPaterno, ApellidoMaterno, Nombre, empleado.Telefono, empleado.Direccion, Email, Sueldo,sucursal.NombreSucursal,estatus.Descripcion,estatus.Clase')
                            ->join('sucursal', 'sucursal.SucursalId = empleado.SucursalId', 'inner')
                            ->join('estatus', 'estatus.EstatusId = empleado.EstatusId', 'inner')
                            ->where('empleado.SucursalId', $SucursalId)
                            ->where('empleado.EstatusId', 1)
                            ->get('empleado')->result();
        } else {
            $Data = $this->db->select('empleado.Ban_Visible,empleado.EmpleadoId, ApellidoPaterno, ApellidoMaterno, Nombre, empleado.Telefono, empleado.Direccion, Email, Sueldo,sucursal.NombreSucursal,estatus.Descripcion,estatus.Clase')
                            ->join('sucursal', 'sucursal.SucursalId = empleado.SucursalId', 'inner')
                            ->join('estatus', 'estatus.EstatusId = empleado.EstatusId', 'inner')
                            ->where('empleado.SucursalId', $SucursalId)
                            ->where('empleado.EstatusId', 1)
                            ->where('Ban_Visible', 1)
                            ->get('empleado')->result();
        }
        return $Data;
    }

    function getSucursal($SucursalId, $tipo) {
        if (($SucursalId == 1) && ($tipo == 1)) {
            $sucursal = $this->db->select('*')
                            ->get('sucursal')->result();
        } else {
            $sucursal = $this->db->select('*')
                            ->where('SucursalId', $SucursalId)
                            ->get('sucursal')->result();
        }
        return $sucursal;
    }




    function comboEstatus() {
        $estatus = $this->db->select('*')
                        ->where('EstatusId >=', 1)
                        ->where('EstatusId <=', 2)
                        ->get('estatus')->result();
        return $estatus;
    }

      function funciones_empleado() {
        $funciones_empleado = $this->db->select('*')
                        
                        ->get('funcion')->result();
        return $funciones_empleado;
    }

    function datos($EmpleadoId) {
        $Da = $this->db->select('empleado.EmpleadoId, ApellidoPaterno, ApellidoMaterno, Nombre, empleado.Telefono, empleado.Direccion, Email, Sueldo, sucursal.SucursalId,sucursal.NombreSucursal,estatus.EstatusId,funcion.FuncionId,funcion.Descripcion as funcion_descripcion')
                        ->join('funcion', 'funcion.FuncionId = empleado.FuncionId', 'left')
                        ->join('sucursal', 'sucursal.SucursalId = empleado.SucursalId', 'inner')
                        ->join('estatus', 'estatus.EstatusId = empleado.EstatusId', 'inner')
                        ->where('EmpleadoId', $EmpleadoId)
                        ->get('empleado')->result();

        return $Da;
    }

    function actualizarEmpleado($Nombre, $ApellidoMaterno, $ApellidoPaterno, $Telefono, $Direccion, $Email, $Sueldo, $EstatusId, $SucursalId, $EmpleadoId,$funcion_id) {

        $campos = array(
            'Nombre' => $Nombre,
            'ApellidoPaterno' => $ApellidoPaterno,
            'ApellidoMaterno' => $ApellidoMaterno,
            'Telefono' => $Telefono,
            'Direccion' => $Direccion,
            'Email' => $Email,
            'Sueldo' => $Sueldo,
            'EstatusId' => $EstatusId,
            'SucursalId' => $SucursalId,
            'EmpleadoId' => $EmpleadoId,
            'FuncionId' => $funcion_id
        );

        $resultados = $this->db->where('EmpleadoId', $EmpleadoId)
                ->update('empleado', $campos);
        return $resultados;
    }

}
