<?php

session_start();
$hostname = "localhost";
$database = "nomedobancolocal";
$user = "root";
$password = "";

$conexao = mysqli_connect($hostname, $user, $password, $database) or die('Não foi possível conectar');

//Variáveis globais
$BASE_URL = "localhost/seminario-uniasselvi/";
