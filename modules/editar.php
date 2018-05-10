<article class="obra">
    <div class="fondo_obra">
        <div class="obra">
            <form class="edicion" method="post" action="editar_obra.php?id=<?php echo $_GET['id'] ?>">
                <?php if ( isset($_POST['submit_edit'])) { 
                    
                if ($resultado_edicion)
                    echo "<p class='success'><i class='fa fa-check'></i> Obra modificada correctamente</p>";
                else
                    echo "<p>Error al modificar</p>";
                } ?>
                <input type="text" class="nombre" name="nombre" value="<?php echo $nombre; ?>">
                
                <div class="imagen">
                    <img src="<?php echo $imagen; ?>">
                    <input type="text" class="dimensiones" name="dimensiones" 
                            value="<?php echo $dimensiones; ?>"><br>

                        <h3>Procedencia</h3>
                    <input type="text" class="procedencia" name="procedencia" 
                            value="<?php echo $procedencia; ?>"><br>

                </div>
                <div class="texto"><br>
                    <h3>Comentarios</h3>
                    <textarea class="comentario" rows=300 name="comentario">
                        <?php echo $comentario; ?>
                    </textarea>
                    <input value="Actualizar" type="submit" class="boton submit" name="submit_edit">

                </div>
                
            </form>
        </div>
    </div>
</article>

