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
        <tr onclick="window.open('LosJinetesDeKal_manual.pdf', '_blank')">
          <td>Manual</td>
          <td>El manual completo. Incluye historia del mundo, explicación del sistema, clases, economía y objetos y unas cuantas tablas de resumen al final.</td>
          <td>PDF</td>
          <td>1.9 MiB</td>
          <td>dc7f6daaa66ad11ed4cb45c6c99f03ca</td>
        </tr>
        <tr onclick="window.open('LOS_CINCO_JINETES_FICHA_1.1.pdf', '_blank')">
          <td>Ficha</td>
          <td>La hoja de personaje básica. Versión 1.1.</td>
          <td>PDF</td>
          <td>57 KiB</td>
          <td>9014a0af6f26e351c935d0f8f2551641</td>
        </tr>
        <tr onclick="window.open('FichaEditable.pdf', '_blank')">
          <td>Ficha editable</td>
          <td>Ficha con formulario PDF para editar directamente.</td>
          <td>PDF</td>
          <td>87 KiB</td>
          <td>1773bac13c3ed106538a33d7860e337d</td>
        </tr>
        <tr onclick="window.open('ResumenMaster.pdf', '_blank')">
          <td>Resumen Master</td>
          <td>Una hoja con un resumen condensado para DMs</td>
          <td>PDF</td>
          <td>567 KiB</td>
          <td>c2459d75de38422dc36892a331d6f3d7</td>
        </tr>
        <tr onclick="window.open('ResumenMaster.odg', '_blank')">
          <td>Resumen Master</td>
          <td>Una hoja con un resumen condensado para DMs</td>
          <td>ODG (LibreOffice Draw)</td>
          <td>635 KiB</td>
          <td>09949fa661dcb8e88277055c687a709d</td>
        </tr>
        <tr onclick="window.open('Calendario.pdf', '_blank')">
          <td>Calendario</td>
          <td>El calendario de la era de <span class="jinetes">Las Torres de Magia</span>.</td>
          <td>PDF</td>
          <td>73 KiB</td>
          <td>1893a2a1007ef9aa6411f17bab28b803</td>
        </tr>
        <tr onclick="window.open('Calendario.ods', '_blank')">
          <td>Calendario</td>
          <td>El calendario de la era de <span class="jinetes">Las Torres de Magia</span>.</td>
          <td>ODS (Hoja de cálculo de LibreOffice)</td>
          <td>17 KiB</td>
          <td>ef1e700e0d259e6aca5d79d67495a45c</td>
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
