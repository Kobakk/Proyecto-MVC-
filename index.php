<?php
session_start();
error_reporting(E_ALL);

require_once __DIR__ . '/app/conf/rutas.inc'; 
require_once __DIR__ . '/fuente/Controlador/DefaultController.inc';
require_once __DIR__ . '/fuente/Controlador/ArticuloController.inc';

// Análisis de la ruta
if (isset($_GET['ctl'])){
  if (isset($mapeoRutas[$_GET['ctl']])){
    $ruta = $_GET['ctl'];
  } else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: No existe la ruta <i>' .
          $_GET['ctl'] .
          '</i></p></body></html>';
    exit;
  }
} else {
  $ruta = 'inicio';
}
$controlador = $mapeoRutas[$ruta];
// Ejecución del controlador asociado a la ruta
if (method_exists($controlador['controller'],$controlador['action'])){
  call_user_func(array(new $controlador['controller'], $controlador['action']));
} else {
  header('Status: 404 Not Found');
  echo '<html><body><h1>Error 404: El controlador <i>' .
       $controlador['controller'] .
       '->' . $controlador['action'] .
       '</i> no existe</h1></body></html>';
}
