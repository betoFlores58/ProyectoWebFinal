<?php
include('global/config.php');
include('carrito.php');
include('templates/header.php');
?>

<br>
<h3>Lista de carrito</h3>
<?php if (!empty($_SESSION['carrito'])) { ?>
    <table class="table table-dark table-bordered">
        <tbody>
            <tr>
                <th width="40%">Descripción</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Total</th>
                <th width="5%"></th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach ($_SESSION['carrito'] as $indice => $producto) { ?>
                <tr>
                    <td width="40%"><?php echo $producto['nombre']; ?></td>
                    <td width="15%" class="text-center"><?php echo $producto['cantidad']; ?></td>
                    <td width="20%" class="text-center"><?php echo $producto['precio']; ?></td>
                    <td width="20%" class="text-center"><?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></td>
                    <td width="5%">
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                            <button class="btn btn-danger" value="Eliminar" type="submit" name="btnAccion">Eliminar</button>
                    </td>
                    </form>
                </tr>
                <?php $total += ($producto['precio'] * $producto['cantidad']); ?>
            <?php } ?>
            <tr>
                <td colspan="3" align="right">
                    <h3>TOTAL</h3>
                </td>
                <td align="right">
                    <h3>$<?php echo number_format($total, 2); ?></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <form action="pagar.php" method="post">
                        <div class="alert alert-success" role="alert">
                            <div class="form-group">
                                <label for="my-input">Correo de contacto: </label>
                                <input id="email" class="form-control" type="email" name="email" placeholder="Ingresa tu correo" required>
                            </div>
                            <small id="emailHelp" class="form-text text-muted">
                                Los productos se enviaran a este correo.
                            </small>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" name="btnAccion">Proceder al pago -> </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <br><br>
    
    <div class="jumbotron">
        <div class="container text-center">
            <h1> LISTA DE COMPRAS</h1>
            <br>
            <a href="../pdf.php" class="btn btn-danger btn-lg">GENERAR PDF</a>
        </div>
    </div>

<?php } else { ?>
    <div class="alert alert-primary" role="alert">
        No hay productos en el carrito
    </div>

<?php } ?>

<?php
include('templates/footer.php');
?>