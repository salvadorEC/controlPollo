<?php
ob_start();
?>
<?php
session_start();
include "config.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<?php
        //Recibir datos de formulario login.
        $user = $_REQUEST['login_user'];
        $pass = $_REQUEST['login_pass'];
        //Iniciar variables de session
        $_SESSION["user"]=$user;
        $_SESSION["pass"]=$pass;
        //Busqueda usuarios en la base datos
        $controlPollo = new mysqli($SERVIDOR,$USER,$PASS,$DB);
        $select = "SELECT * FROM users where name_user = '".$user."' " ;
        $result = $controlPollo->query($select);

        if ( $row = mysqli_fetch_array($result))
        {
          if ($row['name_user']==$user && $row['pass_user']==$pass)
            {
              if ($row['mode_user']=="admin") {
                 $admin = "ok";
                 $_SESSION["mode_user"]=$admin;

                header("location: presupuesto.php");

            }
            else
              header("location: menu-cliente.php");
            }
            //usuario o pass incorrectos
            else
              header("location: index.php");

        }
        //cuando no existe el usuario
        else {
            header("location: index.php");
        }
?>
  </body>
</html>
<?php
ob_end_flush();
?>
