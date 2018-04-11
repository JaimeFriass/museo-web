<?php
// CONSULTAMOS LOS DATOS DE LA OBRA EN CUESTION
// TODO: Cambiar ROOT

$conexion = mysqli_connect ("localhost", "prueba2", "prueba2"); //establece conexion
$abreBD = mysqli_select_db ($conexion, "museoweb"); //abre la BD
// Idioma
mysqli_set_charset($conexion, 'utf8');

if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    exit();
}
$id_obra = $_GET["id"];
$seleccion = "SELECT  *  FROM obras WHERE id = ".$id_obra ; //sentencia en sql 

if (!($resultado = mysqli_query ($conexion, $seleccion))) {   //ejecuta la sentencia y devuelve un resultado
    echo "Falló el query";
    exit();
}
// Pasamos el resultado a un array para extraer el id
$array_resultado = mysqli_fetch_assoc($resultado);
// Extraemos del array las variables que utlizaremos
$nombre      = $array_resultado["Nombre"];
$fecha       = $array_resultado['fecha'];
$dimensiones = $array_resultado['dimensiones'];
$procedencia = $array_resultado['procedencia'];
$comentario  = $array_resultado['comentario'];
$imagen      = $array_resultado['imagen'];
mysqli_close($conexion);
?>

<html>
<?php 
    include "head.php";
?>
<body>
     
    <?php $menu_activo = 2; include "header.php";

    // Aqui modificamos las variables de cada obra
    include "contenido_obra.php";

    include "footer.php"; ?>


</body>

</html>