<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php session_start(); ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>HOME</title>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="icon" type="image/png" href="../Login_v3/images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Login_v3/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Login_v3/css/main.css">
	<link rel="stylesheet" type="text/css" href="../Css/overhang.min.css" />
	<link rel="stylesheet" type="text/css" href="../Css/main.css" />

	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/main.js"></script>

</head>

<body>
	<?php
	include('../Tienda/templates/header.php');
	?>
	<?php
	if (isset($_SESSION["usuario"])) {
		if ($_SESSION["usuario"]["privilegio"] == 1) {
			header("location: ../admin.php");
		}
	} else {
		header("location: Login_v3/login.php");
	}
	?>
	<div class="jumbotron" style="background-color: orange;">
		<div class="container text-center">
			<h1><strong>BIENVENIDO</strong> <?php echo $_SESSION["usuario"]["username"]; ?></h1>
			<p>Panel de control | <span class="label label-success">
					<?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Administrador' : 'Cliente'; ?> </span></p>
			<br>
			<p>
				<a href="../cerrar-session.php" class="btn btn-primary btn-lg">CERRAR SESION</a>
			</p>
		</div>
	</div>
	<div class="slideshow">
		<ul class="slider">
			<li>
				<img src="img/1.jpg" alt="">
				<section class="caption">
					<h1>Proyecto</h1>
				</section>
			</li>
			<li>
				<img src="img/2.jpg" alt="">
				<section class="caption">
					<h1>PROGRA WEB</h1>
				</section>
			</li>
			<li>
				<img src="img/3.jpg" alt="">
				<section class="caption">
					<h1>SLIDER</h1>
				</section>
			</li>
			<li>
				<img src="img/4.jpg" alt="">
				<section class="caption">
					<h1>JQUERY</h1>
				</section>
			</li>
		</ul>


		<ol class="pagination">

		</ol>

		<div class="left">
			<span class="fa fa-chevron-left"></span>
		</div>

		<div class="right">
			<span class="fa fa-chevron-right"></span>
		</div>
	</div>
	<br><br>

	<form action="" method="post" onsubmit="return mostrarMensaje1();">
		<script>
			function mostrarMensaje1() {
				x = prompt("Introduzca un número");
				y = prompt("Introduzca otro número");
				alert("El resto de la división es: " + (x % y));
				alert("El resultado de la división es: " + (x / y));
				alert("El resultado de la suma es: " + (x + y));
				alert("El resultado de la multiplicacion es: " + (x * y));
			}
		</script>
		<div class="container" align="center">
			<button class="btn btn-success">
				Calculadora
			</button>
		</div>
	</form>
	<br>
	<form action="" method="post" onsubmit="return makeArray();">
		<script>
			function makeArray() {
				for (i = 0; i < makeArray.arguments.length; i++)
					this[i + 1] = makeArray.arguments[i]
			}
			var months = new
			makeArray('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
			var date = new Date();
			var day = date.getDate();
			var month = date.getMonth() + 1;
			var yy = date.getYear();
			var year = (yy < 1000) ? yy + 1900 : yy;
			alert("Hoy es : " + day + " de " + months[month] + " del " + year);
		</script>
		<div class="container" align="center">
			<button class="btn btn-success">
				Fecha
			</button>
		</div>
	</form>
	<br>

	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="../Login_v3/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../Login_v3/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../Login_v3/vendor/bootstrap/js/popper.js"></script>
	<script src="../Login_v3/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../Login_v3/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../Login_v3/vendor/daterangepicker/moment.min.js"></script>
	<script src="../Login_v3/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../Login_v3/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../Login_v3/js/main.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../JS/overhang.min.js"></script>
	<script src="../JS/app.js"></script>
	<script src="../JS/validar.js"></script>
	<script src="../JS/main.js"></script>


</body>

</html>
<?php
ob_end_flush();
?>