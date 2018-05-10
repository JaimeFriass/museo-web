<?php
    include "modules/conexion.php";
    if ( !isset($_SESSION['id'])) {
        echo "id no establecido";
        header("Location: login.php");
    } else if ( $_SESSION['id'] == -1) {
        echo "Sesión cerrada";
        header("Location: login.php");
    }

    class Panel {
        private $tipo_usuario;
        private $conexion;
        // Constructor del panel, establece el tipo y el nombre
        // del usuario actual
        function __construct($conexion) {
            $tipo = $_SESSION['tipo'];
            if ($tipo > 0 && $tipo <= 4)
                $this->tipo_usuario = $tipo;
            else
                $this->tipo_usuario = -1;
            
            $this->conexion = $conexion;
            
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

        function buscarUsuarios($usuario) {
            $res = mysqli_query ($this->conexion, "SELECT * FROM usuarios WHERE nombre LIKE '%".$usuario."%'");
            echo "<hr>";
            if ($res->num_rows > 0) {
                while($a_res =  mysqli_fetch_assoc($res)) {
                    echo "<form id='actualizarRol' method='post' action='panel.php#roles'>";
                    echo "<input type='hidden' name='id_usuario' value='".$a_res['id']."'>";
                    echo "<div class='resultado_usuarios'><table><tr>";
                        echo "<td>".$a_res['nombre']."</td><td class='email'>".$a_res['email']."</td><td>";
                        echo "<div class='roles'><select name='tipo'>
                            <option value='1'><i class='fa fa-user'></i> Normal</option>
                            <option value='2'>Moderador</option>
                            <option value='3'>Gestor</option>
                            <option value='4'>Superusuario</option>
                        </select></div></td><td>";
                    echo "<input type='submit' value='Actualizar' name='actualizarRol'>";
                    echo "</td></tr></table></div>";
                    echo "</form>";
                }
            }
        }

        function actualizarRol($id, $tipo) {
            $res = mysqli_query ($this->conexion, "UPDATE usuarios SET tipo='".$tipo."' WHERE id=".$id);
            if ($res) {
                echo "Rol actualizado correctamente!";
            } else {
                echo "Error al actualizar el rol";
            }
        }

        function actualizarNombre($id, $nombre) {
            $comp = mysqli_query($this->conexion, "SELECT * FROM usuarios WHERE nombre='".$nombre."'");
            if ($comp->num_rows == 0) {
                $res = mysqli_query ($this->conexion, "UPDATE usuarios SET nombre='".$nombre."' WHERE id=".$id);
                if ($res)
                    echo "Nombre actualizado correctamente.";
                else
                    echo "Error al actualizar el nombre";
            } else {
                echo "Nombre de usuario ya registrado. Prueba otro.";  
            }
        }

        // Actualiza la contraseña de $id comprobando que coincide $pass_ant
        // con la anterior.
        function actualizarContra($id, $pass_ant, $pass_nueva) {

        }

        // Actualiza el correo de $id
        function actualizarCorreo($id, $email) {
            $comp = mysqli_query($this->conexion, "SELECT * FROM usuarios WHERE correo='".$email."'");
            if ($comp->num_rows == 0) {
                $res = mysqli_query ($this->conexion, "UPDATE usuarios SET email='".$email."' WHERE id=".$id);
                if ($res)
                    echo "Correo actualizado correctamente.";
                else
                    echo "Error al actualizar el correo";
            } else {
                echo "Correo activo. Prueba otro.";  
            }
        }

        // Muestra todas las obras, en secciones de 16 obras
        function mostrarObras($div) {
            // Si se pasa a la siguiente seccion se muestran las siguientes obras
            $offset = $div * 16;
            $res = mysqli_query( $this->conexion, "SELECT * FROM obras LIMIT 16 OFFSET ".$offset);

            if ($res->num_rows > 0) {
                while ($a_res = mysqli_fetch_assoc($res)) {
                    echo "<div class='res_obra'>";
                        echo "<img src='".$a_res['imagen']."' width=100 height=150>";
                        echo "<form class='herramientas'>";
                            echo "<a href='modules/eliminar_obra.php?id=".$a_res['id']."'><i class='fa fa-times-circle'></i></a>";
                            echo "<a href='editar_obra.php?id=".$a_res['id']."'><i class='fa fa-pencil-alt '></i></a>";
                        echo "</form>";
                    echo "</div>";
                }
            }
        }

        function buscarObra($nombre) {
            $res = mysqli_query ($this->conexion, "SELECT * FROM obras WHERE Nombre LIKE '%".$nombre."%'");
            echo "<hr><div class='res_obra_busc'><table>";
            if ($res->num_rows > 0) {
                while($a_res =  mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                        echo "<td>".$a_res['Nombre']."</td>";
                        echo "<td><a href='editar_obra.php?id=".$a_res['id']."'><i class='fa fa-pencil-alt'></i></a></td>";
                    echo "</tr>";
                }
            }
            echo "</table></div><br><hr>";
        }

    }


    $menu_activo = 5;
    $titulo_pag = "Panel";
    
    include "modules/head.php";
    include "modules/header.php";

    $panel = new Panel($conexion);
    $panel->mostrarPaneles($conexion);
    
    echo "<div class='cerrar_sesion'><a href='modules/cerrar_sesion.php' 
               class='boton cerrar_sesion'><i class='fa fa-times'></i> Cerrar sesión</a></div>";
    include "modules/footer.php";
?>