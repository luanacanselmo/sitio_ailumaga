<?php
include("bd.php");

?>
<?php

include("administrador/template/cabecera.php");

?>

<?php

$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : ""; //1,24
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : ""; //1,24
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : ""; //1,24

$txtPrecio = (isset($_POST['txtPrecio'])) ? $_POST['txtPrecio'] : ""; //1,24

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : ""; //1,24






switch ($accion) {
    case "Agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO productos (nombre, precio, imagen) VALUES (:nombre, :precio, :imagen);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':precio', $txtPrecio);

        $fecha = new DateTime();

        $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];
        if ($tmpImagen != "") {

            move_uploaded_file($tmpImagen, "img/" . $nombreArchivo);
        }
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo); // Corrected binding
        $sentenciaSQL->execute();
        header("Location:productos2.php");

        break;
    case "Modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE productos SET nombre=:nombre, precio=:precio, imagen=:imagen WHERE id=:id");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':precio', $txtPrecio);
        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();



        if ($txtImagen != "") {
            $fecha = new DateTime();
            $nombreArchivo = ($txtImagen != "") ? $fecha->getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg";
            $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

            move_uploaded_file($tmpImagen, "img/" . $nombreArchivo);

            $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
            $producto = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);


            if (isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")) {
                if (file_exists("img/" . $producto["imagen"])) {
                    unlink("img/" . $producto["imagen"]);
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE productos SET imagen=:imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
            $sentenciaSQL->bindParam(':id', $txtID);
            $sentenciaSQL->execute();
        }
        header("Location:productos2.php");


        break;
    case "Cancelar":
        //echo "Presionado botón cancelar";
        header("Location:productos2.php");
        break;

    case "Seleccionar":
        //echo "Presionado botón seleccionar";

        $sentenciaSQL = $conexion->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
        

        $txtNombre = $producto['nombre'];
        $txtPrecio = $producto['precio'];

        $txtImagen = $producto['imagen'];

        break;
    case "Borrar":
        $sentenciaSQL = $conexion->prepare("SELECT imagen FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $producto = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
        
        if (isset($producto["imagen"]) && ($producto["imagen"] != "imagen.jpg")) {
            if (file_exists("img/" . $producto["imagen"])) {
                unlink("img/" . $producto["imagen"]);
            }
        }



        $sentenciaSQL = $conexion->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        //echo "Presionado botón borrar";
        header("Location:productos2.php");

        break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaProductos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



?>


<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos del producto
        </div>


        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="txtID">Id: </label>
                    <input type="text" required readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>

                    <input type="text" class="form-control" value="<?php echo $txtNombre; ?>" name="txtNombre" id="txtNombre" placeholder="Nombre del producto">
                </div>
                <div class="form-group">
                    <label for="txtPrecio">Precio: </label>
                    <input type="text" class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio" placeholder="Precio del producto">
                </div>

                <div class="form-group">
                    <label for="txtImagen">Imagen: </label>
                    <br />
                    <?php if ($txtImagen != "") { ?>
                        <img class="" src="img/<?php echo $producto['imagen']; ?>" width="50" alt="">

                    <?php } ?>


                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Nombre del producto">
                </div>


                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" <?php echo ($accion == "Seleccionar") ? "disabled" : ""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" <?php echo ($accion != "Seleccionar") ? "disabled" : ""; ?> value="Cancelar" class="btn btn-info">Cancelar</button>
                </div>
            </form>

        </div>


    </div>




</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>acciones</th>

            </tr>
        </thead>
        <tbody>

            <?php foreach ($listaProductos as $producto) { ?>


                <tr>
                    <td><?php echo $producto['id']; ?></td>
                    <td><?php echo $producto['nombre']; ?></td>
                    <td><?php echo $producto['precio']; ?></td>

                    <td>
                    <img class="img-thumbnail rounded" src="img/<?php echo $producto['imagen']; ?>" width="50" alt="" srcset="">

                    </td>



                    <td>

                        <form method="POST">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $producto['id']; ?>" />
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary" />
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />

                        </form>
                    </td>


                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

