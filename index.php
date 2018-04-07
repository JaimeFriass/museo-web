<?php
include "head.php";
include "header.php";


    $conexion = mysql_connect ("localhost", "root", ""); //establece conexion
    $abreBD = mysql_select_db ("museoweb", $conexion); //abre la BD
    
    if (!$abreBD) { 
        die('No  se  pudo  abrir  la  base  de  datos.Error:  '.mysql_error()); 
    } 
    

    <input type=int name="id">;
    $id_url = $_GET['id'] ;

    if( id_url < 8 && id_url >= 0){ 
        $seleccion = 'SELECT  *  FROM  Obras Where Obras.id == id_url' ; //sentencia en sql 
        $resultado = mysql_query ($seleccion, $conexion);   //ejecuta la sentencia y devuelve un resultado
        //Ahora tenemos que redirigir la página
    }

?>