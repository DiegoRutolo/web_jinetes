<!DOCTYPE html>
<?php
    include "../../res/herramientas.php";
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
  </head>
  <body>
    <span id="arriba"></span>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <!-- Contenido -->

      <h2 class="jinetes">Manual</h2>

      <p>A continuación presentamos una tabla con el manual y otros recursos. Si tu navegador no tiene la capacidad de leer el tipo de archivo, éste se descargará en tu dispositivo al hacer click en la fila de la tabla.</p>

      <table class="table table-striped table-hover">
        <tr>
          <th>Documento</th>
          <th>Descripción</th>
          <th>Formato</th>
          <th>Tamaño</th>
          <th title="Este número tan raro permite verificar que el archivo no se alteró por el camino hasta tu PC">MD5</th>
        </tr>
        <tr onclick="window.open('LosJinetesDeKal_manual.pdf', '_blanl')">
          <td>Manual</td>
          <td>El manual completo. Incluye historia del mundo, explicación del sistema, clases, economía y objetos y unas cuantas tablas de resumen al final.</td>
          <td>PDF</td>
          <td>1.9 MB</td>
          <td>dc7f6daaa66ad11ed4cb45c6c99f03ca</td>
        </tr>
        <tr>
          <td>Ficha</td>
          <td>La hoja de personaje básica</td>
          <td>PDF</td>
          <td>¿?</td>
          <td>¿?</td>
        </tr>
        <tr>
          <td>Resumen Master</td>
          <td>Una hoja con un resumen condensado para DMs</td>
          <td>ODG (LibreOffice Draw)</td>
          <td>¿?</td>
          <td>¿?</td>
        </tr>
        <tr>
          <td>Calendario</td>
          <td>El calendario de la era de <span class="jinetes">Las Torres de Magia</span>.</td>
          <td>ODS (Hoja de cálculo de LibreOffice)</td>
          <td>¿?</td>
          <td>¿?</td>
        </tr>
      </table>

      <!-- fin Contenido -->
    </div>
    <?=Footer();?>

    <div class="boton-subir">
      <a href="#arriba">
        <?= GetIcono("fu", 45) ?>
      </a>
    </div>
  </body>
</html>
