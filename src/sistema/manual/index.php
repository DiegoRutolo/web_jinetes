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

    <style>
      .hoja {
        border: 3px solid brown;
        border-radius: 15px;
        background-color: OldLace;
        text-align: center;
        padding: 5px;
        margin: 5px;
      }

      .hoja:hover {
        background-color: BurlyWood;
      }

      .hoja a {
        display: block;
        text-decoration: none;
        color: inherit;
      }
    </style>
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
        <tr onclick="window.open('magiaBasica.pdf', '_blank')">
          <td>Magia básica</td>
          <td>Hoja básica para todos los magos (elementales, druidad y bardos).</td>
          <td>PDF</td>
          <td>66 KiB</td>
          <td>8c121c6bb8575d361262e508088c251d</td>
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

      <!-- TODO: Añadir lista de hojas de clases con links al editor -->
      <p>Aquí hay una lista de hojas de habilidades de las distintas clases.</p>

      <div class="container">
        <div class="row">
          <div class="col hoja">
            <a href="/herramientas/genHojasHabs/hojaHabilidades.php?titulo=Orden+del+f%C3%A9nix&habilidades=%5B%2237%22%2C%22273%22%2C%22272%22%2C%22150%22%2C%22162%22%2C%2256%22%2C%22143%22%2C%22203%22%2C%22249%22%2C%221%22%2C%22104%22%2C%22247%22%2C%22112%22%2C%22141%22%2C%22107%22%5D" target="_blank">Mago de Fuego</a>
          </div>
          <div class="col hoja">
            <a href="/herramientas/genHojasHabs/hojaHabilidades.php?titulo=Orden+del+Kraken&habilidades=%5B%22110%22%2C%22125%22%2C%224%22%2C%22160%22%2C%22202%22%2C%2299%22%2C%22136%22%2C%22144%22%2C%225%22%2C%2247%22%2C%2264%22%2C%22245%22%2C%2268%22%2C%22126%22%2C%2220%22%5D" target="_blank">Mago de Agua</a>
          </div>
          <div class="col hoja">
            <a href="/herramientas/genHojasHabs/hojaHabilidades.php?titulo=Orden+del+Golem&habilidades=%5B%222%22%2C%223%22%2C%22177%22%2C%2214%22%2C%2222%22%2C%22159%22%2C%22163%22%2C%226%22%2C%22182%22%2C%22194%22%2C%228%22%2C%22180%22%2C%22181%22%2C%22244%22%2C%22154%22%5D" target="_blank">Mago de Tierra</a>
          </div>
          <div class="col hoja">
            <a href="/herramientas/genHojasHabs/hojaHabilidades.php?titulo=Orden+del+Grifo&habilidades=%5B%22274%22%2C%2242%22%2C%2282%22%2C%22271%22%2C%22191%22%2C%2229%22%2C%22145%22%2C%22164%22%2C%22264%22%2C%2245%22%2C%2269%22%2C%22254%22%2C%2246%22%2C%22206%22%2C%22248%22%5D" target="_blank">Mago de Viento</a>
          </div>
        </div>
      </div>

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
