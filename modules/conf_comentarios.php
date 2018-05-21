<div id="coments" class="conf_comentarios">
    <h2><i class='fa fa-pencil-alt'></i> Configuración de comentarios</h2>
    <div class="busqueda">
        <form class="buscar" method="post" action="panel.php#coments">
            <input type="text" name="comentario_busc" placeholder="Texto en comentario">
            <input type="submit" name="submit_busc_com" value="Buscar">
        </form>
    </div>
    
    <?php



    // Si quiere editar un comentario
    if(isset($_POST['submit_editar_post'])){
        $this->editar_comentario($_POST['submit_id'],$_POST['nuevo']);
    }

    // Al borrar un comentario
    if(isset($_POST['submit_borrar'])){
        $this->borrar_comentario($_POST['submit_id']);
    }



    // Si busca un comentario
    if (isset($_POST['submit_busc_com'])) {
        $this->buscarComentario($_POST['comentario_busc']);
    } else 
    // Al confirmar la edición de comentario
    if(isset($_POST['submit_editar'])){
        $this->mostrar_editar_comentario($_POST['submit_id']);
    } else {
    $this->mostrarComentarios();
    }
    ?>

    
</div>