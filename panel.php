<?php
    include "modules/conexion.php";

    if ( !isset($_SESSION['id'])) {

        echo "id no establecido";
        header("Location: login.php");
    }

    class Panel {
        private $tipo_usuario;
        // Constructor del panel, establece el tipo y el nombre
        // del usuario actual
        function __construct() {
            $tipo = $_SESSION['tipo'];
            if ($tipo > 0 && $tipo <= 4)
                $this->tipo_usuario = $tipo;
            else
                $this->tipo_usuario = -1;
            
        }

        function getTipo() {
            return $this->tipo_usuario;
        }


        function mostrarDatos($conexion) {
            $res = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE id=".$_SESSION['id'] );
            $a_res = mysqli_fetch_assoc($res);
            $nombre = $a_res['nombre'];
            $email = $a_res['email'];
            $tlf = $a_res['tlf'];
            include "modules/datos_usuario.php";
        }

        function mostrarConfObras() {
            include "modules/conf_obras.php";
        }

        function mostrarRoles() {
            include "modules/roles.php";
        }

        function mostrarPaneles($conexion) {
            $this->mostrarDatos($conexion);
            switch ($this->tipo_usuario) {
                case 4:
                    $this->mostrarRoles();
                case 3:
                    $this->mostrarConfObras();
                    break;
            }
        }

    }


    $menu_activo = 5;
    $titulo_pag = "Panel";
    
    include "modules/head.php";
    include "modules/header.php";

    $panel = new Panel();
    $panel->mostrarPaneles($conexion);
    
    echo "<a href='modules/cerrar_sesion.php' class='boton'>Cerrar sesión</a>";
    include "modules/footer.php";
?>