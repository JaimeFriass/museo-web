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
                                    nombre='".$_POST['nombre']."',
                                    dimensiones='".$_POST['dimensiones']."',
                                    procedencia='".$_POST['procedencia']."',
                                    comentario='".$_POST['comentario']."'
                                    WHERE id=".$_GET['id']);
        if ( isset($_POST['submit_edit'])) {
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["imagen"])) {
                $check = getimagesize($_FILES["imagen"]["tmp_name"]);
                if($check !== false) {
                    $error = "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $error = "Lo que has subido no es una imagen.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $error = "Ese fichero ya existe";
                $uploadOk = 0;
            }
            // Check file size,
            if ($_FILES["imagen"]["size"] > 500000) {
                $error = "Esa imagen es demasiado grande";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                //$error =  "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                

                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                    list($ancho_orig, $alto_orig) = getimagesize($target_file);
                    $imagen_p = imagecreatetruecolor(1000, 1327);
                    $imagen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);
                    imagecopyresampled($imagen_p, $imagen, 0,0,0,0, 1000, 1327, $ancho_orig, $alto_orig);

                    //echo "The file ". basename( $_FILES["imagen"]["name"]). " has been uploaded.";
                    $res_imagen = mysqli_query($conexion, "UPDATE obras SET imagen='img/".basename( $_FILES["imagen"]["name"])."'
                                                            WHERE id=".$_GET['id']);
                } else {
                    $error =  "Ha habido un error al intentar subir la iamgen a la base de datos";
                }
            }
        }

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