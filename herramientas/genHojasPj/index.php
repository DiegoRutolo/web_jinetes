<!DOCTYPE html>
<?php
    include "../../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Generador de hojas de personaje - Los Jinetes de Kal</title>

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
    <script type="text/javascript" src="./modelo.js"></script>
    <script type="text/javascript">
      let razas=modeloPj.Razas;
      let clases=modeloPj.Clases;
      let raza_actual;
      let clase_actual;

      function generarPj(){
        let attr_actual={"Fue":0,"Des":0,"Con":0,"Car":0,"Int":0,"Sab":0};
        let puntos=Math.floor(Math.random()*10+1) + Math.floor(Math.random()*10+1) + Math.floor(Math.random()*10+1) + Math.floor(Math.random()*10+1) + Math.floor(Math.random()*10+1);
        console.log("Puntos iniciales: "+puntos);
        let stats=[];
        //Asignamos los puntos base por raza
        for(let att in attr_actual){
          attr_actual[att]=raza_actual[att];
          if(clase_actual.Principal==att){
            attr_actual[att]+=10;
          }else if(clase_actual.Secundario==att){
            attr_actual[att]+=5;
          }else{
            stats.push(att);
          }
        }
        console.log("Stats terciarios: "+stats);
        //Gastamos todos los puntos que podamos en los atributos primario y secundario
        attr_actual[clase_actual.Principal]+=(puntos>=10?10:puntos>0?puntos:0);
        puntos-=10;
        attr_actual[clase_actual.Secundario]+=(puntos>=10?10:puntos>0?puntos:0);
        puntos-=10;
        //Comprobamos si quedan más puntos que gastar y los repartimos
        while(puntos>0){
          let indice=Math.floor(Math.random()*stats.length);
          let stat=stats[indice];
          attr_actual[stat]+=(puntos>=10?10:puntos);
          puntos-=10;
          stats.splice(indice,1);
        }
        //Actualizamos valores de la tabla
        for(let att in attr_actual){
          let t_att=$("#"+att);
          let t_batt=$("#B"+att);
          t_att.text(attr_actual[att]);
          t_batt.text(attr_actual[att]<10?"-20":attr_actual[att]<20?"-15":attr_actual[att]<30?"-10":attr_actual[att]<40?"-5":attr_actual[att]<50?"0":attr_actual[att]<60?"+5":attr_actual[att]<70?"+10":attr_actual[att]<80?"+15":attr_actual[att]<90?"+20":attr_actual[att]<100?"+25":"+30");
        }
        console.log(attr_actual);
      }
    </script>
    <?php ImprimeNavBar(); ?>

    <!--
      Razas:
        Humanos
        Enanos
        Duendes
        Elfos
      Clases
        Bardo: Car, Des
        Cazador: Des, Fue
        Domabestias: Car, Int
        Guerrero Tribal: Fue, Con
        Herrero Rúnico: Des, Fue
        Monje Espadachin: Sab, Des
        Mago Elemental: Sab, Int
        Druida: Sab, Con
        Paladín: Sab, Con
        Pícaro: Des, Car
        Sacerdote: Sab, Car
        Soldado: Fue, Des
      Porcentajes Repartición:
        Primaria: 75%
        Secundaria: 25%
      Apariencia: 3d4-2
    -->
    <div class="row">
      <div class="col">
        <h2>Elige Raza:</h2>
        <select class="selectpicker" id="razas" data-live-search="true">
        </select>
      </div>
      <div class="col">
        <h2>Elige Clase:</h2>
        <select class="selectpicker" id="clases" data-live-search="true">
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button type="button" name="button" onclick="generarPj()">Generar Personaje</button>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-striped table-bordered">
          <thead>
            <th>Fue</th>
            <th>Des</th>
            <th>Con</th>
            <th>Car</th>
            <th>Int</th>
            <th>Sab</th>
          </thead>
          <tbody>
            <tr>
              <td id="Fue"></td>
              <td id="Des"></td>
              <td id="Con"></td>
              <td id="Car"></td>
              <td id="Int"></td>
              <td id="Sab"></td>
            </tr>
            <tr>
              <td id="BFue"></td>
              <td id="BDes"></td>
              <td id="BCon"></td>
              <td id="BCar"></td>
              <td id="BInt"></td>
              <td id="BSab"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <h2></h2>

    <script type="text/javascript">
      //Cargamos las opciones de las listas de raza y clase
      let l_razas=$("#razas");
      for(let r in razas){
        l_razas.append("<option value='"+r+"'>"+r+"</option>");
      }
      let l_clases=$("#clases");
      for(let c in clases){
        l_clases.append("<option value='"+c+"'>"+c+"</option>");
      }
      //Fijamos la raza y clase seleccionadas por defecto
      raza_actual=razas[l_razas.val()];
      clase_actual=clases[l_clases.val()];

      //Cuando se cambie la raza o clase actualizamos el cambio
      l_razas.on('change',function(){
        raza_actual=razas[l_razas.val()];
      });
      l_clases.on('change',function(){
        clase_actual=clases[l_clases.val()];
      });
    </script>
  </body>
</html>
