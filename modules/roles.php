<div class="conf_roles">
    <h2><i class="fa fa-male"></i> Configurar roles </h2>
    
    <form class="buscar_usuario" method="post" action="panel.php">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="submit" name="submit_usuario" value="Buscar">
    </form>

    <?php if( isset($_POST['submit_usuario'])) {
        $this->buscarUsuarios($_POST['usuario']);
    }

    if ( isset($_POST['actualizarRol'])) {
        $this->actualizarRol($_POST['id_usuario'], $_POST['tipo']);
    }
    ?>

</div>