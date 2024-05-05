<h1>Nomrbe Articulo</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Illo minus voluptates aspernatur tempora enim alias doloremque
    qui numquam amet necessitatibus, nemo unde accusamus dolore illum
    provident modi obcaecati excepturi voluptatum?
</p>
<?php foreach($articulos as $articulo):?>
    <li><a href="index.html?ctl=articulos&codArticulo<?=$articulo['codigo']?>"><?=$articulo['codigo']?></a></li>
<?php endforeach;?>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>