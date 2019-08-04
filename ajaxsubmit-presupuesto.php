<?php
ob_start();
?>


<?php
session_start();
include "config.php";
$name_user2 = $_SESSION["user"];

//Guardar datos del prespuesto
$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);

$presupuesto_fecha2=$_POST['presupuesto_fecha1'];
$presupuesto_tipocambio2=$_POST['presupuesto_tipocambio1'];
$presupuesto_dolar2=$_POST['presupuesto_dolar1'];
$presupuesto_peso2=$_POST['presupuesto_peso1'];
$presupuesto_tipocambio2=$_POST['presupuesto_tipocambio1'];
//Insert query
$controlPollo->query("INSERT INTO `presupuestos`(`id_presupuesto`, `fecha_presupuesto`, `dolar_presupuesto`, `peso_presupuesto`, `tipocambio_presupuesto`, `name_user`)
VALUES (null,'".$presupuesto_fecha2."','".$presupuesto_dolar2."','".$presupuesto_peso2."','".$presupuesto_tipocambio2."','".$name_user2."')");

 ?>
<?php
 ob_end_flush();
?>
