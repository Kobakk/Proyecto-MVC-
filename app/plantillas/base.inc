<!DOCTYPE html>
<html>
<head>
  <title>Proyecto</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href='web/css/estilos.css' />
</head>

<body>
  <header>
    <nav>
      <a href="index.php?ctl=inicio">Inicio</a>
      <?php if(!isset($_SESSION['usuario'])): ?> 
          <a href="index.php?ctl=inicioSesion">Iniciar Sesion</a>
      <?php endif;?>
      <?php if(isset($_SESSION['usuario'])): ?> 
          <a href="index.php?ctl=cerrarSesion">Cerrar Session</a>
      <?php endif;?>

      <?php if(isset($_SESSION['idPedido'])): ?>
            <a href="index.php?ctl=factura">Terminar Pedido</a>
      <?php endif;?>
      
    </nav>
  </header>
  <div class="formulario">
    <form action="index.php?ctl=inicioSesion" method="post">
      <button type="submit">Enviar</button>
    </form>
  </div>
  <div id="contenido">
    <?= $contenido ?>
  </div>

  <footer>
    <hr>
    <p style="text-align:center">- Pie de página -</p>
  </footer>
</body>

</html>