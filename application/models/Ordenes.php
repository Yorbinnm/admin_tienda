<?php

class Ordenes extends CI_Model {

    public function DatosOrdenes() {
        $resultados = $this->db->select('mesas.Descripcion as Mesa, productos.Descripcion as Producto, vp.Nota, estatus.Descripcion as Estatus, vp.VpId, estatus.Clase')
                        ->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner')
                        //->join('vpextras ex','ex.VpExtraId = vp.VpExtraId','inner')
                        ->join('mesas', 'mesas.MesaId = vp.MesaId', 'inner')
                        ->join('estatus', 'estatus.EstatusId = vp.EstatusId', 'inner')
                        ->get('vp vp')->result();

        return $resultados;
    }

    public function Pendiente($VpId) {

        foreach ($VpId as $ids) {
            $resultados = $this->db->where('VpId', $ids)
                    ->where('EstatusId', 3)
                    ->set('EstatusId', 4)
                    ->update('vp');
        }
        return $resultados;
    }

    public function Terminada($VpId) {
        foreach ($VpId as $ids) {
            $resultados = $this->db->where('VpId', $ids)
                    ->where('EstatusId', 4)
                    ->set('EstatusId', 5)
                    ->update('vp');
        }
        return $resultados;
    }

    public function Lista_para_imprimir($VpId){
        $lista=array();
        foreach ($VpId as $ids) {
       $resultados = $this->db->select('productos.ProductoId,VpId,MesaId,productos.Descripcion as Producto')
                        ->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner')
                        ->where('VpId', $ids)
                        ->where('vp.EstatusId', 5)
                        ->get('vp ')->row();
            if( $resultados!="" ){
              $lista[$resultados->MesaId][]=(array)$resultados;  
            }

        }

        $respuesta['bandera']=count($lista)>0?'1':'0';
        $respuesta['lista']=$lista;
        return $respuesta;

    }

    public function getPedidoBebidas($SucursalId,$filtro) {
        $this->db->select('vp.EstatusId,grupo_pedido,Hora,clientes.Cliente,categoria.Subcategoria,mesas.Descripcion as Mesa,estatus.Clase,productos.NombreProducto, productos.Descripcion as Producto, vp.Precio, vp.Nota, estatus.Descripcion as Estatus, productos.ProductoId, vp.VpId, vp.Asiento,Ban_pasa_por_cocina');
                       $this->db->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner');
                       $this->db->join('categoria', 'categoria.CategoriaId = productos.CategoriaId', 'inner');
                       $this->db->join('usuario', 'usuario.UsuarioId = vp.UsuarioId', 'inner');
                        $this->db->join('mesas', 'mesas.MesaId = vp.MesaId', 'left');
                      $this->db->join('clientes', 'clientes.clienteId = vp.MesaId', 'left');
                         $this->db->join('estatus', 'estatus.EstatusId = vp.EstatusId', 'inner');
                        $this->db->where('vp.SucursalId', $SucursalId);
               
                    $this->db->where('vp.EstatusId >=', 3);
                    $this->db->where('vp.EstatusId <=', 4);
                    

                        $this->db->where('Subcategoria', 'Bebidas');
                        $this->db->order_by('vp.Hora', 'Asc');
                       $Pedido =   $this->db->get('vp')->result();


        foreach ($Pedido as $miPedido) {
            $miPedido->pedido = $this->getVpExtras($miPedido->VpId);
        }

        return $Pedido;
    }

    public function getPedidoAlimentos($SucursalId,$filtro ) {
       $this->db->select('vp.EstatusId,grupo_pedido,Hora,clientes.Cliente,categoria.Subcategoria,mesas.Descripcion as Mesa,estatus.Clase,productos.NombreProducto, productos.Descripcion as Producto, vp.Precio, vp.Nota, estatus.Descripcion as Estatus, productos.ProductoId, vp.VpId, vp.Asiento,Ban_pasa_por_cocina');
            $this->db->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner');
            $this->db->join('categoria', 'categoria.CategoriaId = productos.CategoriaId', 'inner');
            $this->db->join('usuario', 'usuario.UsuarioId = vp.UsuarioId', 'inner');
            $this->db->join('mesas', 'mesas.MesaId = vp.MesaId', 'left');
            $this->db->join('clientes', 'clientes.clienteId = vp.MesaId', 'left');
            $this->db->join('estatus', 'estatus.EstatusId = vp.EstatusId', 'inner');
            $this->db->where('vp.SucursalId', $SucursalId);
          
            $this->db->where('vp.EstatusId >=', 3);
            $this->db->where('vp.EstatusId <=', 4);
        
        
            $this->db->where('Subcategoria', 'Alimentos');
            $this->db->order_by('vp.Hora', 'asc');
            $Pedido =  $this->db->get('vp')->result();


        foreach ($Pedido as $miPedido) {
            $miPedido->pedido = $this->getVpExtras($miPedido->VpId);
        }

        return $Pedido;
    }

    public function getVpExtras($VpId) {
        $resultado = $this->db->select("*")
                        ->join("extas", "extas.ExtraId = vpextras.ExtraId", "inner")
                        ->where("vpextras.VpId", $VpId)
                        ->get("vpextras")->result();
        return $resultado;
    }

}
