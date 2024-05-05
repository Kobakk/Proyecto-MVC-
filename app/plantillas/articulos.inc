<h1>Nombre Articulo</h1>
<p>
    Articulos de la categoria
</p>
<?php foreach($articulos as $articulo):?>
    <li><a href="index.php?ctl=pedido&codArticulo=<?=$articulo['codigo']?>&precio=<?=$articulo['pv']?>&stock=<?=$articulo['stock']?>"><?=$articulo['codigo']?></a></li>
<?php endforeach;?>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>