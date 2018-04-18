<?php
$conexion = mysqli_connect ("localhost", "prueba2", "prueba2"); //establece conexion
$abreBD = mysqli_select_db ($conexion, "museoweb"); //abre la BD
// Idioma
mysqli_set_charset($conexion, 'utf8');
if (mysqli_connect_errno()) {
    echo "Falló la conexión: ".mysqli_connect_error();
    exit();
}
?>