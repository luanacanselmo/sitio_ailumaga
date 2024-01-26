<?php include("template/cabecera.php"); ?>

<?php
include("bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

// Resto del código...
?>


<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300&family=Quicksand&display=swap" rel="stylesheet">
  <style>
    .jumbotron {
      padding: 20px;
      text-align: center;
    }
  </style>

</head>

<div class="jumbotron">
  <h1 class="display-3">PRODUCTOS</h1>
  <hr class="my-2">
  <br><br>
</div>

<div class="container">
  <div class="row">
    <?php foreach ($listaProductos as $producto) { ?>
      <div class="col-md-3">
        <div class="card mb-4" style="margin-bottom: 50px;"> <!-- Agregamos un margen inferior a las tarjetas -->
          <img class="card-img-top" src="./img/<?php echo $producto['imagen']; ?>" alt="" style="height: 300px; object-fit: cover;">
          <div class="card-body">
            <h4 class="card-title" style="font-family: 'Inter', sans-serif; font-family: 'Quicksand', sans-serif; "><?php echo $producto['nombre']; ?></br>$<?php echo $producto['precio']; ?> </h4>
            <a href="https://www.instagram.com/ailumaga/" class="ov-btn-slide-left">Consultar</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>


<style>
  /*** ESTILOS BOTÓN SLIDE LEFT ***/
  .ov-btn-slide-left {
    background: #fff;
    /* color de fondo */
    color: black;
    /* color de fuente */
    border: 2px solid black;
    /* tamaño y color de borde */
    padding: 16px 20px;
    border-radius: 20px;
    /* redondear bordes */
    position: relative;
    z-index: 1;
    overflow: hidden;
    display: inline-block;
    text-decoration: none;
    /* Elimina el subrayado del enlace */
    padding: 12px 16px;
    /* Reducir el padding para achicar el botón */
    font-size: 14px;
    /* Ajustar el tamaño de la fuente del botón */
  }

  .ov-btn-slide-left:hover {
    color: black;
    /* color de fuente hover */

  }

  .ov-btn-slide-left::after {
    content: "";
    background: rgba(207, 149, 255, 0.89);
    /* color de fondo hover */
    position: absolute;
    z-index: -1;
    padding: 16px 20px;
    display: block;
    top: 0;
    bottom: 0;
    left: -100%;
    right: 100%;
    -webkit-transition: all 0.35s;
    transition: all 0.35s;
  }

  .ov-btn-slide-left:hover::after {
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    -webkit-transition: all 0.35s;
    transition: all 0.35s;
  }
</style>

<?php include("template/pie.php"); ?>