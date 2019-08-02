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
      //se esta imprimiendo el mensaje n cantidad de veces.
    }
    if ($row["id_entrega"] == $solicitarPago2 && $row["solicitudpago_entrega"] == 'Activa' )
    {
      echo "ya existe una solicitud de pago activa para esta entrega";
    }
    if ($row["id_entrega"] == $solicitarPago2 && $row["solicitudpago_entrega"] == 'Inactiva' ) {

      $update = "UPDATE `entregas` SET solicitudpago_entrega = 'Activa' WHERE id_entrega='$solicitarPago2'";
      $query = $controlPollo->query($update);
      echo "solicitud de pago activa";
    }

  }
