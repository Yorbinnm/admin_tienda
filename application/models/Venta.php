<?php

class Venta extends CI_Model {

    public $pedido = array();

    public function getCategorias($SucursalId) {
        $resultados = $this->db->select('categoria.CategoriaId,categoria.Descripcion,estatus.EstatusId,estatus.Descripcion as Estatus')
                        ->join('estatus', 'estatus.EstatusId =categoria.EstatusId', 'inner')
                        ->join('sucursal', 'sucursal.SucursalId =categoria.SucursalId', 'inner')
                        ->where('categoria.EstatusId', 1)
                        ->where('categoria.SucursalId', $SucursalId)
                        ->order_by('Descripcion', 'Asc')
                        ->get('categoria')->result();
        return $resultados;
    }

    public function getProductos($SucursalId) {
        $resultados = $this->db->select('productos.*')
                        ->join('productosinsumos', 'productosinsumos.ProductoId=productos.ProductoId', 'inner')
//                        ->join('insumos', 'insumos.InsumoId=productosinsumos.InsumoId', 'inner')
                        ->where('productos.EstatusId', 1)
                        ->where('productos.SucursalId', $SucursalId)
                        ->group_by('ProductoId,NombreProducto,Descripcion,Duracion,Precio,EstatusId,SucursalId,categoriaId')
                        ->order_by('NombreProducto', 'ASC')
                        ->get('productos')->result();

        return $resultados;
    }

    public function guardarPedido($campos) {
        foreach ($campos as $reg) {
            $resultado = $this->db->insert('vp', $reg);
            $id = $this->db->insert_id();
        }

        $resultado = $this->db->select('*')
                        ->where('VpId', $id)
                        ->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner')
                        ->get('vp')->result();

        return $resultado;
    }

    public function getPedido($MesaId, $SucursalId, $UsuarioId) {
        $Pedido = $this->db->select('productos.Ban_pasa_por_cocina,productos.NombreProducto, productos.NombreProducto as Producto, vp.Precio, vp.Nota, estatus.Descripcion as Estatus, productos.ProductoId, vp.VpId, vp.Asiento')
                        ->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner')
                        ->join('usuario', 'usuario.UsuarioId = vp.UsuarioId', 'inner')
                        ->join('mesas', 'mesas.MesaId = vp.MesaId', 'left')
                        ->join('estatus', 'estatus.EstatusId = vp.EstatusId', 'inner')
                        ->where('vp.MesaId', $MesaId)
                        ->where('vp.SucursalId', $SucursalId)
//                        ->where('vp.UsuarioId', $UsuarioId)
                        ->where('vp.EstatusId', 9)
                        ->order_by('Asiento', 'Asc')
                        ->get('vp')->result();


        foreach ($Pedido as $miPedido) {
            $miPedido->pedido = $this->getVpExtras($miPedido->VpId);
        }

        return $Pedido;
    }

    public function getPedidoOrdenado($MesaId, $SucursalId, $UsuarioId) {
        $estatus = array(3, 4, 5);

        $Pedido = $this->db->select('vp.OrdenVenta,estatus.EstatusId,estatus.Clase,productos.Descripcion, productos.NombreProducto as Producto, vp.Precio, vp.Nota, estatus.Descripcion as Estatus, productos.ProductoId, vp.VpId, vp.Asiento')
                        ->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner')
                        ->join('usuario', 'usuario.UsuarioId = vp.UsuarioId', 'inner')
                        ->join('mesas', 'mesas.MesaId = vp.MesaId', 'inner')
                        ->join('estatus', 'estatus.EstatusId = vp.EstatusId', 'inner')
                        ->where('vp.MesaId', $MesaId)
                        ->where('vp.SucursalId', $SucursalId)
//                        ->where('vp.UsuarioId', $UsuarioId)
                        ->where_in('vp.EstatusId', $estatus)
//                        ->where('vp.EstatusId <=', 4)
//                        ->where_or('vp.EstatusId', 4)
//                        ->group_by('vp.OrdenVenta,estatus.EstatusId,estatus.Clase,productos.Descripcion, productos.NombreProducto, vp.Precio, vp.Nota, estatus.Descripcion, productos.ProductoId, vp.VpId, vp.Asiento')
                        ->order_by('Asiento', 'Asc')
                        ->get('vp')->result();




        foreach ($Pedido as $miPedido) {
            $miPedido->pedido = $this->getVpExtras($miPedido->VpId);
        }
       
        $respuesta['Pedido']=$Pedido;
        $respuesta['Total'] = $this->getTotal($MesaId, $SucursalId);

  
        
        
        return $respuesta;
    }

