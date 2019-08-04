<?php
ob_start();
?>

 

<html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </head>
   <body>

     <div class="container">
       <p class="h3">Iniciar Sesión</p>
       <form id="form-login"  action="loginControl.php" method="post">
         <div class="form-group">
           <label>Usuario</label>
           <input class="form-control" id="login_user" placeholder="" name="login_user" type="text" required>
         </div>
         <div class="form-group">
           <label>Contraseña</label>
           <input  class="form-control" id="login_pass" placeholder="" name="login_pass" type="text" required>
         </div>
         <button type="submit" class="btn btn-info">Iniciar Sesión</button>
       </form>
     </div>

   </body>
 </html>
 <?php
 ob_end_flush();
 ?>
