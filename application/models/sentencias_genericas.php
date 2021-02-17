<?php

class sentencias_genericas extends CI_Model {


    function __construct() {
        parent::__construct();
    }

    function insertar($tabla,$datos) {
        $this->db->insert($tabla, $datos);
                $id = $this->db->insert_id();
        return $id;
     }

      function modificar($tabla,$campos_set,$campos_where) {
        $this->db->where($campos_where)
        ->set($campos_set)
        ->update($tabla);

     }

       public function obtener_valores_por_id($tabla,$campo,$id) {
       
        $resultados = $this->db->select('*')
                        ->where($campo, $id)
                        ->get($tabla)->result();

        return $resultados;
    }

   

}
