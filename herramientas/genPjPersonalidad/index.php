<!DOCTYPE html>
<?php
    include "../../res/herramientas.php";
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

    <link rel="stylesheet" type="text/css" href="/res/style.css">

    <style type="text/css">
      .lista {
        border: 2px solid Brown;
        border-radius: 11px;
        background-color: PaleGoldenrod;
        min-height: 10em;
      }

      .lista li {
        list-style: none;
      }
    </style>

    <script>
      var adjs = [];

      function inicializa() {
        cargarListas();

        for (const i of document.getElementsByTagName("input")) {
          i.value = 5;
          escritor(i);
        }
      }

      function cargarListas() {
        var listaFiles = ["es_positivas.txt", "es_neutrales.txt", "es_negativas.txt"];

        for (const file of listaFiles) {
          // Leer archivo
          var xhr = new XMLHttpRequest();
          xhr.open("GET", file, false);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
              if (xhr.status === 200) {
                // console.log("Respuesta: " + xhr.responseText);
                adjs.push(xhr.responseText);

              } else {
                console.log("Status:" + xhr.statusText);
              }
            } else {
              console.log("Ready state: " + xhr.reareadyState);
            }
          }
          xhr.send();
        }
      }

      function getAdj(lista) {
        var listaAdj;
        if (lista.isEqualNode(document.getElementById("listaPositiva"))) {
          listaAdj = adjs[0];
        } else if (lista.isEqualNode(document.getElementById("listaNeutral"))) {
          listaAdj = adjs[1];
        } else if (lista.isEqualNode(document.getElementById("listaNegativa"))) {
          listaAdj = adjs[2];
        }

        listaAdj = listaAdj.split(/\n/);
        var randIndex = Math.floor(Math.random() * listaAdj.length);

        return listaAdj[randIndex];
      }

      function escribeLista(lista, numero) {
        lista.innerHTML = "";
        for (i = 0; i < numero; i++) {
          lista.innerHTML += "<li>" + getAdj(lista) + "</li>";
        }
      }

      function escritor(elemento) {
        if (elemento.isEqualNode(document.getElementById("iNumPos"))) {
          escribeLista(document.getElementById("listaPositiva"), elemento.value);
        } else if (elemento.isEqualNode(document.getElementById("iNumNeu"))) {
          escribeLista(document.getElementById("listaNeutral"), elemento.value);
        } else if (elemento.isEqualNode(document.getElementById("iNumNeg"))) {
          escribeLista(document.getElementById("listaNegativa"), elemento.value);
        }
      }

    </script>

  </head>
  <body onload="inicializa()">
    <span id="arriba"></span>

    <?php ImprimeNavBar(); ?>

    <div class="container">

      <h2>Generador de personalidades</h2>

      <p>Este es un generador de personalidades. Están divididas en 3 grupos, pero es posible que no siempre sean correctos.</p>

      <section class="container-fluid">
        <form>
          <div class="row m-5">
            <div class="col form-group">
              <h4>Positivas</h4>
              <input type="number" id="iNumPos" name="numPos" class="form-control" value="3" min="0" max="20" onchange="escritor(this)">
              <br>
              <ul class="lista" id="listaPositiva">
              </ul>
            </div>
            <div class="col form-group">
              <h4>Neutrales</h4>
              <input type="number" id="iNumNeu" name="numPos" class="form-control" value="3" min="0" max="20" onchange="escritor(this)">
              <br>
              <ul class="lista" id="listaNeutral">
              </ul>
            </div>
            <div class="col form-group">
              <h4>Negativas</h4>
              <input type="number" id="iNumNeg" name="numPos" class="form-control" value="3" min="0" max="20" onchange="escritor(this)">
              <br>
              <ul class="lista" id="listaNegativa">
              </ul>
            </div>
          </div>
        </form>
      </section>

    </div>
    <?=Footer();?>
    <div class="boton-subir">
      <a href="#arriba">
        <?= GetIcono("fu", 45) ?>
      </a>
    </div>

  </body>
</html>
