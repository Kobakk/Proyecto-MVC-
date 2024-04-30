<?php
namespace ElectroVadillo\App\Controller;
use ElectroVadillo\App\Repository\GestionBdRepositorio;

class DefaultController
{ 
  public function inicio()
  { 
    require __DIR__ . '/../../app/plantillas/inicio.inc';
  }

}
