<?php
require_once("bd.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="pie.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arapey&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300&family=PT+Sans&family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="pie.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
       

        .display-3,
        #quetal {
            text-align: center;
        }

        .carousel-item img {
            width: 100%;
            height: auto;
        }

        .carousel {
            max-width: 600px;
            margin: auto;
        }

        .envio {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        
    </style>
</head>

<body>
<?php include("template/cabecera.php"); ?>


    <div class="container">
        <br />
        <div class="row"></div>

        <div class="jumbotron">
            <!-- Tu contenido de AILUMAGA y carrusel -->
            <h1 class="display-3">AILUMAGA</h1>
            <p class="lead" id="quetal">Cerámica</p>
            <hr class="my-2">

            <div id="carouselExampleFade" class="carousel slide carousel-fade">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="corazon.jpeg" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="cactus.jpeg" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="gato.jpeg" class="d-block w-100 img-fluid" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="hongo.jpeg" class="d-block w-100 img-fluid" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>


    </div>

    <div class="envio" style="margin-top: 20px; margin-bottom: 20px;">
        <!-- Formas de Envío -->
        <div class="container">
            <h1>FORMAS DE ENVÍO</h1>
            <br />
            <i class="fa-solid fa-truck"></i>
            <br /><br />
            <p style="font-family: 'Inter', sans-serif; font-family: 'PT Sans', sans-serif; font-weight: bold;">
                Por el momento nuestra única forma de poder entregar el producto <br /> es acordando un punto de entrega en algún lugar de Mendoza.
            </p>
            <br />
        </div>
    </div>
    <?php include("template/pie.php"); ?>

</body>

</html>