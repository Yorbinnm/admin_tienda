<?php

class Sucursales extends CI_Model {

    function getSucursales($sucursalId) {
        if ($sucursalId == 1) {
            $resultados = $this->db->select('*')
                            ->join('estatus', 'estatus.EstatusId = sucursal.EstatusId', 'inner')
                            ->get('sucursal')->result();
        } else {
            $resultados = $this->db->select('*')
                            ->join('estatus', 'estatus.EstatusId = sucursal.EstatusId', 'inner')
                            ->where('SucursalId', $sucursalId)
                            ->get('sucursal')->result();
        }
        return $resultados;
    }

    function getEstatus() {
        $resultados = $this->db->select('*')
                        ->where('EstatusId >=', 1)
                        ->where('EstatusId <=', 2)
                        ->get('estatus')->result();
        return $resultados;
    }

    function datosSucursal($SucursalId) {
        $resultados = $this->db->select('*')
                        ->join('estatus', 'estatus.EstatusId = sucursal.EstatusId', 'inner')
                        ->where('SucursalId', $SucursalId)
                        ->get('sucursal')->result();

        return $resultados;
    }

    public function guardarSucursal($Nombre, $NombreP, $RFC, $Calle, $Colonia, $Cp, $Ciudad, $Telefono, $Pagina, $EstatusId) {
        $campos = array(
            'NombreSucursal' => $Nombre,
            'SucursalPadre' => $NombreP,
            'RFC' => $RFC,
            'Calle' => $Calle,
            'Colonia' => $Colonia,
            'Cp' => $Cp,
            'Ciudad' => $Ciudad,
            'Telefono' => $Telefono,
            'PaginaWeb' => $Pagina,
            'EstatusId' => $EstatusId
        );

        $this->db->insert('sucursal', $campos);
        $id = $this->db->insert_id();

        //hace un select a tabla de acuerdo al ultimo registro insertado
        $resultados = $this->db->select('*')
                        ->where('SucursalId', $id)
                        ->get('sucursal')->result();

        return $resultados;
    }

    public function actualizarSucursal($SucursalId, $Nombre, $NombreP, $RFC, $Calle, $Colonia, $Cp, $Ciudad, $Telefono, $Pagina, $EstatusId) {
        $campos = array(
            'SucursalId' => $SucursalId,
            'NombreSucursal' => $Nombre,
            'SucursalPadre' => $NombreP,
            'RFC' => $RFC,
            'Calle' => $Calle,
            'Colonia' => $Colonia,
            'Cp' => $Cp,
            'Ciudad' => $Ciudad,
            'Telefono' => $Telefono,
            'PaginaWeb' => $Pagina,
            'EstatusId' => $EstatusId
        );
        $resultados = $this->db->where('SucursalId', $SucursalId)
                ->update('sucursal', $campos);


        return $resultados;
    }

}
