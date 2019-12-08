<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Objetos - Los Jinetes de Kal</title>

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

    <link rel="stylesheet" type="text/css" href="https://jinetes.rutolo.eu/res/style.css">

    <?php
      $server = "localhost";
      $creds = file("../creds.txt");
      $usuario = trim($creds[2]);
      $passwd = trim($creds[3]);
    ?>
  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <?php
        $con = new mysqli($server, $usuario, $passwd, "jinetes");
        if ($con->connect_error) {
          die("Connection failed" . $conn->connect_error);
        }
     ?>

     <!-- Pestañas -->
     <ul class="nav nav-tabs">
       <li class="nav-item">
         <a class="nav-link active" data-toggle="tab" href="#pociones">Pociones</a>
       </li>
     </ul>

     <!-- Contenido -->
     <div class="tab-content">
       <div id="pociones" class="container tab-pane active">
         <?php
         $sql_pociones = "SELECT * FROM Pociones ORDER BY nom";
         $res_pociones = $con->query($sql_pociones);

         if ($res_pociones->num_rows > 0) {
           while ($pocion = $res_pociones->fetch_assoc()) {
         ?>

         <div id="pocion-<?=$pocion["id"];?>">
           <h4>
             <?=utf8_encode($pocion["nom"]);?>
           </h4>
           <p><?=utf8_encode($pocion["efecto"]);?></p>
         </div>


          <?php
          $id_poc = $pocion["id"];
          $sql_ingredientes = "SELECT * FROM Poc_Ingr JOIN Ingredientes ON Poc_Ingr.ingr = Ingredientes.id WHERE Poc_Ingr.poc = $id_poc ORDER BY Poc_Ingr.cant DESC, Ingredientes.nom";
          $res_ingredientes = $con->query($sql_ingredientes);

          if ($res_ingredientes->num_rows > 0) { ?>
            <div class="btn btn-primary" data-toggle="collapse" data-target="#col-poc-<?=$pocion["id"];?>">
              Ver receta
            </div>

            <div id="col-poc-<?=$pocion["id"];?>" class="collapse">
           <?php while ($ingrediente = $res_ingredientes->fetch_assoc()) { ?>
             <dl>
               <dt>
                 <a href="#ingrediente-<?=$ingrediente["id"];?>"><?=utf8_encode($ingrediente["nom"]);?></a>
               </dt>
               <dd>
                 (<?=utf8_encode($ingrediente["cant"]);?>) <?=utf8_encode($ingrediente["coment"]);?>
               </dd>
             </dl>
           <?php
           }
           echo "</div>";
          }
          ?>


         <br><hr><br>

         <?php
           }
         }
         ?>
       </div>
     </div>
    </div>
  </body>
</html>
