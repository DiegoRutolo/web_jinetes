<?php

  function ImprimeNavBar()
  {
    echo '
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="https://jinetes.rutolo.eu">
            <img src="https://jinetes.rutolo.eu/res/img/torre_blanca.png" class="icono" width="30em" height="30em">
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Sistema y contenido <span class="caret"></span></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="https://jinetes.rutolo.eu/hechizos/">Hechizos y Habilidades</a>
            <a class="dropdown-item" href="#">Pociones</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Multimedia <span class="caret"></span></a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Mapas</a>
            <a class="dropdown-item" href="#">Música</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://jinetes.rutolo.eu/fichaWeb/ficha.html" target="_blank">Ficha web</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Personas</a>
        </li>
      </ul>
    </nav>
    ';
  }

  function GetIcono($val='')
  {
    $url = "";
    if ($val === "t") {
      $url = "https://jinetes.rutolo.eu/res/img/green_tick.png";
    } elseif ($val === "c") {
      $url = "https://jinetes.rutolo.eu/res/img/red_cross.png";
    }

    $imagen = "<img src=\"" . $url . "\" class=\"icono\" width=\"20em\" height=\"20em\">";
    return $imagen;
  }

 ?>
