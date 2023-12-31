<?php

$hostname = "localhost";
$dbname = "system_fisio";
$usuario = "root";
$senha   = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $dbname);
if ($mysqli->connect_errno) {
    echo "falha ao conectar: (" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}
?>
