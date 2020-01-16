<!DOCTYPE html>
<?php
    include "../../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Generador de hojas de personaje - Los Jinetes de Kal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />

    <!-- BootStrap --->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://jinetes.rutolo.eu/res/style.css">

    <?php
      $server = "localhost";
      $creds = file("../../creds.txt");
      $usuario = trim($creds[2]);
      $passwd = trim($creds[3]);
    ?>
  </head>
  <body>
    <?php ImprimeNavBar(); ?>

    <!--
      Razas:
        Humanos
        Enanos
        Duendes
        Elfos
      Clases
        Bardo: Car, Des
        Cazador: Des, Fue
        Domabestias: Car, Int
        Guerrero Tribal: Fue, Con
        Herrero Rúnico: Des, Fue
        Monje Espadachin: Sab, Des
        Mago Elemental: Sab, Int
        Druida: Sab, Con
        Paladín: Sab, Con
        Pícaro: Des, Car
        Sacerdote: Sab, Car
        Soldado: Fue, Des
      Porcentajes Repartición:
        Primaria: 75%
        Secundaria: 25%
      Apariencia: 3d4-2
    -->

    <h2>Elige Raza:</h2>
    <h2>Elige Clase:</h2>
    <h2></h2>
  </body>
</html>
