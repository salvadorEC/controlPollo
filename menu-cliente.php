<?php

session_start();
include "config.php";
$name_user2 = $_SESSION["user"];

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <p></p>
    <div class="row">
      <div class="col-sm-8"></div>
      <div class="col-sm-4">
        <a href="/controlPollo/cerrarsesion.php" class="btn btn-primary btn-lg danger" role="button" aria-pressed="true">salir </a>
      </div>
    </div>
      <p></p>
    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th class="text-center"scope="col">Num Entrega</th>
            <th class="text-center"scope="col">Cliente</th>
            <th class="text-center"scope="col">Fecha Entrega</th>
            <th class="text-center"scope="col">Cantidad Kg Entregados</th>
            <th class="text-center"scope="col">Precio Kg</th>
            <th class="text-center"scope="col">Total a Pagar</th>
            <th class="text-center"scope="col">Status</th>
            <th class="text-center"scope="col">Solicitud de Pago</th>
            <th class="text-center "scope="col">Código</th>
          </tr>
        </thead>
        <tbody>
          <tbody class="tr-entregas">

          </tbody>
        </tbody>
      </table>
      <!-- consultar entregas -->
      <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                    type: "GET",
                    url: "getentregasclientes.php",
                    success: function(response)
                    {
                        $('.tr-entregas').html(response).fadeIn();
                    }
            });
        });
      </script>
    
    </div>
  </body>
</html>
