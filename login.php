<?php
include "modules/conexion.php";
include "modules/head.php";
$menu_activo = 10;
include "modules/header.php";

// Si está ya iniciada la sesión
if ( isset($_SESSION['id']) ) { 
    echo "SESSION id = ".$_SESSION['id'];    
    echo "<br>SESSION tipo = ".$_SESSION['tipo'];  
    ?>
    <div class="container_login">
        <a class="boton" href="modules/cerrar_sesion.php">Cerrar sesión</a>
    </div>

<?php
} else {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // define variables and set to empty values
    $nameErr = $passErr = "";
    $name = $pass = "";
    $id = -1;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "Se ha mandado un POST<br>";
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["pass"])) {
            $passErr = "password is required";
        } else {
            $pass = test_input($_POST["pass"]);
        }

        if ($name != "" && $pass != "") {
            echo "Nombre: ".$name;
            $resultado = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre='" . $name."'");

            if ($resultado != null) {
                $array_resultado = mysqli_fetch_assoc($resultado);
                if ($array_resultado['pass'] != $pass) {
                    echo "Contraseña incorrecta";
                } else {
                    $id = $array_resultado['id'];
                    $tipo = $array_resultado['tipo'];
                    $_SESSION['id'] = $id;
                    $_SESSION['tipo'] = $tipo;
                    header( "Location: panel.php");
                }
            } else {
                echo "No existe ese usuario";
            }
        }
    }
    ?>

    <html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <title>Login</title>
        <meta charset="utf-8">
    </head>
    <body>

    <div class="container_login">
        <form class="login" action="login.php" method="post">
            <h2>Iniciar sesión</h2>
            <input type="text" name="name" placeholder="Usuario">
            <?php echo $nameErr; ?>

            <input type="password" name="pass" placeholder="Contraseña">
            <?php echo $passErr; ?>
            <input type="submit" value="Login">
        </form>
    </div>

    <?php
    }
    include "modules/footer.php";
    ?>

    </body>
    </html>


