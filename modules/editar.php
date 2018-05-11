<article class="obra">
    <div class="fondo_obra">
        
        <div class="obra">
        
            <form class="edicion" method="post" enctype="multipart/form-data" action="editar_obra.php?id=<?php echo $_GET['id'] ?>">
                <a class="volver" href="panel.php#obras"> <i class="fa fa-chevron-circle-left fa-2x"></i></a>
                <?php if ( isset($_POST['submit_edit'])) { 
                    if (isset ($res_imagen) || isset($error) ) {
                        if ($res_imagen)
                            echo "<p class='success'><i class='fa fa-check'></i> Obra y imagen modificada correctamente</p>";
                        else {
                            echo "<p class='error'><i class='fa fa-times'></i> ".$error."</p>";
                        }
                    } else {
                        if ($resultado_edicion)
                            echo "<p class='success'><i class='fa fa-check'></i> Obra modificada correctamente</p>";
                        else
                            echo "<p>Error al modificar</p>";
                    }
                } ?>
                <input type="text" class="nombre" name="nombre" value="<?php echo $nombre; ?>">
                
                <div class="imagen">
                    <img src="<?php echo $imagen; ?>">
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                    <input name="imagen" type="file" />
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

