<?php
    include "modules/conexion.php";
    
    // Si se le ha pasado un id de una obra en la URL:
    if (isset($_GET['id'])) {
        $id_url = $_GET['id'] ;
        if( $id_url <= 8 && $id_url > 0){
            header("Location: obra.php?id=".$id_url);

            function array_envia($array) {
            
                $tmp = serialize($array);
                $tmp = urlencode($tmp);
            
                return $tmp;
            }
            
            $seleccion = 'SELECT  *  FROM  Obras Where Obras.id == id_url' ; //sentencia en sql 
            $resultado = mysqli_query ($conexion, $seleccion);   //ejecuta la sentencia y devuelve un resultado

            $array_resultado = msqli_fetch_array($resultado); // Pasamos el resultado a un array para extraer el idç
            
            $array_env = array_envia($array_resultado);
            
            // Usando un formulario y campo hidden.
            
            /*<form action="contenido_obra.php" method="POST">
               <input name="array" type="hidden" value="$array_env">
               <input name="enviar" type="submit" value=" Enviar ">
            </form>*/
            echo "<a href=\"contenido_obra.php?array=$array_env\">pasar array</a>";
            

        }
        else
            echo "ERROR: 404 página no encontrada, id incorrecto";

    // Si no se le ha pasado un id de una obra en la URL se muestra la página por defecto
    } else {
        $menu_activo = 1;
        
        $titulo_pag = "Portada";
        $resultado_exp   = mysqli_query ($conexion, "SELECT * FROM exposiciones");
        $resultado_obras = mysqli_query ($conexion, "SELECT * FROM obras");
        include "modules/header.php";
        include "modules/head.php";
?>

<body>
    <article>
        <script>
            function buscaObra(str){
                 // Si no se escribe nada no se muestra nada de resultado.
                if (str == "") {
                    document.getElementById("muestra_obras").innerHTML = "";
                    return;
                } 
                else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("muestra_obras").innerHTML = this.responseText;
                        }
                    };
                    // Se envia con GET la cadena a buscar en la BD
                    xmlhttp.open("GET","modules/buscarobra.php?q=" + str, true);
                    // Se muestra
                    xmlhttp.send();
                }

            }
        </script>
        <form id = "resultobra">
            <input id = "buscamosobra" oninput="buscaObra(this.value)"  type = "text" name = "busquedaobra" placeholder = "busca obra">
            <div id="muestra_obras"></div>
        </form>
        

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

    <?php include "modules/footer.php"; ?>

</body>

<?php
// Cerramos el corchete del inicio de la página
} 
?>