<?php
include ('Tienda/templates/header.php');

$txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtApPat = (isset($_POST['txtApPat'])) ? $_POST['txtApPat'] : "";
$txtApMat = (isset($_POST['txtApMat'])) ? $_POST['txtApMat'] : "";
$txtEmail = (isset($_POST['txtEmail'])) ? $_POST['txtEmail'] : "";
$txtFoto = (isset($_FILES['txtFoto']["name"])) ? $_FILES['txtFoto']["name"] : "";

$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include('conexion.php');

switch ($accion) {
    case 'btnAgregar':
        $sentencia = $pdoo->prepare("INSERT INTO empleados(nombre,apPat,apMat,email,foto) VALUES (:nombre,:apPat,:apMat,:email,:foto)");
        $sentencia->bindParam(':nombre', $txtNombre);
        $sentencia->bindParam(':apPat', $txtApPat);
        $sentencia->bindParam(':apMat', $txtApMat);
        $sentencia->bindParam(':email', $txtEmail);
        $sentencia->bindParam(':foto', $txtFoto);
        $sentencia->execute();

        echo $txtId;
        echo "Presionaste Agregar";
        break;
    case 'btnModificar':
        $sentencia = $pdoo->prepare("UPDATE empleados SET nombre=:nombre,apPat=:apPat,apMat=:apMat,email=:email,foto=:foto WHERE id=:id");
        $sentencia->bindParam(':nombre', $txtNombre);
        $sentencia->bindParam(':apPat', $txtApPat);
        $sentencia->bindParam(':apMat', $txtApMat);
        $sentencia->bindParam(':email', $txtEmail);
        $sentencia->bindParam(':foto', $txtFoto);
        $sentencia->bindParam(':id', $txtId);
        $sentencia->execute();


        header('Location:crud.php');

        echo $txtId;
        echo "Presionaste Modificar";
        break;
    case 'btnEliminar':
        $sentencia = $pdoo->prepare("DELETE FROM empleados WHERE id=:id");
        $sentencia->bindParam(':id', $txtId);
        $sentencia->execute();

        header('Location:crud.php');

        echo $txtId;
        echo "Presionaste Eliminar";
        break;
    case 'btnCancelar':
        echo $txtId;
        echo "Presionaste Cancelar";
        break;
}

$sentencia = $pdoo->prepare("SELECT * FROM `empleados` WHERE 1");
$sentencia->execute();
$listaEmpleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//print_r($listaEmpleados);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <br>
            <labek>ID</labek>
            <input type="text" name="txtId" value="<?php echo $txtId; ?> " placeholder="" id="txtId" require=""><br><br>
            <labek>NOMBRE</labek>
            <input type="text" name="txtNombre" value="<?php echo $txtNombre; ?> " placeholder="" id="txtNombre" require=""><br><br>
            <labek>APELLIDO PATERNO</labek>
            <input type="text" name="txtApPat" value="<?php echo $txtApPat; ?> " placeholder="" id="txtApPat" require=""><br><br>
            <labek>APELLIDO MATERNO</labek>
            <input type="text" name="txtApMat" value="<?php echo $txtApMat; ?> " placeholder="" id="txtApMat" require=""><br><br>
            <labek>EMAIL</labek>
            <input type="text" name="txtEmail" value="<?php echo $txtEmail; ?> " placeholder="" id="txtEmail" require=""><br><br>
            <labek>FOTO</labek>
            <input type="file" accept="image/*" name="txtFoto" value="<?php echo $txtFoto; ?> " placeholder="" id="txtFoto" require=""><br><br>

            <button value="btnAgregar" type="submit" name="accion">AGREGAR</button>
            <button value="btnModificar" type="submit" name="accion">MODIFICAR</button>
            <button value="btnEliminar" type="submit" name="accion">ELIMINAR</button>
            <button value="btnCancelar" type="submit" name="accion">CANCELAR</button>
        </form>
        <br>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php foreach ($listaEmpleados as $empleado) { ?>
                    <tr>
                        <td><img class="img-thumbnail" width="100px" height="100px" src="img/<?php echo $empleado['foto']; ?>" /></td>
                        <td><?php echo $empleado['nombre']; ?><?php echo $empleado['apPat']; ?><?php echo $empleado['apMat']; ?></td>
                        <td><?php echo $empleado['email']; ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $empleado['id']; ?>">
                                <input type="hidden" name="txtNombre" value=" <?php echo $empleado['nombre']; ?>">
                                <input type=" hidden" name="txtApPat" value="<?php echo $empleado['apPat']; ?>">
                                <input type="hidden" name="txtApMat" value="<?php echo $empleado['apMat']; ?>">
                                <input type="hidden" name="txtEmail" value="<?php echo $empleado['email']; ?>">
                                <input type="hidden" name="txtFoto" value="<?php echo $empleado['foto']; ?>">

                                <input type="submit" value="Seleccionar" name="accion">
                                <button value="btnEliminar" type="submit" name="accion">ELIMINAR</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>

            </table>
        </div>
    </div>
    <div class="container">
       <a name="" id="" class="btn btn-warning" href="admin.php" role="button">Volver a Index Admin</a>
    </div>

    <?php
include('Tienda/templates/footer.php');
    ?>

</body>

</html>