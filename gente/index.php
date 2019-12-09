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
    <style type="text/css">
      #clau {
        background-color: SandyBrown;
      }

      #datan {
        background-color: #85C1E9;
      }

      #nere {
        background-color: DarkBlue;
      }
    </style>
  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <div class="container">
      <section>
        <h1>Personas</h1>
        <p>Todas las personas que participaron en la creación de éste sistema y mundo, en mayor o menor medida.</p>

        <p>
        <div class="card-columns">

          <!-- Myr -->
          <div class="card bg-primary text-white" id="mistermyr">
            <img class="card-img-top" src="https://jinetes.rutolo.eu/gente/img/MysterMyr.jpg">
            <div class="card-body">
              <h4 class="card-title">Myster Myr</h4>
              <p class="card-text">Creador del mundo y sistema, coautor del manual, compositor de la música y DM principal.</p>
              <a class="card-link btn btn-light" href="https://twitter.com/MisterMyr" target="_blank" rel="noreferrer"><img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter"></a>
              <a class="card-link btn btn-success" href="https://open.spotify.com/artist/09JnLcMChAXzamRnQxF5lK" target="_blank" rel="noreferrer"><img src="https://www.scdn.co/i/_global/favicon.png" alt="Spotify" width="32"></a>
            </div>
          </div>
          <br>

          <!-- Diego -->
          <div class="card bg-warning" id="diegorutolo">
            <div class="card-body">
              <h4 class="card-title">DiegoRutolo</h4>
              <p class="card-text">Desarrollador de la web, coautor del manual, DM, jugador de Heske y Galdor.</p>
              <a class="btn btn-light" href="https://rutolo.eu" target="_blank" rel="noreferrer">
                <?=GetIcono("www", 32);?>
              </a>
              <a class="btn btn-light" href="https://github.com/DiegoRutolo" target="_blank" rel="noreferrer">
                <img src="https://github.githubassets.com/favicon.ico" alt="GitHub" width="32">
              </a>
            </div>
            <img class="card-img-bottom" src="https://jinetes.rutolo.eu/gente/img/Caradox.jpg">
          </div>
          <br>

          <!-- Iago -->
          <div class="card text-white" id="iagolobla">
            <img class="card-img-top" src="https://jinetes.rutolo.eu/gente/img/iagolobla.png" style="filter:brightness(55%)">
            <div class="card-img-overlay">
              <h4 class="card-title">Iagolobla</h4>
              <p class="card-text">Programador, equilibrio del sistema, jugador de Volgarr y Zacatrús.</p>
              <a class="stretched-link" href="https://twitter.com/iagolobla" target="_blank" rel="noreferrer"><img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter"></a>
            </div>
          </div>
          <br>

          <!-- Nere -->
          <div class="card text-white" id="nere">
            <div class="card-body">
              <h4 class="card-title">Nere</h4>
              <p class="card-text">Jugadora de Treilla y Keran y experta en fauna.</p>
              <!-- <a class="card-link" href="https://twitter.com/neremortal3" target="_blank" rel="noreferrer">
                <img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter">
              </a> -->
              <a class="stretched-link" href="https://www.instagram.com/neremontero3/" target="_blank" rel="noreferrer">
                <img src="https://www.instagram.com/static/images/ico/favicon-192.png/68d99ba29cc8.png" alt="Instagram" width="32">
              </a>
            </div>
            <img class="card-img-bottom" src="https://jinetes.rutolo.eu/gente/img/nere.jpg">
          </div>
          <br>

          <!-- Kraken -->
          <div class="card bg-secondary text-white" id="kraken">
            <div class="card-body">
              <h4 class="card-title">Kraken</h4>
              <p class="card-text">Autora de los dibujos chibis de varios personajes.</p>
              <a class="card-link" href="https://twitter.com/lilsaku" target="_blank" rel="noreferrer">
                <img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter">
              </a>
              <a class="card-link" href="https://www.twitch.tv/krakenreeeeflex" target="_blank" rel="noreferrer">
                <img src="https://static.twitchcdn.net/assets/favicon-32-d6025c14e900565d6177.png" alt="Twitch">
              </a>
            </div>
          </div>
          <br>

          <!-- Atan -->
          <div class="card" id="datan">
            <img class="card-img-top" src="https://jinetes.rutolo.eu/gente/img/datan.jpg" />
            <div class="card-body">
              <h4 class="card-title">Atán</h4>
              <p class="card-text">Jugador de Heske y Allegra.</p>
              <a class="stretched-link" href="https://twitter.com/datanromar" target="_blank" rel="noreferrer">
                <img src="https://abs.twimg.com/favicons/twitter.ico" alt="Twitter">
              </a>
            </div>
          </div>
          <br>

          <!-- Angel -->
          <div class="card bg-secondary text-white" id="jangel">
            <div class="card-body">
              <h4 class="card-title">Peperepipe</h4>
              <p class="card-text">Jugador de Jesús (as himself).</p>
            </div>
          </div>
          <br>

          <!-- Xandre -->
          <div class="card bg-secondary text-white" id="xandre">
            <div class="card-body">
              <h4 class="card-title">Xandre</h4>
              <p class="card-text">Jugador de Xandre (as himself).</p>
            </div>
          </div>
          <br>

          <!-- Sara -->
          <div class="card bg-secondary text-white" id="sara">
            <div class="card-body">
              <h4 class="card-title">Sara</h4>
              <p class="card-text">Jugadora de Zado.</p>
            </div>
          </div>
          <br>

          <!-- Clau -->
          <div class="card" id="clau">
            <div class="card-body">
              <h4 class="card-title">Chocolate</h4>
              <p class="card-text">Jugadora de Treilla.</p>
              <a class="card-link btn btn-light" href="http://paperwordssc.blogspot.com/" target="_blank" rel="noreferrer">
                <img src="http://paperwordssc.blogspot.com/favicon.ico" alt="Blog" width="32">
              </a>
              <a class="card-link btn btn-light" href="https://archiveofourown.org/users/ChocolateVanCandy/pseuds/ChocolateVanCandy" target="_blank" rel="noreferrer">
                <img src="https://jinetes.rutolo.eu/gente/img/AooO.webp" width="32" />
              </a>
            </div>
          </div>
          <br>

          <!-- Erane -->
          <div class="card bg-secondary text-white" id="erane">
            <div class="card-body">
              <h4 class="card-title">Erane</h4>
              <p class="card-text">Jugadora de Elara.</p>
            </div>
          </div>
          <br>

          <!-- Elia -->
          <div class="card bg-secondary text-white" id="erane">
            <div class="card-body">
              <h4 class="card-title">Elia</h4>
              <p class="card-text">Jugadora de Aeria Cornell.</p>
            </div>
          </div>
          <br>

        </div>
      </section>

      <br><hr /><br />

      <section>
        <h1>Personajes</h1>
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
              <p class="card-text">Niña semielfa y hermana pequeña de Elara. La druida más joven de la historia de <span class="jinetes">Las Torres de Magia</span>.</p>
            </div>
          </div>
          <br>

          <!-- Cotton -->
          <div class="card" id="cotton">
            <div class="card-body">
              <h4 class="card-title">Cotton</h4>
              <p class="card-text">Oso albino y leal compañero de Treilla.</p>
            </div>
          </div>
          <br>

          <!-- Elara -->
          <div class="card" id="elara">
            <div class="card-body">
              <h4 class="card-title">Elara</h4>
              <p class="card-text">Cazadora semielfa, hermana mayor de Treilla.</p>
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
              <p class="card-text">Humana paladín de <span class="jinetes">Baalum</span>. Hija de Aeria Aldintor.</p>
            </div>
          </div>
          <br>

          <!-- Jesus -->
          <div class="card" id="jesus">
            <div class="card-body">
              <h4 class="card-title">Jesús</h4>
              <p class="card-text">Humano de nuestro mundo, apareció en Kal de repente y sin saber por qué junto con Xandre. Se apuntaron a una beca para gremios y aprendió magia.</p>
            </div>
          </div>
          <br>

          <!-- Xandre -->
          <div class="card" id="xandre_pj">
            <div class="card-body">
              <h4 class="card-title">Xandre</h4>
              <p class="card-text">Humano de nuestro mundo, apareció en Kal de repente y sin saber por qué junto con Jesús. Se apuntaron a una beca para gremios y se hizo cazador.</p>
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
              <p class="card-text">Joven enano nativo de las montañas. Salió a ver mundo y llegó a Carfe buscando un gremio al que unirse.</p>
            </div>
          </div>

          <!-- Galdor -->
          <div class="card" id="galdor">
            <div class="card-body">
              <h4 class="card-title">Galdor</h4>
              <p class="card-text">Humano monje espadachín. Jefe del gremio <i>Las tortugas voladoras.</i></p>
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
              <h4 class="card-title">Aeria Cornell</h4>
              <p class="card-text">Humana domabestias. Propietaria del rancho Aldintor, en el que entrena todo tipo de bestias. Madre de Allegra.</p>
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

    <?=Footer();?>
  </body>
</html>
