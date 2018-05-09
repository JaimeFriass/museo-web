<?
function array_recibe($url_array) {
    $tmp = stripslashes($url_array);
    $tmp = urldecode($tmp);
    $tmp = unserialize($tmp);

   return $tmp;
}


$array=$_GET['array_env'];


$array=array_recibe($array);

?>

<article class="obra">
        <div class="fondo_obra">
            <div class="obra">
                <h1> <?php echo $array("nombre"); ?></h1>

                <div class="imagen">
                    <img src="img/alabastron.jpg" alt="Alabastron">
                </div>
                <div class="texto"><br>
                <b>Longitud</b> 12 cm. <b>Anchura</b>: 8,9 cm.<br />
                Paleolítico Inferior, Achelense Superior/ Final, 100.000 a.C.<br>

                <h3>Procedencia</h3>
                Solana del Zamborino, Fonelas, Granada.<br>

                <h3>Comentarios</h3>
                El yacimiento de la Solana del Zamborino se sitúa en el Oeste de la depresión de Guadix,
                a 7 Km. de Fonelas. En 1972 se iniciaron las excavaciones bajo la dirección de Miguel Botella.
                <br />El estudio de la estratigrafía, de los restos óseos y líticos permitió conocer los diversos usos del lugar:
                primero, como cazadero de forma ocasional; después, como cazadero estacional de manera intensiva,
                así como de asentamiento humano durante el periodo que duraba la caza; y por último, se documentó el abandono progresivo
                del yacimiento. En las distintas campañas de excavaciones se registraron gran cantidad de restos óseos de animales,
                entre los que predominaban especímenes jóvenes de équidos y bóvidos, y de instrumentos líticos utilizados
                por los grupos cazadores- recolectores. <br />La industria lítica está realizada sobre todo en cuarzo y cuarcita,
                siendo escasos los útiles realizados en sílex, como en este caso. El repertorio lítico está compuesto por bifaces,
                cantos tallados unifaciales y bifaciales, raederas, denticulados, raspadores y muescas. El bifaz es el útil más destacado
                del Achelense, con mayor grado de complejidad técnica que en las fases anteriores y está realizado por la talla alterna
                y centrípeta -hacia el centro-, en las dos caras del núcleo de materia prima utilizada hasta conseguir una extremidad
                distal apuntada que confiere al útil una morfología más larga que ancha.
                </div>

                <a class="boton" href="obra_imprimir.html">Imprimir</a>
                <a class="boton" href="https://twitter.com">Compartir en Twitter</a>
                <a class="boton" href="https://facebook.com">Compartir en Facebook</a>
            </div>
        </div>
      </article>

