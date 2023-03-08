<?php 

$hostname = "localhost";
$database = "nomedobancolocal";
$user = "root";
$password = "";

$mysql = new mysqli($hostname, $user, $password, $database);
if ($mysql->connect_errno) 
{
    echo "Falha ao realizar conexão com ('. $mysql->connect_errno . ')" . $mysql->connect_error;
}
