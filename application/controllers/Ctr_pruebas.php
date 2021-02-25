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

   function orden (){
      $fecha_actual=date("Y-m-d") ;
       $anio=date("Y") ;
       $dia=date("z") ;

      $dia=str_pad($dia,3,"0",STR_PAD_LEFT);
     $insert = "INSERT INTO  orden".
     ' ('.
      'venta_id,fecha,dia,anio,ruta_id,direccion,identificador,estatus_id,nombre_cliente'.
      ')'.
     ' VALUES ('.
         '20'.",".
       "'".$fecha_actual."'".",".
       $dia.",".
       $anio."," .
         '2' ."," .

       "'". '2772 Donald Douglas Loop N, Santa Monica, CA 90405'."'"."," .
    "(select  COALESCE(MAX(identificador),0)+1   from orden as x  where anio = '$anio' and   dia='$dia')".",".
    '1'.",".
   
    "'".'Yorbin Nuñez Martinez'."'".

      ')';

    
      $this->db->query($insert);
   
   }

     function index() {
        $this->load->view('formas/home');
   
         }

          function shop() {
        $this->load->view('formas/home');
   
         }
            function contact() {
        $this->load->view('formas/contact');
   
         }




}


