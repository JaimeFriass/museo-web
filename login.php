<?php
$menu_activo = 10; 
include "header.php"; 

    // define variables and set to empty values
    $nameErr = $passErr="";
    $name = $pass="";
    $id = -1;
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
          $nameErr = "Name is required";
        } else {
          $name = test_input($_POST["name"]);
        }
        
        if(empty($_POST["pass"])){
            $passErr = "password is required";
        }
        else{
            $pass = test_input($_POST["pass"]);
        }

        include "conexion.php"

        $resultado = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE nombre=".$name);
        
        if($resultado != NULL){
            $array_resultado =  mysqli_fetch_assoc($resultado);
            if( $array_resultado['pass'] != $pass){
                echo "Contraseña incorrecta";
            }
            else{
                $id = $array_resultado['id'];
                session_start();
                $_SESSION["id"] = $id;
                $_SESSION["nombre"] = $name;
                $_SESSION["pass"] = $pass;
    
            }
        }
        else
            echo "No existe ese usuario";
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


<form action="login.php">
  User:<br>
  <input type="text" name="name" value="Name">
    <?php echo $nameErr;?>
    <br><br>
  <br>
  Pass:<br>
  <input type="password" name="pass" value="Password">
    <?php echo $passErr;?>
    <br><br>
  <br><br>
  <input type="submit" value="Login">
</form> 


<?php


    include "footer.php";

?>

</body>
</html>
