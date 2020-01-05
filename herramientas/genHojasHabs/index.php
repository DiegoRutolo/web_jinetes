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

    <link rel="stylesheet" type="text/css" href="https://jinetes.rutolo.eu/res/style.css">

    <?php
      $server = "localhost";
      $creds = file("../../creds.txt");
      $usuario = trim($creds[2]);
      $passwd = trim($creds[3]);
    ?>
  </head>
  <body>
    <script type="text/javascript">
      var habilidades=[];
      var habilidad_seleccionada=0;
      var habilidades_seleccionadas=[];

      <?php
        echo "var red_cross='".GetIcono('c')."';";

        $con = new mysqli($server, $usuario, $passwd, "jinetes");
        if ($con->connect_error) {
          die("Connection failed" . $con->connect_error);
        }

        $sql = "SELECT * FROM Habilidad INNER JOIN TierHab ON Habilidad.tier=TierHab.num ORDER BY Habilidad.nom";
        $res = $con->query($sql);
        if ($res->num_rows > 0) {
          while ($row = $res->fetch_array()) {
            $seq->id=utf8_encode($row["id"]);
            $seq->nombre=utf8_encode($row["nom"]);
            $seq->tipo=utf8_encode($row["tipo"]);
            $seq->subtipo=utf8_encode($row["subtipo"]);
            $seq->tier=utf8_encode($row["tier"]);
            $seq->descripcion=utf8_encode($row["descr"]);
            $seq->continua=utf8_encode($row["contin"]);
            $seq->auto=utf8_encode($row["auto"]);
            $seq->gratis=utf8_encode($row["gratis"]);
            $seq->tier_min=utf8_encode($row["min"]);
            $seq->tier_dif=utf8_encode($row["dif"]);
            $seq->tier_coste=utf8_encode($row["coste"]);
            //echo "<option numero='".$contador."' value='" . utf8_encode($row["nom"]) . "'>".utf8_encode($row["nom"])."</option>";
            echo "habilidades.push(".json_encode($seq).");";
          }
        }
      ?>

      console.log(habilidades);
    </script>
    <?php ImprimeNavBar(); ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div>
            <h1>Generador de hojas de habilidad</h1>
          </div>

          <div class="row my-2">
            <div class="col-auto">
              <h2>Selecciona un Título:</h2>
            </div>
            <div class="col">
              <input form="formulario_generar" id="nombre_hoja" class="form-control" type="text" name="titulo" value="">
            </div>
          </div>

          <div class="row my-2">
            <div class="col-auto">
              <h2>Selecciona una Habilidad:</h2>
            </div>
            <div class="col">
              <select class="selectpicker" id="habilidades" data-live-search="true">
              </select>
            </div>
          </div>
          <section>
            <h2>Información de la habilidad:</h2>
            <table class="table table-striped table-bordered">
              <tr>
                <td style='width:7em'><b>Nombre</b></td>
                <td id="nombre_habilidad"></td>
              </tr>
              <tr>
                <td><b>Descripción</b></td>
                <td id="descripcion_habilidad"></td>
              </tr>
              <tr>
                <td><b>Tipo</b></td>
                <td id="tipo_habilidad"></td>
              </tr>
              <tr>
                <td><b>Subtipo</b></td>
                <td id="subtipo_habilidad"></td>
              </tr>
              <tr>
                <td><b>Tier</b></td>
                <td id="tier_habilidad"></td>
              </tr>
            </table>
            <div id="boton_add_habilidad" class="btn btn-primary my-4">Añadir!</div>
          </section>
        </div>
        <div class="col-lg-3 border block">
          <section>
                <h2 class="mt-2 text-center">Habilidades seleccionadas</h2>
                <ul id="lista_habilidades_seleccionadas" class="list-group list-group-flush">
                </ul>
                <form id="formulario_generar" method="get" action="hojaHabilidades.php" target="_blank">
                  <input type="hidden" name="habilidades" value="NO_SET" />
                  <button form="formulario_generar" id="boton_generar" type="submit" class="col-12 btn btn-primary my-4">Generar!</button>
                </form>
          </section>
        </div>
      </div>
    </div>

  </body>
  <script type="text/javascript">
    function rellenarTabla(){
      $("#nombre_habilidad").text(habilidades[habilidad_seleccionada].nombre);
      $("#tipo_habilidad").text(habilidades[habilidad_seleccionada].tipo);
      $("#subtipo_habilidad").text(habilidades[habilidad_seleccionada].subtipo!=null?habilidades[habilidad_seleccionada].subtipo:"Común");
      $("#tier_habilidad").html(habilidades[habilidad_seleccionada].tier+" <span class='ml-3'></span>(Dificultad: "+(habilidades[habilidad_seleccionada].auto==0?habilidades[habilidad_seleccionada].tier_dif:"Automática")+", Coste: "+(habilidades[habilidad_seleccionada].gratis==0?habilidades[habilidad_seleccionada].tier_coste:"Gratis")+")");
      $("#descripcion_habilidad").text(habilidades[habilidad_seleccionada].descripcion);
    }

    let lista=$("#habilidades");
    for(let i=0;i<habilidades.length;i++){
      lista.append("<option value='"+i+"'>"+habilidades[i].nombre+"</option>");
    }

    rellenarTabla();

    //Event Listeners
    lista.on('change',function(){
      habilidad_seleccionada=parseInt(lista.val());
      rellenarTabla();
    });

    let lista_habilidades_seleccionadas=$("#lista_habilidades_seleccionadas");
    let boton_add_habilidad=$("#boton_add_habilidad");
    boton_add_habilidad.on('click',function(){
      if(!habilidades_seleccionadas.includes(habilidad_seleccionada)){
        habilidades_seleccionadas.push(habilidad_seleccionada);
        lista_habilidades_seleccionadas.append("<li id='habilidad_"+habilidad_seleccionada+"' class='list-group-item d-flex justify-content-between align-items-center'><span style='font-size:1.25em'>"+habilidades[habilidad_seleccionada].nombre+"</span><span onclick='eliminar_hab_seleccionada("+habilidad_seleccionada+")' class='btn btn-outline-danger'>"+red_cross+"</span></li>");
      }
    });

    function eliminar_hab_seleccionada(hab){
      if(habilidades_seleccionadas.includes(hab)){
        habilidades_seleccionadas=habilidades_seleccionadas.filter(function(value,index,arr){
          return value!=hab;
        });
        $("#habilidad_"+hab).remove();
      }
    }

    $("#formulario_generar").on('submit',function(){
      let json=[];
      habilidades_seleccionadas.forEach(function(item,index){
        json.push(habilidades[item].id);
      });
      $("#formulario_generar input[name='habilidades']").val(JSON.stringify(json));
    });

  </script>
</html>
