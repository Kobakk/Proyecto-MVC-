<?php
class ArticuloController
{ 
  public function inicio()
  { 
    //require __DIR__ . '/../../fuente/Repositorio/ArticuloRepositorio.php';
    var_dump($_GET('idCategoria'));
    //$articulos = (new ArticuloRepositorio())->getArticulosPorCategoria($_GET('idCategoria'));
    require __DIR__ . '/../../app/plantillas/articulos.inc';
  }

}
