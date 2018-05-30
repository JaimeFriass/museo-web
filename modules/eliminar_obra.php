
<?php
include("conexion.php");

$id = $_GET['id'];

$res = mysqli_query( $conexion, "DELETE FROM obras WHERE id = ".$id);
if($res == true)
    header("Location: ../panel.php#obras"); //se va por riles
else
    echo "Error eliminado ";


?>