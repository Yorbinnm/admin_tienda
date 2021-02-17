<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ctr_pruebas extends CI_Controller {

    private $user;
    private $modulos;

    function __construct() {
        parent::__construct();
      
    }

  




        function extras() {
        $resultado = $this->db->select("count(InsumoId) as contador , InsumoId,Descripcion")
        ->group_by("InsumoId,Descripcion")
         ->order_by("count(InsumoId) desc")
            ->get("extas")->result();

            echo "<pre>";
           print_r(  $resultado);

           echo "</pre>";


    }



      function codificicar(){
        $cadena = "2019_2645";
   
         echo "<pre>";
            print_r( "$cadena");

           echo "</pre>";

         $codificado = rtrim( strtr( base64_encode( $cadena ), '+/', '-_'), '=');

        $original=base64_decode( strtr( $codificado, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $codificado )) % 4 ));
        // $codificado = base64_encode($cadena);
      
           echo "<pre>";
          print_r( "$cadena en base64 es $codificado");

           echo "</pre>";

   

          echo "<pre>";
             print_r( "real es $original");

           echo "</pre>";
      }

    
  function index() {

        $this->load->view('lemuria/pruebas');
    }






}
