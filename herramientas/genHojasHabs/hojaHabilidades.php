<!DOCTYPE html>
<?php
    include "../../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Generador de hojas de habilidades - Los Jinetes de Kal</title>

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

    <link rel="stylesheet" type="text/css" href="/res/style.css">
    <link rel="stylesheet" type="text/css" href="./hojaHabilidades.css">
  </head>
  <body>
    <div class='columnas'>
      <?php
        if(isset($_POST['habilidades'])){

          $habilidades=json_decode($_POST['habilidades'],true);
          //Ordenamos el array
          function fn_ordena($a, $b){
              if ($a['tier'] < $b['tier']) {
                  return -1;
              } else if ($a['tier'] > $b['tier']) {
                  return 1;
              } else {
                if($a['nombre'] < $b['nombre']){
                  return -1;
                }else if($a['nombre'] > $b['nombre']){
                  return 1;
                }else{
                  return 0;
                }
              }
          }
          usort($habilidades, 'fn_ordena');

          $nivel=0;
          foreach($habilidades as $hab){
            if($hab['tier']>$nivel){
              if($nivel!=0){
                echo "</div>";
              }
              $nivel=$hab['tier'];
              echo "<div class='tier'><h2>Tier ".$nivel."</h2>";
            }

            echo "<div class='habilidad'><h3>".$hab['nombre']."</h3><ul>";
            echo "<li class='horizontal'><b>Activación:</b>".($hab['continua']==0?"Instantánea":"Continua")."</li>";
            echo "<li class='horizontal'><b>Dificultad:</b>".($hab['auto']==0?$hab['tier_dif']:"Automática")."</li>";
            echo "<li class='horizontal'><b>Coste:</b>".($hab['gratis']==0?$hab['tier_coste']:"Gratis")."</li>";
            echo "<li><b>Efecto:</b>".$hab['descripcion']."</li>";
            echo "</ul></div>";
          }
          echo "</div></div></body></html>";

        }

      ?>
    </div>

  </body>
