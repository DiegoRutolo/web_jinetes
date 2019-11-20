<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Hechizos</title>

    <!-- BootStrap --->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <?php
      $server = "localhost";
      $creds = file("../creds.txt");
      $usuario = trim($creds[0]);
      $passwd = trim($creds[1]);
    ?>
  </head>
  <body>
    <div class="jumbotron text-center" style="margin-bottom: 0;">
      <h1>Los Jinetes de Kal</h1>
    </div>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Sistema y contenido <span class="caret"></span></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="https://jinetes.rutolo.eu/hechizos/">Hechizos y Habilidades</a>
            <a class="dropdown-item" href="#">Pociones</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Multimedia <span class="caret"></span></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Mapas</a>
            <a class="dropdown-item" href="#">Música</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fichaWeb/ficha.html" target="_blank">Ficha web</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Personas</a>
        </li>
      </ul>
    </nav>

    <div class="container">
      <h2>Hechizos y habilidades</h2>

      <?php
        $con = new mysqli($server, $usuario, $passwd, "jinetes");
        if ($con->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM Habilidad";
        $res = $con->query($sql);

       ?>

       <table class="table table-bordered table-striped">
         <tr>
           <th>Hechizo</th>
           <th>Tier</th>
           <th>Tipo</th>
         </tr>
         <?php
         if ($res->num_rows > 0) {
           while ($row = $res->fetch_assoc()) {
             echo "<tr>";
             echo "<td>" . $row["nom"] . "</td>";
             echo "<td>" . $row["tier"] . "</td>";
             echo "<td>" . $row["tipo"] . "</td>";
             echo "</tr>";
           }
         } else {
           echo "<th>" . "nada" . "</th>";
         }
          ?>
       </table>

       <?php $con.close(); ?>
    </div>
  </body>
</html>
