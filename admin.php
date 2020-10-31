<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php session_start(); ?>
    <title>Administrador</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="Login_v3/images/icons/world.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Login_v3/css/util.css">
    <link rel="stylesheet" type="text/css" href="Login_v3/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <?php
    include('Tienda/templates/header.php');
    ?>

    <?php
    if (isset($_SESSION["usuario"])) {
        if ($_SESSION["usuario"]["privilegio"] == 2) {
            header("location: Slider Jquery/index.php");
        }
    } else {
        header("location: Login_v3/login.php");
    }
    ?>
    <div class="jumbotron" style="background-color: orange;">
        <div class="container text-center">
            <h1><strong>BIENVENIDO</strong> <?php echo $_SESSION["usuario"]["username"]; ?></h1>
            <p>Panel de control | <span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Cliente'; ?></span></p>
            <br>
            <p>
                <a href="cerrar-session.php" class="btn btn-primary btn-lg">CERRAR SESION</a>
            </p>
        </div>
    </div>
    <!--<div class="limiter">
        <div class="container-login100" style="background-image: url('Login_v3/images/bg-01.jpg');">
            <div class="wrap-login100">
                <form action="#" class="login100-form validate-form">
                    <span class=" login100-form-logo">
                        <i class="zmdi zmdi-landscape"></i>
                    </span>

                    <span class="login100-form-title p-b-34 p-t-27">
                        Administrador
                    </span>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            ALTAS
                        </button>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            BAJAS
                        </button>
                    </div>
                    <br>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            CAMBIOS
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>-->
    <div class="jumbotron">
        <div class="container text-center">
            <h1> ADMINISTRACION</h1>
            <br>
            <a href="crud.php" class="btn btn-danger btn-lg">CRUD EMPLEADOS</a>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="Login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="Login_v3/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="Login_v3/vendor/bootstrap/js/popper.js"></script>
    <script src="Login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="Login_v3/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="Login_v3/vendor/daterangepicker/moment.min.js"></script>
    <script src="Login_v3/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="Login_v3/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="Login_v3/js/main.js"></script>
    <script src="../JS/app.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>