<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Hechizos y Habilidades - Los Jinetes de Kal</title>

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

    <link rel="stylesheet" type="text/css" href="../res/style.css">

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
         <?php
         $sql = "SELECT * FROM Habilidad WHERE Habilidad.tipo = 'Habilidad' ORDER BY Habilidad.tier";
         $res = $con->query($sql);
         ?>
         <table class="table table-striped table-bordered">
           <tr>
             <th>Habilidad</th>
             <th>Tier</th>
             <th>Clase</th>
             <th>Efecto</th>
           </tr>
           <?php
           if ($res->num_rows > 0) {
             while ($row = $res->fetch_assoc()) {
               $caster = is_null($row["subtipo"]) ? "Todas" : $row["subtipo"];

               echo "<tr>";

               echo "<td>" . utf8_encode($row["nom"]) . "</td>";
               echo "<td>" . utf8_encode($row["tier"]) . "</td>";
               echo "<td>" . utf8_encode($caster) . "</td>";
               echo "<td>" . utf8_encode($row["descr"]) . "</td>";

               echo "</tr>\n";
             }
           }
           ?>
         </table>
       </div>

       <div id="hechizos" class="container tab-pane">
         <h4>Hechizos</h4>
         <?php
         $sql = "SELECT *
          FROM Habilidad
          WHERE Habilidad.tipo LIKE 'Hechizo' AND NOT Habilidad.subtipo LIKE 'Canc%'
          ORDER BY Habilidad.tier";
         $res = $con->query($sql);
         ?>
         <table class="table table-striped table-bordered">
           <tr>
             <th>Hechizo</th>
             <th>Disciplina</th>
             <th>Tier</th>
             <th>Gratuito</th>
             <th>Automático</th>
             <th>Efecto</th>
           </tr>
           <?php
           if ($res->num_rows > 0) {
             while ($row = $res->fetch_assoc()) {
               echo "<tr>";

               echo "<td>" . utf8_encode($row["nom"]) . "</td>";
               echo "<td>" . utf8_encode($row["subtipo"]) . "</td>";
               echo "<td>" . utf8_encode($row["tier"]) . "</td>";
               echo "<td>" . ($row["gratis"] ? GetIcono('t') : GetIcono('c')) . "</td>";
               echo "<td>" . ($row["auto"] ? GetIcono('t') : GetIcono('c')) . "</td>";
               echo "<td>" . utf8_encode($row["descr"]) . "</td>";

               echo "</tr>\n";
             }
           }
           ?>
         </table>
       </div>

       <div id="canciones" class="container tab-pane">
         <h4>Canciones</h4>
         <?php
         $sql = "SELECT *
          FROM Habilidad
          WHERE Habilidad.subtipo LIKE 'Canc%'
          ORDER BY Habilidad.tier";
         $res = $con->query($sql);
         ?>
         <table class="table table-striped table-bordered">
           <tr>
             <th>Canción</th>
             <th>Tier</th>
             <th>Continua</th>
             <th>Gratuito</th>
             <th>Automático</th>
             <th>Efecto</th>
           </tr>
           <?php
           if ($res->num_rows > 0) {
             while ($row = $res->fetch_assoc()) {
               echo "<tr>";

               echo "<td>" . utf8_encode($row["nom"]) . "</td>";
               echo "<td>" . utf8_encode($row["tier"]) . "</td>";
               echo "<td>" . ($row["contin"] ? GetIcono('t') : GetIcono('c')) . "</td>";
               echo "<td>" . ($row["gratis"] ? GetIcono('t') : GetIcono('c')) . "</td>";
               echo "<td>" . ($row["auto"] ? GetIcono('t') : GetIcono('c')) . "</td>";
               echo "<td>" . utf8_encode($row["descr"]) . "</td>";

               echo "</tr>\n";
             }
           }
           ?>
         </table>
       </div>

       <div id="milagros" class="container tab-pane">
         <h4>Milagros</h4>
         <?php
         $sql = "SELECT *
          FROM Habilidad
          WHERE Habilidad.tipo LIKE 'Milagro'
          ORDER BY Habilidad.tier";
         $res = $con->query($sql);
         ?>
         <table class="table table-striped table-bordered">
           <tr>
             <th>Milagro</th>
             <th>Usuario</th>
             <th>Tier</th>
             <th>Efecto</th>
           </tr>
           <?php
           if ($res->num_rows > 0) {
             while ($row = $res->fetch_assoc()) {
               $caster = is_null($row["subtipo"]) ? "Ambos" : $row["subtipo"];

               echo "<tr>";

               echo "<td>" . utf8_encode($row["nom"]) . "</td>";
               echo "<td>" . utf8_encode($caster) . "</td>";
               echo "<td>" . utf8_encode($row["tier"]) . "</td>";
               echo "<td>" . utf8_encode($row["descr"]) . "</td>";

               echo "</tr>\n";
             }
           }
           ?>
         </table>
       </div>

       <div id="kihon" class="container tab-pane">
         <h4>Kihon</h4>
         <?php
         $sql = "SELECT *
          FROM Habilidad
          WHERE Habilidad.tipo LIKE 'Kihon'
          ORDER BY Habilidad.tier";
         $res = $con->query($sql);
         ?>
         <table class="table table-striped table-bordered">
           <tr>
             <th>Nombre</th>
             <th>Tier</th>
             <th>Usuario</th>
             <th>Activable</th>
             <th>Efecto</th>
           </tr>
           <?php
           if ($res->num_rows > 0) {
             while ($row = $res->fetch_assoc()) {
               $caster = is_null($row["subtipo"]) ? "Todos" : $row["subtipo"];

               echo "<tr>";

               echo "<td>" . utf8_encode($row["nom"]) . "</td>";
               echo "<td>" . utf8_encode($row["tier"]) . "</td>";
               echo "<td>" . utf8_encode($caster) . "</td>";
               echo "<td>" . ($row["contin"] ? GetIcono('t') : GetIcono('c')) . "</td>";
               echo "<td>" . utf8_encode($row["descr"]) . "</td>";

               echo "</tr>\n";
             }
           }
           ?>
         </table>
       </div>

       <div id="runas" class="container tab-pane">
         <h4>Runas</h4>
         <?php
         $sql = "SELECT *
          FROM Habilidad
          WHERE Habilidad.tipo LIKE 'Runa'
          ORDER BY Habilidad.tier";
         $res = $con->query($sql);
         ?>
         <table class="table table-striped table-bordered">
           <tr>
             <th>Nombre</th>
             <th>Tier</th>
             <th>Efecto</th>
           </tr>
           <?php
           if ($res->num_rows > 0) {
             while ($row = $res->fetch_assoc()) {
               echo "<tr>";

               echo "<td>" . utf8_encode($row["nom"]) . "</td>";
               echo "<td>" . utf8_encode($row["tier"]) . "</td>";
               echo "<td>" . utf8_encode($row["descr"]) . "</td>";

               echo "</tr>\n";
             }
           }
           ?>
         </table>
       </div>
     </div>

    </div>
    <?php $con.close(); ?>
    <div class="boton-subir">
      <a href="#arriba">
        <?= GetIcono("fu", 45) ?>
      </a>
    </div>
  </body>
</html>
