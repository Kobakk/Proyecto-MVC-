<?php ob_start();?>
<h1>Titulo</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Illo minus voluptates aspernatur tempora enim alias doloremque
    qui numquam amet necessitatibus, nemo unde accusamus dolore illum
    provident modi obcaecati excepturi voluptatum?
</p>
<?php foreach($categorias as $categoria):?>
    <li><a href="index.php?ctl=articulos&idCategoria=<?=$categoria['id']?>"><?=$categoria['nombre']?></a></li>
<?php endforeach;?>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>