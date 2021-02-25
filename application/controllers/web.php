<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class web extends CI_Controller {

    private $user;
    private $modulos;

    function __construct() {
        parent::__construct();
  
        if ($this->uri->segment(1) ==FALSE)
     {
     redirect(base_url().'web/');
     
    }
  }

     function index() {
        $this->load->view('formas/index');
   
    }

          function shop() {
            $data=array('prueba'=>'imprimir');
        $this->load->view('formas/shop',$data);
   
         }
            function contact() {
        $this->load->view('formas/contact');
   
         }




}


