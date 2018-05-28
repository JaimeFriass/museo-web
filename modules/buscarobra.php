<?php 
include("conexion.php");
$q = $_GET['q']; //q es lo que está escribiendo

if (isset($_SESSION['tipo'])){
    if($_SESSION['tipo'] >= 3){
        $res = mysqli_query ($conexion, "SELECT * FROM obras WHERE Nombre LIKE '%".$q."%'");
    }
    else{
        $res = mysqli_query ($conexion, "SELECT * FROM obras WHERE Nombre LIKE '%".$q."%' and visible = 1");
    }
}
else{
    $res = mysqli_query ($conexion, "SELECT * FROM obras WHERE Nombre LIKE '%".$q."%' and visible = 1");
}

echo "<hr>";
if ($res->num_rows > 0) {
    while($a_res =  mysqli_fetch_assoc($res)) {
        echo "<a href ='obra.php?id=".$a_res['id']."'>".$a_res['Nombre']."</a><br>";
    }
} else {
    echo "<p class='error'><i class='fa fa-times'></i> No se han encontrado obras con ese nombre. </p>";
}




?>