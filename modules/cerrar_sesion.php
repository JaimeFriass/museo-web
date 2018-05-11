<?php
session_start();
//$_SESSION['id'] = -1;
//session_destroy();
$_SESSION = Array();
session_unset();

echo "SESSION id = ".$_SESSION['id'];
header("Location: ../index.php");

?>