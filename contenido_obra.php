<article class="obra">
        <div class="fondo_obra">
            <div class="obra">
                <h1><?php echo $nombre; ?></h1>

                <div class="imagen">
                    <img src='<?php echo $imagen; ?>' alt="Alabastron">
                </div>
                <div class="texto"><br>
                <?php echo $dimensiones; ?>

                <h3>Procedencia</h3>
                <?php echo $procedencia; ?><br>

                <h3>Comentarios</h3>
                <?php echo $comentario; ?>
                </div>

                <a class="boton" href="obra_imprimir.html">Imprimir</a>
                <a class="boton" href="https://twitter.com">Compartir en Twitter</a>
                <a class="boton" href="https://facebook.com">Compartir en Facebook</a>
            </div>
        </div>
      </article>