    public function getTotal($MesaId, $SucursalId) {
        $estatus = array(3, 4, 5,10);
        $totales = $this->db->select('vp.Precio as PrecioProducto,vpextras.Precio as PrecioExtra ,vp.VpId')
                        ->join('vpextras', 'vpextras.VpId = vp.VpId', 'left')
                        ->where_in('vp.EstatusId', $estatus)
                        ->where('vp.MesaId', $MesaId)
                        ->where('vp.SucursalId', $SucursalId)
                        ->get('vp')->result();


$resultado=array();
$totalE=0;
$totalP=0;
$listaContados=array();
foreach ($totales as $key => $value) {
     if(!isset($listaContados[$value->VpId])){
      $totalP=$totalP+$value->PrecioProducto;
        $listaContados[$value->VpId]=$value->VpId;
       }
    if($value->PrecioExtra!=""){
       $totalE=$totalE+$value->PrecioExtra;
     }
     }

    $resultado[]=(object)array(
     'TotalProductos'=>$totalP,
     'TotalExtras'=>$totalE
    );

    
      
      // print_r($resultado);
        return $resultado;
    }

    public function getPedidoOrdenadocliente($MesaId, $SucursalId, $UsuarioId) {
        $estatus = array(3, 4, 10, 5);
        $Pedido = $this->db->select('estatus.EstatusId,estatus.Clase,productos.Descripcion, productos.NombreProducto as Producto, vp.Precio, vp.Nota, estatus.Descripcion as Estatus, productos.ProductoId, vp.VpId, vp.Asiento')
                        ->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner')
                        ->join('usuario', 'usuario.UsuarioId = vp.UsuarioId', 'inner')
                        ->join('clientes', 'clientes.ClienteId = vp.MesaId', 'inner')
                        ->join('estatus', 'estatus.EstatusId = vp.EstatusId', 'inner')
                        ->where('vp.MesaId', $MesaId)
                        ->where('vp.SucursalId', $SucursalId)
//                        ->where('vp.UsuarioId', $UsuarioId)
                        //->where('vp.EstatusId >=', 3)
                        ->where_in('vp.EstatusId', $estatus)
                        //->where('vp.EstatusId <=', 4)
//                        ->where_or('vp.EstatusId', 4)
                        ->order_by('Hora', 'Asc')
                        ->get('vp')->result();
     
        foreach ($Pedido as $miPedido) {
            $miPedido->pedido = $this->getVpExtras($miPedido->VpId);
        }
       $respuesta['Pedido']=$Pedido;
        $respuesta['Total'] = $this->getTotal($MesaId, $SucursalId);
        
        return $respuesta;
    }

    public function getPedidoTerminado($MesaId, $SucursalId, $UsuarioId) {
        $In = array(3, 4, 5, 10);
        $Pedido = $this->db->select('estatus.EstatusId,productos.Descripcion, productos.NombreProducto as Producto, vp.Precio, vp.Nota, estatus.Descripcion as Estatus, productos.ProductoId, vp.VpId, vp.Asiento')
                        ->join('productos', 'productos.ProductoId = vp.ProductoId', 'inner')
                        ->join('usuario', 'usuario.UsuarioId = vp.UsuarioId', 'inner')
                        ->join('mesas', 'mesas.MesaId = vp.MesaId', 'left')
                        ->join('estatus', 'estatus.EstatusId = vp.EstatusId', 'inner')
                        ->where('vp.MesaId', $MesaId)
                        ->where('vp.SucursalId', $SucursalId)
                        ->where_in('vp.EstatusId', $In)
                        ->where('vp.OrdenVenta', "")
                        ->order_by('Asiento', 'Asc')
                        ->get('vp')->result();


        foreach ($Pedido as $miPedido) {
            $miPedido->pedido = $this->getVpExtras($miPedido->VpId);
        }

        return $Pedido;
    }

