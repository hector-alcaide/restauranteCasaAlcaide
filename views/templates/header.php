<?php
/*
*  Variable que tiene como valor el nombre de la clase donde se encuentra
*/
$class_name = get_class($this);
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= isset($controller->page_title) ? $controller->page_title : 'Restaurante Casa Alcaide' ?></title>
    <meta name="description" content="Página web del restaurante Casa Alcaide">
    <meta charset="utf-8">
    <meta name="keywords" content="restaurante,comer,comida,brasa,carnes,pescados,cervezas,comprar,pedir">
    <meta name="author" content="Hèctor Alcaide Sànchez">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars/">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" media="screen">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
</head>

<body class="bg-color2">
    <header>
        <nav class="navbar navbar-expand-lg bg-color1 container-fluid">
            <div class="contenedor">
                <div class="d-flex justify-content-between">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <img id="logoMovil" src="../assets/img/logoRestaurante.svg" alt="Casa Alcaide Logo">
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto align-items-center text-center">
                        <li class="nav-item itemderecha">
                            <a class="nav-link <?= $class_name && $class_name == "homes" ? 'active' : '' ?> px-0" aria-current="page" href="<?= base_url ?>homes/index">INICIO</a>
                        </li>
                        <li class="nav-item itemderecha">
                            <a class="nav-link <?= $class_name && $class_name == "menus" ? 'active' : '' ?> px-0" href="<?= base_url ?>menus/index">CARTA</a>
                        </li>
                        <li class="nav-item itemderecha item_select">
                            <a class="nav-link <?= $class_name && $class_name == "orders" ? 'active' : '' ?> px-0" href="<?= base_url ?>orders/index">PEDIDOS</a>
                        </li>
                        <li class="nav-item" id="logo">
                            <img src="../assets/img/logoRestaurante.svg" alt="Casa Alcaide Logo">
                        </li>
                        <li class="nav-item item_select">
                            <a class="nav-link <?= $class_name && $class_name == "accounts" ? 'active' : '' ?> px-0" href="<?= base_url ?>accounts/index">CUENTA</a>
                        </li>
                        <li class="nav-item itemderecha">
                            <a class="nav-link <?= $class_name && $class_name == "reviews" ? 'active' : '' ?> px-0" href="<?= base_url ?>reviews/index">VALORACIONES</a>
                        </li>
                        <?php
                        if (common_helper::is_admin()) { ?>
                            <li class="nav-item itemderecha" id="backend_item">
                                <a class="nav-link <?= $class_name && $class_name == "backends" ? 'active' : '' ?> px-0" href="<?= base_url ?>backends/index">BACKEND</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>