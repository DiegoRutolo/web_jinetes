<?php
  include "../../res/herramientas.php";

  $pag="<!DOCTYPE html><html lang='es'><head><title>";
  if(isset($_GET['titulo'])){
    $pag.= $_GET['titulo'];
    $pag.= "</title><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1'><meta name='HandheldFriendly' content='true' /><meta name='MobileOptimized' content='320' /><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'><link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css'><script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script><script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script><script src='https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js'></script><script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script><script src='https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js'></script><link rel='stylesheet' type='text/css' href='/res/style.css'><link rel='stylesheet' type='text/css' href='./hojaHabilidades.css'></head><body>";
    $pag.= "<center><h1>".$_GET['titulo']."</h1></center>";
  }

  if(isset($_GET['habilidades'])){
    $server = "localhost";
    $creds = file("../../creds.txt");
    $usuario = trim($creds[2]);
    $passwd = trim($creds[3]);

    $con = new mysqli($server, $usuario, $passwd, "jinetes");
    if ($con->connect_error) {
      die("Connection failed" . $con->connect_error);
    }

    $habs=json_decode($_GET['habilidades'],true);
    //echo $habs;

    $sql = "SELECT * FROM Habilidad INNER JOIN TierHab ON Habilidad.tier=TierHab.num ORDER BY Habilidad.nom";
    $res = $con->query($sql);
    if ($res->num_rows > 0) {
      $habilidades=array();
      while ($row = $res->fetch_array()) {
        if(in_array(utf8_encode($row["id"]),$habs)){
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
          $habilidades[]=clone $seq;
        }
      }
    }

    //Ordenamos el array
    function fn_ordena($a, $b){
        if ($a->tier < $b->tier) {
            return -1;
        } else if ($a->tier > $b->tier) {
            return 1;
        } else {
          if($a->nombre < $b->nombre){
            return -1;
          }else if($a->nombre > $b->nombre){
            return 1;
          }else{
            return 0;
          }
        }
    }
    usort($habilidades, 'fn_ordena');

    $pag.= "<div class='contenedor'>";

    $lvl_chngd=false;
    $nivel=0;
    foreach($habilidades as $hab){
      if($hab->tier>$nivel){
        $nivel=$hab->tier;
        $lvl_chngd=true;
      }else{
        $lvl_chngd=false;
      }

      $pag.= "<div class='habilidad'>".($lvl_chngd?"<h2>Tier ".$nivel."</h2>":"")."<h3>".$hab->nombre."</h3><ul class='lista'>";
      $pag.= "<li class='horizontal'><b>Activación:</b>".($hab->continua==0?"Instantánea":"Continua")."</li>";
      $pag.= "<li class='horizontal'><b>Dificultad:</b>".($hab->auto==0?$hab->tier_dif:"Automática")."</li>";
      $pag.= "<li class='horizontal'><b>Coste:</b>".($hab->gratis==0?$hab->tier_coste:"Gratis")."</li>";
      $pag.= "<li><b>Efecto:</b>".$hab->descripcion."</li>";
      $pag.= "</ul></div>";
    }
    $pag.= "</div></body></html>";
  }
  echo $pag;
?>
