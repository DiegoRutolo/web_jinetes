<!DOCTYPE html>
<?php
    include "../res/herramientas.php";
?>
<html lang="es">
  <head>
    <title>Música - Los Jinetes de Kal</title>

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

    <style>
      body {
        text-align: center;
      }

      .cancion {
        border: 5px solid brown;
        border-radius: 15px;
        padding: 15px;
        box-sizing: border-box;
        text-align: center;
        background-color: PeachPuff;
      }

      .cancion-bandcamp {
        width: 340px;
      }

      .cancion-spotify {
        width: 340px;
      }

      .cancion-yt {
        width: 390px;
        max-width: 390px;
        margin: 10px auto;
      }
    </style>
  </head>
  <body>

    <?php ImprimeNavBar(); ?>

    <h1 class="jinetes" id="arriba">Música</h1>
    <p class="intro">La música está compuesta por <a href="/gente#mistermyr">MisterMyr</a>.</p>

    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3"> <!-- Lado de Bandcamp -->
          <div class="cancion cancion-bandcamp">
            <h3>Álbum completo</h3>
            <p>en bandcamp</p>
            <iframe style="border: 0; width: 300px; height: 786px;" src="https://bandcamp.com/EmbeddedPlayer/album=2083524989/size=large/bgcol=ffffff/linkcol=0687f5/transparent=true/" seamless><a href="http://mistermyr.bandcamp.com/album/jinetes-de-kal-rpg-soundtrack">Jinetes de Kal - RPG Soundtrack by MisterMyr</a></iframe>
          </div>
        </div>

        <div class="col-xl-6"> <!-- Contenido de las canciones individuales -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-xl cancion cancion-yt">
                <h3>Kal Theme</h3>
                <iframe width="350" height="315" src="https://www.youtube-nocookie.com/embed/jjI3rRZ33ns" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>Tema principal</p>
              </div>
              <div class="col-xl cancion cancion-yt">
                <h3>The Burning Furnace</h3>
                <iframe width="350" height="315" src="https://www.youtube-nocookie.com/embed/vzGnrfNOvQ8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>La descipción también puede ser más larga. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  </p>
              </div>
              <div class="col-xl cancion cancion-yt">
                <h3>Heske's Theme</h3>
                <iframe width="350" height="315" src="https://www.youtube-nocookie.com/embed/UJ8PocHfY60" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>Tema de Heske, el mago elemental de fuego.</p>
              </div>
              <div class="col-xl cancion cancion-yt">
                <h3>Treilla's Theme</h3>
                <iframe width="350" height="315" src="https://www.youtube-nocookie.com/embed/eaOLv6Hc73M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p>Tema de Treilla, la druida más jóven de la historia.</p>
              </div>
              <div class="col-xl cancion cancion-yt">
                <iframe width="350" height="315" src="https://www.youtube-nocookie.com/embed/BnhviyYiOXg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3"> <!-- Lado de Spotify -->
          <div class="cancion cancion-spotify">
            <h3>Spotify</h3>
            <iframe src="https://open.spotify.com/embed/playlist/1jTYSaJDuZLQDfwBVqkni4" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
          </div>
        </div>
      </div>
    </div>

    <?=Footer();?>

    <div class="boton-subir">
      <a href="#arriba">
        <?= GetIcono("fu", 45) ?>
      </a>
    </div>
  </body>
</html>
