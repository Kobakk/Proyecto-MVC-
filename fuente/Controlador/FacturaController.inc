<?php
class FacturaController
{ 
  public function realizarFactura()
  { 
    $fecha = date('Y-m-d');
    require_once __DIR__ . '/../Repositorio/FacturaRepositorio.php';
    $_SESSION['idFactura'] = (new FacturaRepositorio())->setFactura($_SESSION['idPedido'],'luibar@gemeil.com',$fecha, $_SESSION['totalPrecio']);
    (new FacturaRepositorio())->setLineaFactura($_SESSION['idPedido'], $_SESSION['idFactura']);
    unset($_SESSION['idPedido']);
    unset($_SESSION['idFactura']);
    header('Location: index.php?ctl=inicio');
  }

}
