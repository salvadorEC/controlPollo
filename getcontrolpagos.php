<?php
ob_start();
?>
 
<?php

include "config.php";

//Select en entregas
$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);
$select = "SELECT * FROM `entregas`" ;
$result = $controlPollo->query($select);


while ($row = mysqli_fetch_array($result))
  {
    $i = $row['preciokg_entrega'] * $row['cantidadkg_entrega'];
    $date = new DateTime($row['fecha_entrega']);
    echo '
      <tr>
        <td scope="row">'.$row["id_entrega"].'</td>
        <td class="text-center th-sm ">'.$row["cliente_entrega"].'</td>
        <td class="text-center th-sm ">'.$date->format('d-m-Y').'</td>
        <td class="text-center th-sm ">'.$row["cantidadkg_entrega"].'</td>
        <td class="text-center th-sm ">'.$row["preciokg_entrega"].'</td>
        <td class="text-center th-sm ">'.$i.'</td>
        <td class="text-center th-sm ">'.$row["statuspago_entrega"].'</td>
        <td class="text-center th-sm ">'.$row["solicitudpago_entrega"].'</td>
      </tr>';


  }

 ?>
<?php
 ob_end_flush();
?>
