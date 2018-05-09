<div class="conf_comentarios">
    <h2>Configuración de comentarios</h2>

    <?php 
    $seleccion_comentarios = "SELECT * FROM comentarios";
    $resultado_datos = mysqli_query ($conexion, $seleccion_comentarios);
    ?>
    <h2><?php echo $resultado_datos['id_com'] ?></h2>
    <h2><?php echo $resultado_datos['nom_com'] ?></h2>
    <h2><?php echo $resultado_datos['texto_com'] ?></h2>
    <h2><?php echo $resultado_datos['correo'] ?></h2>
    <h2><?php echo $resultado_datos['fecha'] ?></h2>


    <div class="borrar_comentario">
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
    </div>
</div>