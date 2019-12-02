<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Gente - Los Jinetes de Kal</title>

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
  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <section>
        <p>Personas</p>
        <p>Todas las personas que participaron en la creación de éste sistema y mundo, en mayor o menor medida</p>

        <p>
        <div class="card-columns">

          <!-- Myr -->
          <div class="card bg-primary text-white" id="mistermyr">
            <img class="card-img-top" src="https://jinetes.rutolo.eu/gente/img/MysterMyr.jpg">
            <div class="card-body">
              <h4 class="card-title">Myster Myr</h4>
              <p class="card-text">Creador del mundo y sistema, compositor de la música y DM principal.</p>
              <a class="stretched-link" href="https://twitter.com/MisterMyr" target="_blank"><img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter icon"><a>
            </div>
          </div>
          <br>

          <!-- Diego -->
          <div class="card bg-warning" id="diegorutolo">
            <div class="card-body">
              <h4 class="card-title">DiegoRutolo</h4>
              <p class="card-text">Coautor del manual, desarrollador de la web, DM, jugador de <a href="#heske">Heske</a> y <a href="#galdor">Galdor</a>.</p>
              <a class="btn btn-secondary" href="https://rutolo.eu" target="_blank">WWW</a>
              <a class="btn btn-secondary" href="https://github.com/DiegoRutolo" target="_blank">GitHub</i></a>
            </div>
            <img class="card-img-bottom" src="https://jinetes.rutolo.eu/gente/img/Caradox.jpg">
          </div>
          <br>

          <!-- Iago -->
          <div class="card bg-secondary text-white" id="iagolobla">
            <div class="card-body">
              <h4 class="card-title">Iagolobla</h4>
              <p class="card-text">Programador, equilibrio del sistema, jugador de <a href="#volgarr">Volgarr</a> y <a href="#zacatrus">Zacatrús</a>.</p>
            </div>
          </div>
          <br>

          <!-- Nere -->
          <div class="card bg-secondary text-white" id="neremortal">
            <div class="card-body">
              <h4 class="card-title">Nere</h4>
              <p class="card-text">Jugadora de <a href="#treilla">Treilla</a> y <a href="#keran">Keran</a> y experta en fauna.</p>
              <a class="card-link" href="https://twitter.com/neremortal3" target="_blank"><img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter icon"><a>
            </div>
          </div>
          <br>

          <!-- Kraken -->
          <div class="card bg-secondary text-white" id="kraken">
            <div class="card-body">
              <h4 class="card-title">Kraken</h4>
              <p class="card-text">Autora de los dibujos chibis de varios personajes</p>
              <a class="card-link" href="https://twitter.com/lilsaku" target="_blank"><img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter icon"><a>
              <a class="card-link" href="https://www.twitch.tv/krakenreeeeflex" target="_blank"><img src="https://static.twitchcdn.net/assets/favicon-32-d6025c14e900565d6177.png" alt="Twitter icon"><a>
            </div>
          </div>
          <br>

          <!-- Atan -->
          <div class="card bg-secondary text-white" id="datanromar">
            <div class="card-body">
              <h4 class="card-title">Daniel Atán</h4>
              <p class="card-text">Jugador de <a href="#heske">Heske</a> y <a href="#allegra">Allegra</a>.</p>
              <a class="card-link" href="https://twitter.com/datanromar" target="_blank"><img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter icon"><a>
            </div>
          </div>
          <br>

          <!-- Gnomo -->
          <div class="card bg-secondary text-white" id="gnomo">
            <div class="card-body">
              <h4 class="card-title">Mortalgnomo</h4>
              <p class="card-text">Jugador de <a href="#elara">Elara</a>.</p>
            </div>
          </div>
          <br>

          <!-- Angel -->
          <div class="card bg-secondary text-white" id="jangel">
            <div class="card-body">
              <h4 class="card-title">Ángel</h4>
              <p class="card-text">Jugador de <a href="#jesus">Jesús</a> (as himself).</p>
            </div>
          </div>
          <br>

          <!-- Xandre -->
          <div class="card bg-secondary text-white" id="xandre">
            <div class="card-body">
              <h4 class="card-title">Xandre</h4>
              <p class="card-text">Jugador de <a href="#xandre_pj">Xandre</a> (as himself).</p>
            </div>
          </div>
          <br>

          <!-- Sara -->
          <div class="card bg-secondary text-white" id="sara">
            <div class="card-body">
              <h4 class="card-title">Sara</h4>
              <p class="card-text">Jugadora de <a href="#jesus">Zado</a>.</p>
            </div>
          </div>
          <br>

          <!-- Clau -->
          <div class="card bg-secondary text-white" id="clau">
            <div class="card-body">
              <h4 class="card-title">Clau</h4>
              <p class="card-text">Jugadora de <a href="#treilla">Treilla</a>.</p>
            </div>
          </div>
          <br>

          <!-- Erane -->
          <div class="card bg-secondary text-white" id="erane">
            <div class="card-body">
              <h4 class="card-title">Erane</h4>
              <p class="card-text">Jugadora de <a href="#elara">Elara</a>.</p>
            </div>
          </div>
          <br>

          <!-- Elia -->
          <div class="card bg-secondary text-white" id="erane">
            <div class="card-body">
              <h4 class="card-title">Elia</h4>
              <p class="card-text">Jugadora de <a href="#aeria">Aeria Cornell</a>.</p>
            </div>
          </div>
          <br>

          <!-- Laurita -->
          <div class="card bg-secondary text-white" id="erane">
            <div class="card-body">
              <h4 class="card-title">Laura</h4>
              <p class="card-text">Jugadora de <a href="#fingul">Fingul Pok</a>.</p>
            </div>
          </div>

        </div>
      </section>

      <br><hr /><br />

      <section>
        <h3>Personajes</h3>
        <p>Los personajes de nuestras partidas</p>

        <div class="card-columns">
          <!-- Heske -->
          <div class="card" id="heske">
            <div class="card-body">
              <h4 class="card-title">Heske</h4>
              <p class="card-text">Mago elfo elemental especializado en fuego. Suele tener mala suerte y su familia lo desheredó por ello.</p>
            </div>
          </div>
          <br>

          <!-- Treilla -->
          <div class="card" id="treilla">
            <div class="card-body">
              <h4 class="card-title">Treilla</h4>
              <p class="card-text">Niña semielfa y hermana pequeña de <a href="#elara">Elara</a> . La druida más joven de la historia de <span class="jinetes">Las Torres de Magia</span>.</p>
            </div>
          </div>
          <br>

          <!-- Elara -->
          <div class="card" id="elara">
            <div class="card-body">
              <h4 class="card-title">Elara</h4>
              <p class="card-text">Cazadora semielfa, hermana mayor de <a href="#treilla">Treilla</a>.</p>
            </div>
          </div>
          <br>

          <!-- Volgarr -->
          <div class="card" id="volgarr">
            <div class="card-body">
                <h4 class="card-title">Volgarr</h4>
                <p class="card-text">Guerrero de las tribus bárbaras del norte. Se unió al <span class="jinetes">Undécimo regimiento</span> y fue uno de los pocos supervivientes.</p>
            </div>
          </div>
          <br>

          <!-- Allegra -->
          <div class="card" id="allegra">
            <div class="card-body">
              <h4 class="card-title">Allegra Aldintor</h4>
              <p class="card-text">Humana paladín de <span class="jinetes">Baalum</span>. Hija de <a href="#aeria">Aeria Aldintor</a>.</p>
            </div>
          </div>
          <br>

          <!-- Jesus -->
          <div class="card" id="jesus">
            <div class="card-body">
              <h4 class="card-title">Jesús</h4>
              <p class="card-text">Humano de nuestro mundo, apareció en Kal de repende y sin saber por qué junto con <a href="#xandre_pj">Xandre</a>. Se apuntaron a una beca para gremios y aprendió magia.</p>
            </div>
          </div>
          <br>

          <!-- Xandre -->
          <div class="card" id="xandre_pj">
            <div class="card-body">
              <h4 class="card-title">Xandre</h4>
              <p class="card-text">Humano de nuestro mundo, apareció en Kal de repende y sin saber por qué junto con <a href="#jesus">Jesús</a>. Se apuntaron a una beca para gremios y se hizo cazador.</p>
            </div>
          </div>
          <br>

          <!-- Zacatrús -->
          <div class="card" id="zacatrus">
            <div class="card-body">
              <h4 class="card-title">Zacatrús</h4>
              <p class="card-text">Duende nativo de una aldea de los alrededores de Carfe. Se marchó a la ciudad aprovechando unas becas para nuevos gremios.</p>
            </div>
          </div>
          <br>

          <!-- Zado -->
          <div class="card" id="zado">
            <div class="card-body">
              <h4 class="card-title">Zado</h4>
              <p class="card-text">Joven enano nativo de las montañas. Salió a ver mundo y llegó a Carfe buscando un gremio al que unirse</p>
            </div>
          </div>

          <!-- Galdor -->
          <div class="card" id="galdor">
            <div class="card-body">
              <h4 class="card-title">Galdor</h4>
              <p class="card-text">Humano monje espadachín. Jefe del gremio <i>Las tortugas voladoras</i></p>
            </div>
          </div>

          <!-- Keran -->
          <div class="card" id="keran">
            <div class="card-body">
              <h4 class="card-title">Keran</h4>
              <p class="card-text">Legendaria herrera enana.</p>
            </div>
          </div>

          <!-- Aeria -->
          <div class="card" id="aeria">
            <div class="card-body">
              <h4 class="card-title">Aeria Cornell, señora de Aldintor</h4>
              <p class="card-text">Humana domabestias. Propietaria del rancho Aldintor, en el que entrena todo tipo de bestias. Madre de <a href="#allegra">Allegra</a>.</p>
            </div>
          </div>

          <!-- Fingul -->
          <div class="card" id="fingul">
            <div class="card-body">
              <h4 class="card-title">Fingul Pok</h4>
              <p class="card-text">Duende bardo, famoso en todo el continente.</p>
            </div>
          </div>

        </div>
      </section>
    </div>
  </body>
</html>
