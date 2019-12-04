<?php

  function ImprimeNavBar()
  {
    echo '
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top navbar-toggleabel-md">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir barra de navegación">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="https://jinetes.rutolo.eu">
              <img src="https://jinetes.rutolo.eu/res/img/torre_blanca.png" class="icono" width="30em" height="30em" alt="Inicio">
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Sistema y contenido <span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="https://jinetes.rutolo.eu/sistema/LosJinetesDeKal_manual.pdf" target="_blank">Manual (pdf)</a>
              <a class="dropdown-item" href="https://jinetes.rutolo.eu/sistema/hechizos.php">Hechizos y Habilidades</a>
              <a class="dropdown-item" href="https://jinetes.rutolo.eu/sistema/items.php">Objetos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Herramientas <span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="https://jinetes.rutolo.eu/herramientas/genHojasHabs">Generador de hojas</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Multimedia <span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="https://jinetes.rutolo.eu/multimedia/dibujos.php">Dibujos</a>
              <a class="dropdown-item" href="https://jinetes.rutolo.eu/multimedia/musica.php">Música</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://jinetes.rutolo.eu/gente">Personas</a>
          </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="https://jinetes.rutolo.eu/fichaWeb/ficha.html" target="_blank">Ficha web</a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Administración <span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="https://jinetes.rutolo.eu/admin/index.php">Panel</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    ';
  }

  function GetIcono($val='', $tam=20)
  {
    $url = "";
    if ($val === "t") {
      $url = "https://jinetes.rutolo.eu/res/img/green_tick.png";
    } elseif ($val === "c") {
      $url = "https://jinetes.rutolo.eu/res/img/red_cross.png";
    } elseif ($val === "e") {
      $url = "https://jinetes.rutolo.eu/res/img/edit.jpg";
    } elseif ($val == "fu") {
      $url = "https://jinetes.rutolo.eu/res/img/flechaArriba.png";
    } elseif ($val == "www") {
      $url = "https://jinetes.rutolo.eu/res/img/www.png";
    }

    $imagen = "<img src=\"" . $url . "\" class=\"icono\" width=\"" . $tam . "em\" height=\"" . $tam . "em\">";
    return $imagen;
  }

  function PdI() {
    $str = "
      <div class=\"alert alert-warning\">
        Página pendiende de implementación.
      </div>
    ";
    return $str;
  }

?>
