<?php
    include "modules/conexion.php";
    if ( $_SESSION['tipo'] < 3) {
        echo "No se te permite editar obras";
    }

    $titulo_pag = "Editar obra";

    include "modules/head.php";
    include "modules/header.php";

    if ( isset($_POST['submit_edit'])) {
        $resultado_edicion = mysqli_query($conexion, "UPDATE obras SET
                                    nombre='".$_POST['nombre']."' 
                                    WHERE id=".$_GET['id']);

    }


    $res = mysqli_query( $conexion, "SELECT * FROM obras WHERE id=".$_GET['id']);
    $a_res = mysqli_fetch_assoc($res);
    $nombre = $a_res['Nombre'];
    $imagen = $a_res['imagen'];
    $dimensiones = $a_res['dimensiones'];
    $procedencia = $a_res['procedencia'];
    $comentario = $a_res['comentario'];

    include "modules/editar.php";

?>