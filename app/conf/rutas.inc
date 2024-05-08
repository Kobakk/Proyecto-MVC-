<?php
$mapeoRutas =
  [
    /*'inicio' => ['controller' => 'ElectroVadillo\App\Controller\DefaultController', 'action' => 'inicio'],*/
    'inicio' => ['controller' => 'DefaultController', 'action' => 'inicio'],
    'articulos' => ['controller' => 'ArticuloController', 'action' => 'articulosCategoria'],
    'pedido' => ['controller' => 'ArticuloController', 'action' => 'pedidoArticulo'],
    'realizarPedido' => ['controller' => 'PedidoController', 'action' => 'realizarPedido'],
    'factura' => ['controller' => 'FacturaController', 'action' => 'realizarFactura'],       
  ];
