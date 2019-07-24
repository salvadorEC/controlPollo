<?php
session_start();
//session_destroy();

$_SESSION['mode_user'];


//Comprobar si se tiene valores en las variables de session
if($_SESSION['mode_user']=="ok")
  {
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>
  <body>

    <div class="container">
      <p class="h3">Presupuesto Diario</p>
      <form id="form-presupuesto">
        <div class="form-group">
          <label for="fecha">Fecha</label>
          <input type="date" class="form-control" id="presupuesto_fecha"  placeholder="ingresar fecha">
        </div>
        <div class="form-group">
          <label for="preciodolares">Precio Dolar</label>
          <input type="number" step="0.01" class="form-control" id="presupuesto_tipocambio"  placeholder="tipo de cambio actual">
        </div>
        <div class="form-group">
          <label for="dolares">Dolares</label>
          <input type="number" class="form-control" id="presupuesto_dolar" placeholder="dinero dispobile en dolares">
        </div>
        <div class="form-group">
          <label for="pesos">Pesos</label>
          <input type="number" step="0.01" class="form-control" id="presupuesto_peso"  placeholder="dinero disponible en pesos">
        </div>
        <button id="submit" type="button" value="Submit" class="btn btn-primary">Comenzar</button>
      </form>
    </div>

    <script type="text/javascript">

      $(document).ready(function(){

      $("#submit").click(function(){
      var presupuesto_fecha = $("#presupuesto_fecha").val();
      var presupuesto_tipocambio = $("#presupuesto_tipocambio").val();
      var presupuesto_dolar = $("#presupuesto_dolar").val();
      var presupuesto_peso = $("#presupuesto_peso").val();

      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'presupuesto_fecha1='+ presupuesto_fecha + '&presupuesto_tipocambio1='+ presupuesto_tipocambio + '&presupuesto_dolar1='+ presupuesto_dolar + '&presupuesto_peso1='+ presupuesto_peso;

      if(presupuesto_fecha==''||presupuesto_tipocambio==''||presupuesto_dolar==''||presupuesto_peso=='')
      {
      alert("favor de llenar todos los datos");
      }
      else
      {
      // AJAX Code To Submit Form.
      $.ajax({
              type: "POST",
              url: "ajaxsubmit-presupuesto.php",
              data: dataString,
              cache: false,
      success: function(result){
        window.location = 'menu.php';
      }

      });
      }
      return false;

      });

      });

    </script>
  </body>
</html>


<?php }


else
  {
    header("location: index.php");
  }

 ?>