    public function borrarProducto($VpId) {
        $resultado = $this->db->where('VpId', $VpId)
                ->delete('vp');

        $this->borrar_extra($VpId);
        return $resultado;
    }

    public function borrar_extra($VpId) {
        $resultado = $this->db->where('VpId', $VpId)
                ->delete('vpextras');
    }

    public function actualizarEstatus($VpId) {
        $valor = false;
        $numeros = array(3, 9, 10);

        $resultado = $this->db->select('*')
                        ->where('vp.VpId', $VpId)
                        ->where_in('vp.EstatusId', $numeros)
                        ->get('vp')->result();


        if (count($resultado) > 0) {
            $valor = true;
            $this->db->where_in('EstatusId', $numeros)
                    ->where('VpId', $VpId)
                    ->delete('vp');
            $this->borrar_extra($VpId);
        } else {
            $valor = false;
        }
        return $valor;
    }

    public function CancelarPedido($campos) {
        $valor = false;
        $ban_Noejecutar = 1;
      
        foreach ($campos as $item) {
              
            if ($item['EstatusId'] != 3 && $item['EstatusId'] != 10  ) {
                       
                $ban_Noejecutar = 1;
            } else {
                $ban_Noejecutar = 0;
            }
        }
     
        if ($ban_Noejecutar == 0) {
            foreach ($campos as $item) {
                $this->db->where('VpId', $item['VpId'])
                        ->set('EstatusId', 6)
                        ->update('vp');
            }
            $valor = true;
        }
       
        return $valor;
    }

    public function noAsientos($MesaId, $SucursalId) {
        $resultado = $this->db->select('Asientos')
                        ->where('MesaId', $MesaId)
                        ->where('SucursalId', $SucursalId)
                        ->get('mesas')->row();

        return $resultado;
    }

    public function actualizaStock($ids) {
        $resProductoInsumo = $this->db->select(' productosinsumos.ProductoId, productosinsumos.InsumoId, sum(productosinsumos.Porcion) as Porcion, insumos.Stock')
                        ->where_in('ProductoId', $ids)
                        ->where('Insumos.Stock >', 0)
                        ->join('insumos', 'insumos.InsumoId = productosinsumos.InsumoId', 'inner')
                        ->group_by('productosinsumos.InsumoId, insumos.Stock')
                        ->get('productosinsumos')->result();

        $temp = json_decode(json_encode($resProductoInsumo), true);
        //  print_r($temp);
        return $temp;
    }

    public function aumentarstock($InsumoId, $StockActual) {

        $resultado = $this->db->where('InsumoId', $InsumoId)
                ->set('Stock', $StockActual)
                ->update('insumos');

        return $resultado;
    }

    public function getProductosIds($ids) {
        $resultado = $this->db->select('ProductoId')
                        ->where_in('VpId', $ids)
                        ->get('vp')->result();


        $temp = json_decode(json_encode($resultado), true);
        $result = "";
        foreach ($temp as $item) {
            $result[] = $item['ProductoId'];
        }

//echo '<pre>';
//print_r($temp);
//echo '</pre>';
        return $result;
    }

    public function getExtrasIds($VpId) {
        $resultado = $this->db->select('ExtraId')
                        ->join('vpextras', 'vpextras.VpId=vp.VpId', 'inner')
                        ->where('vp.VpId', $VpId)
                        ->get('vp')->result();


        $temp = json_decode(json_encode($resultado), true);

        return $temp;
    }

