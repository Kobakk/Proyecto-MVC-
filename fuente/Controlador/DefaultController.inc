<?php
/*
namespace ElectroVadillo\App\Controller;
use ElectroVadillo\App\Repository\GestionBdRepositorio;
*/
class DefaultController
{ 
  public function inicio()
  { 
    require __DIR__ . '/../Repositorio/ArticuloRepositorio.php';
    $categorias = (new ArticuloRepositorio())->getCategorias();
    require __DIR__ . '/../../app/plantillas/inicio.inc';
  }

}
