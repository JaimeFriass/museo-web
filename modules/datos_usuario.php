<div class="datos_usuario">
    <h2><?php echo $nombre ?></h2>
    <p>Correo: <?php echo $email; ?></p>
    <p>Móvil:  <?php echo $tlf; ?></p>
    <div class="nuevo_nombre">
        <h4>Cambiar nombre</h4>
        <form>
            <input type="text" name="nuevo_nombre" placeholder="Nuevo nombre">    
            <input type="submit" value="Cambiar">
        </form>
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