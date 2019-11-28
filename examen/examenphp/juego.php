<!DOCTYPE html>
<html>
<head>
    <title>Monkey Island</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/bootstrap-4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <?php include "menu.php" ?>
    <div class="container-fluid pt-5">
<?php
 //LEER ID Y TRAER LOS DATOS DEL JUEGO
use clases\Juegos as Juegos;

 $id = $_GET['id'];
 $juego= Juegos::getDataGame($id);

 $titulo= $juego['titulo'];
 $imagen="m". $juego['id']."jpg";
 $descripcion= $juego['descripcion'];
 
?>
        <div class="row">
            <div class="col-md-2 offset-md-2">
                <img class="w-100" src="imagenes/<?=$imagen?>">
            </div>   
            <div class="col-md-6 text-center">
                <h1><?=$titulo?></h1>
                <p><?=$descripcion?></p>
            </div>   
        </div>
    </div>
</body>

</html>