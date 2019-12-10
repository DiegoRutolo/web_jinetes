<!DOCTYPE html>
<?php
    include "./res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Los Jinetes de Kal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="description" content="Los Jinetes de Kal. Sistema de rol sencillo y completo.">
    <meta name="author" content="DiegoRutolo">
    <meta name="keywords" content="jinetes de kal, jinetes, kal, rol, rpg, role-playing game, heske">
    <meta name="language" content="spanish">
    <meta name="rating" content="safe for kids">

    <!-- BootStrap --->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="res/style.css">

    <style type="text/css">
      body {
        padding-top: 0;
      }
    </style>
  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <div class="cabezoneria">
      <img src="/res/img/Kal_4C.png" width="100%">
      <h1 class="jinetes">Los Jinetes de Kal</h1>
    </div>

    <div class="container">
      <h2>Presentación</h2>
      <p><span class="jinetes">Los Jinetes de Kal</span> es un sistema de rol diseñado para ser sencillo de jugar y de personalizar. Perfecto para empezar en el mundo del rol o ajustar el sistema a gusto de jugadores más avanzados.</p>
      <p>En esta web (aún en construcción) se pueden encontrar diversos recursos y herramientas para poder jugar, además del manual completo.</p>
      <h4>Ficha web</h4>
      <p>Esta herramienta debería permitir jugar a través de internet. Se puede acceder desde esta misma web o descargarla en formato zip desde <a href="https://github.com/DiegoRutolo/Jinetes_FichaWeb" target="_blank">GitHub</a>. Puede funcionar offline, así que también se puede utilizar en partidas presenciales en una tablet.</p>
    </div>

    <?=Footer();?>
  </body>
</html>
