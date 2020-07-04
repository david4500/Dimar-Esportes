<?php

$host = "localhost";
$usuario = "root";
$senha = "";
$bd = "dimar_esportes";

$mysqli = new mysqli ($host, $usuario, $senha, $bd );
if($mysqli->connect_error){
    echo "Falha na conexâo: (".$mysqli->connect_error.") ";
}



?>