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
            <a class="nav-link" href="/">
              <img src="/res/img/torre_blanca.png" class="icono" width="30em" height="30em" alt="Inicio">
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Sistema<span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/sistema/manual">Manual</a>
              <a class="dropdown-item" href="/sistema/hechizos.php">Hechizos y Habilidades</a>
              <a class="dropdown-item" href="/sistema/items.php">Objetos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Historia<span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class=" dropdown-item" href="/lore/mapa">Mapa</a>
              <a class=" dropdown-item" href="/lore/timeline">Cronología</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Herramientas <span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/herramientas/genHojasHabs">Generador de hojas</a>
              <a class="dropdown-item" href="/herramientas/genPjPersonalidad">Generador de personalidades</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">Multimedia <span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/multimedia/musica.php">Música</a>
              <a class="dropdown-item" href="/multimedia/dibujos.php">Dibujos</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gente">Personas</a>
          </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/fichaWeb/ficha.html" target="_blank">Ficha web</a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Administración <span class="caret"></span></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="/admin/index.php">Panel</a>
              <a class="dropdown-item" href="https://trello.com/b/UEebTZMS/jinetes" target="_blank">Trello</a>
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
      $url = "/res/img/green_tick.png";
    } elseif ($val === "c") {
      $url = "/res/img/red_cross.png";
    } elseif ($val === "e") {
      $url = "/res/img/edit.jpg";
    } elseif ($val == "fu") {
      $url = "/res/img/flechaArriba.png";
    } elseif ($val == "www") {
      $url = "/res/img/www.png";
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

  function Footer() {
    $str = "
    <footer class=\"bg-dark text-light\">
      <div class=\"row\">
        <div class=\"col text-center\">
          Repo de la web: <a href=\"https://github.com/DiegoRutolo/web_jinetes\" target=\"_blank\" rel=\"noreferrer\">DiegoRutolo</a>
        </div>

        <div class=\"col text-center\">
          Esta web no utiliza cookies.
        </div>
      </div>
    </footer>
    ";
    return $str;
  }

?>
