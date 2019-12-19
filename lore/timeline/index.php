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
    <link rel="stylesheet" type="text/css" href="estilo_timeline.css">
  </head>
  <body>
    <span id="arriba"></span>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <h1 class="jinetes">Historia del mundo</h1>

      <article class="timeline">
        <div class="tli">
          <h4 class="titulo">Ella</h4>
          <p class="txt">Anterior al tiempo.</p>
        </div>

        <h3 class="ano">¿?</h3>

        <div class="tli">
          <h4 class="titulo">Los mensajeros</h4>
          <p class="txt">Od, Baalum y Zo'tan</p>
        </div>

        <div class="tli">
          <h4 class="titulo">Los 5 titanes</h4>
          <p class="txt">Yag, titán de la oscuridad. Fazif, titán del fuego. Enir, titán del agua. Sieg, titan de la tierra. Dorean, titán del aire.</p>
        </div>

        <div class="tli">
          <h4 class="titulo">Mithaden</h4>
          <p class="txt">Titán de la natuzaleza y mediador.</p>
        </div>

        <div class="tli">
          <h4 class="titulo">Sello de los titanes</h4>
        </div>

        <h3 class="ano">-500~</h3>

        <div class="tli">
          <h4 class="titulo">Fundación de Soma</h4>
          <p class="txt">Ibelsa y Kasul se instalan a orillas de un lago.</p>
        </div>

        <div class="tli">
          <h4 class="titulo">Concilio de Kal</h4>
        </div>

        <h3 class="ano">-10~</h3>

        <div class="tli">
          <h4 class="titulo">Cambio de idioma</h4>
          <p class="txt">El Consejo decide crear una nueva lengua para uso común, para restringir el uso de magia accidental por parte de la población.</p>
        </div>

        <h3 class="ano">0</h3>

        <div class="tli">
          <h4 class="titulo">Creación de las Torres</h4>
          <p class="txt">Fin de la Edad Antigua y comienzo del Calendario de Las Torres de Magia.</p>
        </div>

        <h3 class="ano">173</h3>

        <div class="tli">
          <h4 class="titulo">Primera Guerra Civil</h4>
          <p class="txt">Algunos humanos son exiliados del continente.</p>
        </div>

        <h3 class="ano">240</h3>

        <div class="tli">
          <h4 class="titulo">Conflicto comercial Elfos-Enanos</h4>
          <p class="txt">Los enanos abandonal el Concilio y forman un país propio bajo las montañas.</p>
        </div>

        <h3 class="ano">270</h3>

        <div class="tli">
          <h4 class="titulo">Tregua Elfos-Enanos</h4>
        </div>

        <h3 class="ano">327</h3>

        <div class="tli">
          <h4 class="titulo">Firma de paz Elos-Enanos</h4>
          <p class="txt">El Concilio y el país enano forman una alianza.</p>
        </div>

        <h3 class="ano">400</h3>

        <div class="tli">
          <h4 class="titulo">Primera Invasión Verde</h4>
          <p class="txt">Los pielesverdes del continente oscuro del sur invaden la mitad sur.</p>
        </div>

        <div class="tli">
          <h4 class="titulo">Cambios de capital</h4>
          <p class="txt">La capital del Concilio se mueve de Kalendor a Soma. La capital enana se mueve de Kar-Vallal a Kar-Notal.</p>
        </div>

        <h3 class="ano">437</h3>

        <div class="tli">
          <h4 class="titulo">Reconquista</h4>
          <p class="txt">Con la ayuda de un ejercito del norte.</p>
        </div>

        <h3 class="ano">450</h3>

        <div class="tli partida">
          <h4 class="titulo">Abra cadabra</h4>
          <p class="txt">Un grupo multidisciplinar arcano investiga cosas.</p>
        </div>

        <h3 class="ano">461</h3>

        <div class="tli">
          <h4 class="titulo">Guerra en el norte</h4>
          <p class="txt">El XI regimiento desaparece en el norte.</p>
        </div>

        <h3 class="ano">469</h3>

        <div class="tli partida">
          <h4 class="titulo">Moeda máxica</h4>
          <p class="txt">Creación del gremio <i>A Moeda Máxica</i>.</p>
        </div>

        <h3 class="ano">475</h3>

        <div class="tli">
          <h4 class="titulo">Regreso del XI</h4>
          <p class="txt">El XI regimiento vuelve a casa con más del 90% de bajas.</p>
        </div>

        <div class="tli partida">
          <h4 class="titulo">Fundación del Oso Vago</h4>
          <p class="txt">Elara, Heske, Treilla y Volgarr fundan el gremio <span class="jinetes">El Oso Vago</span>.</p>
        </div>
      </article>

    </div>
    <?=Footer();?>
    <div class="boton-subir">
      <a href="#arriba">
        <?= GetIcono("fu", 45) ?>
      </a>
    </div>
  </body>
</html>
