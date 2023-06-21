<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/seminario-uniasselvi/assets/css/style.css">
    <link rel="stylesheet" href="/seminario-uniasselvi/assets/css/global.css" />
    <link rel="stylesheet" href="/seminario-uniasselvi/assets/css/blocks/layout.css" />
    <link rel="stylesheet" href="/seminario-uniasselvi/assets/css/blocks/brand.css" />
    <link rel="stylesheet" href="/seminario-uniasselvi/assets/css/blocks/sidebar-menu.css" />
    <link rel="stylesheet" href="/seminario-uniasselvi/assets/css/blocks/tweet.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Bronze Diary</title>
</head>

<body>

    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/seminario-uniasselvi/conexao.php');

    $idUsuario = $_SESSION['id_usuario'] ?? null;
    $usuario = $_SESSION['usuario'] ?? null;

    ?>

    <?php
    if ($idUsuario && $usuario) {
        include($_SERVER['DOCUMENT_ROOT'] . '/seminario-uniasselvi/views/menu/index.php');
    }
    ?>