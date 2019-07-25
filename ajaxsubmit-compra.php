<?php
session_start();
include "config.php";
$name_user2 = $_SESSION["user"];

//Guardar datos del prespuesto
$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);

$compra_cantidad2=$_POST['compra_cantidad1'];
$compra_marca2=$_POST['compra_marca1'];
$compra_preciounidad2=$_POST['compra_preciounidad1'];
$compra_fechacompra2=$_POST['compra_fechacompra1'];
$compra_lugarcompra2=$_POST['compra_lugarcompra1'];

//Insert query
$controlPollo->query("INSERT INTO `compras`(`id_compra`, `cantidad_compra`, `preciounidad_compra`, `fecha_compra`, `lugar_compra`, `name_user`)
      VALUES (null,'".$compra_cantidad2."','".$compra_preciounidad2."','".$compra_fechacompra2."','".$compra_lugarcompra2."','".$name_user2."')");
echo "Guardado Con Éxito";
 ?>
