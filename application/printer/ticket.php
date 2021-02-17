
<?php
require __DIR__ . '/printer/autoload.php'; 
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$nombre_impresora = "L375"; 
 
 
$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

try{
	$logo = EscposImage::load("logo.png", false);
       $printer->bitImage($logo);
       
}catch(Exception $e){      }

 
$printer->text("Yo voy en el encabezado" . "\n");
$printer->text("Otra linea" . "\n");
#La fecha también
$printer->text(date("Y-m-d H:i:s") . "\n");


$printer->text("--------\n");
$printer->text("TOTAL: $2300");

$printer->text("Muchas gracias por su compra\nparzibyte.me");

$printer->feed(3);
 
$printer->cut();

$printer->pulse();

$printer->close();
?>

