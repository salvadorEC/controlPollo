<?php
session_start();
include "config.php";
$name_user2 = $_SESSION["user"];

//Guardar datos del prespuesto
$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);

$solicitarPago2=$_POST['solicitarPago1'];

$select = "SELECT * FROM `entregas`" ;
$result = $controlPollo->query($select);

//verificar si existe solicitud de pago activa
while ($row = mysqli_fetch_array($result))
  {
    if ($row["id_entrega"] != $solicitarPago2)
    {
      //echo "error";
    }
    if ($row["id_entrega"] == $solicitarPago2 && $row["solicitudpago_entrega"] == 'Activa' or $row["solicitudpago_entrega"] == 'Procesada' )
    {
      echo "Error: \n 1.ya existe una solicitud de pago activa para esta entrega. \n o 2.ya ha sido pagada.";
    }
    if ($row["id_entrega"] == $solicitarPago2 && $row["solicitudpago_entrega"] == 'Inactiva' ) {

      $code=rand(1000000,9999999);
      $update = "UPDATE `entregas` SET solicitudpago_entrega = 'Activa', codigopago_entrega = '".$code."' WHERE id_entrega='$solicitarPago2'";
      $query = $controlPollo->query($update);
      echo "solicitud de pago activa";
    }


  }
