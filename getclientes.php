<?php
ob_start();
?>

 

<?php

include "config.php";

$controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);
$select = "SELECT * FROM `users` WHERE mode_user = 'client' " ;
$result = $controlPollo->query($select);

//echo '<option value="0">Seleccionar</option>';
while ($row = mysqli_fetch_array($result))
  {
    echo '<option value="'.$row["name_user"].'">'.$row["name_user"].'</option>';
  }

 ?>
<?php
 ob_end_flush();
?>
