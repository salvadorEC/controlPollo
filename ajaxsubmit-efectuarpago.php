<?php
ob_start();
?>
<?php

session_start();
include "config.php";
$name_user2 = $_SESSION["user"];

//Guardar datos del prespuesto
$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);

$codigoPago2=$_POST['codigoPago1'];

$select = "SELECT * FROM `entregas`" ;
$result = $controlPollo->query($select);

//buscar codigo de pago para actualizar el status a pagado de x entrega
while ($row = mysqli_fetch_array($result))
  {
    if ($row["codigopago_entrega"]==$codigoPago2 && $row["solicitudpago_entrega"] == 'Activa')
    {
      $update = "UPDATE `entregas` SET statuspago_entrega = 'Pagado' , solicitudpago_entrega = 'Procesada' WHERE codigopago_entrega = '$codigoPago2'";
      $query = $controlPollo->query($update);
      echo "Entrega Pagada Con Éxito";
    }
    //if ($row["codigopago_entrega"]!=$codigoPago2)
    //{
      //echo "Error: \n 1.Código Incorrecto \n 2.Solcitud de Pago Inactiva \n 3.La Entrega Ya Ha Sido Pagada";
    //}
  }

 ?>
<?php
 ob_end_flush();
?>
