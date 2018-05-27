<div id="roles" class="conf_roles">
    <h2><i class="fa fa-male"></i> Configurar roles </h2>

    <script>
    function buscarUsuario(str) {
        console.log("STR:" + str);
        // Si no se escribe nada no se muestra nada de resultado.
        if (str == "") {
            document.getElementById("muestra_usuarios").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("muestra_usuarios").innerHTML = this.responseText;
                }
            };
            // Se envia con GET la cadena a buscar en la BD
            xmlhttp.open("GET","modules/buscarusuario.php?q=" + str, true);
            // Se muestra
            xmlhttp.send();
        }
    }
    </script>
    
    <form class="buscar" method="post" action="panel.php#roles">
        <input type="text" name="usuario" oninput="buscarUsuario(this.value)" placeholder="Usuario">
        <input type="submit" name="submit_usuario" value="Buscar">
    </form>

    <!-- El espacio donde se mostrara el resultado -->
    <div id="muestra_usuarios"></div>

    <?php 
    if( isset($_POST['submit_usuario'])) {
        $this->buscarUsuarios($_POST['usuario']);
    }

    if ( isset($_POST['actualizarRol'])) {
        $this->actualizarRol($_POST['id_usuario'], $_POST['tipo']);
    }
    ?>

</div>