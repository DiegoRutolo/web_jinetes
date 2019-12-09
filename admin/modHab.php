<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
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

    <link rel="stylesheet" type="text/css" href="https://jinetes.rutolo.eu/res/style.css">

    <?php
    $server = "localhost";
    $creds = file("../creds.txt");
    $usuario = trim($creds[0]);
    $passwd = trim($creds[1]);
    //$editPasswd = trim($creds[4]);
    $cadenaRand = "qwerasdfzxcv";
    ?>
  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <?php
      $con = new mysqli($server, $usuario, $passwd, "jinetes");
      if ($con->connect_error) {
        die("Error de conexión" . $con->connect_error);
      } else {
        echo "<!-- Conexion correcta -->\n";
      }

      if (!($ps = $con->prepare("SELECT id, revisar, nom, tipo, subtipo, tier, descr, contin, auto, gratis FROM Habilidad WHERE Habilidad.nom LIKE ? OR Habilidad.descr LIKE ?"))) {
        die("<div class=\"alert alert-danger\"><strong>Impreparable:</strong> " . $con->error . "</div>\n");
      } else {
        echo "<!-- Prepared statement correcto -->\n";
      }

      $strNom0 = strlen($_POST["nomHab"]) > 0 ? utf8_decode($_POST["nomHab"]) : $cadenaRand;
      $strNom = "%" . $strNom0 . "%";
      $strDesc0 = strlen($_POST["efectoText"]) > 0 ? utf8_decode($_POST["efectoText"]) : $cadenaRand;
      $strDesc = "%" . $strDesc0 . "%";

      if (!($ps->bind_param("ss", $strNom, $strDesc))) {
        die("<div class=\"alert alert-danger\"><strong>Imbindable:</strong> " . $ps->error . "</div>\n");
        // die("Inbindable:" . $ps->error);
      } else {
        echo "<!-- Parametro vinculado -->\n";
      }

      if (!($ps->execute())) {
        die("<div class=\"alert alert-danger\"><strong>Inejecutable:</strong> " . $ps->error . "</div>\n");
        // die("Inejecutable:" . $ps->error);
      } else {
        echo "<!-- PS ejecutado -->\n";
      }

      if (!($ps->store_result())) {
        die("<div class=\"alert alert-danger\"><strong>Inestorable:</strong> " . $ps->error . "</div>\n");
      } else {
        echo "<!-- Resultado almacenado -->\n";
      }

      if (!($ps->bind_result($id, $revisar, $nom, $tipo, $subtipo, $tier, $descr, $contin, $auto, $gratis))) {
        die("<div class=\"alert alert-danger\"><strong>Imbindable re:</strong> " . $ps->error . "</div>\n");
      } else {
        echo "<!-- Resultado vinculado -->\n";
      }

      echo "<!-- " . $ps->num_rows . " filas cargadas -->";
      ?>
      <div class="alert alert-info">Encontradas <strong><?= $ps->num_rows ?> filas</strong> que coinciden con los parámetros. <a href="https://jinetes.rutolo.eu/admin/index.php" class="alert-link float-right">Volver</a></div>
      <?php
      while ($ps->fetch()) { ?>
        <div class="container-fluid">
          <form method="POST" action="https://jinetes.rutolo.eu/admin/modResult.php">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-8">
                  <label >Nombre:</label>
                  <input type="text" class="form-control" name="nom" value="<?php echo utf8_encode($nom) ?>" required>
                </div>
                <div class="col-sm-4">
                  <label>Tier:</label>
                  <input type="number" class="form-control" name="tier" min="1" max="5" value="<?=utf8_encode($tier)?>" required>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm">
                  <label>Tipo:</label>
                  <?php
                  $sql = "SELECT nom FROM TipoHab WHERE TipoHab.primario = TRUE";
                  $res = $con->query($sql);
                  echo "<select class=\"form-control\" name=\"tipo\" value=\"" . utf8_encode($tipo) . "\" required>";
                  if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                      echo "<option value=\"" . utf8_encode($row["nom"]) . "\"" . (utf8_encode($tipo) === utf8_encode($row["nom"]) ? " selected" : "") . ">";
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
                <input type="text" class="form-control" name="subtipo" list="dlSubtipos" value="<?=utf8_encode($subtipo)?>">
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
                    <input type="checkbox" name="contin" class="form-check-input" value="1"<?=($contin ? " checked" : "")?>>
                    Continua
                  </label>
                </div>
                <div class="col-sm">
                  <label class="form-check-label">
                    <input type="checkbox" name="auto" class="form-check-input" value="1"<?=($auto ? " checked" : "")?>>
                    Automática
                  </label>
                </div>
                <div class="col-sm">
                  <label class="form-check-label">
                    <input type="checkbox" name="gratis" class="form-check-input" value="1"<?=($gratis ? " checked" : "")?>>
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
                <textarea class="form-control" name="descr" rows="6"><?=utf8_encode($descr)?></textarea>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm">
                <input type="password" class="form-control" name="editPasswd" placeholder="Contraseña" required>
              </div>
              <div class="col-sm">
                <input type="hidden" name="idHab" value="<?php echo $id; ?>">
                <input type="submit" class="btn btn-primary" value="Guardar">
              </div>
              <div class="col-sm">
                <a href="https://jinetes.rutolo.eu/admin/index.php" class="btn btn-primary">Volver</a>
              </div>
            </div>
          </div>
          </form>
        </div>
        <br><hr><br>
      <?php
      }

      echo "<!-- fin -->\n";
      ?>
    </div>
    <div class="boton-subir">
      <a href="#arriba">
        <?= GetIcono("fu", 45) ?>
      </a>
    </div>

    <?=Footer();?>
  </body>
</html>
