<h1>Inicio Sesion</h1>
<p><?=$_SESSION['pedido']['codArticulo']?></p>
<form action="index.php?ctl=inicioSesion" method="post">
    <label for="email">Email:</label><br>
    <input type="text" name="email">
    <label for="pwd">Contraseña :</label>
    <input type="text" name="pwd">
    <button type="submit">Comprar</button>

</form>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>