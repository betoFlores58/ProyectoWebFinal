<?php
include('global/config.php');
include('global/conexion.php');
include('carrito.php');
include('templates/header.php');
?>


<?php

if ($_POST) {
    $total = 0;
    $sID = session_id();
    $correo = $_POST['email'];

    foreach ($_SESSION['carrito'] as $indice => $producto) {
        $total = $total + ($producto['precio'] * $producto['cantidad']);
    }
    $sentencia = $pdo->prepare("INSERT INTO `ventas` (`id`, `claveTransaccion`, `paypalDatos`, `fecha`, `email`, `total`, `status`) VALUES 
    (NULL,:claveTransaccion,'',NOW(),:email,:total,'pendiente');");

    $sentencia->bindParam(":claveTransaccion", $sID);
    $sentencia->bindParam(":email", $correo);
    $sentencia->bindParam(":total", $total);
    $sentencia->execute();
    $idVenta = $pdo->lastInsertId();

    foreach ($_SESSION['carrito'] as $indice => $producto) {

        $sentencia = $pdo->prepare("INSERT INTO `detalleVentas` (`id`, `idVenta`, `idProducto`, `precioUnit`, `cantidad`, `descargado`) 
        VALUES (NULL,:idVenta, :idProducto,:precioUnit,:cantidad,'0');");

        $sentencia->bindParam(":idVenta", $idVenta);
        $sentencia->bindParam(":idProducto", $producto['id']);
        $sentencia->bindParam(":precioUnit", $producto['precio']);
        $sentencia->bindParam(":cantidad", $producto['cantidad']);

        $sentencia->execute();
    }
    echo $total;
}
?>

<div class="jumbotron text-center">
    <h1 class="display-4">Paso Final.!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con PayPal la cantidad de :
        <h4>$ <?php echo number_format($total, 2); ?></h4>
        <div id="paypal-button-container"></div>
    </p>
    <p><strong>Para aclaraciones: admin@shop.hotmail.com</strong></p>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=MXN" data-sdk-integration-source="button-factory"></script>
<script>
    paypal.Buttons({
        env: 'sandbox',
        style: {
            shape: 'pill',
            color: 'gold',
            layout: 'horizontal',
            label: 'paypal',

        },
        client: {
            sandbox: 'WFDX5GGBCZ3A8',
            production: ''
        },
        payment: function(data, actions) {
            return actions.payment.create({
                payment: [{
                    transactions: {
                        amount: {
                            total: '<?php echo $total; ?>',
                            currency: 'MXN'
                        }
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.payment.execute().then(function() {
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
            });
        }
    }).render('#paypal-button-container');
</script>

<?php
include('templates/footer.php');
?>