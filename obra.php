<?php
include "modules/conexion.php";
$id_obra = $_GET["id"];
$seleccion_datos = "SELECT  *  FROM obras WHERE id = ".$id_obra ; //sentencia en sql
$seleccion_comentarios = "SELECT * FROM comentarios WHERE obra_com = ".$id_obra;

if (!($resultado_datos = mysqli_query ($conexion, $seleccion_datos))) {   //ejecuta la sentencia y devuelve un resultado
    echo "Falló el query";
    exit();
}

if (!($resultado_comentarios = mysqli_query ($conexion, $seleccion_comentarios))) {
    echo "Falló el query de los comentarios";
    exit();
}

// Pasamos el resultado a un array para extraer el id
$array_resultado_d = mysqli_fetch_assoc($resultado_datos);

// Extraemos del array las variables que utlizaremos
$nombre      = $array_resultado_d["Nombre"];
$fecha       = $array_resultado_d['fecha'];
$dimensiones = $array_resultado_d['dimensiones'];
$procedencia = $array_resultado_d['procedencia'];
$comentario  = $array_resultado_d['comentario'];
$imagen      = $array_resultado_d['imagen'];
$video       = $array_resultado_d['video'];
mysqli_close($conexion);
?>

<html>
<?php
    $titulo_pag = $nombre;
    include "modules/head.php";
?>
<body>
     
    <?php $menu_activo = 2; include "modules/header.php";

    include "modules/contenido_obra.php";

    include "modules/footer.php"; ?>


</body>

</html>