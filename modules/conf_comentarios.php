<div id="coments" class="conf_comentarios">
    <h2>Configuración de comentarios</h2>
    
    <?php
    if(isset($_POST['submit_editar_post'])){
        $this->editar_comentario($_POST['submit_id'],$_POST['nuevo']);
    }

     $this->mostrarComentarios();



    if(isset($_POST['submit_editar'])){
        $this->mostrar_editar_comentario($_POST['submit_id']);

    }


    if(isset($_POST['submit_borrar'])){
        $this->borrar_comentario($_POST['submit_id']);
    }
    ?>
    <!--<div class="borrar_comentario">
        <h4>Borra comentario</h4>
        <form>
            <input type="text" name="id_comentario" placeholder="id_comentario">    
            <input type="submit" value="Cambiar">
        </form>
    </div>
    <div class="editar_comentario">
        <h4>Editar Comentario</h4>
        <form>
            <input type="text" name="id_comentario" placeholder="ID del comentario">
            <input type="text" name="nuevo_comentario" placeholder="Nuevo comentario">    
            <input type="submit" value="Cambiar">
        </form>
    </div>-->
    
</div>