    public function actualizaStockExtras($id) {
        $resExtraInsumo = $this->db->select('extas.ExtraId, extas.InsumoId, sum(extas.Porcion) as Porcion, insumos.Stock')
                        ->where_in('ExtraId', $id)
                        ->where('Insumos.Stock >', 0)
                        ->join('insumos', 'insumos.InsumoId = extas.InsumoId', 'inner')
                        ->group_by('extas.ExtraId,extas.InsumoId, insumos.Stock')
                        ->get('extas')->result();


        $temp = json_decode(json_encode($resExtraInsumo), true);
//        print_r($temp);
        return $temp;
    }

    function bajaStock($item) {
        $valor = 0;
        if ($item['Stock'] >= $item['Porcion']) {
            $resultado = $this->db->where('InsumoId', $item['InsumoId'])
//                    ->where($item['Stock'] . '>=', $item['Porcion'])
                    ->set('Stock', $item['Stock'] - $item['Porcion'])
                    ->update('insumos');
            $valor = 1;
        } else {
            $valor = 0;
        }

        return $valor;
    }

    function getMesas($SucursalId) {
        $resultado = $this->db->select('mesas.MesaId, mesas.Descripcion, Asientos, mesas.EstatusId, mesas.SucursalId, mesas.Class, estatus.Descripcion as Estatus ,mesas.EstatusIdMesa,HoraLimiteAtencion')
                        ->join('estatus', 'estatus.EstatusId = mesas.EstatusId', 'inner')
                        ->where('mesas.EstatusIdMesa', 1)
                        ->where('mesas.SucursalId', $SucursalId)
                        ->get('mesas')->result();

        return $resultado;
    }

    function cargaMesa($MesaId) {
        $mesa = $this->db->select('MesaId, Descripcion')
                        ->where('MesaId', $MesaId)
                        ->get('mesas')->result();
//        print_r($mesa);

        return $mesa;
    }

    function cargacliente($Id) {
        $mesa = $this->db->select('ClienteId as MesaId, Cliente as Descripcion')
                        ->where('ClienteId', $Id)
                        ->get('clientes')->result();
//        print_r($mesa);

        return $mesa;
    }

    function esCliente($Id) {
        $mesa = $this->db->select('ClienteId as MesaId, Cliente as Descripcion')
                        ->where('ClienteId', $Id)
                        ->get('clientes')->row();
//        print_r($mesa);

        return $mesa;
    }
      public function uid() {
        $this->load->library('uuid');
        $id = $this->uuid->v4();
        $id = str_replace('-', '', $id);
        $resultados = $id;

        return $resultados;
    }

    function actualizarPedido($MesaId, $SucursalId, $UsuarioId, $Campos) {
        $validacliente = $this->esCliente($MesaId);
        if (isset($validacliente->MesaId)) {
            foreach ($Campos as $miCampo => $valor) {
                $Campos[$miCampo]['EstatusId'] = 10;
            }
        }
             date_default_timezone_set('America/Mexico_City');
        setlocale(LC_TIME, 'es_MX.UTF-8');
        $hora_actual = strftime("%H:%M:%S");
        $grupo_pedido=$this->uid();

        foreach ($Campos as $miCampo) {
            $datos = array(
                'VpId' => $miCampo['VpId'],
                'EstatusId' => $miCampo['EstatusId'],
                'Hora'=>$hora_actual,
                'grupo_pedido'=>$grupo_pedido
            );

            $res = $this->db->set($datos)
                    ->where('VpId', $miCampo['VpId'])
                    ->where('MesaId', $MesaId)
                    ->where('UsuarioId', $UsuarioId)
                    ->where('SucursalId', $SucursalId)
                    ->update('vp');
        }
        return $res;
    }

    function cambiarEstatusMesaA($MesaId, $SucursalId) {
        $res = $this->db->where('MesaId', $MesaId)
                ->where('SucursalId', $SucursalId)
                ->set('EstatusId', 7)
                ->set('Class', 'small-box bg-aqua-gradient')
                ->update('mesas');

        return $res;
    }

