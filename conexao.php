<?php

session_start();
$hostname = "127.0.0.1";
$database = "nomedobancolocal";
$user = "root";
$password = "root";


$conexao = mysqli_connect($hostname, $user, $password, $database) or die('Não foi possível conectar');

//Variáveis globais
$BASE_URL = "localhost/seminario-uniasselvi/";
