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
                        echo "<p class='texto_men'>".$array_resultado['texto_com']."</p></div>";
                    }
                }

                if (isset($error_comentario)) {
                    echo $error_comentario;
                }
            ?>

        </div>

        <script>
            function mostrarCom() {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("lista_comentarios").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "ajax/actualiza_com.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("id_obra=".$_GET['id']);
            }
        </script>
        
        <?php if (isset($_SESSION['tipo'])) { ?>
            <form name="comentar" class="escribir" method="POST" action="obra.php?id=<?php echo $id_obra; ?>">
                <input type="hidden" name="fecha" value="CURRENT_TIMESTAMP()">
                <input required="true" name="texto_com" class="texto_comentario" type="text" placeholder="Comentario">
                <input type="submit" value="Enviar" name="submit_comentario">
            </form>
        <?php } 

        ?>
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
                            <a class="boton" href="" 
                                onclick="window.open('modules/twitter.php?n=<?php echo $nombre; ?>&img=<?php echo $imagen ?>', 'Twitter', 'width=500,height=400')">
                                Compartir en Twitter</a>
                            <a class="boton" href="" 
                                onclick="window.open('modules/facebook.php?n=<?php echo $nombre; ?>&img=<?php echo $imagen ?>', 'Facebook', 'width=500,height=400')">
                                Compartir en Facebook</a>
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