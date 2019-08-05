<?php
ob_start();
?>
 
<?php

include "config.php";

//Select en entregas
$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);
$select = "SELECT * FROM `entregas` order by fecha_entrega asc" ;
$result = $controlPollo->query($select);


while ($row = mysqli_fetch_array($result))
  {
    $i = $row['preciokg_entrega'] * $row['cantidadkg_entrega'];
    $date = new DateTime($row['fecha_entrega']);
    echo '
    <tr>
      <tr>
        <td bgcolor="#9c9c9c" colspan="100%" class="text-center th-sm "style="font-size:0.8em">'.$row["cliente_entrega"].'</td>
      </tr>
      <tr>
        <th class="text-center th-sm" style="font-size:0.8em">Num Entrega</th>
        <th class="text-center th-sm" style="font-size:0.8em">Fecha Entrega</th>
        <th class="text-center th-sm" style="font-size:0.8em">Cantidad Kg Entregados</th>
        <th class="text-center th-sm" style="font-size:0.8em">Precio Kg</th>
      </tr>
        <td class="text-center th-sm " style="font-size:0.8em">'.$row["id_entrega"].'</td>
        <td class="text-center th-sm " style="font-size:0.8em">'.$date->format('d-m-Y').'</td>
        <td class="text-center th-sm " style="font-size:0.8em">'.$row["cantidadkg_entrega"].'</td>
        <td class="text-center th-sm " style="font-size:0.8em">'.$row["preciokg_entrega"].'</td>
      <tr>
        <th class="text-center th-sm "style="font-size:0.8em">Total a Pagar</th>
        <th class="text-center th-sm "style="font-size:0.8em">Status</th>
        <th class="text-center th-sm "style="font-size:0.8em">Solicitud de Pago</th>
        <th class="text-center th-sm "style="font-size:0.8em">Abono</th>
      </tr>
      <tr>
      <td class="text-center th-sm "style="font-size:0.8em">'.$i.'</td>
      <td class="text-center th-sm "style="font-size:0.8em">'.$row["statuspago_entrega"].'</td>
      <td class="text-center th-sm "style="font-size:0.8em">'.$row["solicitudpago_entrega"].'</td>
      </tr>
    </tr>
      ';


  }

 ?>
<?php
 ob_end_flush();
?>
