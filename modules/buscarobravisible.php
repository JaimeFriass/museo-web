<?php
include("conexion.php");
$q = $_GET['q']; //q es lo que está escribiendo


$res = mysqli_query ($conexion, "SELECT * FROM obras WHERE nombre LIKE '%".$q."%'");
echo "<hr>";
if ($res->num_rows > 0) {
    while($a_res =  mysqli_fetch_assoc($res)) {
        echo "<form id='actualizarVisible' method='post' action='panel.php#conf_obras'>";
        echo "<input type='hidden' name='id_obra' value='".$a_res['id']."'>";
        echo "<div class='resultado_obras'><table><tr>";
            echo "<td>".$a_res['Nombre']."<td>";
            echo "<a href='modules/eliminar_obra.php?id=".$a_res['id']."'><i class='fa fa-times-circle'></i></a> ";
            echo "<a href='editar_obra.php?id=".$a_res['id']."'><i class='fa fa-pencil-alt'></i></a> ";
            if ($a_res['visible'] == 1) {
                echo " <a href= 'modules/CambiarVisible.php?id=".$a_res['id']."&v=1'><i class='fas fa-eye'></i></a>";    
            } else {
                echo " <a href= 'modules/CambiarVisible.php?id=".$a_res['id']."&v=0'><i style='color: gray' class='fas fa-eye'></i></a>";
            }

        echo "</td></tr></table></div>";
        echo "</form>";
    }
} else {
    echo "<p class='error'><i class='fa fa-times'></i> No se han encontrado obras con ese nombre. </p>";
}

?>