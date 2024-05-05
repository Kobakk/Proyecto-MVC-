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

      <?php if(isset($_SESSION['usuario'])): ?> 
          <a href="">Cerrar Session</a>
          <?php if(isset($_SESSION['pedido'])): ?>
            <a href="">Terminar Pedido</a>
          <?php endif;?>
      <?php endif;?>
      
    </nav>
  </header>

  <div id="contenido">
    <?= $contenido ?>
  </div>

  <footer>
    <hr>
    <p style="text-align:center">- Pie de página -</p>
  </footer>
</body>

</html>