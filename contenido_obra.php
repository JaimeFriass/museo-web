    <a onclick="mostrarComentarios" class="btn_comentarios" id="boton_comentarios">
         <i id="icono_boton" class="fas fa-comments fa-2x"></i>
    </a>

    <div class="comentarios" id="comentarios">
        <h3 class="header_comentarios">Comentarios</h3><h3 id="boton_cerrar" class="cerrar">x</h3>
        <div id="lista_comentarios" class="container_comentarios">
            <?php
            if ($resultado_comentarios->num_rows > 0) {
                    while($array_resultado =  mysqli_fetch_assoc($resultado_comentarios)) {
                        echo "<div class='mensaje'><p class='nombre_com'><b>".$array_resultado['nom_com']."</b></p>";
                        echo "<p class='fecha_com'>".$array_resultado['fecha']."</p>";
                        echo "<p>".$array_resultado['texto_com']."</p></div>";
                    }
                }
            ?>
        </div>

        <form name="comentar" class="escribir" onsubmit="return validarForm()">
            <input type="hidden" name="fecha" value="CURRENT_TIMESTAMP()">
            <input type="text" name="nombre" class="nombre" placeholder="Nombre">
            <input type="text" name="e-mail" class="nombre" placeholder="E-mail" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$">
            <input required="true" name="mensaje" class="texto_comentario" type="text" placeholder="Comentario">
            <input type="submit" value="Enviar">
        </form>
    </div>

    <script>
        // Añadimos la funcionalidad de clickear el boton de comentarios
        document.getElementById("boton_comentarios").addEventListener("click", mostrarComentarios); 
        document.getElementById("boton_cerrar").addEventListener("click", ocultarComentarios); 
        //document.getElementById("comentarios").style.display = 'none'; 
        document.getElementById("comentarios").hidden = 'true';
    </script>

<article class="obra">
        <div class="fondo_obra">
            <div class="obra">
                <?php if ($nombre != "") { ?>
                    <h1><?php echo $nombre; ?></h1>
                    <div class="imagen">
                        <img <?php echo "src='".$imagen."'" ?>>
                        <?php echo $dimensiones; ?>

                        <?php if ($procedencia != "") { ?>
                            <h3>Procedencia</h3>
                        <?php echo $procedencia;} ?><br>
                            
                        <?php if($procedencia != "") { ?>

                    </div>
                    <div class="texto"><br>

                        <h3>Comentarios</h3>
                        <?php echo $comentario; } ?>

                        <div class="botones">
                            <a class="boton" href="obra_imprimir.html">Imprimir</a>
                            <a class="boton" href="" onclick="window.open('twitter.html', 'Twitter', 'width=400,height=400')">Compartir en Twitter</a>
                            <a class="boton" href="https://facebook.com">Compartir en Facebook</a>
                        </div>

                        <?php if($video != "") { ?>
                        
                        <div class="video">
                        <h3>Vídeo</h3>
                                <iframe width="560" height="315" src=<?php echo "'".$video."'"; ?> frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    <?php } ?>
                    </div>
   


                <?php } else echo "<h1>No existe esa obra</h1>"; ?>
            </div>
        </div>
      </article>