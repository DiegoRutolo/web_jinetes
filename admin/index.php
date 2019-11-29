<!DOCTYPE html>
<?php
include "../res/herramientas.php";
?>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Panel de administración - Los Jinetes de Kal</title>

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

  <span id="arriba"></span>

  <div class="container">
    <h1>Administración</h2>

      <br>
      <h3>Editar habilidades y hechizos</h3>

      <?php
      $con = new mysqli($server, $usuario, $passwd, "jinetes");
      if ($con->connect_error) {
        die("Connection failed" . $con->connect_error);
      }
      ?>

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
            <form method="POST" action="https://jinetes.rutolo.eu/admin/modResult.php">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-8">
                    <label >Nombre:</label>
                    <input type="text" class="form-control" name="nom" value="<?php echo utf8_encode($hab_pend["nom"]) ?>" required>
                  </div>
                  <div class="col-sm-4">
                    <label>Tier:</label>
                    <input type="number" class="form-control" name="tier" min="1" max="5" value="<?=utf8_encode($hab_pend["tier"])?>" required>
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
                  <input type="text" class="form-control" name="subtipo" list="dlSubtipos" value="<?=utf8_encode($hab_pend["subtipo"])?>">
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
                      <input type="checkbox" name="contin" class="form-check-input" value="1"<?=($hab_pend["contin"] ? " checked" : "")?>>
                      Continua
                    </label>
                  </div>
                  <div class="col-sm">
                    <label class="form-check-label">
                      <input type="checkbox" name="auto" class="form-check-input" value="1"<?=($hab_pend["auto"] ? " checked" : "")?>>
                      Automática
                    </label>
                  </div>
                  <div class="col-sm">
                    <label class="form-check-label">
                      <input type="checkbox" name="gratis" class="form-check-input" value="1"<?=($hab_pend["auto"] ? " checked" : "")?>>
                      Gratuíta
                    </label>
                  </div>
                  <div class="col-sm">
                    <label class="form-check-label">
                      <input type="checkbox" name="revisar" class="form-check-input" value="1" checked>
                      Pendiente de revisión
                    </label>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label for="iDescr">Efecto</label>
                  <textarea class="form-control" name="descr" rows="6"><?=utf8_encode($hab_pend["descr"])?></textarea>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <input type="password" class="form-control" name="editPasswd" placeholder="Contraseña" required>
                </div>
                <div class="col-sm">
                  <input type="hidden" name="idHab" value="<?php echo $hab_pend["id"]; ?>">
                  <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
              </div>
            </div>
            </form>
            <br><hr><br>
          <?php
          }
        } ?>
      </div>

      <!-- Añadir hechizos -->
      <div id="nueva" class="container-fluid tab-pane form-group">
        <form method="POST" action="https://jinetes.rutolo.eu/admin/addResult.php">
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
              <input type="password" class="form-control" name="editPasswd" placeholder="Contraseña" required>
            </div>
            <div class="col-sm">
              <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
          </div>
        </form>
      </div>

      <!-- Editar hechizo -->
      <div id="editar" class="container tab-pane p-4">
        <form class="form-inline" method="POST" action="https://jinetes.rutolo.eu/admin/modHab.php">
          <label for="iNombreBuscar" class="mr-2">Nombre: </label>
          <input type="text" class="form-control mr-2" id="iNombreBuscar" list="dlNomHabs" name="nomHab">
          <?php
          $sql = "SELECT nom FROM Habilidad";
          $res = $con->query($sql);
          ?>
          <datalist id="dlNomHabs">
            <?php
            if ($res->num_rows > 0) {
              while ($row = $res->fetch_assoc()) {
                echo "<option value=\"" . utf8_encode($row["nom"]) . "\">\n";
              }
            }
            $con->close();
            ?>
          </datalist>
          <label for="iEfectoTxt" class="mr-2">Efecto: </label>
          <input type="text" class="form-control mr-2" id="iEfectoTxt" name="efectoText">
          <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
      </div>
    </div>
  </div>
  <div class="boton-subir">
    <a href="#arriba">
      <?= GetIcono("fu", 45) ?>
    </a>
  </div>
</body>
</html>
