<?php
    include "conexion.php";
    
    // Si se le ha pasado un id de una obra en la URL:
    if (isset($_GET['id'])) {
        $id_url = $_GET['id'] ;
        if( $id_url <= 8 && $id_url > 0){
            header("Location: obra.php?id=".$id_url);
        }
        else
            echo "ERROR: 404 página no encontrada, id incorrecto";

    // Si no se le ha pasado un id de una obra en la URL se muestra la página por defecto
    } else {
        $menu_activo = 1;
        $resultado_obras = mysqli_query ($conexion, "SELECT * FROM obras");
        $resultado_exp   = mysqli_query ($conexion, "SELECT * FROM exposiciones");
        $titulo_pag = "Portada";
        
        include "head.php";
        include "header.php";
?>

<body>
    <article>
        <h1>Galería</h1>
        <?php
            if ($resultado_obras->num_rows > 0) {
                while($array_resultado =  mysqli_fetch_assoc($resultado_obras)) {
                    echo "<div class='responsivo'><div class='galeria'><a href='obra.php?id=".$array_resultado['id']."'>";
                        echo "<img src='".$array_resultado['imagen']."' alt='".$array_resultado['Nombre']."'></a>";
                        echo "<div class='desc'>".$array_resultado['Nombre']."</div></div></div>";
                }
            }

        ?>
    </article>


    <aside>
        <h2>Próximas exposiciones</h2>
        <ul>
            <?php
                if ($resultado_exp->num_rows > 0) {
                    while($array_resultado =  mysqli_fetch_assoc($resultado_exp)) {
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

<?php
// Cerramos el corchete del inicio de la página
} 
?>