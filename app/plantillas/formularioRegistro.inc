<h1>Registrate</h1>
<form action="index.php?ctl=comprobarRegistro" method="post">
    <label for="email">Nombre:</label><br>
    <input type="text" name="email">
    <label for="pwd">CorreoElectronico :</label>
    <input type="password" name="pwd"> <br>
    <button type="submit" name="ok">Iniciar Sesion</button>

    <?php if(isset($_SESSION['error'])) :?>
        <p style="color: red;"><?=$_SESSION['error']?></p>
    <?php endif; ?>
     <a href="index.php?ctl=registrarse">No tengo sesion</a>   
</form>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>