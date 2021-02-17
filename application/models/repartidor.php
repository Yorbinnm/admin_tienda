<?php

class repartidor extends CI_Model {


    function __construct() {
        parent::__construct();
    }

      public function getrepartidor($SucursalId,$criterio="") {
         $this->db->select('*');
             if($criterio!=""){
                    $this->db->like('nombre', $criterio); 
                    $this->db->or_like('apellidos', $criterio); 
           }
         $this->db->limit('50');
          $repartidores =$this->db->get('repartidor')->result();

        return $repartidores;
    }

      public function rutas_repartidor($id) {
        $resultados = $this->db->select('*')
                        ->join('ruta', 'ruta.ruta_id = ruta_repartidor.ruta_id', 'inner')
                        ->where('repartidor_id', $id)
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