<?php
class ArticuloController
{ 
  public function articulosCategoria()
  { 
    var_dump($_SESSION);
    require_once __DIR__ . '/../../fuente/Repositorio/ArticuloRepositorio.php';
    var_dump($_GET['idCategoria']);
    $articulos = (new ArticuloRepositorio())->getArticulosPorCategoria($_GET['idCategoria']);
    require_once __DIR__ . '/../../app/plantillas/articulos.inc';
  }

  public function pedidoArticulo()
  { 
    $_SESSION['pedido'] = [
      'codArticulo'=> $_GET['codArticulo'],
      'precio'=> $_GET['precio'],
    ];
    $precio = round($_GET['precio'], 2);
    $precio = number_format($precio,2);
    var_dump($_GET);
    //require __DIR__ . '/../../fuente/Repositorio/ArticuloRepositorio.php';
    //var_dump($_GET['idCategoria']);
   // $articulos = (new ArticuloRepositorio())->getArticulosPorCategoria($_GET['idCategoria']);
    require_once __DIR__ . '/../../app/plantillas/formularioPedido.inc';
  }
}
