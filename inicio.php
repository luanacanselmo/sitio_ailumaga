<?php
session_start();
require_once("bd.php");
?>

<?php include('administrador/template/cabecera.php')?>
          
          
          <div class="col-md-12">

                <div class="jumbotron">
                    <h1 class="display-3">Bienvenido </h1>
                    <p class="lead">Administra tus productos</p>
                    <hr class="my-2">
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="productos2.php" role="button">Administrar productos</a>
                        
                    </p>
                </div>

            </div>

<?php include('administrador/template/pie.php')?>
