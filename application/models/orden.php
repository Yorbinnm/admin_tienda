<?php

class orden extends CI_Model {


    function __construct() {
        parent::__construct();
    }

      public function getpendientes($criterio="") {

//LPAD("SQL Tutorial", 20, "ABC")
         $this->db->select('orden.*,ruta.*,ruta.descripcion as cuidad, LPAD(identificador,7,0) as orden_dia,concat(anio,dia,LPAD(identificador,7,0)) as numero_orden_interno');
             if($criterio!=""){
                    $this->db->like('nombre_cliente', $criterio); 
                      $this->db->like('ruta.descripcion', $criterio); 
                         $this->db->like('ruta.cp', $criterio); 
                  //  $this->db->or_like('apellidos', $criterio2); 
           }


             if(is_numeric($criterio)){
                    $this->db->like('concat(anio,dia,LPAD(identificador,7,0)) ', $criterio); 
                   
           }
            $this->db->where('estatus_id', 1); 

          $this->db->join('ruta', 'ruta.ruta_id = orden.ruta_id', 'inner');
          $this->db->order_by('anio,dia,identificador');
         $this->db->limit('50');
          $datos =$this->db->get('orden')->result();
          foreach ($datos as $key => $value) {
          $value->numero_orden_externo=decoct($value->numero_orden_interno);
           $value->numero_order_segmentos=decoct($value->anio). ' - '.decoct($value->dia).' - '.decoct($value->orden_dia);
          }

        return $datos;
    }


      public function getproceso($criterio="") {

//LPAD("SQL Tutorial", 20, "ABC")
         $this->db->select('orden.*,ruta.*,ruta.descripcion as cuidad, LPAD(identificador,7,0) as orden_dia,concat(anio,dia,LPAD(identificador,7,0)) as numero_orden_interno');
             if($criterio!=""){
                    $this->db->like('nombre_cliente', $criterio); 
                      $this->db->like('ruta.descripcion', $criterio); 
                         $this->db->like('ruta.cp', $criterio); 
                  //  $this->db->or_like('apellidos', $criterio2); 
           }


         
            $this->db->where('estatus_id', 2); 

          $this->db->join('ruta', 'ruta.ruta_id = orden.ruta_id', 'inner');
          $this->db->order_by('anio,dia,identificador');
         $this->db->limit('50');
          $datos =$this->db->get('orden')->result();
          foreach ($datos as $key => $value) {
          $value->numero_orden_externo=decoct($value->numero_orden_interno);
           $value->numero_order_segmentos=decoct($value->anio). ' - '.decoct($value->dia).' - '.decoct($value->orden_dia);
          }

        return $datos;
    }


      public function detalle_orden($criterio="") {

//LPAD("SQL Tutorial", 20, "ABC")
         $this->db->select('orden.*,ruta.*,ruta.descripcion as cuidad, LPAD(identificador,7,0) as orden_dia,concat(anio,dia,LPAD(identificador,7,0))as numero_orden_interno');
             if($criterio!=""){
                    $this->db->like('orden_id', $criterio); 
                    
                  //  $this->db->or_like('apellidos', $criterio2); 
           }
            $this->db->where('estatus_id', 1); 

          $this->db->join('ruta', 'ruta.ruta_id = orden.ruta_id', 'inner');
          $this->db->order_by('anio,dia,identificador');
         $this->db->limit('50');
          $datos =$this->db->get('orden')->result();
          foreach ($datos as $key => $value) {
          $value->numero_orden_externo=decoct($value->numero_orden_interno);
           $value->numero_order_segmentos=decoct($value->anio). ' - '.decoct($value->dia).' - '.decoct($value->orden_dia);
          }

        return $datos;
    }


 public function repartidores_disponobles() {
        $resultados = $this->db->select('*')
                        ->join('ruta', 'ruta.ruta_id = ruta_repartidor.ruta_id', 'inner')
                         ->join('repartidor', 'repartidor.repartidor_id = ruta_repartidor.repartidor_id', 'inner')
                        
                        ->get(' ruta_repartidor')->result();

        return $resultados;
    }





      public function getrutas($SucursalId,$criterio="") {
         $this->db->select('*');
             if($criterio!=""){
                    $this->db->like('cp', $criterio); 
                    $this->db->or_like('descripcion', $criterio); 
           }
         $this->db->limit('50');
          $repartidores =$this->db->get('ruta')->result();

        return $repartidores;
    }

        public function obtiene_rutas() {
         $this->db->select('*');
         
         $this->db->limit('50');
          $repartidores =$this->db->get('ruta')->result();

        return $repartidores;
    }


   

}