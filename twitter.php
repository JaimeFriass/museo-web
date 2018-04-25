<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>

    <body>
        <h1>Compartir en Twitter</h1>
        <hr>
        <p>Se publicará en Twitter el siguiente mensaje:</p>
        <p><b>Me encanta el <?php echo $_GET["n"]; ?>!! ;) Vía: @museoarq_granada</b></p>
        <img src='<?php echo $_GET["img"]; ?>' width='150' height='200'>
    </body>
</html>