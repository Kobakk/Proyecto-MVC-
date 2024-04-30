<?php
session_start();
error_reporting(E_ALL);

if(!isset($_SESSION['correo'])){
  $_SESSION['correo']="";
}

function getFuente(string $clase){
  if(strpos ($clase,'ElectroVadillo\App' ) === 0){
    if(strpos($clase,'ElectroVadillo\App\Controller') === 0){
      $clase = str_replace('ElectroVadillo\App\Controller','',$clase);
      $clase = str_replace('\\','/',$clase);
      require_once __DIR__ . '/fuente/Controlador'.$clase.'.inc';
    }elseif(strpos($clase,'ElectroVadillo\App\Model')===0){
      $clase = str_replace('ElectroVadillo\App\Model','',$clase);
      $clase = str_replace('\\','/',$clase);
      require_once __DIR__ . '/fuente/Modelo'.$clase.'.inc';
    }elseif(strpos($clase, 'ElectroVadillo\App\Repository')===0){
      $clase = str_replace('ElectroVadillo\App\Repository','',$clase);
      $clase = str_replace('\\','/',$clase);
      require_once __DIR__ . '/fuente/Repositorio'.$clase.'.inc';
    }
  }
}

function getCore(string $clase)
{
  if(strpos($clase, 'ElectroVadillo\Core') === 0){
    $clase = str_replace('ElectroVadillo','',$clase);
    $clase = str_replace('\\','/',$clase);
    require_once __DIR__ . $clase.'.inc';
  }
}

spl_autoload_register('getCore');
spl_autoload_register('getFuente');
require_once __DIR__ . '/app/conf/rutas.inc'; 


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
