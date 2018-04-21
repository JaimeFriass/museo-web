<?php

include "conexion.php";

$resultado_exposicion = mysqli_query ($conexion, "SELECT * FROM exposiciones WHERE id=".$_GET['id']);
$resultado_exposiciones = mysqli_query ($conexion, "SELECT * FROM exposiciones");

// Extraemos las variables de la exposicion seleccionada
$array_resultado =  mysqli_fetch_assoc($resultado_exposicion);
$titulo_pag = $nombre = $array_resultado['nombre'];
$fechas = $array_resultado['fechas'];
$ubicacion = $array_resultado['ubicacion'];
$horario = $array_resultado['horario'];
include "head.php";
include "header.php";


?>
<body>
    <article>
        <h1><?php echo $nombre; ?></h1>
        <h3><?php echo $fechas; ?></h3>
    </article>


    <aside>
        <h2>Próximas exposiciones</h2>
        <ul>
            <?php
            if ($resultado_exposiciones->num_rows > 0) {
                while($array_resultado =  mysqli_fetch_assoc($resultado_exposiciones)) {
                    echo "<li><a href='exposicion.php?id=".$array_resultado['id']."'><h3>".$array_resultado['nombre']."</h3>";
                    echo "<p>".$array_resultado['fechas']."</p>";
                    echo "<p class='dia'>".$array_resultado['horario']." ".$array_resultado['ubicacion']."</p></a></li>";
                }
            }
            ?>
        </ul>
    </aside>

    <?php include "footer.php"; ?>
</body>
</html>