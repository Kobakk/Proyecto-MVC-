<h1>Registrate</h1>
<form action="index.php?ctl=comprobarRegistro" method="post">
    <label for="nombre">Nombre:</label><br>
    <input type="text" name="nombre">
    <label for="eCorreo">eCorreo :</label>
    <input type="password" name="eCorreo"> <br>
    <label for="cP">cP :</label>
    <input type="password" name="cP"> <br>
    <button type="submit" name="ok">Registrarse</button>

    <?php if(isset($_SESSION['error'])) :?>
        <p style="color: red;"><?=$_SESSION['error']?></p>
    <?php endif; ?>
</form>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>