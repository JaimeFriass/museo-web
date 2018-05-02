<?php

include "modules/conexion.php";
if (isset($_GET['id'])) {
    $resultado_obras = mysqli_query ($conexion, "SELECT * FROM obras, colecciones WHERE colecciones.id_col=".$_GET['id']." AND obras.id=colecciones.id_obra");
    $resultado_col   = mysqli_query( $conexion, "SELECT * FROM coleccion WHERE id=".$_GET['id']);
} else {
    $resultado_cols  = mysqli_query( $conexion, "SELECT * FROM coleccion");
}


$titulo_pag = "Colección";
$menu_activo = 3;
include "modules/head.php";
include "modules/header.php";

?>
<body>
    <article>
        <?php // Si se le pasa una colección se muestran los datos y obras de esta
        if (isset($_GET['id'])) { $array_resultado =  mysqli_fetch_assoc($resultado_col); ?>
            <h1><?php echo $array_resultado['nombre']; ?></h1>
            <p><?php echo $array_resultado['descripcion']; ?></p>
            <?php
                if ($resultado_obras->num_rows > 0) {
                    while($array_resultado =  mysqli_fetch_assoc($resultado_obras)) {
                        echo "<div class='responsivo'><div class='galeria'><a href='obra.php?id=".$array_resultado['id']."'>";
                            echo "<img src='".$array_resultado['imagen']."' alt='".$array_resultado['Nombre']."'></a>";
                            echo "<div class='desc'>".$array_resultado['Nombre']."</div></div></div>";
                    }
                }
        } else {
            
        ?>

            <h1>Colecciones</h1>
            <ul>
                <?php
                // Si no se le pasa una coleccion muestra todas las colecciones
                if ($resultado_cols->num_rows > 0) {
                        while($array_resultado =  mysqli_fetch_assoc($resultado_cols)) {
                            echo "<li><a class='nom_col' href='coleccion.php?id=".$array_resultado['id']."'><h1>".$array_resultado['nombre']."</h1><p>".$array_resultado['descripcion']."</p></a></li>";
                        }
                    }
                ?>
            </ul>
                <?php } ?>
    </article>
    <?php include "modules/footer.php"; ?>
</body>
</html>