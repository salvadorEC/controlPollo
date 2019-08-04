<?php
ob_start();
?>

<?php
session_start();
include "config.php";
$name_user2 = $_SESSION["user"];

//Guardar datos del prespuesto
$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);

$entrega_cliente2=$_POST['entrega_cliente1'];
$entrega_cantidadkg2=$_POST['entrega_cantidadkg1'];
$entrega_preciokg2=$_POST['entrega_preciokg1'];
$entrega_fechaentrega2=$_POST['entrega_fechaentrega1'];


//Insert query entregas
$controlPollo->query("INSERT INTO `entregas`(`id_entrega`, `cliente_entrega`, `name_user`, `cantidadkg_entrega`, `preciokg_entrega`, `fecha_entrega`,`solicitudpago_entrega`, `codigopago_entrega`, `statuspago_entrega`)
VALUES (null,'".$entrega_cliente2."','".$name_user2."','".$entrega_cantidadkg2."','".$entrega_preciokg2."','".$entrega_fechaentrega2."','Inactiva',null,'No Pagado')");

echo "Guardado Con Éxito";
 ?>

<?php
 ob_end_flush();
?>
