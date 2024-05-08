<h1>Nombre Articulo</h1>
<p><?=$_SESSION['pedido']['codArticulo']?></p>
<form action="index.php?ctl=realizarPedido" method="post">
    <label for="cantidad">Cantidad:</label><br>
    <input type="number" name="cantidad" min="1" max="<?=$_GET['stock']?>">
    <label>unidades disponibles <?=$_GET['stock']?> </label>
    <label for="precio"><?=$precio . '€ unidad' ?></label>
    <button type="submit">Comprar</button>

</form>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>