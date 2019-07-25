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
        <th scope="row">'.$row["id_entrega"].'</th>
        <td class="text-center" value="'.$row["cliente_entrega"].'">'.$row["cliente_entrega"].'</td>
        <td class="text-center">'.$date->format('d-m-Y').'</td>
        <td class="text-center">'.$row["cantidadkg_entrega"].'</td>
        <td class="text-center">'.$row["preciokg_entrega"].'</td>
        <td class="text-center">'.$i.'</td>
        <td class="text-center">'.$row["statuspago_entrega"].'</td>
      </tr>';

  }

 ?>
