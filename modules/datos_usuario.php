<div class="datos_usuario">
    <h2><?php echo $nombre ?></h2>
    <?php 
    if ($this->tipo_usuario == 2)
        echo "<h3>Moderador</h3>";
    else if ($this->tipo_usuario == 3) {
        echo "<h3>Gestor museo</h3>";
    } else if ($this->tipo_usuario == 4) {
        echo "<h3>Superusuario</h3>";
    }
    ?>
    <p><i class="fa fa-envelope"></i> <?php echo $email; ?></p>
    <p><i class="fa fa-mobile-alt"></i>  <?php echo $tlf; ?></p>
    <div class="nuevo_nombre">
        <h4>Cambiar nombre</h4>
        <form method="post" action="panel.php" >
            <input type="text" name="nuevo_nombre" placeholder="Nuevo nombre">    
            <input type="hidden" name="id_nombre" value="<?php echo $_SESSION['id']; ?>">
            <input type="submit" name="actualizarnombre" value="Cambiar">
        </form>
        <?php if ( isset($_POST['actualizarnombre']) ) {
            $this->actualizarNombre($_POST['id_nombre'], $_POST['nuevo_nombre']);
        }
        ?>
    </div>
    <div class="nueva_pass">
        <h4>Cambiar contraseña</h4>
        <form>
            <input type="password" name="vieja_pass" placeholder="Antigua contraseña">
            <input type="password" name="nueva_pass" placeholder="Nueva contraseña">
            <input type="password" name="nueva_pass2" placeholder="Confirmar contraseña">    
            <input type="submit" value="Cambiar">
        </form>
    </div>
</div>