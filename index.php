<?php
include ("head.php");



    $conexion = mysqli_connect ("localhost", "root", ""); //establece conexion
    $abreBD = mysqli_select_db ($conexion, "museoweb"); //abre la BD
    
    if (!$abreBD) { 
        die('No  se  pudo  abrir  la  base  de  datos.Error:  '.mysqli_error($conexion)); 
    } 
    
    // Si se le ha pasado un id de una obra en la URL:
    if (isset($_GET['id'])) {
        $id_url = $_GET['id'] ;

        if( $id_url <= 8 && $id_url > 0){
            // Esta parte está comentada porque sólo queremos el id de la obra, y eso ya se le pasa en la URL, por tanto
            // no necesitamos ejecutar una consulta
            /*  
            $seleccion = 'SELECT  *  FROM  Obras Where Obras.id == id_url' ; //sentencia en sql 
            $resultado = mysqli_query ($conexion, $seleccion);   //ejecuta la sentencia y devuelve un resultado

            $array_resultado = msqli_fetch_array($resultado); // Pasamos el resultado a un array para extraer el idç
            $id_obra_resultado = $array_resultado['id']
            */
            //Ahora tenemos que redirigir la página
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
        include ("header.php");
?>

<body>

    <article>
        <h1>Galería</h1>
        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/alabastron.jpg" alt="Alabastron">
                </a>
                <div class="desc">Alabastron con inscripción jeroglífica</div>
            </div>
        </div>

        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/bifazcordiforme.jpg" alt="Bifaz cordiforme" width="300" height="200">
                </a>
                <div class="desc">Bifaz cordiforme</div>
            </div>
        </div>


        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/copa_vastago_cuadrado.jpg" alt="Copa de vástago cuadrado" width="300" height="200">
                </a>
                <div class="desc">Copa de vástago cuadrado</div>
            </div>
        </div>

        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/fuente_carenada.jpg" alt="Fuente carenada" width="300" height="200">
                </a>
                <div class="desc"> Fuente carenada con incrustaciones metálicas. </div>
            </div>
        </div>

        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/maegr_idolo.jpg" alt="Idolo antropomorfo" width="300" height="200">
                </a>
                <div class="desc">Ídolo antropomorfo masculino </div>
            </div>
        </div>



        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/urnafuneraria_esqueletoinfantil.jpg" alt="Urna Funeraria" width="300" height="200">
                </a>
                <div class="desc">Urna funeraria con esqueleto infantil </div>
            </div>
        </div>

        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/anfora_olearia.jpg" alt="Anfora Olearia" width="300" height="200">
                </a>
                <div class="desc">Ánfora Olearia</div>
            </div>
        </div>



        <div class="responsivo">
            <div class="galeria">
                <a target="_blank" href="obra.html">
                    <img src="img/coraza_anatomica.jpg" alt="Coraza Anatómica" width="300" height="200">
                </a>
                <div class="desc">Coraza anatómica</div>
            </div>
        </div>


    </article>


    <aside>
        <h2>Próximas exposiciones</h2>
        <ul>
            <li><a href=""><h3>Exposición A</h3>
                <p>De Lunes a Miércoles</p>
                <p class="dia">11:30 - 20:00 Sala C</p>
            </a></li>
            <li><a href=""><h3>Exposición B</h3>
                <p>Lunes a Viernes</p>
                <p class="dia">14:00 - 18:30 Sala Principal</p>
            </a></li>
            <li><a href=""><h3>Exposición C</h3>
                <p>Martes a Viernes <br></p>
                <p class="dia">9:00 - 14:00 Sala B</p>
            </a></li>
            <li><a href=""><h3>Exposición D</h3>  
                <p >Viernes</p> 
                <p class="dia">9:00 - 14:00 Sala A</p> 
            </a></li>
            <li><a href=""><h3>Exposición F</h3>
                <p>Sábado</p>
                <p class="dia"> 9:00 - 14:00 Sala A</p>
            </a></li>
        </ul>
    </aside>

    <footer>
            <b>&copy; Museo Arqueológico de Granada</b><br>
        Sistemas de Información Basados en Web<br>
        Curso 2017-18
    </footer>

</body>

<?php
// Cerramos el corchete del inicio de la página
} 
?>