    public function ActualizarPedidoNota($VpId, $Nota, $miNotaId) {
        $valor = false;
        $Misnotas = $this->Misnotas($VpId);
        $valores = json_decode($Misnotas->Nota);
        $MiJson = json_decode(json_encode($valores), true);

        $MiJson[] = array(
            'Idnota' => $miNotaId,
            'label' => $Nota
        );
        $numeros = array(3, 9, 4, 10);

        $resultado = $this->db->select('*')
                        ->where('vp.VpId', $VpId)
                        ->where_in('vp.EstatusId', $numeros)
                        ->get('vp')->result();
//        print_r($resultado);
        if (count($resultado) > 0) {
            $valor = true;
            $this->db->where('VpId', $VpId)
                    ->set('Nota', json_encode($MiJson))
                    ->update('vp');
        }
//        $MiJson['valor'] =  $valor;
        $miValor = array('valor' => $valor);
        $MiJson = array_merge($miValor, $MiJson);
//          print_r($MiJson);

        return $MiJson; //$MiJson;
    }

    function Misnotas($criterio) {
        $resultado = $this->db->select("Nota")
                        ->where('VpId', $criterio)
                        ->get("vp")->row();

        // print_r($resultado);
        return $resultado;
    }

    function getExtras($criterio, $SucursalId) {
        $resultado = $this->db->select("ExtraId,concat(ExtraId,' - ',Descripcion) as Extra, Precio")
                        ->like("concat(ExtraId,' - ',Descripcion)", $criterio)
                        ->limit(5)
                        ->where('SucursalId', $SucursalId)
                        ->where('EstatusId', 1)
                        ->get("extas")->result();

        return $resultado;
    }
    

    function getNotas($criterio, $SucursalId) {
        $resultado = $this->db->select("NotaId,concat(NotaId,' - ',Descripcion) as Nota")
                        ->like("concat(NotaId,' - ',Descripcion)", $criterio)
                        ->limit(5)
                        ->where('SucursalId', $SucursalId)
                        ->get("notas")->result();

        return $resultado;
    }

    public function guardarExtra($miExtraId, $mivpId, $Precio) {
        $valor = false;
        $campos = array(
            'ExtraId' => $miExtraId,
            'VpId' => $mivpId,
            'Precio' => $Precio
        );
        $numeros = array(3, 4, 9, 10, 5);
        $resultado = $this->db->select('*')
                        ->where('vp.VpId', $mivpId)
                        ->where_in('vp.EstatusId', $numeros)
                        ->get('vp')->result();

//        
        if (count($resultado) > 0) {
            $valor = true;
            $this->db->insert('vpextras', $campos);
        } else {
            $valor = false;
        }
        return $valor;
    }

    public function getVpExtras($VpId) {
        $resultado = $this->db->select("*")
                        ->join("extas", "extas.ExtraId = vpextras.ExtraId", "inner")
                        ->where("vpextras.VpId", $VpId)
                        ->get("vpextras")->result();
        return $resultado;
    }

    public function BorraExtra($VpExtraId) {
        $this->db->where("VpExtraId", $VpExtraId)
                ->delete("vpextras");
    }

    function cambiarEstatusProducto($VpId, $MesaId, $SucursalId, $CuentaId) {
        $res = $this->db->where('MesaId', $MesaId)
                ->where('SucursalId', $SucursalId)
                ->where_in('VpId', $VpId)
                ->set('ban_pago', 0)
                ->set('OrdenVenta', $CuentaId)
                ->update('vp');

        return $res;
    }

    function cambiarbanderapago($CuentaId) {
        $res = $this->db->where('OrdenVenta', $CuentaId)
                ->set('ban_pago', 1)
                ->update('vp');

        return $res;
    }

    public function getNotasedita($VpId) {
        $resultado = $this->db->select("Nota")
                        ->where("VpId", $VpId)
                        ->get("vp")->row();
        return $resultado;
    }

    public function GuardarPromo($Promocion_id, $CuentaId) {
        $campos = array(
            'PromocionId' => $Promocion_id,
            'CuentaId' => $CuentaId
        );

        $this->db->insert('cuenta_promocion_aplicar', $campos);
    }

