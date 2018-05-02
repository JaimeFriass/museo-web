<?php
unset($_SESSION['id']);
unset($_SESSION['tipo']);
session_unset();
session_destroy();
echo "SESSION id = ".$_SESSION['id'];
header("Location: ../index.php");

?>