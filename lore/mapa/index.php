<!DOCTYPE html>
<?php
    include "../../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Mapa - Los Jinetes de Kal</title>

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

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

    <link rel="stylesheet" type="text/css" href="/res/style.css">

    <style type="text/css">
      #mapaDeKal {
        height: 90vh;
        border: 2px dashed brown;
        margin: 2em;
      }
    </style>

  </head>
  <body>
    <span id="arriba"></span>

    <?php ImprimeNavBar(); ?>

    <div class="container-fluid">
      <!-- Contenido -->
      <h2 class="jinetes">Mapa de Kal</h2>

      <p>El mapa completo de Kal. Al principio tendrá pocos detalles, pero irá creciendo a medida que elaboremos más contenido.</p>

      <div id="mapaDeKal"></div>

      <h4>Implementación</h4>
      <p>
        Los dibujos están hechos con <a href="https://krita.org/es/" target="_blank" rel="noreferrer">Krita</a>.
        El mapa está implementado con <a href="https://leafletjs.com/" target="_blank" rel="noreferrer"> Leaflet</a>.
        Los mosaicos están generados con <a href="https://www.gimp.org/" target="_blank" rel="noreferrer">Gimp</a>, un <a href="https://gimper.net/resources/new-guides-every-x-pixels.571/" target="_blank" rel="noreferrer">addon</a> e <a href="https://imagemagick.org/index.php" target="_blank" rel="noreferrer">ImageMagick</a>.
      </p>

      <!-- fin Contenido -->
    </div>
    <?=Footer();?>

    <div class="boton-subir">
      <a href="#arriba">
        <?= GetIcono("fu", 45) ?>
      </a>
    </div>

    <script>
      var mapaDeKal = L.map('mapaDeKal').setView([8, 8], 2);
      L.tileLayer('img/alt-{z}/kal_{y}_{x}.png', {
        minZoom: 2,
        maxZoom: 5,
        center: L.latLng(8, 8),
        maxxBounds: L.latLngBounds(L.latLng(0, 0), L.latLng(5, 5))
      }).addTo(mapaDeKal);
    </script>
  </body>
</html>