    public function hayReservaciones($MesaId, $SucursalId, $Hora, $FechaActual) {
        $valor = true;
        $resultados = $this->db->select('*')
                        ->where('MesaId', $MesaId)
                        ->where('SucursalId', $SucursalId)
                        ->where('EstatusId', 15)
                        ->get('reservaciones')->result();
        $respuesta = array(
            'codigo' => 200,
            'hora' => ""
        );
        foreach ($resultados as $miRes) {
            $horaFormateada = $miRes->HoraIni;
            $horaFormateada = strtotime($horaFormateada);
            $horaFormateada = date("H.i", $horaFormateada);


            $horaFormateada2 = $miRes->HoraFin;
            $horaFormateada2 = strtotime($horaFormateada2);
            $horaFormateada2 = date("H.i", $horaFormateada2);

            if ($miRes->Fecha == $FechaActual) {
                $tiempo2 = $horaFormateada2 - $Hora;
                $tiempo = $horaFormateada - $Hora;

//               print_r($horaFormateada);
//               print_r($tiempo );
                if (($tiempo <= 2 || $tiempo2 <= 4) && $tiempo > 0) {
                    $respuesta['codigo'] = 500;
                    $respuesta['hora'] = $miRes->HoraIni . ' - ' . $miRes->HoraFin;
                }
            }
        }
        return $respuesta;
    }

    public function checarLimiteHora($MesaId, $SucursalId, $HoraSistema) {
        $horaAtencion = $this->db->select('HoraLimiteAtencion')
                        ->where('SucursalId', $SucursalId)
                        ->where('MesaId', $MesaId)
                        ->get('mesas')->row()->HoraLimiteAtencion;
        $respuesta = array(
            'codigo' => 0,
            'hora' => ""
        );

//        print_r('sistema '.$HoraSistema) . ' ';
//        print_r('atencion '.$horaAtencion);
        if ($HoraSistema > $horaAtencion) {
            $respuesta['codigo'] = 500;
            $respuesta['hora'] = $horaAtencion;
        } else {
            $respuesta['codigo'] = 200;
            $respuesta['hora'] = $horaAtencion;
        }

        return $respuesta;
    }

    function buscarProductoCategoria($CategoriaId) {
        $resultados = $this->db->select('productos.*')
                        ->join('productosinsumos', 'productosinsumos.ProductoId=productos.ProductoId', 'inner')
                        ->where('productos.EstatusId', 1)
                        ->where('productos.CategoriaId', $CategoriaId)
                        ->group_by('ProductoId,NombreProducto,Descripcion,Duracion,Precio,EstatusId,SucursalId,categoriaId')
                        ->order_by('NombreProducto', 'ASC')
                        ->get('productos')->result();
        return $resultados;
    }

    function comprobarEstatusMesas($SucursalId) {
        $resultado = $this->db->select('MesaId,SucursalId')
                        ->where('SucursalId', $SucursalId)
                        ->group_by('MesaId,SucursalId')
                        ->get('vp')->result();
        //print_r($resultado);

        $this->cambiarEstatusMesaLibre();

        foreach ($resultado as $miMesa) {
            $this->cambiarEstatusMesa($miMesa->MesaId, $miMesa->SucursalId);
        }

        return $resultado;
    }

    function cambiarEstatusMesa($MesaId, $SucursalId) {
        $this->db->where('MesaId', $MesaId)
                ->where('SucursalId', $SucursalId)
                ->set('EstatusId', 8)
                ->set('Class', 'small-box bg-red-gradient')
                ->update('mesas');

        // return $resultados;
    }

    function ActualizaNotas($vp, $valor) {
        $this->db->where('VpId', $vp)
                ->set('Nota', $valor)
                ->update('vp');

        // return $resultados;
    }

    function cambiarEstatusMesaLibre() {
        $this->db->set('EstatusId', 7)
                ->set('Class', 'small-box bg-aqua-gradient')
                ->update('mesas');

        // return $res;
    }

    function Guarda_Venta($datos) {
        $this->db->insert('ventas', $datos);
        return $this->db->insert_id();
    }

