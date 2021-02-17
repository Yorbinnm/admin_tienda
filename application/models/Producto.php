<?php

class Producto extends CI_Model {

    private $productos = array();
    private $categorias = array();

    public function getProductos($SucursalId,$criterio="") {
    $this->db->select(' categoria.CategoriaId,categoria.Descripcion as Categoria,ProductoId,productos.NombreProducto,productos.Precio,productos.EstatusId,productos.SucursalId,productos.Descripcion,estatus.Descripcion as Estatus,estatus.Clase,imagen,peso,sub_categoria');
                        $this->db->join('categoria', 'categoria.CategoriaId = productos.CategoriaId', 'inner');
                         $this->db->join('estatus', 'estatus.EstatusId = productos.EstatusId', 'inner');
                          $this->db->join('sub_categoria', 'sub_categoria.sub_categoria_id = productos.sub_categoria_id
                            ', 'inner');
                         $this->db->where('productos.EstatusId', 1);
                         $this->db->where('productos.SucursalId', $SucursalId);

                         $this->db->order_by('Categoria ', 'Asc');
                           if($criterio!=""){
                                  $this->db->like('productos.NombreProducto', $criterio); 
                                     $this->db->or_like('productos.Descripcion', $criterio); 
                         }
                       $this->db->limit('50');
                         $this->db->order_by('Descripcion ', 'Asc');
                        $this->productos =$this->db->get('productos')->result();


        foreach ($this->productos as $misProductos) {
            $misProductos->Total_categoria = $this->cantProductosxCat($misProductos->CategoriaId);
        }

        return $this->productos;
    }

    public function cantProductosxCat($categoriaId) {
        $total = $this->db->select('count(ProductoId) as Total,CategoriaId')
                        ->where('EstatusId', 1)
                        ->where('CategoriaId', $categoriaId)
                        ->group_by('CategoriaId')
                        ->get('productos')->row()->Total;

        return $total;
    }

    public function Productoid($id) {
        $resultados = $this->db->select('*')
                        ->where('ProductoId', $id)
                        ->get(' productos')->result();

        return $resultados;
    }

 

    public function Producto_infoId($id) {
        $resultados = $this->db->select('ProductoId,productos.NombreProducto,productos.Duracion,productos.Precio,productos.EstatusId,productos.SucursalId,categoria.Descripcion')
                        ->join('categoria', 'categoria.CategoriaId = productos.CategoriaId', 'inner')
                        ->where('ProductoId', $id)
                        ->get(' productos')->result();

        return $resultados;
    }

    public function SumaConstruccion($id) {

        $resultados = $this->db->select('Sum(PrecioPorcion) as total')
                        ->where('ProductoId', $id)
                        ->get(' productosinsumos')->row()->total;

        if ($resultados == "") {
            $resultados = 0;
        }


        return $resultados;
    }

    public function Producto_infoInsumos($id) {
        $resultados = $this->db->select('insumos.InsumoId,DescripcionInsumo,insumos.Unidad,Porcion,PrecioPorcion,PrecioMedida')
                        ->join('insumos', 'insumos.InsumoId = productosinsumos.InsumoId', 'inner')
                        ->where('ProductoId', $id)
                        ->get(' productosinsumos')->result();

        return $resultados;
    }

    public function baja_insumo($id_producto, $id_insumo) {

        $resultados = $this->db->delete('productosinsumos', array('ProductoId' => $id_producto,
            'InsumoId' => $id_insumo));
    }

    public function actualizar($nombre, $descripcion, $duracion, $precio, $estatus, $categoria, $productoId,$cocina) {
        $campos = array(
            'NombreProducto' => $nombre,
            'Descripcion' => $descripcion,
            'Duracion' => $duracion,
            'Precio' => $precio,
            'EstatusId' => $estatus,
            'categoriaId' => $categoria,
            'Ban_pasa_por_cocina'=>$cocina
        );
        //print_r($campos);

        $resultados = $this->db->where('ProductoId', $productoId)
                ->update('productos', $campos);

        // print_r($resultados);
        return $resultados;
    }

    public function GuardaProducto($nombre, $descripcion, $precio, $estatus, $categoria, $sucursal,$imagen,$peso,$sub_categoria_id) {

        $campos = array(
            'NombreProducto' => $nombre,
            'Descripcion' => $descripcion,
            'imagen' => $imagen,
            'Precio' => $precio,
            'EstatusId' => $estatus,
            'categoriaId' => $categoria,
            'SucursalId' => $sucursal,
             'peso' => $peso,
              'sub_categoria_id' => $sub_categoria_id,
        
        );
        $this->db->insert('productos', $campos);
    }

    public function actualizar_insumo_porcion($ProductoId, $InsumoId, $Porcion, $PrecioPor) {
        $campos = array(
            'Porcion' => $Porcion,
            'PrecioPorcion' => $PrecioPor
        );
        $resultados = $this->db->where('ProductoId', $ProductoId)
                ->where('InsumoId', $InsumoId)
                ->update('productosinsumos', $campos);

        return $resultados;
    }

    public function guardar_insumos($ProductoId, $InsumoId, $Porcion, $PrecioPorcion) {
        $campos = array(
            'ProductoId' => $ProductoId,
            'InsumoId' => $InsumoId,
            'Porcion' => $Porcion,
            'PrecioPorcion' => $PrecioPorcion
        );

        $this->db->insert('productosinsumos', $campos);
    }

    function getCategorias($SucursalId,$criterio="") {
       $this->db->select('categoria.CategoriaId,categoria.Descripcion,estatus.EstatusId,estatus.Descripcion as Estatus,detalle_categoria');
                       $this->db->join('estatus', 'estatus.EstatusId =categoria.EstatusId', 'inner');
                       $this->db->where('SucursalId', $SucursalId);
                           if($criterio!=""){
                            // $this->db->like('productos.NombreProducto', $criterio); 
                             $this->db->like('categoria.Descripcion', $criterio); 
                         }
                       
                    $resultados =     $this->db->get('categoria')->result();

        return $resultados;
    }

       function get_sub_categorias($SucursalId,$criterio="") {
       $this->db->select('sub_categoria.*,categoria.CategoriaId,categoria.Descripcion,estatus.EstatusId,estatus.Descripcion as Estatus,detalle_categoria');
                       $this->db->join('sub_categoria', 'sub_categoria.categoria_id =categoria.CategoriaId', 'inner');
                         $this->db->join('estatus', 'estatus.EstatusId =sub_categoria.estatus_id', 'inner');
                       $this->db->where('SucursalId', $SucursalId);
                           if($criterio!=""){
                            // $this->db->like('productos.NombreProducto', $criterio); 
                             $this->db->like('sub_categoria', $criterio); 
                         }
                       
                    $resultados =     $this->db->get('categoria')->result();

        return $resultados;
    }




     function obtien_categoria($SucursalId) {
        $resultados = $this->db->select('categoria.CategoriaId,categoria.Descripcion,estatus.EstatusId,estatus.Descripcion as Estatus,detalle_categoria')
                        ->join('estatus', 'estatus.EstatusId =categoria.EstatusId', 'inner')
                        ->where('SucursalId', $SucursalId)
                        ->get('categoria')->result();

        return $resultados;
    }
      function obtien_subcategoria($id) {
        $resultados = $this->db->select('*')
                        ->where('categoria_id', $id)
                        ->get('sub_categoria')->result();

        return $resultados;
    }

}
