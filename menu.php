<?php
session_start();
include "config.php";

$_SESSION['mode_user'];
//Comprobar si se tiene valores en las variables de session
if($_SESSION['mode_user']=="ok")
  {

  }


else
  {
    header("location: index.php");
  }

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
   </head>
   <body>
    <div class="container">
       <h2>Control Pollo</h2>
       <!-- Nav tabs -->
       <ul class="nav nav-tabs">
         <li class="nav-item">
           <a class="nav-link active" href="#inicio">Inicio</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#entregas">Entregas</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#cobros">Cobros</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="#compras">compras</a>
         </li>
       </ul>
           <!-- Tab panes -->
           <div class="tab-content border mb-3">

             <div id="inicio" class="container tab-pane active"><br>
               <h3>Inicio</h3>
               <p>Control de pollo</p>
             </div>

             <div id="entregas" class="container tab-pane fade"><br>
               <h3>Entregas</h3>
               <form id="form-entregas">
                  <div class="form-group">
                    <label for="">Seleccionar Cliente</label>
                    <div class="selector-cliente">
                      <select id="entrega_cliente" class="form-control form-control-sm"></select>
                    </div>
                    <p></p>
                    <label for="cantidadkg">Cantidad Kg</label>
                    <input type="number" class="form-control" id="entrega_cantidadkg"  placeholder="ingresar cantidad de kg entregados">
                    <p></p>
                    <label for="preciokg">Precio Kg</label>
                    <input type="number" class="form-control" id="entrega_preciokg"  placeholder="ingresar precio kg en pesos">
                    <p></p>
                    <label for="fecha_entrega">Fecha Entrega</label>
                    <input type="date" class="form-control" id="entrega_fechaentrega">
                    <p></p>
                    <button id="submit" type="button" value="Submit" class="btn btn-primary">Guardar Entrega</button>
                  </div>
                </form>
             </div>
             <!-- consultar clientes -->
             <script type="text/javascript">
               $(document).ready(function() {
                   $.ajax({
                           type: "POST",
                           url: "getclientes.php",
                           success: function(response)
                           {
                               $('.selector-cliente select').html(response).fadeIn();
                           }
                   });
               });
             </script>
             <!-- insert base datos -->
             <script type="text/javascript">

               $(document).ready(function(){

               $("#submit").click(function(){
               var entrega_cliente = $("#entrega_cliente").val();
               var entrega_cantidadkg = $("#entrega_cantidadkg").val();
               var entrega_preciokg = $("#entrega_preciokg").val();
               var entrega_fechaentrega = $("#entrega_fechaentrega").val();

               // Returns successful data submission message when the entered information is stored in database.
               var dataString = 'entrega_cliente1='+ entrega_cliente + '&entrega_cantidadkg1='+ entrega_cantidadkg + '&entrega_preciokg1='+ entrega_preciokg + '&entrega_fechaentrega1='+ entrega_fechaentrega;

               if(entrega_cliente==''||entrega_cantidadkg==''||entrega_preciokg==''||entrega_fechaentrega=='')
               {
               alert("favor de llenar todos los datos");
               }
               else
               {
               // AJAX Code To Submit Form.
               $.ajax({
                       type: "POST",
                       url: "ajaxsubmit-entrega.php",
                       data: dataString,
                       cache: false,
               success: function(result){
                 alert(result);
                 window.location = 'menu.php';
               }

               });
               }
               return false;

               });

               });

             </script>

             <div id="cobros" class="container tab-pane fade"><br>
               <h3>Cobros</h3>
               <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
             </div>

             <div id="compras" class="container tab-pane fade"><br>
               <h3>Compras</h3>

               <form id="form-compras">
                  <div class="form-group">
                    <label for="">Seleccionar Cliente</label>
                    <div class="selector-cliente">
                      <select id="entrega_cliente" class="form-control form-control-sm"></select>
                    </div>
                    <p></p>
                    <label for="cantidadkg">Cantidad Kg</label>
                    <input type="number" class="form-control" id="entrega_cantidadkg"  placeholder="ingresar cantidad de kg entregados">
                    <p></p>
                    <label for="preciokg">Precio Kg</label>
                    <input type="number" class="form-control" id="entrega_preciokg"  placeholder="ingresar precio kg en pesos">
                    <p></p>
                    <label for="fecha_entrega">Fecha Entrega</label>
                    <input type="date" class="form-control" id="entrega_fechaentrega">
                    <p></p>
                    <button id="submit" type="button" value="Submit" class="btn btn-primary">Guardar Entrega</button>
                  </div>
                </form>

             </div>

             <div id="historial-entregas" class="container tab-pane fade"><br>
               <h3>Historial Entregas</h3>
               <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
             </div>


           </div>
         </div>
     </div>

   <script>

   $(document).ready(function(){

   });
   $(document).ready(function(){
     $(".nav-tabs a").click(function(){
       $(this).tab('show');
     });
     $('.nav-tabs a').on('shown.bs.tab', function(event){
       var x = $(event.target).text();         // active tab
       var y = $(event.relatedTarget).text();  // previous tab
       $(".act span").text(x);
       $(".prev span").text(y);
     });
   });

   </script>
   </body>
 </html>
