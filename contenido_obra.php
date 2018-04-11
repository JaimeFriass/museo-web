    <a onclick="mostrarComentarios" class="btn_comentarios" id="boton_comentarios">
         <i id="icono_boton" class="fas fa-comments fa-2x"></i>
    </a>

    <div class="comentarios" id="comentarios">
        <h3 class="header_comentarios">Comentarios</h3><h3 id="boton_cerrar" class="cerrar">x</h3>
        <div id="lista_comentarios" class="container_comentarios">
            <div class='mensaje'><p class='nombre_com'><b>Paco</b></p><p class='fecha_com' >4/3/2018 14:22</p><p>Me parece interesante</p></div>
            <div class='mensaje'><p class='nombre_com'><b>Antonio</b></p><p class='fecha_com' >4/3/2018 14:37</p><p>A mi igual</p></div>
        </div>

        <form name="comentar" class="escribir" onsubmit="return validarForm()">
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
                    </div>
                    <div class="texto"><br>
                    <?php echo $dimensiones; ?>

                    <?php if ($procedencia != "") { ?>
                        <h3>Procedencia</h3>
                    <?php echo $procedencia;} ?><br>
                        
                    <?php if($procedencia != "") { ?>
                    <h3>Comentarios</h3>
                    <?php echo $comentario; } ?>
                    </div>

                    <a class="boton" href="obra_imprimir.html">Imprimir</a>
                    <a class="boton" href="https://twitter.com">Compartir en Twitter</a>
                    <a class="boton" href="https://facebook.com">Compartir en Facebook</a>
                <?php } else echo "<h1>No existe esa obra</h1>"; ?>
            </div>
        </div>
      </article>