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
            echo "<div class='obras'><select name='visible'>
                <option value='0'><i class='fa fa-user'></i> Oculto</option>
                <option value='1'>Visible</option>
            </select></div></td><td>";
        echo "<input type='submit' value='Actualizar' name='actualizarVisible'>";
        echo "</td></tr></table></div>";
        echo "</form>";
    }
} else {
    echo "<p class='error'><i class='fa fa-times'></i> No se han encontrado obras con ese nombre. </p>";
}

?>