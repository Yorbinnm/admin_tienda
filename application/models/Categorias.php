<?php

class Categorias extends CI_Model {

    function getCategorias($SucursalId) {
        $resultados = $this->db->select('categoria.CategoriaId,categoria.Descripcion,estatus.EstatusId,estatus.Descripcion as Estatus,estatus.Clase')
                        ->join('estatus', 'estatus.EstatusId =categoria.EstatusId', 'inner')
                        ->join('sucursal', 'sucursal.SucursalId =categoria.SucursalId', 'inner')
                        ->where('categoria.EstatusId', 1)
                        ->where('categoria.SucursalId', $SucursalId)
                        ->get('categoria')->result();
        return $resultados;
    }

    function getEstatus() {
        $resultados = $this->db->select('*')
                        ->where('EstatusId >=', 1)
                        ->where('EstatusId <=', 2)
                        ->get('estatus')->result();
        return $resultados;
    }

    function datosCategoria($CategoriaId, $SucursalId) {
        $resultados = $this->db->select('CategoriaId,categoria.Subcategoria,categoria.CategoriaId,categoria.Descripcion,estatus.EstatusId,estatus.Descripcion as Estatus')
                        ->join('estatus', 'estatus.EstatusId = categoria.EstatusId', 'inner')
                        ->where('CategoriaId', $CategoriaId)
                        ->where('SucursalId', $SucursalId)
                        ->get('categoria')->result();
        return $resultados;
    }

    public function guardarCategoria($Descripcion, $Subcategoria, $SucursalId, $EstatusId,$detalle="") {
        $campos = array(
            'Descripcion' => $Descripcion,
            'Subcategoria' => $Subcategoria,
            'SucursalId' => $SucursalId,
            'EstatusId' => $EstatusId,
        'detalle_categoria' => $detalle
        );
        $this->db->insert('categoria', $campos);
        $id = $this->db->insert_id();

        $resultados = $this->db->select('*')
                        ->where('CategoriaId', $id)
                        ->get('categoria')->result();

        return $resultados;
    }

    public function guardarsub_Categoria($Descripcion, $categoria, $SucursalId, $EstatusId) {
        $campos = array(
            'sub_categoria' => $Descripcion,
             'categoria_id'=>$categoria,
            'sucursal_id' => $SucursalId,
            'estatus_id' => $EstatusId,
    
        );
        $this->db->insert('sub_categoria', $campos);
        $id = $this->db->insert_id();

    }

    public function actualizarCategoria($CategoriaId, $Descripcion, $Subcategoria, $SucursalId, $EstatusId) {
        $campos = array(
            'CategoriaId' => $CategoriaId,
            'Descripcion' => $Descripcion,
            'Subcategoria' => $Subcategoria,
            'SucursalId' => $SucursalId,
            'EstatusId' => $EstatusId
        );

        $resultados = $this->db->where('CategoriaId', $CategoriaId)
                ->update('categoria', $campos);
        return $resultados;
    }

    public function verificarCategoria($CategoriaId) {
        $resultado = $this->db->select('count(ProductoId) as Cantidad')
                        ->where('categoriaId', $CategoriaId)
                        ->where('EstatusId', 1)
                        ->get('productos')->row()->Cantidad;
        return $resultado;
    }

    public function Eliminar($CategoriaId) {
        $resultado = $this->db->where('CategoriaId', $CategoriaId)
                ->delete('categoria');
        return $resultado;
    }

}
