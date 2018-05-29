<?php
include("conexion.php");
$q = $_GET['q']; //q es lo que está escribiendo
echo $q."<br>";

$seleccion_comentarios = "SELECT * FROM (SELECT * FROM comentarios WHERE obra_com = ".$_POST['id_obra']."
                            ORDER BY id_com DESC LIMIT 4) AS alias ORDER BY id_com";

if (!($resultado_comentarios = mysqli_query ($conexion, $seleccion_comentarios))) {
    echo "Falló el query de los comentarios";
    exit();
}

if ($resultado_comentarios->num_rows > 0) {
    while($array_resultado =  mysqli_fetch_assoc($resultado_comentarios)) {
        echo "<div class='mensaje'><p class='nombre_com'><b>".$array_resultado['nom_com']."</b></p>";
        echo "<p class='fecha_com'>".$array_resultado['fecha']."</p>";
        echo "<p class='texto_men'>".$array_resultado['texto_com']."</p></div>";
    }
} else {
    echo "ERRORR";
}

?>
