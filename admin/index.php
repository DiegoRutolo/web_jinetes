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
      <h1>Administración</h2>

        <br>
        <h3>Editar habilidades y hechizos</h3>

        <?php
          $con = new mysqli($server, $usuario, $passwd, "jinetes");
          if ($con->connect_error) {
            die("Connection failed" . $conn->connect_error);
          }
        ?>

        <form method="post">

          <br>
          <label>Contraseña: </label>
          <input type="password" name="passwd" id="iPasswd">
          <br>

          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#revisar">Revisar habilidades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#nueva">Nueva</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#editar">Modificar</a>
            </li>
          </ul>

          <!-- Contenido -->
          <div class="tab-content">
            <!-- Revision de hechizos -->
            <div id="revisar" class="container tab-pane active form-group">
              <?php
                $sql = "SELECT * FROM Habilidad WHERE Habilidad.revisar = 1";
                $habs_pend = $con->query($sql);

                if ($habs_pend->num_rows > 0) {
                  while ($hab_pend = $habs_pend->fetch_assoc()) { ?>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-8">
                          <label >Nombre:</label>
                          <?php echo "<input type=\"text\" class=\"form-control\" name=\"nom\" value=\"" . utf8_encode($hab_pend["nom"]) . "\" required>" ?>
                        </div>
                        <div class="col-sm-4">
                          <label>Tier:</label>
                          <?php echo "<input type=\"number\" class=\"form-control\" name=\"tier\" min=\"1\" max=\"5\" value=\"" . utf8_encode($hab_pend["tier"]) . "\" required>" ?>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm">
                          <label>Tipo:</label>
                          <?php
                            $sql = "SELECT nom FROM TipoHab WHERE TipoHab.primario = TRUE";
                            $res = $con->query($sql);
                          echo "<select class=\"form-control\" name=\"tipo\" value=\"" . utf8_encode($hab_pend["tipo"]) . "\" required>";
                            if ($res->num_rows > 0) {
                              while ($row = $res->fetch_assoc()) {
                                echo "<option value=\"" . utf8_encode($row["nom"]) . "\">";
                                echo utf8_encode($row["nom"]);
                                echo "</option>\n";
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="col-sm">

                          <!-- TODO: Mostrar solo los adecuados según la tabla RelTipoPrim -->
                          <label>Subtipo (opcional):</label>
                          <?php
                          echo "<input type=\"text\" class=\"form-control\" name=\"subtipo\" list=\"dlSubtipos\" value=\"" . utf8_encode($hab_pend["subtipo"]) . "\">";

                            $sql = "SELECT nom FROM TipoHab WHERE TipoHab.primario = FALSE";
                            $res = $con->query($sql);
                          ?>
                          <datalist id="dlSubtipos">
                            <?php
                            if ($res->num_rows > 0) {
                              while ($row = $res->fetch_assoc()) {
                                echo "<option value=\"" . utf8_encode($row["nom"]) . "\">\n";
                              }
                            }
                            ?>
                          </datalist>
                        </div>
                        <div class="form-check">
                          <div class="col-sm">
                            <label class="form-check-label">
                              <?php echo "<input type=\"checkbox\" name=\"contin\" class=\"form-check-input\" value=\"1\"" . ($hab_pend["contin"] ? "checked" : "") . ">"; ?>
                              Continua
                            </label>
                          </div>
                          <div class="col-sm">
                            <label class="form-check-label">
                              <?php echo "<input type=\"checkbox\" name=\"auto\" class=\"form-check-input\" value=\"1\"" . ($hab_pend["auto"] ? "checked" : "") . ">"; ?>
                              Automática
                            </label>
                          </div>
                          <div class="col-sm">
                            <label class="form-check-label">
                              <?php echo "<input type=\"checkbox\" name=\"gratis\" class=\"form-check-input\" value=\"1\"" . ($hab_pend["gratis"] ? "checked" : "") . ">"; ?>
                              Gratuíta
                            </label>
                          </div>
                          <div class="col-sm">
                            <label class="form-check-label">
                              <input type="checkbox" name="revisar" id="iRevisar" class="form-check-input" value="1">
                              Pendiente de revisión
                            </label>
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm">
                          <label for="iDescr">Efecto</label>
                          <?php echo "<textarea class=\"form-control\" name=\"descr\" rows=\"6\">" . utf8_encode($hab_pend["descr"]) . "</textarea>" ?>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-sm">
                          <input type="submit" class="btn btn-primary" value="Guardar">
                        </div>
                      </div>
                    </div>

                    <hr>
                  <?php }
                }
              ?>

            </div>

            <!-- Añadir hechizos -->
            <div id="nueva" class="container-fluid tab-pane form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label for="iNom">Nombre:</label>
                  <input type="text" class="form-control" id="iNom" name="nom" required>
                </div>
                <div class="col-sm-4">
                  <label for="iTier">Tier:</label>
                  <input type="number" class="form-control" id="iTier" name="tier" min="1" max="5" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="iTipo">Tipo:</label>
                  <?php
                    $sql = "SELECT nom FROM TipoHab WHERE TipoHab.primario = TRUE";
                    $res = $con->query($sql);
                  ?>
                  <select class="form-control" id="iTipo" name="tipo" required>
                    <?php
                    if ($res->num_rows > 0) {
                      while ($row = $res->fetch_assoc()) {
                        echo "<option value=\"" . utf8_encode($row["nom"]) . "\">";
                        echo utf8_encode($row["nom"]);
                        echo "</option>\n";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="col-sm">

                  <!-- TODO: Mostrar solo los adecuados según la tabla RelTipoPrim -->
                  <label for="iSubtipo">Subtipo (opcional):</label>
                  <input type="text" class="form-control" id="iSubtipo" name="subtipo" list="dlSubtipos">
                  <?php
                    $sql = "SELECT nom FROM TipoHab WHERE TipoHab.primario = FALSE";
                    $res = $con->query($sql);
                  ?>
                  <datalist id="dlSubtipos">
                    <?php
                    if ($res->num_rows > 0) {
                      while ($row = $res->fetch_assoc()) {
                        echo "<option value=\"" . utf8_encode($row["nom"]) . "\">\n";
                      }
                    }
                    ?>
                  </datalist>
                </div>
                <div class="form-check">
                  <div class="col-sm">
                    <label class="form-check-label">
                      <input type="checkbox" name="contin" id="iCont" class="form-check-input" value="1">
                      Continua
                    </label>
                  </div>
                  <div class="col-sm">
                    <label class="form-check-label">
                      <input type="checkbox" name="auto" id="iAuto" class="form-check-input" value="1">
                      Automática
                    </label>
                  </div>
                  <div class="col-sm">
                    <label class="form-check-label">
                      <input type="checkbox" name="gratis" id="iGratis" class="form-check-input" value="1">
                      Gratuíta
                    </label>
                  </div>
                  <div class="col-sm">
                    <label class="form-check-label">
                      <input type="checkbox" name="revisar" id="iRevisar" class="form-check-input" value="1" checked>
                      Pendiente de revisión
                    </label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="iDescr">Efecto</label>
                  <textarea class="form-control" id="iDescr" name="descr" rows="6"></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
              </div>
            </div>

            <div id="editar" class="container tab-pane">

            </div>
          </div>
        </form>
    </div>
    <?php $con.close(); ?>
  </body>
</html>
