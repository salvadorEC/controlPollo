<?php
ob_start();
?>

<?php
session_start();
include "config.php";
$name_user2 = $_SESSION["user"];

$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);
$select = "SELECT * FROM `entregas` WHERE  `cliente_entrega` = '".$name_user2."' " ;
$result = $controlPollo->query($select);

while ($row = mysqli_fetch_array($result))
  {
    $i = $row['preciokg_entrega'] * $row['cantidadkg_entrega'];
    $date = new DateTime($row['fecha_entrega']);
    echo '
      <tr>
        <td scope="row">'.$row["id_entrega"].'</td>
        <td class="text-center">'.$row["cliente_entrega"].'</td>
        <td class="text-center">'.$date->format('d-m-Y').'</td>
        <td class="text-center">'.$row["cantidadkg_entrega"].'</td>
        <td class="text-center">'.$row["preciokg_entrega"].'</td>
        <td class="text-center">'.$i.'</td>
        <td class="text-center">'.$row["statuspago_entrega"].'</td>
        <td class="text-center">'.$row["solicitudpago_entrega"].'</td>
        <td class="text-center font-weight-bold">'.$row["codigopago_entrega"].'</td>
      </tr>';
  }



 ?>
 <?php
 ob_end_flush();
 ?>
