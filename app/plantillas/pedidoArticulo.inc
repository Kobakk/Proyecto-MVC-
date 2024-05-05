<h1>Nombre Articulo</h1>
<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Illo minus voluptates aspernatur tempora enim alias doloremque
    qui numquam amet necessitatibus, nemo unde accusamus dolore illum
    provident modi obcaecati excepturi voluptatum?
</p>
<form action="" method="post">
    <label for="cantidad">Cantidad</label><br>
    <input type="number" name="cantidad" min="0" max="">
    <button type="submit">Enviar</button>
</form>
<?php $contenido = ob_get_clean();?>
<?php include 'base.inc'?>