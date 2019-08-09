<?php include '../conexion/conexion.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MQ Fast</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        body{
            padding-bottom: 10px;
        }
    </style>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase.js"></script>
    
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <a href="../admin/index.php" class="navbar-brand">MQFast</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mr-auto">
                    <a href="../admin/inventario.php" class="nav-link">Inventario</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categorias</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="../admin/categorias.php?opc=General" class="dropdown-item">General</a>
                        <a href="../admin/categorias.php?opc=Moda" class="dropdown-item">Moda</a>
                        <a href="../admin/categorias.php?opc=Electronica" class="dropdown-item">Electronica</a>
                        <a href="../admin/categorias.php?opc=Joyeria" class="dropdown-item">Joyeria</a>
                        <a href="../admin/categorias.php?opc=Relojes" class="dropdown-item">Relojes</a>                        
                    </div>
                </li>
            </ul>
            <button class="btn btn-dark"  id="logout">Salir</button>
        </div>
        
    </nav>
    