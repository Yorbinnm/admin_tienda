<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
require __DIR__ . '/../printer/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class cTicket extends CI_Controller {

    private $user;
    private $modulos;

    function __construct() {
        parent::__construct();
        //Este codigo es para todos los controladores en el constructor
        $this->load->model('Admin');
        $this->user['user'] = $this->Admin->infoUser();
        $this->modulos['modulos'] = $this->Admin->getModulos();
        if ($this->session->get_userdata()['s_Usuario'] == NULL)
            redirect(base_url());
        //Cargar el modelo de la clase
    }

    function index() {
        $this->load->view('layout/header', $this->user);
        $this->load->view('layout/menu', $this->modulos);
        $this->load->view('lemuria/vTicket');
        $this->load->view('layout/footer');
    }

    public function imprimir() {
        $nombre_impresora = "L375";

        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        $printer->setFont("Arial");

        try {
            $logo = EscposImage::load("resources/logo.png", false);
            $printer->graphics($logo);
            $printer->bitImage($logo);
        } catch (Exception $e) {
            
        }

        $printer->text("      Cafetería Lemuria Frapes y caffes" . "\n");
        $printer->text("       Av. del sur no.17.Col. Morelos" . "\n");
        $printer->text("     Chilpancingo de los Bravos, Guerrero" . "\n");


        $total = 280.00;
        $printer->text("1  Café capuchino                 $20.00" . "\n");
        $printer->text("1  Crepa japonesa de chocolate    $60.00" . "\n");
        $printer->text("1  Café caliente                  $20.00" . "\n");
        $printer->text("1  agua                           $10.00" . "\n");
        $printer->text("1  chocolate frio capuchino       $30.00" . "\n");
        $printer->text("1  Café capuchino                 $20.00" . "\n");
        $printer->text("1  Crepa japonesa de chocolate    $60.00" . "\n");
        $printer->text("1  Café caliente                  $20.00" . "\n");
        $printer->text("1  agua                           $10.00" . "\n");
        $printer->text("1  chocolate frio capuchino       $30.00" . "\n");

        $printer->text("****************************************\n");
        $printer->text("TOTAL:                             $" . $total . "\n");
        $printer->text("****************************************\n");
        $printer->text("Muchas gracias por su compra" . "\n");
        $printer->text("           " . "\n");
        $printer->text(date("Y-m-d H:i:s") . "\n");
        $printer->text("           " . "\n");
//        $printer->feed(40);
//        $printer->cut();
//        $printer->pulse();
        $printer->close();
    }

}
