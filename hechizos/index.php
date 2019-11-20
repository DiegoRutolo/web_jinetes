<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Hechizos</title>

    <!-- BootStrap --->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../res/css/style.css">

    <?php
      $server = "localhost";
      $creds = file("../creds.txt");
      $usuario = trim($creds[0]);
      $passwd = trim($creds[1]);
    ?>
  </head>
  <body>

    <?php
      ImprimeNavBar();
    ?>

    <div class="container">
      <?php
        $con = new mysqli($server, $usuario, $passwd, "jinetes");
        if ($con->connect_error) {
          die("Connection failed" . $conn->connect_error);
        }

        $sql = "SELECT * FROM Habilidad";
        $res = $con->query($sql);
     ?>

     <br>
     <h2 class="center">Habilidades activas</h2>

     <!-- Pestañas -->
     <ul class="nav nav-tabs">
       <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#habilidades">Habilidades de aguante</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#hechizos">Hechizos</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#canciones">Canciones</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#milagros">Milagros</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#kihon">Kihon</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#runas">Runas</a>
       </li>
     </ul>

     <!-- Contenido -->
     <div class="tab-content">
       <div id="habilidades" class="container tab-pane active">
         <h4>Habilidades</h4>
       </div>

       <div id="hechizos" class="container tab-pane">
         <h4>Hechizos</h4>
       </div>

       <div id="canciones" class="container tab-pane">
         <h4>Canciones</h4>
       </div>

       <div id="milagros" class="container tab-pane">
         <h4>Milagros</h4>
       </div>

       <div id="kihon" class="container tab-pane">
         <h4>Kihon</h4>
       </div>

       <div id="runas" class="container tab-pane">
         <h4>Runas</h4>
       </div>
     </div>

    </div>
    <?php $con.close(); ?>
  </body>
</html>
