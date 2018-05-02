<?php
    include "modules/conexion.php";

    class Panel {
        private $tipo_usuario;
        private $nombre;

        // Constructor del panel, establece el tipo y el nombre
        // del usuario actual
        function __construct() {
            $tipo = $_SESSION['tipo'];
            $tipo = 4;
            if ($tipo > 0 && $tipo <= 4)
                $this->tipo_usuario = $tipo;
            else
                $this->tipo_usuario = -1;

            //$res = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE id=$_SESSION['id']");
            //$a_res = mysqli_fetch_assoc($res);
            //$this->nombre = $a_res['nombre'];
            $this->nombre = "PACO";
            
        }

        function getTipo() {
            return $this->tipo_usuario;
        }


        function mostrarDatos() {
            include "modules/datos_usuario.php";
        }

        function mostrarConfObras() {
            include "modules/conf_obras.php";
        }

        function mostrarRoles() {
            include "modules/roles.php";
        }

        function mostrarPaneles() {
            $this->mostrarDatos();
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
    $panel->mostrarPaneles();

    include "modules/footer.php";
?>