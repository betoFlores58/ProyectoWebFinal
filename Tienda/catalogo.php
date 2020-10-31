<?php
include('global/config.php');
include('global/conexion.php');
include('carrito.php');
include('templates/header.php');

?>
<title>Catalogo</title>

<br>
<?php if ($mensaje != "") { ?>
    <div class="alert alert-success" role="alert">
        <?php echo $mensaje; ?>
        <a href="mostrarCarrito.php" class="badge badge-success">Ver Carrito</a>
    </div>
<?php } ?>

<div class="row">
    <?php
include_once('global/conexion.php');
    $sentencia = $pdo->prepare("SELECT * FROM `items`");
    $sentencia->execute();
    $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaProductos);
    ?>

    <?php foreach ($listaProductos as $producto) { ?>
        <div class="col-3">
            <div class="card">
                <img class="card-img-top" height="350px" src=" img/<?php echo $producto['imagen']; ?> " data-toggle="popover" data-trigger="hover" data-content="<?php echo $producto['descripcion']; ?>" alt="<?php echo $producto['nombre']; ?>">
                <div class="card-body">
                    <span><?php echo $producto['nombre']; ?></span>
                    <h5 class="card-title">$<?php echo $producto['precio']; ?></h5>
                    <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'], COD, KEY); ?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1, COD, KEY); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                    </form>
                </div>
            </div>
            <br>
        </div>
    <?php } ?>
    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

    <?php
    include('templates/footer.php');
    ?>