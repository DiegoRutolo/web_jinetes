<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Los Jinetes de Kal</title>

    <!-- BootStrap --->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://jinetes.rutolo.eu/res/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <h1>Administración</h2>

        <br>
        <h3>Editar habilidades y hechizos</h3>
        <form>
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#nueva">Nueva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#editar">Modificar</a>
            </li>
          </ul>

          <div class="tab-content">
            <div id="nueva" class="container tab-pane active">

            </div>

            <div id="editar" class="container tab-pane">

            </div>
          </div>
        </form>
    </div>
  </body>
</html>
