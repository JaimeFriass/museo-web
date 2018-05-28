

<?php
include("conexion.php");
$q = $_GET['q']; //q es lo que está escribiendo
echo $q."<br>";

$res = mysqli_query ($conexion, "SELECT * FROM usuarios WHERE nombre LIKE '%".$q."%'");
echo "<hr>";
if ($res->num_rows > 0) {
    while($a_res =  mysqli_fetch_assoc($res)) {
        echo "<form id='actualizarRol' method='post' action='panel.php#roles'>";
        echo "<input type='hidden' name='id_usuario' value='".$a_res['id']."'>";
        echo "<div class='resultado_usuarios'><table><tr>";
            echo "<td>".$a_res['nombre']."</td><td class='email'>".$a_res['email']."</td><td>";
            echo "<div class='roles'><select name='tipo'>
                <option value='1'><i class='fa fa-user'></i> Normal</option>
                <option value='2'>Moderador</option>
                <option value='3'>Gestor</option>
                <option value='4'>Superusuario</option>
            </select></div></td><td>";
        echo "<input type='submit' value='Actualizar' name='actualizarRol'>";
        echo "</td></tr></table></div>";
        echo "</form>";
    }
} else {
    echo "<p class='error'><i class='fa fa-times'></i> No se han encontrado usuarios con ese nombre. </p>";
}

?>
