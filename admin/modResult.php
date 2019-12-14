<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Los Jinetes de Kal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />

    <!-- BootStrap --->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/res/style.css">

    <?php
    $server = "localhost";
    $creds = file("../creds.txt");
    $usuario = trim($creds[0]);
    $passwd = trim($creds[1]);
    $editPasswd = trim($creds[4]);
    ?>

  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <h2>Resultado de la edición</h2>
      <?php
      $con = new mysqli($server, $usuario, $passwd, "jinetes");
      if ($con->connect_error) {
        die("Error de conexión" . $con->connect_error);
      }

      if ($editPasswd !== $_POST["editPasswd"]) {
        die("<div class=\"alert alert-danger\"><strong>Contraseña errónea</strong></div>\n");
        //die("Contraseña errónea");
      }

      $revisar = $_POST["revisar"] === NULL ? 0 : $_POST["revisar"];
      $nom = utf8_decode($_POST["nom"]);
      $tipo = utf8_decode($_POST["tipo"]);
      $subtipo = !empty($_POST["subtipo"]) ? utf8_decode($_POST["subtipo"]) : NULL;
      $descr = utf8_decode($_POST["descr"]);
      $contin = $_POST["contin"] === NULL ? 0 : $_POST["contin"];
      $auto = $_POST["auto"] === NULL ? 0 : $_POST["auto"];
      $gratis = $_POST["gratis"] === NULL ? 0 : $_POST["gratis"];


      if (!($ps = $con->prepare("UPDATE Habilidad SET revisar=?, nom=?, tipo=?, subtipo=?, tier=?, descr=?, contin=?, auto=?, gratis=? WHERE id = ?"))) {
        die("<div class=\"alert alert-danger\"><strong>Impreparable:</strong> " . $con->error . "</div>\n");
      }

      if (!($ps->bind_param("isssisiiii", $revisar, $nom, $tipo, $subtipo, $_POST["tier"], $descr, $contin, $auto, $gratis, $_POST["idHab"]))) {
        die("<div class=\"alert alert-danger\"><strong>Imbindable:</strong> " . $ps->error . "</div>\n");
        // die("Inbindable:" . $ps->error);
      }
      if (!($ps->execute())) {
        die("<div class=\"alert alert-danger\"><strong>Inejecutable:</strong> " . $ps->error . "</div>\n");
        // die("Inejecutable:" . $ps->error);
      }
      ?>

      <div class="alert alert-success">
        Habilidad actualizada correctamente :D
      </div>
      <a href="/admin/index.php" class="btn btn-primary">Volver</a>
    </div>
    <?php
      $ps->close();
      $con->close();
    ?>

    <?=Footer();?>
  </body>
</html>
