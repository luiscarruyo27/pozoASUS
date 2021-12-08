<?php

$server = "localhost";
$user = "id18088344_pozoasus";
$pass = "4]#cblTk#3O[p1Z+";
$database = "id18088344_petroleo";

$con = mysqli_connect($server, $user, $pass, $database);


if (!$con) {
    die("<script>alert('Conexion Fallida.')</script>");
}

?>