<?php
class PedidoController
{ 
  public function realizarPedido()
  { 
    $fecha = date('Y-m-d');
    $pedido = [
      'cantidad'=>$_POST['cantidad'], 
      'precio'=>$_SESSION['pedido']['precio'],
      'total' => $_POST['cantidad'] * $_SESSION['pedido']['precio'],
      'codArticulo' => $_SESSION['pedido']['codArticulo'],
      'fecha' => $fecha,
      'idCliente'=> 1,
    ];
    var_dump($pedido);
    if(!$_SESSION['idPedido']){
      require_once __DIR__ . '/../Repositorio/PedidoRepositorio.php';
      require_once __DIR__ . '/../Repositorio/ArticuloRepositorio.php';
      (new ArticuloRepositorio())->acutializarArticulo($pedido['cantidad'], $pedido['codArticulo']);  
      $_SESSION['idPedido'] = (new PedidoRepositorio())->setPedido($pedido);
      (new PedidoRepositorio())->setLineaPedido($pedido, $_SESSION['idPedido']);
      $_SESSION['totalPrecio'] = $_POST['cantidad'] * $_SESSION['pedido']['precio'];
      unset($_SESSION['pedido']);
      header('Location: index.php?ctl=inicio');
    } else{
      require_once __DIR__ . '/../Repositorio/PedidoRepositorio.php';
      require_once __DIR__ . '/../Repositorio/ArticuloRepositorio.php';
      (new ArticuloRepositorio())->acutializarArticulo($pedido['cantidad'], $pedido['codArticulo']);
      (new PedidoRepositorio())->setLineaPedido($pedido, $_SESSION['idPedido']); 
      $_SESSION['totalPrecio'] += $_POST['cantidad'] * $_SESSION['pedido']['precio'];
      unset($_SESSION['pedido']);
      header('Location: index.php?ctl=inicio');      
    }

  }

}