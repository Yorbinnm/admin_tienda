<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//Cargar el modelo de la clase




class descuentos {

    protected $ci;
    public $Productos = "";
    public $DescuentoId = "";
    public $Preparados = array();
    public $Monto = 0;
    Public $Dia="";

    public function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->database();
    }

    function Aplicar_descuento($CuentaId, $descuentoId) {
        $this->Productos = array();
        $this->DescuentoId = $descuentoId;
        date_default_timezone_set("America/Mexico_City");
      $fecha=getdate ();
        $dia[0]=7;
        $dia[1]=1;
        $dia[2]=2;
        $dia[3]=3;
        $dia[4]=4;
        $dia[5]=5;
        $dia[6]=6;
        
     $this->Dia= $dia[$fecha['wday']];

        $ci = & get_instance();
  

// $Valor= $this->ci->db->select('ProductoId,productos.Precio,categoria.CategoriaId')
//                       ->join('categoria', 'categoria.CategoriaId = productos.CategoriaId', 'inner')
//                       ->where ('ProductoId',$key)
//                        ->get('productos')->row();
   $Valor = $this->ci->db->select('vp.*,productos.ProductoId,productos.NombreProducto,productos.Precio ,productos.Precio as PrecioReal,productos.categoriaId as CategoriaId ')
                            ->join('productos', ' productos.ProductoId=vp.ProductoId', 'inner')
                            ->where('OrdenVenta', $CuentaId)
                            ->get('vp')->result();

            $this->Productos = json_decode(json_encode($Valor), true);

            //print_r($Valor);
           // die();
        
        $Infodescuento = $this->ci->db->select('Funcion_destino')
                        ->where('PromocionId', $descuentoId)
                        ->get('promocion_destino')->row();
    
        $this->Ordena_productos();
        $var = json_decode(json_encode($Infodescuento), true);
              $funcionEjecuta="Sin_Promocion";
    
          if(isset($var['Funcion_destino'])){
             $funcionEjecuta=$var['Funcion_destino'];
          }

  
              
        if (method_exists($this, $funcionEjecuta)) {
       
            $this->$funcionEjecuta();
            return $this->Preparados;
        } else {
            return $this->Productos;
        }
    }

    function Promocion_Categoria() {

        $promo = $this->ci->db->select('CategoriaId,Cuando,Porcentaje,Afecta')
                        ->where('PromocionCategoriaId', $this->DescuentoId)
                         ->where('Dia', $this->Dia)
                        ->get('promocion_categoria')->row();

                     

                        $ids= explode(",", $promo->CategoriaId);
                     

        $categoria = $ids;

        $Cuando = $promo->Cuando;
        $Porcentaje = $promo->Porcentaje;
        $Afecta = $promo->Afecta;
 $idsvp=array();
 foreach ($this->Productos as $item => $col) {
   $idsvp[]= $col['CategoriaId'];
 }

 //print_r( $categoria);


 //print_r( $idsvp);

 $noaplican=array_unique(array_diff($idsvp, $categoria));
  //print_r( $noaplican);
  //print_r($this->Productos);
 if (count($noaplican)>0) {
     # code...

  foreach ($noaplican as $i => $val) {
     

              

        foreach ($this->Productos as $key => $Valor) {

            if ($Valor['CategoriaId'] == $val) {
                $this->Preparados[] = $Valor;
                unset($this->Productos[$key]);
            }
        }

}}
// print_r($this->Productos);

 $cant_pr = count($this->Productos);
              $temp=array();
             if ($cant_pr >= $Cuando) {
              foreach ($this->Productos as $key => $value) {
                  $temp[]=$value;
              }
              $this->Productos=$temp;
          }
 

        $cant_pr = count($this->Productos);

        if ($cant_pr >= $Cuando) {

            $calculaAplica = round($cant_pr / $Cuando, 0, PHP_ROUND_HALF_DOWN);
            $totalAplicar = $calculaAplica * $Afecta;


            for ($i = 0; $i <= $totalAplicar - 1; $i++) {
                if(isset($this->Productos[$i]['Precio'])){
                $actual = $this->Productos[$i]['Precio'];

                $final = $actual - (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
                $this->Productos[$i]['Precio'] = $final;}
            }
        }

        if (count($this->Productos)>0) {
           
       
        foreach ($this->Productos as $key => $Valor) {


            $this->Preparados[] = $Valor;
            unset($this->Productos[$key]);
        }}
    }

    function Promocion_Persona() {
      


        $promo = $this->ci->db->select('Porcentaje,Afecta')
                        ->where('Promocion_PersonaId', $this->DescuentoId)
                                 ->where('Dia', $this->Dia)
                        ->get('promocion_persona')->row();



        $Porcentaje = $promo->Porcentaje;
        $Afecta = $promo->Afecta;
        $totalAplicar = $Afecta;

        //echo "<pre>";   

//print_r($this->Productos);
          //echo "</pre>";

       // for ($i = 0; $i <= $totalAplicar - 1; $i++) {
         //   if (isset($this->Productos[$i])) {
           //     $actual = $this->Productos[$i]['Precio'];

             //   $final = $actual - (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
               // $this->Monto += (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
                //$this->Productos[$i]['Precio'] = $final;
            //}
        //}





     $asientos=array();
         foreach ($this->Productos as $key => $value) {
         $asientos[$value["Asiento"]]=$value["Asiento"];
       
         }


        
         foreach ($asientos as $key => $value) {
     //print_r($value);

           //totalAplicar
            $cont=1;
       foreach ($this->Productos as $key => $Valor) {
            if ($cont<=$totalAplicar && $Valor["Asiento"]==$value) {
                $actual = $this->Productos[$key]['Precio'];

                $final = $actual - (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
                $this->Monto += (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
                $this->Productos[$key]['Precio'] = $final;
                $cont++;
            }
        }
       
         }
//print_r($this->Productos);
        


        foreach ($this->Productos as $key => $Valor) {


            $this->Preparados[] = $Valor;
            unset($this->Productos[$key]);
        }
    }

    function Promocion_Cuenta() {
     
        $promo = $this->ci->db->select('Porcentaje')
                        ->where('Promocion_CuentaId', $this->DescuentoId)
                 ->where('Dia', $this->Dia)
                        ->get('promocion_cuenta')->row();



        $Porcentaje = $promo->Porcentaje;
        $totalAplicar = count($this->Productos);
        //print_r($totalAplicar);

        for ($i = 0; $i <= $totalAplicar - 1; $i++) {
            if (isset($this->Productos[$i])) {
                $actual = $this->Productos[$i]['Precio'];

                $final = $actual - (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
                $this->Productos[$i]['Precio'] = $final;
            }
        }



        foreach ($this->Productos as $key => $Valor) {


            $this->Preparados[] = $Valor;
            unset($this->Productos[$key]);
        }
    }

    function Promocion_Combina_Categoria() {


        $promo = $this->ci->db->select('CategoriaId1,CategoriaId2,Cuando,Porcentaje,Afecta')
                        ->where('PromocionCombinaId', $this->DescuentoId)
                 ->where('Dia', $this->Dia)
                        ->get(' promocioncombinacategoria')->row();

        $categoria1 = explode(",", $promo->CategoriaId1);
        $categoria2 =explode(",", $promo->CategoriaId2);
        $Cuando = $promo->Cuando;
        $Porcentaje = $promo->Porcentaje;
        $Afecta = $promo->Afecta;
       
        $cantidad = 0;
        $implicadas=array_merge($categoria1,$categoria2);
        $idsvp=array();
 foreach ($this->Productos as $item => $col) {
   $idsvp[]= $col['CategoriaId'];
 }         

           $noaplican=array_unique(array_diff($idsvp, $implicadas));


   if(count($noaplican)>0){
    foreach ($noaplican as $keys => $Val){
    foreach ($this->Productos as $key => $Valor) {
         if ($Valor['CategoriaId'] ==$Val) {
                $this->Preparados[] = $Valor;
                unset($this->Productos[$key]);
            }

      }
      }
   }
   //print_r($this->Productos);
        foreach ($categoria1 as $k => $v) {
        
        
        foreach ($this->Productos as $key => $Valor) {


           


            if ($Valor['CategoriaId'] == $v) {
                $cantidad++;
                $this->Preparados[] = $Valor;
                unset($this->Productos[$key]);
            }
        }

}

        $cant_pr = count($this->Productos);
               $temp=array();
              foreach ($this->Productos as $key => $value) {
                  $temp[]=$value;
              }


$this->Productos=$temp;

        if ($cant_pr > 0) {
            $calculaAplica = round($cantidad / $Cuando, 0, PHP_ROUND_HALF_DOWN);
            $totalAplicar = $calculaAplica * $Afecta;


            for ($i = 0; $i <= $totalAplicar - 1; $i++) {
                if(isset( $this->Productos[$i]['Precio'])){
                $actual = $this->Productos[$i]['Precio'];

                $final = $actual - (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
                $this->Monto += (round($actual * $Porcentaje / 100, 0, PHP_ROUND_HALF_DOWN));
                $this->Productos[$i]['Precio'] = $final;}
         
        }

        foreach ($this->Productos as $key => $Valor) {


            $this->Preparados[] = $Valor;
            unset($this->Productos[$key]);
        }
    }}

    function Ordena_productos() {
        $n = count($this->Productos);
        for ($i = 1; $i < $n; $i++) {
            for ($j = 0; $j < $n - $i; $j++) {

                if ($this->Productos[$j]['Precio'] > $this->Productos[$j + 1]['Precio']) {
                    $k = $this->Productos[$j + 1];
                    $this->Productos[$j + 1] = $this->Productos[$j];
                    $this->Productos[$j] = $k;
                }
            }
        }
    }

}