    function Guarda_Venta_detalle($datos) {
        $this->db->insert('detalleventa', $datos);
    }

    function Limpia_vp($Id) {
        $this->db->where('OrdenVenta', $Id)
                ->delete('vp');
    }

    function actualizaAsiento($vpId, $Asiento) {
        $resultado = $this->db->where('VpId', $vpId)
                ->set('Asiento', $Asiento)
                ->update('vp');

        return $resultado;
    }

    function LimpiarVP($MesaId) {
        $valor = 0;
        $res = $this->db->where('MesaId', $MesaId)
                        ->where('ban_pago', 1)
                        ->where('EstatusId', 5)
                        ->get('vp')->result();

        if (count($res) > 0) {
            $this->db->where('MesaId', $MesaId)
                    ->where('ban_pago', 1)
                    ->where('EstatusId', 5)
                    ->delete('vp');
            $valor = 1;
        } else {
            $valor = 0;
        }

        return $valor;
    }

    function limpiarPcancelados($VpId) {
        $this->db->where('VpId', $VpId)
                ->delete('vp');
        $this->borrar_extra($VpId);
    }

    //verifica que cada producto tenga suficiente insumo en stock
    function verificarProducto($ProductoId) {
        $resultado = $this->db->select('*')
                        ->join('insumos', 'insumos.InsumoId=productosinsumos.InsumoId', 'inner')
                        ->where('ProductoId', $ProductoId)
                        ->get('productosinsumos')->result();
        //print_r($resultado);
        return $resultado;
    }

    function EstatusMesa($MesaId) {
        $resultado = $this->db->select('EstatusId')
                        ->where('MesaId', $MesaId)
                        ->get('mesas')->row()->EstatusId;
        //print_r($resultado);
        return $resultado;
    }

    function DisponiblesCocina($id) {
         $productos = $this->db->select('VpId,Ban_pasa_por_cocina')
                        ->join('vp', 'vp.ProductoId = productos.ProductoId', 'inner')
                        ->where('OrdenVenta', $id)
                         ->where('vp.EstatusId', 10)
                        ->get('productos')->result();

                             

            foreach ($productos as $key => $valor) {
                $estatus=3;
                if($valor->Ban_pasa_por_cocina==2){
                 $estatus=4;   
                }
                 $this->db->where('VpId', $valor->VpId)
                ->set('EstatusId',$estatus )
                ->update('vp');
            }
       
    }

  

    function Unificar($id, $sucursal) {
        $nuevoId = $this->uid();

        $this->db->where('MesaId', $id)
                ->where('SucursalId', $sucursal)
                ->where('EstatusId', 10)
                ->where("ban_pago", 0)
                ->set('OrdenVenta', $nuevoId)
                ->update('vp');

        return $nuevoId;
    }

    function vpMesa($MesaId, $SucursalId) {
        $resultado = $this->db->select('count(VpId) as total')
                        ->where('MesaId', $MesaId)
                        ->where('SucursalId', $SucursalId)
                        ->get('vp')->row()->total;

        return $resultado;
    }

    function Enviococina($id) {
        $this->db->where('OrdenVenta', $id)
                ->where('EstatusId', 10)
                ->where("ban_pago", 0)
                ->set('EstatusId', 3)
                ->update('vp');
    }

      function cancelarorden($id) {
        $this->db->where('OrdenVenta', $id)
               // ->where('EstatusId', 10)
                ->where("ban_pago", 0)
                ->set('OrdenVenta',"")
                ->update('vp');
    }


     public function ProductoPorId($id) {
        $resultados = $this->db->select('*')
                        ->where('ProductoId', $id)
                        ->get(' productos')->row();

        return $resultados;
    }

    public function CambioProducto($vpId, $Producto) {
        $producto=$this->ProductoPorId($Producto);
      // print_r($producto);
       $update=array(
        'ProductoId'=>$producto->ProductoId,
        'Precio'=>$producto->Precio
       );

        $this->db->where('VpId', $vpId)
                
                ->set($update)
                ->update('vp');

    
    }

}
