<?php
include("conexion.php");

if($_GET['v'] == 1){
    $visi = 0;    
}
else{
    $visi = 1;
}
$res = mysqli_query ($conexion, "UPDATE obras SET visible=".$visi." WHERE id=".$_GET['id']);

if (!$res) {
    echo "ASDDSADSADSA";
} else {
    header("Location: ../panel.php#obras");
}

?>